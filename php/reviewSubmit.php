<?php


$nameErr = $mailErr = $ratingErr = $textErr = "";



$valid = true;

require 'validations.php';

checkName();
checkEmail2();
checkRating2();
checkReview();

	if($_SERVER["REQUEST_METHOD"] == "POST" && $valid)
{
	$rname = $rmail = $rrating = $rtext = "";
			if(isset($_POST['name']))
		$rname = htmlspecialchars($_POST['name']);
		if(isset($_POST['rmail']))
		$rmail = htmlspecialchars($_POST['rmail']);
		else $rmail = null;
		if(isset($_POST['rating']))
		$rrating = htmlspecialchars($_POST['rating']);
		if(isset($_POST['rtext']))
		$rtext = htmlspecialchars($_POST['rtext']);
		
			if(isset($_POST['id']))
		$id = htmlspecialchars($_POST['id']);
		
		$con = new PDO("mysql:dbname=rathings;host=localhost;charset=utf8", "rathingsuser", "rathingspass");
		 $con->exec("set names utf8");
		 
		 $res = $con->prepare("insert into reviews set author_name = ?, author_email = ?, text = ?, rating = ?, product = ?");
		 $res->bindValue(1, $rname, PDO::PARAM_STR);
		 $res->bindValue(2, $rmail, PDO::PARAM_STR);
		 $res->bindValue(3, $rtext, PDO::PARAM_STR);
		 $res->bindValue(4, $rrating, PDO::PARAM_STR);
		 $res->bindValue(5, $id, PDO::PARAM_INT);
		 $res->execute();
		 
		 
		 header("Location: reviewConfirmation.php");
		die();
	
}


?>