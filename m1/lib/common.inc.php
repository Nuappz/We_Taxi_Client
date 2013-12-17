<?php
function valid_email($str)	{
	return ( ! preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
}

function KEY_CHAR ($is_complex = FALSE) {
	if (!empty($is_complex)) {
		return "abmTKMNDSAGnopqrstuvwxyzADAR0123456789SHRDOIMKcdefghijklJNHFYGL&^%";
	}
	else {
		return "abmTKMNDSAGnopqrstuvwxyzADAR0123456789SHRDOIMKcdefghijklJNHFYGL";
	}
}

function GetToken($length = 10 , $string = FALSE , $is_complex = FALSE) {
    $characters = KEY_CHAR($is_complex);
    for ($p = 0; $p < $length; $p++) {
        $string .= $characters[mt_rand(0, strlen($characters) - 1)]; 
    }
    return $string;
}
// Function to get the client ip address
function getRealIpAddr() {
    if (!empty($_SERVER['HTTP_CLIENT_IP']))  {
      $ip=$_SERVER['HTTP_CLIENT_IP'];
    }
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))  {
      $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else {
      $ip=$_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}


