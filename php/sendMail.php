<?php

session_start(); 

$to = "oljubuncic1@etf.unsa.ba";
$cc = "orhanljubuncic@yahoo.com"; // tutor's mail TODO
$subject = "User contact mail";


$reply = $_SESSION["email"];



 $headers = "CC: $cc\r\nReply-to: $reply";

$msg =  $_SESSION["name"] . " " . $_SESSION["lastname"] . "\r\n" .
"Site rating: " . $_SESSION["rating"] . "\r\n" .
"Message urgency: " . $_SESSION["urgency"] . "\r\n\r\n" .
$_SESSION["message"];

$msg = wordwrap($msg,70);

mail($to,$subject,$msg,$headers);

session_destroy();

header("Location: contactMessage.php");
die();





?>