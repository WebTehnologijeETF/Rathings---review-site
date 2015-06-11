<?php

	function zag() {
    header("{$_SERVER['SERVER_PROTOCOL']} 200 OK");
    header('Content-Type: text/html');
    header('Access-Control-Allow-Origin: *');
}
function rest_get($request, $data)
 {
	$con = new PDO("mysql:dbname=rathings;host=localhost;charset=utf8", "rathingsuser", "rathingspass");
     $con->exec("set names utf8");
     $result = $con->query("select id, title, caption, text, author, image, UNIX_TIMESTAMP(date) date2 from news order by date desc");
	 
     if (!$result) {
          $error = $con->errorInfo();
          print "SQL error: " . $error[2];
          exit();
     }
	
	
	
	
	$counter = 0;
	
	$numb = $con->query("SELECT COUNT(*) FROM news");
		  $numb = $numb->fetchColumn();
	
	$main = array();
	
	foreach ($result as $single) {
         
		  
		  $authorq = $con->prepare("SELECT name, lastname FROM users WHERE id=?");
		  $authorq->bindValue(1, $single['author'], PDO::PARAM_INT);
		  $authorq->execute();
		  
		  $authorfull = $authorq->fetch();
		  $author = $authorfull['name'] . ' ' . $authorfull['lastname'];
		  
		  $returnResult = array();
		  
		  $returnResult['id'] = $single["id"];
		  $returnResult['title'] = $single["title"];
		  $returnResult['date'] = date("d.m.Y. (h:i)", $single['date2']);
		  $returnResult['image'] = $single["image"];
		  $returnResult['caption'] = $single['caption'];
		  $returnResult['author'] = $author;
		  
		  $main[$counter] = $returnResult;
		  
		  
		  
	
		

		
		$counter++;
		  
		  

		  
     }
	 
	 
	 print json_encode($main);
	
 }
function rest_post($request, $data)
 {
 
		 $cdata = json_decode($data["data"],true);
			
		session_start();
	
		$title = $caption = $image = $text = "";
		
		
			$title = htmlspecialchars($cdata['title']);
			
			
			$caption = htmlspecialchars($cdata['caption']);
			
			
			$image = htmlspecialchars($cdata['image']);
			
			
			$text = htmlspecialchars($cdata['text']);
			
			$con = new PDO("mysql:dbname=rathings;host=localhost;charset=utf8", "rathingsuser", "rathingspass");
			$con->exec("set names utf8");
	 
			 $res = $con->prepare("insert into news set title = ?, caption = ?, image = ?, text = ?, author = ?");
			 $res->bindValue(1, $title, PDO::PARAM_STR);
			 $res->bindValue(2, $caption, PDO::PARAM_STR);
			 $res->bindValue(3, $image, PDO::PARAM_STR);
			 $res->bindValue(4, $text, PDO::PARAM_STR);
			 $res->bindValue(5, $_SESSION['id'], PDO::PARAM_INT);
			 $res->execute();
			 
			 
			 print $cdata['text'];
 }
function rest_delete($request)
 {
 

$id = htmlspecialchars($_GET['id']);

	$con = new PDO("mysql:dbname=rathings;host=localhost;charset=utf8", "rathingsuser", "rathingspass");
     $con->exec("set names utf8");
	 
	 $res = $con->prepare("delete from news where id = ?");
	 $res->bindValue(1, $id, PDO::PARAM_INT);
	 $res->execute();
	 
	
	 
	 
 }
function rest_put($request, $data)
 {
 
		 $cdata = json_decode($data["data"],true);
	session_start();
	
		$title = $caption = $image = $text = "";
		
		
			$title = htmlspecialchars($cdata['title']);
			
			
			$caption = htmlspecialchars($cdata['caption']);
			
			
			$image = htmlspecialchars($cdata['image']);
			
			
			$text = htmlspecialchars($cdata['text']);
			
			
			$id2 = htmlspecialchars($cdata['id']);
			
			$con = new PDO("mysql:dbname=rathings;host=localhost;charset=utf8", "rathingsuser", "rathingspass");
			$con->exec("set names utf8");
	 
			 $res = $con->prepare("update news set title = ?, caption = ?, image = ?, text = ?, author = ? where id = ?");
			 $res->bindValue(1, $title, PDO::PARAM_STR);
			 $res->bindValue(2, $caption, PDO::PARAM_STR);
			 $res->bindValue(3, $image, PDO::PARAM_STR);
			 $res->bindValue(4, $text, PDO::PARAM_STR);
			 $res->bindValue(5, $_SESSION['id'], PDO::PARAM_INT);
			 $res->bindValue(6, $id2, PDO::PARAM_INT);
			 $res->execute();
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