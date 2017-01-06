<div id="logo">


<div id="logo_text">

<label id="left_logo">Rat</label>
<label id="middle_logo">h</label>
<label id="right_logo">ings</label>
</div>

</div>



<div id="login_div">
	<?php
	session_start();
	if(isset($_SESSION['username'])) // ima neko ulogovan
	{
	echo 'You are logged in as ' . $_SESSION['username'];
	echo '<form action="index.php" method="post"><input type="submit" value="Log out" class="button common_button"></form>';
	}
	else echo '<a onclick= "loadPage(`login.php`);" class="login_label">Log in</a>';

?>
</div>	


<div id="menu_bar">



<ul id="left_menu">
<li class="menu_item">
<a onclick='loadPage("index.php"); fetchNews();'>HOME</a>

</li> 

<li class="menu_item">
<a onclick='loadPage("about.php");'>ABOUT US</a>
</li>

<li class="menu_item">
<a onclick='loadPage("products.php");'>PRODUCTS</a>
</li>


</ul>

<ul id="right_menu">


<li class="menu_item">
<a>NOTIFICATIONS</a> <!-- page still not implemented -->
</li>

<li class="menu_item">
<a onclick='loadPage("contact.php");'>CONTACT US</a>
</li>
</ul>




</div>