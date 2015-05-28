<?php


require 'validations.php';

if($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST['username']) and isset($_POST['password']))
{

$loginErr = "";




$con = new PDO("mysql:dbname=rathings;host=localhost;charset=utf8", "rathingsuser", "rathingspass");
		 $con->exec("set names utf8");
		 
		 $username = htmlspecialchars($_POST['username']);
		 $pass = htmlspecialchars($_POST['password']);
		 
		 $res = $con->prepare("select * from users where username=? and password = md5(?)");
		 
		 $res->execute(array($username,$pass));
		 
		 if($res->rowCount() == 0) // wrong user and pass
			{
				$loginErr = "Wrong username or password" . $res->rowCount();
				
				
				
				
			}
			else // ulogovan
			{
				foreach($res as $ress)
					$adminId = $ress['id'];
				
				 session_start();
				 $_SESSION['username'] = htmlspecialchars($_POST['username']);
				 $_SESSION['id'] = htmlspecialchars($adminId);
				
				 header('Location: adminPanel.php');
				 die();
				
				
			}
			
			
			}
		 

?>