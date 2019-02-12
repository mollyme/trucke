<!DOCTYPE html>
<head>
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
  <title>Teatro Las Tablas - Trayendo la alegr&iacute;a del teatro a las comunidades</title>
   <link href="css/bootstrap.min.css" rel="stylesheet">
   <link rel="stylesheet" href="css/style.css"> 
    
</head>
<body>
<script src="js/goback.js"></script> 
<?php

if(isset($_POST['emailfrom'])) {
 
     
 
    // Subject and email where the info is going to be sent
 
    $email_to = "teatrolastablas@gmail.com";
 
    $email_subject = ($_POST['product_service']);
    

   function died($error) {
 
        // Error code
       
       echo $display_error = "
<div class=\"row\">
    <a href=\"#\" onclick=\"goBack()\" title=\"Gobackinhistory\" class=\"error_note\"><div class=\"thankyou\">
    <img src=\"images/error.png\" class=\"center\" alt=\"error\">
        <h4>We are sorry!</h4>
        <p class=\"errortext\">There were error(s) found with the form you submitted. These errors appear below.<br><br></p>";
         echo $error."<br>";
         echo "<p class=\"errortext\">Please go back and fix these errors.</p><br>";
         
        	echo "<button type=\"button\" class=\"btnback\"> Back to home</button>
    </div> </a>
</div>
";
 
      /*  echo "We are very sorry, but there were error(s) found with the form you submitted. <br> ";
 
      	echo "These errors appear below.<br><br>"; 
 
        echo $error."<br><br>";
 
        echo "Please go back and fix these errors.<br><br>";*/
       
        die(); 
 
    }

     
 
    // validation expected data exists
 
	if(!isset($_POST['full_name'])){ 
		
		died('A full name must be submitted.');       
	} 
       
        if(!isset($_POST['emailfrom'])){ 
		
		died('An email address must be submitted.');       
 } 
 
        if(!isset($_POST['inquiry'])) { 
		
		died('Some detail information must be submitted.');       
 } 
 
     
 
    $full_name = $_POST['full_name']; // d
 
  
    $email_from = $_POST['emailfrom']; // d
 
 
    $inquiry = $_POST['inquiry']; // d
 
     
 
    $error_message = "";
 
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
 
    $error_message .= '<p>Email address does not appear to be valid.</p>';
 
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  if(!preg_match($string_exp,$full_name)) {
 
    $error_message .= '<p>The name does not appear to be valid.<p/>';
 
  }
 
 
  if(strlen($inquiry) < 2) {
 
    $error_message .= '<p>The inquiry does not appear to be valid.<p/>';
 
  }
 
  if(strlen($error_message) > 0) {
 
    died($error_message);
 
  }
 
    $email_message = "Inquiry details below.\n\n";
 
     
 
    function clean_string($string) {
 
      $bad = array("content-type","bcc:","to:","cc:","href");
 
      return str_replace($bad,"",$string);
 
    }
 
     
 
    $email_message .= "Full Name: ".clean_string($full_name)."\n";
 
   
 
    $email_message .= "Email: ".clean_string($email_from)."\n";
 
  
 
    $email_message .= "Inquiry: ".clean_string($inquiry)."\n";
 
     
 
     
 
// create email headers
 
$headers = 'From: '.$email_from."\r\n".
 
'Reply-To: '.$email_from."\r\n" .
 
'X-Mailer: PHP/' . phpversion();
 
@mail($email_to, $email_subject, $email_message, $headers);  
 


 
 
	/*-- success html here */
 
 
 
echo $success = "
<div class=\"row\">
<a href=\"#\" onclick=\"goBack()\" title=\"Gobackinhistory\" class=\"error_note\"><div class=\"thankyou\">
    <div class=\"thankyou\">
    <img src=\"images/success.png\" class=\"center\">
        <h4>Thanks for reaching out!</h4>
        <p>We will be in touch with you very soon.</p><br><br>
        	<button type=\"button\" class=\"btnback\"> Back to home</button>
    </div>
</div>
";

    
    
} ?>
     
    
</body>
</html>