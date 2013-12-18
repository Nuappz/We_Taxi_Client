var app = require('http').createServer(handler),
  io = require('socket.io').listen(app),
  fs = require('fs'),
  mysql = require('mysql'),
  connectionsArray = [],
  connection = mysql.createConnection({
    host: 'localhost',
    user: 'root',
    password: '',
    database: 'wetaxi',
    port: 3306
  }),
  POLLING_INTERVAL = 3000,
  pollingTimer;

// If there is an error connecting to the database
connection.connect(function(err) {
  // connected! (unless `err` is set)
  console.log(err);
});

// creating the server ( localhost:8000 )
app.listen(8000);

// on server started we can load our client.html page
function handler(req, res) {
  fs.readFile('http://localhost/m1/book.php', function(err, data) {
    if (err) {
      console.log(err);
      res.writeHead(500);
      return res.end('Error loading client.html');
    }
    res.writeHead(200);
    res.end(data);
  });
}

/*
 *
 * HERE IT IS THE COOL PART
 * This function loops on itself since there are sockets connected to the page
 * sending the result of the database query after a constant interval
 *
 */

var pollingLoop = function() {
  // Doing the database query
  var query = connection.query('SELECT driver_id, uname, last_lang, last_lati FROM wetaxi_driver where is_engaged=0'),
    users = []; // this array will contain the result of our db query

  // setting the query listeners
  query
    .on('error', function(err) {
      // Handle error, and 'end' event will be emitted after this as well
      console.log(err);
      updateSockets(err);
    })
    .on('result', function(user) {
      // it fills our array looping on each user row inside the db
      users.push(user);
    })
    .on('end', function() {
      // loop on itself only if there are sockets still connected
      if (connectionsArray.length) {
        pollingTimer = setTimeout(pollingLoop, POLLING_INTERVAL);

        updateSockets({
          users: users
        });
      }
    });
};

var sendBookedStatus = function(){
	var query = connection.query('SELECT engaged_did, socket_session_id FROM wetaxi_booking where engaged_did IS NOT NULL'),
    bookedDetails = []; // this array will contain the result of our db query

  // setting the query listeners
  query
    .on('error', function(err) {
      // Handle error, and 'end' event will be emitted after this as well
      console.log(err);
      updateClientStatus(err);
    })
    .on('result', function(engaged) {
      // it fills our array looping on each user row inside the db
      bookedDetails.push(engaged);
    })
    .on('end', function() {
      // loop on itself only if there are sockets still connected
      if (connectionsArray.length) {
        pollingTimer = setTimeout(sendBookedStatus, POLLING_INTERVAL);

        updateClientStatus({
          bookedDetails: bookedDetails
        });
      }
    });
};

var clients = [];
// creating a new websocket to keep the content updated without any AJAX request
io.sockets.on('connection', function(socket) {

  clients.push(socket.id);
  //console.log('Number of connections:' + connectionsArray.length);
  // starting the loop only if at least there is one user connected
  if (!connectionsArray.length) {
    pollingLoop();
	sendBookedStatus();
  }

  socket.on('storeClientInfo', function (data) {
	//	console.log(data);  
		var clientId  = socket.id;
		data.formdata.socket_session_id = clientId;
		var query = connection.query("INSERT INTO wetaxi_booking (`wechatid`, `customer_name`, `customer_number`, `booking_from`, `taxi_type`, `tip`, `destination_to`, `notes`, `socket_session_id`) VALUES ('" + data.formdata.wechatid + "', '" + data.formdata.customer_name + "', '" + data.formdata.customer_number + "', '" + data.formdata.booking_from + "', '" + data.formdata.taxi_type + "', '" + data.formdata.tip + "', '" + data.formdata.destination_to + "', '" + data.formdata.notes + "', '" + data.formdata.socket_session_id + "');");
	});
  
  socket.on('disconnect', function() {
    var socketIndex = connectionsArray.indexOf(socket);
    //console.log('socket = ' + socketIndex + ' disconnected');
    if (socketIndex >= 0) {
      connectionsArray.splice(socketIndex, 1);
    }
  });

  //console.log('A new socket is connected!');
  connectionsArray.push(socket);

});

var updateClientStatus = function(data) {
  // sending new data to all the sockets connected
 /* console.log(data.bookedDetails.length);
  console.log(data.bookedDetails[0].engaged_did);*/
 // connectionsArray.forEach(function(tmpSocket) {
	//io.sockets.socket(clients[1]).emit("greeting", "Hey there, User 2");
//	console.log(data.bookedDetails[0].engaged_did);
	//io.sockets.socket(data.bookedDetails.socket_session_id).emit("booking", data.bookedDetails.engaged_did);
    //tmpSocket.volatile.emit('notification', data);
  //});
	for (var i=0;i<data.bookedDetails.length;i++)
	{ 
		//console.log();
		io.sockets.socket(data.bookedDetails[i].socket_session_id).emit('booking', data.bookedDetails[i].engaged_did);
	}
};

var updateSockets = function(data) {
  // adding the time of the last update
  data.time = new Date();
  // sending new data to all the sockets connected
  connectionsArray.forEach(function(tmpSocket) {
    tmpSocket.volatile.emit('notification', data);
  });
};
