<?php

function checkName()
{
	global $nameErr, $valid;
	if(empty($_POST["name"]))
	{
		$nameErr = "You must enter your first name.";
		$valid = false;
	}
	else
		$nameErr = "";
	
}

function checkLastName()
{
	global $lastnameErr, $valid;
	if(empty($_POST["lastname"]))
	{
		$lastnameErr = "You must enter your last name.";
		$valid = false;
	}
	else
		$lastnameErr = "";
}

function checkEmail()
{
	global $emailErr, $valid;
	if(empty($_POST["email"]))
	{
		$emailErr = "You must enter your email address.";
		$valid = false;
	}
	else if(!validEmail($_POST["email"]))
	{
		$emailErr = "You must enter a valid email address.";
		$valid = false;
	}
	else
		$emailErr = "";
}

function checkEmail2()
{
	global $mailErr, $valid;
	if(empty($_POST["rmail"]))
	{
		$mailErr = "";
		
	}
	else if(!validEmail($_POST["rmail"]))
	{
		$mailErr = "You must enter a valid email address.";
		$valid = false;
	}
	else
		$mailErr = "";
}

function checkRating()
{
	global $ratingErr, $valid;
	
	if(isset($_POST["rating"]) && (!empty($_POST["rating"]) && !validRating($_POST["rating"])))
	{
		$ratingErr = "You must enter a number between 1 and 10.";
		$valid = false;
	}
	else
		$ratingErr = "";
	
}

function checkRating2()
{
	global $ratingErr, $valid;
	
	if(empty($_POST["rating"]))
	{
		$ratingErr = "You must enter a number between 1 and 10.";
		$valid = false;
	
	}
	
	else if(isset($_POST["rating"]) && (!empty($_POST["rating"]) && !validRating($_POST["rating"])))
	{
		$ratingErr = "You must enter a number between 1 and 10.";
		$valid = false;
	}
	else
		$ratingErr = "";
	
}

function checkUrgency()
{
	global $urgencyErr, $valid;
	
	if(isset($_POST["urgency"]) && $_POST["urgency"] < 0 && $_POST["urgency"] > 100)
	{
		$urgencyErr = "Message urgency must be between 1 and 100.";
		$valid = false;
	}
	else
		$urgencyErr = "";
}


function checkMessage()
{
	global $messageErr, $valid;
	
	if(empty($_POST["message"]))
	{
		$messageErr = "You must enter your message.";
		$valid = false;
	}
	else
		$messageErr = "";
}

function checkReview()
{
	global $textErr, $valid;
	
	if(empty($_POST["rtext"]))
	{
		$textErr = "You must enter your review.";
		$valid = false;
	}
	else
		$textErr = "";
}


function toggleIcon($e)
{
	echo ($e == "") ? "" : "error_img";
}

function toggleBorder($e)
{
	echo ($e == "") ? "" : "ctrl_error";
}


function validEmail($email)
{
	return preg_match('/^.+@.+$/', $email);
}


function validRating($rat)
{
	return preg_match('/^\d+$/', strval($rat)) && $rat >= 1 && $rat <= 10;
}

function printItem($item)
{
	if(isset($_POST[$item]))
		echo htmlspecialchars($_POST[$item]);
}


?>