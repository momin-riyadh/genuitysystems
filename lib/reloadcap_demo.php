<?php
session_start();
if(isset($_POST['act']) && $_POST['act'] == "check"){
	if(isset($_POST['capchatxt']) && $_POST['capchatxt'] != '' && strtoupper($_SESSION['ncap_code']) == strtoupper($_POST['capchatxt'])){
		echo json_encode("captrue");
	}else{
		include("phpcaptcha.php");
		unset($_SESSION['ncap_code']);
		$capArray = captcha();
		if (isset($capArray['code']) && isset($capArray['image_src'])){
		    $_SESSION['ncap_code'] = $capArray['code'];
		    echo json_encode($capArray['image_src']);
		}else {
			$_SESSION['ncap_code'] = '';
	    	echo json_encode("images/preloader.gif");
		}
	}
}elseif(isset($_POST['act']) && $_POST['act'] == "reload"){
	include("phpcaptcha.php");
	unset($_SESSION['ncap_code']);
	$capArray = captcha();
	if (isset($capArray['code']) && isset($capArray['image_src'])){
	    $_SESSION['ncap_code'] = $capArray['code'];
	    echo json_encode($capArray['image_src']);
	}else {
		$_SESSION['ncap_code'] = '';
	   	echo json_encode("images/preloader.gif");
	}
}elseif(isset($_POST['act']) && $_POST['act'] == "sendmail"){	
	
	$fname = $_POST['fname'];
    $mail_a = $_POST['mail_a'];
    $mail_b = $_POST['mail_b'];
    $company = $_POST['company'];
    $phone_a = $_POST['phone_a'];
    $phone_b = $_POST['phone_b'];
    $details = nl2br($_POST['details']);
    $brand_a = $_POST['brand_a'];
    $brand_b = $_POST['brand_b'];
    $brand_c = $_POST['brand_c'];
    $ip = $_POST['ip'];
    $port = $_POST['port'];
    $balance = $_POST['balance'];
    $ivr = $_POST['ivr'];
    $web = $_POST['web'];
    $user = $_POST['user'];
    $pass = $_POST['pass'];
	$captxt = $_POST['captxt'];

	if($fname == ""){
		$msg = "Name is Empty!";
	}elseif($mail_a == ""){
		$msg = "Email Address is Empty!";
	}elseif(!filter_var($mail_a, FILTER_VALIDATE_EMAIL)){
		$msg = "Email Address is not valid!";
	}elseif($phone_a == ""){
		$msg = "Phone Number is Empty!";
	}elseif($brand_a == ""){
		$msg = "Dialer Brand Name is Empty!";
	}elseif($ip == ""){
		$msg = "Switch IP is Empty!";
	}elseif($captxt == ""){
		$msg = "Security Code is Empty!";
	}elseif(strtoupper($_SESSION['ncap_code']) != strtoupper($captxt)){
		$msg = "Security Code is Incorrect!";
	}else{
		$headers = "MIME-Version: 1.0\n";
		$headers .= "Content-Type: text/html; charset=iso-8859-1\n";
		//$to="vcarrier.mkt@genusys.us";
		$to = "sh@genuitysystems.com";
		$subject = "Genuity query from $fname";
		$mailtext = "<html><head></head><body>".

		"<table width=\"75%\"  border=\"0\" cellspacing=\"0\" cellpadding=\"5\">

		<tr><td width=\"150\"><b>Name:</b></td><td>$fname</td></tr>
		<tr><td><b>Email:</b></td><td>$mail_a</td></tr>
		<tr><td></td><td>$mail_b</td></tr>
		<tr><td><b>Company:</b></td><td>$company</td></tr>
		<tr><td><b>Phone:</b></td><td>$phone_a</td></tr>
		<tr><td></td><td>$phone_b</td></tr>
		<tr><td valign=\"top\"><b>Contact Details:</b></td><td>$details</td></tr>
		<tr><td><b>Dialer Brand:</b></td><td>$brand_a &nbsp;,&nbsp; $brand_b &nbsp;,&nbsp; $brand_c</td></tr>
		<tr><td><b>Switch IP:</b></td><td>$ip</td></tr>
		<tr><td><b>Switch Port:</b></td><td>$port</td></tr>

		<tr><td><b>Balance query link:</b></td><td>$balance</td></tr>
		<tr><td><b>Balance IVR no:</b></td><td>$ivr</td></tr>
		<tr><td><b>Footer (Web address):</b></td><td>$web</td></tr>
		<tr><td><b>Test PIN (User/Pass):</b></td><td>User: $user Pass: $pass</td></tr>

		</table>".
		"</body></html>";
	
		require_once("phpmailer/class.phpmailer.php");
		$mail = new PHPMailer();

		$mail->IsSMTP();							// telling the class to use SMTP
		$mail->PluginDir = "";
		$mail->IsMail();
		$mail->SMTPDebug = 1;
		$mail->Timeout = 30;
		$mail->SMTPKeepAlive = true;
		$mail->SMTPAuth = false;					// enable SMTP authentication
		$mail->Port = 25;							// set the SMTP port
		//$mail->Host = 'mailgw.genusys.us';
		$mail->Host = 'dhakatel.com';
		$mail->Username = '';						// SMTP account username
		$mail->Password = '';						// SMTP account password
	
		$mail->AddReplyTo($mail_a, $fname);
		$mail->From = $mail_a;
		$mail->FromName = $fname;
		$mail->WordWrap = 80;
		$mail->isHTML(true);
		
		$mail->Subject = $subject;
		$mail->MsgHTML($mailtext);
		$mail->ClearAddresses();
		$mail->AddAddress($to);

		try {
			if ( !$mail->Send() ) {
				$msg = "Sorry! Your submission failed!";
			} else {
				$msg = "success";
				unset($_SESSION['ncap_code']);
			}
		} catch (phpmailerAppException $e) {
			$msg = "Sorry! Your submission failed!";
		}
	
	}
	echo json_encode($msg);
}
?>