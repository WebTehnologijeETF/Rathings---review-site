<?php

	if(isset($_GET['id']))
$id = htmlspecialchars($_GET['id']);

	$con = new PDO("mysql:dbname=rathings;host=localhost;charset=utf8", "adminnxLCtAQ", "f9gbwSlXITyh");
     $con->exec("set names utf8");
	 
	 $res = $con->prepare("delete from reviews where id = ?");
	 $res->bindValue(1, $id, PDO::PARAM_INT);
	 $res->execute();
	 
	 require 'adminPanel.php';

?>