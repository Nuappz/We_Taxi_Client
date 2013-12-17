<?php
function RTT_mail($RTT_mail) {
	$mail = new PHPMailer();
	$error[] = array();
	$mail->setFrom('admin@reignsoft.co.in', 'Booking Sys');
	$mail->addReplyTo('admin@reignsoft.co.in', 'Booking Sys');
	$mail->Subject = $RTT_mail->subject;
	$mail->AltBody = 'Booking Detail';
	$mail->msgHTML($RTT_mail->body);
	
	foreach($RTT_mail->to as $toadd) {
		$mail->addAddress($toadd, 'Prem Adarsh');
		
		if (!$mail->send()) {
			$error[] = $mail->ErrorInfo;
		}
		$mail->clearAddresses();
	}
	
	
	return $error;
}
