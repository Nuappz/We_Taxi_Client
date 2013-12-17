<?php
session_start();
ini_set('error_reporting', E_ALL);
define('RW_ROOT', $_SERVER['DOCUMENT_ROOT'].'/wtaxi');

if (!empty($_POST['formtoken'])) {
	require_once getcwd() . '/db.php';
	
	require RW_ROOT.'/addons/mailer/PHPMailerAutoload.php';
	require RW_ROOT.'/addons/mailer/class.phpmailer.php';
	require RW_ROOT.'/lib/mail.php';
	//require RW_ROOT.'/lib/db.php';
	
	
	/*
	$name 		    = mysqli_escape_string($dbconn , $_POST['name']);
	$contactno      = mysqli_escape_string($dbconn , $_POST['contactno']);
	$contactno 		= preg_replace("/[^0-9]/", '', $contactno);
	$pick_up_point 	= mysqli_escape_string($dbconn , $_POST['pick_up_point']);
	$taxitype 		= mysqli_escape_string($dbconn , $_POST['taxitype']);
	$book_desc		= trim(mysqli_escape_string($dbconn , $_POST['book_desc']));
	
	*/
	// Temp
	$name 		    = $_POST['cname'];
	$contactno      = $_POST['contactno'];
	$contactno 		= preg_replace("/[^0-9]/", '', $contactno);
	$pick_up_point 	= $_POST['pick_up_point'];
	$taxi_type 		= $_POST['taxitype'];
	$destination 	= $_POST['destination'];
	$pickuptime 	= $_POST['pickuptime'];
	$mytips 	    = $_POST['mytip'];
	$book_desc		= trim($_POST['book_desc']);
	
	
	$wechatid = '';
	
	
	switch($taxi_type) {
		case '1':
			$taxitype  = 'Town/Budget Taxi';
		break;
		case '2':
			$taxitype  = 'Executive Taxi';
		break;
	}
	
	
	$wechatid		= '';
	$booking_lang		= '';
	$booking_lati		= '';
	$destination_lang		= '';
	$destination_lati		= '';
	$error_list		= '';
	$error_list		= '';
	
	
	
	if(empty($name)) {
		$error_list['name'] = '* Please Enter the your name';
	}
	if(empty($contactno)) {
		$error_list['contactno'] = '* Please enter Contact #';
	}
	else if(strlen($contactno) < 10) {
		$error_list['contactno'] = '* Invalid Contact #';
	}
	if(empty($pick_up_point)) {
		$error_list['pick_up_point'] = '* Please fill Pick up point';
	}
	
	if(empty($taxitype)) {
		$error_list['taxitype'] = '* Please select Taxi type';
	}
	if(empty($pickuptime)) {
		$error_list['pickuptime'] = '* Please select Pickup time';
	}
	else {
		$pickuptime = date('d-m-Y h:i A',strtotime($pickuptime));
	}
	if(empty($destination)) {
		$error_list['destination'] = '* Please fill destination';
	}
	
	
	$date =strtotime('now');
	if(empty($error_list)) {
		//Start Update Database
		$to = array('premadarsh.it@gmail.com','prem.learningport@gmail.com');
		$body = '';
		$body = file_get_contents('mail_body.php');
		$body = str_replace("@name@"     , $name,$body);
		$body = str_replace("@phoneno@"  , $contactno,$body);
		$body = str_replace("@pickup@"   , $pick_up_point,$body);
		$body = str_replace("@taxitype@" , $taxitype,$body);
		$body = str_replace("@mytips@"   , $mytips,$body);
		$body = str_replace("@picktime@" , $pickuptime,$body);
		
		$body = str_replace("@destin@"   , $destination,$body);
		
		
		$body = str_replace("@book_desc@", $book_desc,$body);
		
		
		$mail = new stdClass();
		$mail->subject  	= 'New TAXI Booking from '.$name;
		$mail->to 			= $to;
		$mail->body 		= $body;
		
		
		$query = "INSERT INTO wetaxi_booking (`created`,`updated`,`wechatid`,`customer_number`,`customer_name`,`booking_from`,`booking_lang`,`booking_lati`,`destination_to`,`destination_lang`,`destination_lati`,`tip`,`travel_time`,`notes`,`taxi_type`) 
		VALUES ('".$date."','".$date."','".$wechatid."','".$contactno."','".$name."','".$pick_up_point."','".$booking_lang."','".$booking_lati."','".$destination."','".$destination_lang."','".$destination_lati."','".$mytips."','".strtotime($pickuptime)."','".$book_desc."','".$taxi_type."')";
		
	    mysqli_query($dbconn, $query) or die(mysqli_error($dbconn));
		$insert_id = mysqli_insert_id($dbconn);
		
		
		
		//RTT_mail($mail);
		//echo(json_encode($error_list));
		
		echo 'true';
	}
	else {
		echo(json_encode($error_list));
	}
	//End
}