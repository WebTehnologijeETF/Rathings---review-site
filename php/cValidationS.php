<?php

$nameErr = $lastnameErr = $emailErr = $ratingErr = $urgencyErr = $messageErr = "";



$valid = true;

require 'validations.php';

checkName();
checkLastName();
checkEmail();
checkRating();
checkUrgency();
checkMessage();

if($_SERVER["REQUEST_METHOD"] == "POST" && $valid)
{
	require 'contactConfirmation.php';
	
}








?>