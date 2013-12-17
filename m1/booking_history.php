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
<title>Wetaxi Booking History</title>

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
<script src="scripts/contact.js"		 type="text/javascript"></script>
<script src="scripts/jquery.swipebox.js" type="text/javascript"></script>
<script src="scripts/bxslider.js"		 type="text/javascript"></script>
<script src="scripts/colorbox.js"		 type="text/javascript"></script>
<script src="scripts/retina.js"			 type="text/javascript"></script>
<script src="scripts/custom.js"			 type="text/javascript"></script>
<script src="scripts/framework.js"		 type="text/javascript"></script>

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
        	<h1 class="center-text">My Booking History!</h1>
        	<div>
             <div class="box apple">
               <div class="panel-time">
                    <span style="float:right;"><time class="timeago" datetime="<?php echo date('Y-m-d H:i:s');?>"></time></span> 
                    <span >Tip 2 RM</span>
                </div>
                <div class="panel-body" >
                    <div class="panel-body-left"><strong>Pickup</strong></div>
                    <div class="panel-body-right">SS2 near digital mall SS2 near digital mall SS2 near digital mall</div>
                    <hr class="panel-seperate">
                    <div class="panel-body-left"><strong>Drop</strong></div>
                    <div class="panel-body-right">SS2 near digital mall SS2 near digital mall SS2 near digital mall</div>
                    <hr class="panel-seperate">
                    <div class="panel-body-left"><strong>Time</strong></div>
                    <div class="panel-body-right">12/10/2014 12:05 AM
                    </div>
                </div>
                <div class="panel-control">
                    <button class="btn btn-warning btn-xs"><i class="icon-cog"></i> View</button>
                    <button class="btn btn-warning btn-xs"><i class="icon-cog"></i> Accept</button>
                    <button class="btn btn-warning btn-xs"><i class="icon-cog"></i> Decline</button>
                </div>
             </div>
             
             
             
             
             
            </div>
            
        </div>
        
        
        
        
        
    
    <?php include_once 'touch_footer.php'?>
               
	</div>   
</div>
</body>
</html>
