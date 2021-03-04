<?php
if(isset($_POST["submitform"])){
	$email=$_POST['youremail'];
	$name=$_POST['youname'];
	$phone=$_POST['Phone'];
	$company=$_POST['company'];
	//$message = $_POST['message'];
	$email =filter_var($email, FILTER_SANITIZE_EMAIL);
	$email= filter_var($email, FILTER_VALIDATE_EMAIL);
	if (!$email){
		$err= "Invalid Sender's Email";
	}
	else{
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$subject="All in Business LP Form";
		$message = "Name: " .$name ."<br />Email: " . $email . "<br />Phone: " .$phone. "<br />company: " .$company;
		$message = wordwrap($message, 70);

		$to      ='hello@mr-digital.co.uk';
		$to2      ='ross@mr-digital.co.uk';
		$headers .= 'From:noreply@mr-digital.co.uk' . "\r\n" .
		'X-Mailer: PHP/' . phpversion();
		mail($to, $subject, $message, $headers);
		mail($to2, $subject, $message, $headers);
		$msg= "Your details has been sent successfuly !";
		header("Location:https://www.mr-digital.co.uk/all-in-business-thankyou/");
	}
}

?>
