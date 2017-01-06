<!DOCTYPE HTML>
<html>
<head>
<title>Update product</title>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="main.css">
<link rel="shortcut icon" type="image/png" href="images/favicon.png"/>

</head>


<body>

<?php require "header.php"; ?>



<div id="message"><p></p></div>

<div id="back"><p onclick="loadPage('products-table.php');">Back to product list</p></div>


<form method="get" action="#" id="upform">
<div class="contact" class="container">
<h2>Update product</h2>


<p class="note"><i>Note: Fields marked with * are mandatory</i></p>
<div id="l_contact" class="cdiv">

<p  class=" clabel">Name*: </p>
<p  class=" clabel">Category*: </p> 
<p class=" clabel">Image*: </p> 
<p  class=" clabel">Description*: </p> 
</div>

<div id="r_contact" class="cdiv">
<input  type="text" id="el0" class="celement textbox" >
<div class="error" id="er0"><p class="error_text"></p></div>

<select id="el1" class="celement listbox">

<option>Movies</option>
<option>Sports</option>
<option>Vehicles</option>
<option>Books</option>
<option>Appliances</option>
<option>Miscellaneous</option>
</select>
<div class="error" id="er1"><p class="error_text"></p></div>

<input type="text" id="el2" class="celement textbox">
<div class="error" id="er2"><p class="error_text"></p></div>

<textarea id="el3" class="celement textarea" cols="30" rows="7"></textarea>
<div class="error" id="er3"><p class="error_text"></p></div>





</div>



<div id="c_buttons" >

<input type="reset" value="Reset" class="button common_button">
<input type="submit" value="Confirm" class="button common_button">

</div>

</div>

</form>


</body>



</html>