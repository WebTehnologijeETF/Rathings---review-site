<?php

session_start(); 

$to = "oljubuncic1@etf.unsa.ba";
$cc = "hodzic.k@gmail.com";
$subject = "Rathings: User contact mail";


$reply = $_SESSION["email"];





 //$headers = "CC:" . $cc . "\r\n" . "Reply-to:" . $reply;

$msg =  $_SESSION["name"] . " " . $_SESSION["lastname"] . "\n\n" .
"Site rating: " . $_SESSION["rating"] . "\n\n" .
"Message urgency: " . $_SESSION["urgency"] . "\n\n\n\n" .
$_SESSION["message"];

$msg = wordwrap($msg,70);

//mail($to,$subject,$msg,$headers);


require("sendgrid-php/sendgrid-php.php");

// get account info from OpenShift environment variable
$service_plan_id = "sendgrid_30644"; // your OpenShift Service Plan ID
$account_info = json_decode(getenv($service_plan_id), true);

$sendgrid = new SendGrid($account_info['username'], $account_info['password']);
$email    = new SendGrid\Email();

$email->addTo($to)
	  ->addCc($cc)
      ->setFrom($_SESSION["email"])
      ->setSubject($subject)
      ->setText($msg)
	  ->setReplyTo($_SESSION["email"]);

$sendgrid->send($email);

session_destroy();

header("Location: contactMessage.php");
die();





?>