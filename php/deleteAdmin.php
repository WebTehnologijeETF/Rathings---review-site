<?php

session_start();
if(!isset($_SESSION['username']) or $_SESSION['role'] != 1)
{
	header('Location: index.php');
	die();

}


?>

<?php

if(isset($_GET['id']))
$id = htmlspecialchars($_GET['id']);

	$con = new PDO("mysql:dbname=rathings;host=localhost;charset=utf8", "rathingsuser", "rathingspass");
     $con->exec("set names utf8");
	 
	 
	 
	 $res = $con->prepare("delete from users where id = ?");
	 $res->bindValue(1, $id, PDO::PARAM_INT);
	 $res->execute();
	 
	 require 'adminPanel.php';


?>