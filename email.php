<?php
function IsInjected($str)
{
    $injections = array('(\n+)',
           '(\r+)',
           '(\t+)',
           '(%0A+)',
           '(%0D+)',
           '(%08+)',
           '(%09+)'
           );
               
    $inject = join('|', $injections);
    $inject = "/$inject/i";
    
    if(preg_match($inject,$str))
    {
      return true;
    }
    else
    {
      return false;
    }
}

if(IsInjected($visitor_email))
{
    echo "Bad email value!";
    exit;
}

if(!isset($_POST['submit']))
{
    echo "error; you need to submit the form!";
}

$name =$_POST['name']
$visitor_email = $_POST['email'];
$message = $_POST['message'];
$subject = $_POST['subject'];

if(empty($name)||empty($visitor_email)){
    echo "Name and email are mandatory!";
    exit;
}

$email_from = 'xuanruiyong2012@gmail.com'
$email_subject = "New Form submission";
$email_body = "You have received a new message from the user $name.\n".
"Subject : $subject"
"Here is the message:\n $message"
$to = "yourname@yourwebsite.com";
$headers = "From: $email_from \r\n";
$headers .= "Reply-To: $visitor_email \r\n";
mail($to,$email_subject,$email_body,$headers);
?>