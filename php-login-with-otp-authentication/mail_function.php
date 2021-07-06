<?php	
	function send_activation($uemail,$token,$uname); {
		require('phpmailer/class.phpmailer.php');
		require('phpmailer/class.smtp.php');
	
		$message_body = "Hi, $uname. Click here to activate your account http://localhost/PitathProject1/email_activation.php?token=$token ";;
		$mail = new PHPMailer();
		//$mail->IsSMTP();
		//$mail->SMTPDebug = 0;
		//$mail->SMTPAuth = TRUE;
		//$mail->SMTPSecure = 'tls'; // tls or ssl
		//$mail->Port     = "SMTP port";
		//$mail->Username = "SMTP username";
		//$mail->Password = "SMTP Password";
		//$mail->Host     = "SMTP HOST";
		//$mail->Mailer   = "smtp";
		$mail->SetFrom("kanishk.malhotra3@gmail.com", "kanishk malhotra");
		$mail->AddAddress($email);
		$mail->Subject = "Email Account Activation";
		$mail->MsgHTML($message_body);
		$mail->IsHTML(true);		
		$result = $mail->Send();
		if(!$result){
			echo"Mailer Error: ". $mail->ErrorInfo();
		}
		else{
			return $result;
		}
	}
?>