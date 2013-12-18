<!DOCTYPE html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!--Declare page as mobile friendly --> 
<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0"/>
<!-- Declare page as iDevice WebApp friendly -->
<meta name="apple-mobile-web-app-capable" content="yes"/>
<!-- iDevice WebApp Splash Screen, Regular Icon, iPhone, iPad, iPod Retina Icons -->
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/splash/splash-icon.png"> 
<!-- iPhone 3, 3Gs -->
<link rel="apple-touch-startup-image" href="images/splash/splash-screen.png" 			media="screen and (max-device-width: 320px)" /> 
<!-- iPhone 4 -->
<link rel="apple-touch-startup-image" href="images/splash/splash-screen%402x.png" 		media="(max-device-width: 480px) and (-webkit-min-device-pixel-ratio: 2)" /> 
<!-- iPhone 5 -->
<link rel="apple-touch-startup-image" sizes="640x1096" href="images/splash/splash-screen%403x.png" />

<!-- Page Title -->
<title>Wetaxi New booking</title>

<!-- Stylesheet Load -->
<link href="styles/style.css"				rel="stylesheet" type="text/css">
<link href="styles/framework-style.css" 	rel="stylesheet" type="text/css">
<link href="styles/framework.css" 			rel="stylesheet" type="text/css">
<link href="styles/coach.css"				rel="stylesheet" type="text/css">
<link href="styles/bxslider.css"			rel="stylesheet" type="text/css">
<link href="styles/swipebox.css"			rel="stylesheet" type="text/css">
<link href="styles/icons.css"				rel="stylesheet" type="text/css">
<link href="styles/retina.css" 				rel="stylesheet" type="text/css" media="only screen and (-webkit-min-device-pixel-ratio: 2)" />


<!-- Page custom Css -->
<link href="styles/custom.css"				rel="stylesheet" type="text/css">
<!--Page Scripts Load -->
<script src="scripts/jquery.min.js"		 type="text/javascript"></script>	
<script src="scripts/snap.js"			 type="text/javascript"></script>
<script src="scripts/hammer.js"			 type="text/javascript"></script>	
<script src="scripts/jquery-ui-min.js"   type="text/javascript"></script>
<script src="scripts/subscribe.js"		 type="text/javascript"></script>
<script src="scripts/jquery.swipebox.js" type="text/javascript"></script>
<script src="scripts/bxslider.js"		 type="text/javascript"></script>
<script src="scripts/colorbox.js"		 type="text/javascript"></script>
<script src="scripts/retina.js"			 type="text/javascript"></script>
<script src="scripts/custom.js"			 type="text/javascript"></script>
<script src="scripts/framework.js"		 type="text/javascript"></script>
<script src="http://localhost:8000/socket.io/socket.io.js"></script>
<script>window.jQuery || document.write('<script src="js/jquery-1.10.1.min.js"><\/script>')</script>
<script>
	var socket = io.connect('http://localhost:8000');
</script>
</head>
<body>

<div id="preloader">
	<div id="status">
    	<p class="center-text">
			Loading the content...
            <em>Loading depends on your connection speed!</em>
        </p>
    </div>
</div>




<div class="all-elements">
    
    <?php include_once 'touch_sidebar.php';?>
       
    <div id="content" class="page-content">
    	<?php include_once 'touch_header.php';?>
       
      <div class="container no-bottom">
            <div class="contact-form no-bottom"> 
                
                <div id="msgtoshow"></div>
					<div class="wrapped-content" id="wrapped-content">
                    <div class="loader">&nbsp;</div>
                    <div id="error"> &nbsp;</div>
                
                <form onsubmit="return FormSubmit();" method="post" class="addform" id="addform">
                    <fieldset>
						<div class="formFieldWrap">
                        <label class="field-title contactEmailField" for="contactEmailField"> <span>(required)</span></label>
                        <input type="text" name="wechatid" id="wechatid" placeholder="Wechat Id" required  class="contactField requiredField" maxlength="50">
                        </div>
                        
                        <div class="formFieldWrap">
                            <label class="field-title contactNameField" for="contactNameField"><span>(required)</span></label>
                            <input type="text" name="cname" id="cname" placeholder="Your name" required=required  class="contactField requiredField" maxlength="50" title="My Name" alt="My Name">
                        </div>
                        <div class="formFieldWrap">
                        <label class="field-title contactEmailField" for="contactEmailField"> <span>(required)</span></label>
                        <input type="tel" name="contactno" id="contactno" placeholder="Phone #" required  class="contactField requiredField" maxlength="13">
                        </div>
                        
                        
                        <div class="formFieldWrap">
                        <label class="field-title contactEmailField" for="contactEmailField"> <span>(required)</span></label>
                        <input name="pick_up_point" id="pick_up_point" type="text" placeholder="My current Location " class="contactField requiredField" />
                        </div>
                        
                        <div class="formFieldWrap">
                        <label class="field-title contactEmailField" for="contactEmailField"> </label>
                        <select name="taxitype" id="taxitype" class="contactField ">
                                     <option value="1">Town/Budget Taxi</option>
                                     <option value="2">Executive Taxi</option>
                                    </select>
                        </div>
                        
                        
                        <div class="formFieldWrap">
                        <label class="field-title contactEmailField" for="contactEmailField"> <span>(required)</span></label>
                        <input class="contactField requiredField" type="datetime-local" name="pickuptime" id="pickuptime" value="<?php echo date('Y-m-d').'T'.date('H:i');?>" placeholder="Now" >
                        <input class="contactField requiredField" type="tel" name="mytip" id="mytip" maxlength="3" min="1" max="200" pattern="[0-9]*" placeholder="My Tips to driver" size="4" style="width:40px; float:left" />
                        </div>
                        
                        <div class="formFieldWrap">
                        <label class="field-title contactEmailField" for="contactEmailField"> <span>(required)</span></label>
                        <input class="contactField requiredField" name="destination" id="destination" type="text" placeholder="My destination" />
                        </div>
                        
                        <div class="formFieldWrap">
                        <label class="field-title contactEmailField" for="contactEmailField"> <span>(required)</span></label>
                        
                        </div>
                        <div class="formTextareaWrap">
                            <label class="field-title contactMessageTextarea" for="contactMessageTextarea"> </label>
                            <textarea name="book_desc" id="book_desc" cols="30" rows="5" placeholder="Notes to Driver" class="contactTextarea"></textarea>
                        </div>
                        <div class="formSubmitButtonErrorsWrap">
                            <input type="hidden" name="formtoken" id="formtoken" value="<?php echo md5(time().rand(5,10))?>"?>
                            <input type="submit" class="no-bottom  button-minimal yellow-minimal" id="contactSubmitButton" value="SUBMIT" data-formId="contactForm"/>
                            
                        </div>
                    </fieldset>
                </form>       
            </div>
        </div>
    
    <?php include_once 'touch_footer.php'?>
               
	</div>   
</div>
</div>




<script src="https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=-33.8670522,151.1957362&radius=500&types=food&name=harbour&sensor=false"></script>


<script>window.jQuery || document.write('<script src="js/jquery-1.10.1.min.js"><\/script>')</script>
<script src="js/formmapper.js"></script>
<script type="text/javascript" language="javascript">

function FormSubmit() {
	//e.preventDefault();
	var items = Array();
	$(".loader").show();
	$(":submit").attr("disabled", true);
	//$("#addform").serializeArray();
	//var data = $("#addform").serializeArray();
	//data = JSON.stringify(data);
	var wechatid = $("#wechatid").val();
	var cname = $("#cname").val();
	var contactno = $("#contactno").val();
	var pick_up_point = $("#pick_up_point").val();
	var taxitype = $("#taxitype").val();
	var pickuptime = $("#pickuptime").val();
	var mytip = $("#mytip").val();
	var destination = $("#destination").val();
	var book_desc = $("#book_desc").val();
	
    var data = {};
    data["wechatid"] = wechatid;
	data["customer_name"] = cname;
	data["customer_number"] = contactno;
	data["booking_from"] = pick_up_point;
	data["taxi_type"] = taxitype;
	data["travel_time"] = pickuptime;
	data["tip"] = mytip;
	data["destination_to"] = destination;
	data["notes"] = book_desc;
	
    socket.emit('storeClientInfo', {formdata:data});
	var element = document.getElementById('addform');
	element.parentNode.removeChild(element);
	
	socket.on('notification', function (data) {
	$(".loader").hide();
	var usersList = "<dl>";
	$.each(data.users,function(index,user){
		usersList += "<dt>" + user.driver_id + "</dt>\n" +
					 "<dt>" + user.uname + "</dt>\n" +
					 "<dt>" + user.last_lang + "</dt>\n" +
					 "<dt>" + user.last_lati + "</dt>\n";
	});
	usersList += "</dl>";
	$('#msgtoshow').html(usersList).show();
	});	
	
	socket.on('booking', function (data) {
	/*	var usersList = "<dl>";
		$.each(data.bookedDetails,function(index,engaged){
			usersList += "<dt>" + engaged.engaged_did + "</dt>\n";
		});
		usersList += "</dl>";*/
		var element = document.getElementById('msgtoshow');
		element.parentNode.removeChild(element);
	//	$('#msgtoshow').html(usersList).show();
		//alert("Success");
		socket.disconnect();
	});
        /*  $.post( 
             "lib/save_order.inc.php",
             $("#addform").serializeArray(),
				 function(data) {  
				var obj = jQuery.parseJSON(data);
				if(data == 'true')  {
					$(".loader").hide();
					$(":submit").attr("disabled", false);
					$( "#error_list" ).show().empty();
					$("#wrapped-content").hide();
					msg = '<p>Thank you for contacting with us </p><p>We have received your enquiry</p><p>We will contact you shortly</p>';
					$('#msgtoshow').append(msg).show();
				}
				else {
					$( "#error" ).empty();
					$( "#error").show();
					//.addClass( 'small-notification red-notification no-bottom' );
					$.each( obj, function( key, val ) {
						items.push( "<li>" + val + "</li>" );
					});

					$( "<ul/>", {
						"class": "error_list",
						html: items.join( "" )
					  }).appendTo( "#error" );
					  
					$(".loader").hide();
					$(":submit").attr("disabled", false);
				}
				$('html,body').animate({ scrollTop: $('#content').offset().top }, 'slow');
             }
          );*/
          var str = $("#addform").serialize();
		  return false;
}
$("#pick_up_point").formmapper({
  details: "form",
  types: ['establishment'],
  country: 'in',
  radius:10,
  location: false
});
$("#destination").formmapper({
  details: "form",
  types: ['establishment'],
  country: 'in',
  
  location: false
});
findMyLocation('#pick_up_point');
		
$('#pick_up_point').formmapper({});

$('#destination').formmapper({});
</script>
</body>
</html>
