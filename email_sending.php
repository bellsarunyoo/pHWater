<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
	$strTo = $_POST["email"];
    // echo $strTo;
	$strSubject = "No Reply";
	$strHeader = "From:Webmaste IOT System";
	$strMessage = "Test send Information form IOT system.";
	$flgSend = mail($strTo,$strSubject,$strMessage,$strHeader);  // @ = No Show Error //


	if($flgSend == true)
	{
		echo "Email Sending.";
	}
	else
	{
		echo "Email Can Not Send."."<br>";
        // echo $flgSend;
	}




//the subject
// $sub = "Your subject";
// //the message
// $msg = "Your message";
// //recipient email here
// $rec = "example@gmail.com";
// //send email
// mail($rec,$sub,$msg);

?>
</body>
</html>