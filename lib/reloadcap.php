<?php
session_start();
if(isset($_POST['act']) && $_POST['act'] == "check"){
	if(isset($_POST['capchatxt']) && $_POST['capchatxt'] != '' && !empty($_SESSION['captcha_code']) && strtoupper($_SESSION['captcha_code']) == strtoupper($_POST['capchatxt'])){
		echo json_encode("captrue");
	}else{
        echo json_encode("error session");
	}
}elseif(isset($_POST['act']) && $_POST['act'] == "reload"){
	include("Captcha.php");
    $captcha = new Captcha();
    $captcha_code = $captcha->getCaptchaCode(6);
    unset($_SESSION['captcha_code']);
    $captcha->setSession('captcha_code', $captcha_code);
//    echo $captcha_code;
    echo json_encode("http://localhost/genuity_final/lib/loginCaptchaImage.php");
    die();
//    $imageData = $captcha->createCaptchaImage($captcha_code);
//	if (isset($captcha_code) && isset($imageData)){
//	    echo json_encode(substr(__FILE__, strlen($_SERVER['DOCUMENT_ROOT'])) . '?_CAPTCHA&amp;t=' . urlencode(microtime()));
//	}else {
//        return null;
//	}
}elseif(isset($_POST['act']) && $_POST['act'] == "sendmail"){
	$fname = $_POST['fname'];
	//$company = $_POST['company'];
	$mailAddr = $_POST['mail'];
	$subject = $_POST['subject'];
	$telephone = $_POST['telephone'];
	$comment = $_POST['comment'];
	$captxt = $_POST['captxt'];
	$service = $_POST['service'];	

	if($fname == ""){
		$msg = "Name is Empty!";
	}elseif($mailAddr == ""){
		$msg = "Email Address is Empty!";
	}elseif(!filter_var($mailAddr, FILTER_VALIDATE_EMAIL)){
		$msg = "Email Address is not valid!";
	}elseif($subject == ""){
		$msg = "Subject is Empty!";
	}elseif($comment == ""){
		$msg = "Message is Empty!";
	}elseif($captxt == ""){
		$msg = "Security Code is Empty!";
	}elseif(strtoupper($_SESSION['captcha_code']) != strtoupper($captxt)){
		$msg = "Security Code is Incorrect!";
	}else{		
		$headers = "MIME-Version: 1.0\n";
		$headers .= "Content-Type: text/html; charset=iso-8859-1\n";
		//$to="sh@genusys.us";
		
		// $to = "sh@genuitysystems.com";
		$to = "abdul.momin@genusys.us";
		$subject = "Genuity query from - $fname";
		
		$mailtext = "<html><head></head><body>";
		$mailtext .= "<table width=\"75%\"  border=\"0\" cellspacing=\"0\" cellpadding=\"5\">";
		$mailtext .= "<tr><td width=\"80\"><b>Name:</b></td><td>$fname</td></tr>";
		$mailtext .= "<tr><td><b>Email:</b></td><td>$mailAddr</td></tr>";
		$mailtext .= "<tr><td><b>Telephone:</b></td><td>$telephone</td></tr>";
		$mailtext .= "<tr><td><b>Query:</b></td><td>$service</td></tr>";
		$mailtext .= "<tr><td><b>Message:</b></td><td>$comment</td></tr>";
		$mailtext .= "</table>";
		$mailtext .= "</body></html>";

		require_once("phpmailer/class.phpmailer.php");
		$mail = new PHPMailer();

		$mail->IsSMTP();							// telling the class to use SMTP
		$mail->PluginDir = "";
		$mail->SMTPDebug = 1;
		$mail->Timeout = 30;
		$mail->SMTPKeepAlive = true;
		// $mail->SMTPAuth = false;					// enable SMTP authentication
		$mail->SMTPAuth = true;					// enable SMTP authentication
       $mail->SMTPAutoTLS = true;             // If enable TLS authentication
       $mail->SMTPSecure = 'tls';           // IF enable TLS authentication
		// $mail->Port = 25;							// set the SMTP port
		$mail->Port = 587;							// set the SMTP port
		$mail->Host = 'smtp.gmail.com';
        // $mail->Host = 'mailgw.genusys.us';
		//$mail->Host = 'dhakatel.com';//
		$mail->Username = 'alamin@genusys.us';						// SMTP account username
		$mail->Password = '01911977336@s';						// SMTP account password

		$mail->AddReplyTo($mailAddr, $fname);
		$mail->From = $mailAddr;
		$mail->FromName = $fname;
		$mail->WordWrap = 80;
		$mail->isHTML(true);

		$mail->Subject = $subject;
		$mail->MsgHTML($mailtext);
		$mail->ClearAddresses();
		$mail->AddAddress($to);

		try {
			if ( !$mail->Send() ) {
				$msg = "Query Submission Failed!! Try Again";
			} else {
				$msg = "success";
				unset($_SESSION['captcha_code']);
			}
		} catch (phpmailerAppException $e) {
			$msg = "Query Submission Failed!! Try Again";
		}
	
	}
	echo json_encode($msg);
}
?>