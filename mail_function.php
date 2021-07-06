<?php	
	function send_activation($uemail,$token,$uname,$msg,$sub) {
		# use namespace
	//use PHPMailer\PHPMailer\PHPMailer;

		# require php mailer
		require_once "vendor/autoload.php";
	
		//$message_body = "Hi, $uname. Click here to activate your account http://localhost/PitathProject1/email_activation.php?token=$token ";;
		$mail = new PHPMailer\PHPMailer\PHPMailer;
		$mail->isSMTP();                        // Set mailer to use SMTP
		$mail->CharSet="UTF-8";
		$mail->Host = "smtp.gmail.com";
		$mail->SMTPDebug = 1; 
		$mail->Port = 465 ; //465 or 587
		$mail->SMTPSecure = 'ssl';  
		$mail->SMTPAuth = true; 
		//Authentication
		$mail->Username = "kanishk.malhotra3@gmail.com";
		$mail->Password = "rajender@12345";
		$mail->IsHTML(true);
		$mail->SetFrom("kanishk.malhotra3@gmail.com", "kanishk malhotra");
		$mail->AddAddress($uemail);
		$mail->Subject = $sub;
		//$mail->MsgHTML($message_body);
		//$mail->Body="Hi, $uname. Click here to activate your account http://localhost/PitathProject1/email_activation.php?token=$token ";;	
		//$mail->AltBody = "Hi, $uname. Click here to activate your account http://localhost/PitathProject1/email_activation.php?token=$token ";
		$mail->Body=$msg;
		$result = $mail->Send();
		if(!$result){
			#echo"Mailer Error: ". $mail->ErrorInfo;
		}
		else{
			return $result;
		}
	}
?>