<?php

	function zag() {
    header("{$_SERVER['SERVER_PROTOCOL']} 200 OK");
    header('Content-Type: text/html');
    header('Access-Control-Allow-Origin: *');
}
function rest_get($request, $data)
 {
	if(isset($data['id']))
	{
	$d = $data;
	$con = new PDO("mysql:dbname=rathings;host=localhost;charset=utf8", "rathingsuser", "rathingspass");
		 $con->exec("set names utf8");
	 
		$reviews = $con->prepare("select id, text, author_name, author_email, rating, UNIX_TIMESTAMP(date) date2 from reviews where product=? order by date");
		$reviews->bindValue(1, htmlspecialchars($d['id']), PDO::PARAM_INT);
		$reviews->execute();
		
		  $rnumb = $con->prepare("SELECT COUNT(*) FROM reviews where product=?");
		  $rnumb->bindValue(1, htmlspecialchars($d['id']), PDO::PARAM_INT);
		  $rnumb->execute();
		  $rnumb = $rnumb->fetchColumn();
		  
		
		$revCounter = 0;
		
		
		$main = array();
		
		
		foreach ($reviews as $rev)
		{
			$returnResult = array();
			if($rev['author_email'] != null) // there is mail
			
				$returnResult['author_email'] = $rev['author_email'];
			else $returnResult['author_email'] = "";
			$returnResult['author_name'] = $rev['author_name'];
			$returnResult['rating'] = $rev['rating'];
			$returnResult['text'] = $rev['text'];
			$returnResult['date'] = date("d.m.Y. (h:i)", $rev['date2']);
			
			$main[$revCounter] = $returnResult;
			
			
			
			
			
			
			$revCounter++;
		} 
		
		if($revCounter == 0)
		echo '<p>There are no reviews for this product</p>';
		
		
	 
	 
	 print json_encode($main);
	 
	 }
	 
	 
	 else
	 {
		$con = new PDO("mysql:dbname=rathings;host=localhost;charset=utf8", "rathingsuser", "rathingspass");
		 $con->exec("set names utf8");
	 
		$reviews = $con->prepare("select id, text, author_name, author_email, rating, UNIX_TIMESTAMP(date) date2 from reviews order by date");
		
		$reviews->execute();
		
		  $rnumb = $con->prepare("SELECT COUNT(*) FROM reviews");
		  
		  $rnumb->execute();
		  $rnumb = $rnumb->fetchColumn();
		  
		
		$revCounter = 0;
		
		
		$main = array();
		
		
		foreach ($reviews as $rev)
		{
			$returnResult = array();
			if($rev['author_email'] != null) // there is mail
			
				$returnResult['author_email'] = $rev['author_email'];
			else $returnResult['author_email'] = "";
			$returnResult['author_name'] = $rev['author_name'];
			$returnResult['rating'] = $rev['rating'];
			$returnResult['text'] = $rev['text'];
			$returnResult['date'] = date("d.m.Y. (h:i)", $rev['date2']);
			
			$main[$revCounter] = $returnResult;
			
			
			
			
			
			
			$revCounter++;
		} 
		
		if($revCounter == 0)
		echo '<p>There are no reviews on the site</p>';
		
		
	 
	 
	 print json_encode($main);
	 
	 
	 }
	
 }
function rest_post($request, $data)
 {
 
		 $cdata = json_decode($data["data"],true);
			
		$nameErr = $mailErr = $ratingErr = $textErr = "";



$valid = true;

require 'validations.php';

checkName();
checkEmail2();
checkRating2();
checkReview();

	if($valid)
{
	$rname = $rmail = $rrating = $rtext = "";
			
		$rname = htmlspecialchars($cdata['name']);
		
		
		$rmail = htmlspecialchars($cdata['rmail']);
		if($rmail == '')
		$rmail = null;
		
		$rrating = htmlspecialchars($cdata['rating']);
		
		$rtext = htmlspecialchars($cdata['rtext']);
		
			
		$id = htmlspecialchars($cdata['id']);
		
		$con = new PDO("mysql:dbname=rathings;host=localhost;charset=utf8", "rathingsuser", "rathingspass");
		 $con->exec("set names utf8");
		 
		 $res = $con->prepare("insert into reviews set author_name = ?, author_email = ?, text = ?, rating = ?, product = ?");
		 $res->bindValue(1, $rname, PDO::PARAM_STR);
		 $res->bindValue(2, $rmail, PDO::PARAM_STR);
		 $res->bindValue(3, $rtext, PDO::PARAM_STR);
		 $res->bindValue(4, $rrating, PDO::PARAM_STR);
		 $res->bindValue(5, $id, PDO::PARAM_INT);
		 $res->execute();
 }
 
 
 }
function rest_delete($request)
 {
 


$id = htmlspecialchars($_GET['id']);

	$con = new PDO("mysql:dbname=rathings;host=localhost;charset=utf8", "rathingsuser", "rathingspass");
     $con->exec("set names utf8");
	 
	 $res = $con->prepare("delete from reviews where id = ?");
	 $res->bindValue(1, $id, PDO::PARAM_INT);
	 $res->execute();
	 
	header("Location: adminPanel.php");
	die();
	 
	
	 
	 
 }
function rest_put($request, $data)
 {
 
		 
 }
function rest_error($request) { }

$method  = $_SERVER['REQUEST_METHOD'];
$request = $_SERVER['REQUEST_URI'];

switch($method) {
    case 'PUT':
        parse_str(file_get_contents('php://input'), $put_vars);
        zag(); $data = $put_vars; rest_put($request, $data); break;
    case 'POST':
        zag(); $data = $_POST; rest_post($request, $data); break;
    case 'GET':
        zag(); $data = $_GET; rest_get($request, $data); break;
    case 'DELETE':
        zag(); rest_delete($request); break;
    default:
        header("{$_SERVER['SERVER_PROTOCOL']} 404 Not Found");
        rest_error($request); break;
}



?>