<?php
session_start();
ini_set('error_reporting', E_ALL);

if (!empty($_SESSION['userid'])) {
	require_once getcwd() . '/db.php';
	require_once getcwd() . '/common.inc.php';
	
	$name 		    = mysqli_escape_string($dbconn , $_POST['name']);
	$contactno      = mysqli_escape_string($dbconn , $_POST['contactno']);
	$pick_up_point 	= mysqli_escape_string($dbconn , $_POST['pick_up_point']);
	$taxitype 		= mysqli_escape_string($dbconn , $_POST['taxitype']);
	$book_desc		= mysqli_escape_string($dbconn , $_POST['book_desc']);
	$error_list		= array();
	
	
	
	if(empty($name)) {
		$error_list['name'] = '* Please Enter the your name';
	}
	if(empty($contactno)) {
		$error_list['contactno'] = '* Please enter Contact #';
	}
	if(empty($pick_up_point)) {
		$error_list['pick_up_point'] = '* Please fill Pick up point';
	}
	
	if(empty($taxitype)) {
		$error_list['taxitype'] = '* Please select Taxi type';
	}
	if(empty($book_desc)) {
		$error_list['book_desc'] = '* Please enter your booking detail';
	}
	
	if (valid_email($email)==FALSE ) {
		$emil_error = 'yes';
	}

	if(!empty($emil_error)) {
		echo ' * Please supply a Valid Email address';
		$error = 'yes';
	}
	
	  
	
	
	$date =strtotime('now');
	if (!empty($hidden_val)) {
		//Start Update Database
		//id,companyname,default_dealer,default_urg_dealer,default_exp_dealer
		if($error =='') {
			$report_email = json_encode(array_unique(explode(',',$report_email)));
			$query = "UPDATE company_detail 
			           SET companyname    		 = '".$cname."',
					     default_dealer          = '".$nordealer."',
						 default_urg_dealer      = '".$expdealer."',
						 default_exp_dealer	     = '".$urgdealer."',
						 report_email	         = '".$report_email."'
						 
						 WHERE id='".$hidden_val."'";			 
						  
		    mysqli_query($dbconn, $query) or die(mysqli_error($dbconn));
			echo 'true';
		}
	}
	else {
		echo 'Form Outdated.Please reload the page';
	}
	//End
}
