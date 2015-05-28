


<?php

	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		//logout
		session_start();
		session_unset();
		header('Location: index.php');
	    die();
	
	
	
	}


?>

<?php

session_start();
if(!isset($_SESSION['username']))
{
	header('Location: index.php');
	die();

}


?>

<div id="logo">
<div id="logo_text">

<label id="left_logo">Rat</label>
<label id="middle_logo">h</label>
<label id="right_logo">ings</label>
</div>

</div>


<div id="login_div">

<form action="adminHeader.php" method="post">


<?php 
	
		$o = '<p>You are logged in as ' . htmlspecialchars($_SESSION['username']) . '</p><br>';
		$o .= '<input type="submit" value="Log out" class="button common_button">';
		echo $o;

?>

</form>


</div>


<div class="Mes">

<p>This is the admin panel. Here you can add, update or delete site news, reviews and administrators.</p>

</div>

