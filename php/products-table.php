<!DOCTYPE HTML>
<html>
<head>
<title>Products</title>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="main.css">



</head>


<body id="main_body">




<?php require "header.php"; ?>

<div id="prod_search">
<h2>Find products</h2>
<form method="get" action="something.php" onsubmit="return validateFormP();">
<div id="search_form" class="container">

<div id="categories">

<p  class=" slabel">Filter by category: </p>


<div class="single_cat closed" id="f0" onclick="tree('f0')">
<label>Media</label>

</div>

<div class="check_div">
<input type="checkbox" class="cat_check">
</div>

<div class="second_lvl" id="s0">
<div class="single_cat" >
<label>Movies</label>
</div>
<div class="check_div">
<input type="checkbox" class="cat_check">
</div>
<div class="single_cat"  >
<label>Series</label>
</div>
<div class="check_div">
<input type="checkbox" class="cat_check">
</div>

<div class="single_cat"  >
<label>Tv Shows</label>
</div>
<div class="check_div">
<input type="checkbox" class="cat_check">
</div>

</div>


<div class="single_cat closed" id="f1" onclick="tree('f1')">
<label>Sports</label>


</div>
<div class="check_div">
<input type="checkbox" class="cat_check">
</div>

<div class="second_lvl" id="s1">
<div class="single_cat">
<label>Football</label>
</div>
<div class="check_div">
<input type="checkbox" class="cat_check">
</div>

<div class="single_cat">
<label>Basketball</label>
</div>
<div class="check_div">
<input type="checkbox" class="cat_check">
</div>

<div class="single_cat">
<label>Handball</label>
</div>
<div class="check_div">
<input type="checkbox" class="cat_check">
</div>

<div class="single_cat">
<label>Volleyball</label>
</div>
<div class="check_div">
<input type="checkbox" class="cat_check">
</div>

<div class="single_cat">
<label>Tennis</label>
</div>
<div class="check_div">
<input type="checkbox" class="cat_check">
</div>

<div class="single_cat">
<label>Swimming</label>
</div>
<div class="check_div">
<input type="checkbox" class="cat_check">
</div>

<div class="single_cat">
<label>Skiing</label>
</div>
<div class="check_div">
<input type="checkbox" class="cat_check">
</div>

<div class="single_cat">
<label>Other</label>
</div>
<div class="check_div">
<input type="checkbox" class="cat_check">
</div>

</div>


<div class="single_cat closed" id="f3" onclick="tree('f3')">
<label>Vehicles</label>


</div>

<div class="check_div">
<input type="checkbox" class="cat_check">
</div>

<div class="second_lvl" id="s3">
<div class="single_cat closed" id="si3" onclick="tree('si3')">
<label>Luxury</label>
</div>
<div class="check_div">
<input type="checkbox" class="cat_check">
</div>

<div class="third_lvl" id="t3">
<div class="single_cat">
<label>Old timers</label>
</div>
<div class="check_div">
<input type="checkbox" class="cat_check">
</div>

<div class="single_cat">
<label>Modern</label>
</div>
<div class="check_div">
<input type="checkbox" class="cat_check">
</div>

</div>

<div class="single_cat">
<label>Freight</label>
</div>

<div class="check_div">
<input type="checkbox" class="cat_check">
</div>



</div>


<div class="single_cat closed" id="f4" onclick="tree('f4')">
<label>Books</label>


</div>

<div class="check_div">
<input type="checkbox" class="cat_check">
</div>

<div class="second_lvl" id="s4">
<div class="single_cat">
<label>Classic</label>
</div>

<div class="check_div">
<input type="checkbox" class="cat_check">
</div>

<div class="single_cat">
<label>Modern</label>
</div>

<div class="check_div">
<input type="checkbox" class="cat_check">
</div>

<div class="single_cat">
<label>Comics</label>
</div>

<div class="check_div">
<input type="checkbox" class="cat_check">
</div>

<div class="single_cat">
<label>Science</label>
</div>

<div class="check_div">
<input type="checkbox" class="cat_check">
</div>

</div>



<div class="single_cat closed" id="f5" onclick="tree('f5')">
<label>Household</label>


</div>

<div class="check_div">
<input type="checkbox" class="cat_check">
</div>

<div class="second_lvl" id="s5">
<div class="single_cat">
<label>Furniture</label>
</div>

<div class="check_div">
<input type="checkbox" class="cat_check">
</div>

<div class="single_cat closed" id="si5" onclick="tree('si5')">
<label>Appliances</label>
</div>

<div class="check_div">
<input type="checkbox" class="cat_check">
</div>

<div class="third_lvl" id="t5">
<div class="single_cat">
<label>Mechanical</label>
</div>

<div class="check_div">
<input type="checkbox" class="cat_check">
</div>

<div class="single_cat">
<label>Electrical</label>
</div>

<div class="check_div">
<input type="checkbox" class="cat_check">
</div>

</div>

<div class="single_cat">
<label>Outdoor</label>
</div>

<div class="check_div">
<input type="checkbox" class="cat_check">
</div>

<div class="single_cat">
<label>Kids</label>
</div>

<div class="check_div">
<input type="checkbox" class="cat_check">
</div>



</div>


<div class="single_cat closed" id="f6" onclick="tree('f6')">
<label>Technology</label>


</div>

<div class="check_div">
<input type="checkbox" class="cat_check">
</div>

<div class="second_lvl" id="s6">
<div class="single_cat closed" id="si6" onclick="tree('si6')">
<label>Computer</label>
</div>

<div class="check_div">
<input type="checkbox" class="cat_check">
</div>

<div class="third_lvl" id="t6">
<div class="single_cat">
<label>Desktop</label>
</div>

<div class="check_div">
<input type="checkbox" class="cat_check">
</div>

<div class="single_cat">
<label>Laptop</label>
</div>

<div class="check_div">
<input type="checkbox" class="cat_check">
</div>

</div>

<div class="single_cat closed" id="si7" onclick="tree('si7')">
<label>Mobile phones</label>
</div>

<div class="check_div">
<input type="checkbox" class="cat_check">
</div>

<div class="third_lvl" id="t7">
<div class="single_cat">
<label>Classic</label>
</div>

<div class="check_div">
<input type="checkbox" class="cat_check">
</div>

<div class="single_cat">
<label>Smartphones</label>
</div>

<div class="check_div">
<input type="checkbox" class="cat_check">
</div>

</div>

<div class="single_cat">
<label>Tablets</label>
</div>

<div class="check_div">
<input type="checkbox" class="cat_check">
</div>

<div class="single_cat">
<label>Equipment</label>
</div>

<div class="check_div">
<input type="checkbox" class="cat_check">
</div>



</div>



<div class="single_cat closed" id="f8" onclick="tree('f8')">
<label>Fashion</label>


</div>

<div class="check_div">
<input type="checkbox" class="cat_check">
</div>

<div class="second_lvl" id="s8">
<div class="single_cat closed" id="si8" onclick="tree('si8')">
<label>Clothes</label>
</div>

<div class="check_div">
<input type="checkbox" class="cat_check">
</div>

<div class="third_lvl" id="t8">
<div class="single_cat">
<label>Men</label>
</div>

<div class="check_div">
<input type="checkbox" class="cat_check">
</div>

<div class="single_cat">
<label>Women</label>
</div>

<div class="check_div">
<input type="checkbox" class="cat_check">
</div>

</div>

<div class="single_cat closed" id="si9" onclick="tree('si9')">
<label>Accessories</label>
</div>

<div class="check_div">
<input type="checkbox" class="cat_check">
</div>

<div class="third_lvl" id="t9">
<div class="single_cat">
<label>Men</label>
</div>

<div class="check_div">
<input type="checkbox" class="cat_check">
</div>

<div class="single_cat">
<label>Women</label>
</div>

<div class="check_div">
<input type="checkbox" class="cat_check">
</div>

</div>

<div class="single_cat">
<label>Other</label>
</div>


<div class="check_div">
<input type="checkbox" class="cat_check">
</div>


</div>


<div class="single_cat closed" id="fa" onclick="tree('fa')">
<label>Software</label>


</div>

<div class="check_div">
<input type="checkbox" class="cat_check">
</div>

<div class="second_lvl" id="sa">
<div class="single_cat">
<label>General</label>
</div>
<div class="check_div">
<input type="checkbox" class="cat_check">
</div>

<div class="single_cat">
<label>Professional</label>
</div>

<div class="check_div">
<input type="checkbox" class="cat_check">
</div>

<div class="single_cat">
<label>Games</label>
</div>

<div class="check_div">
<input type="checkbox" class="cat_check">
</div>





</div>


<div class="single_cat closed" id="fb" onclick="tree('fb')">
<label>Art</label>


</div>

<div class="check_div">
<input type="checkbox" class="cat_check">
</div>

<div class="second_lvl" id="sb">
<div class="single_cat">
<label>Paintings</label>
</div>

<div class="check_div">
<input type="checkbox" class="cat_check">
</div>

<div class="single_cat">
<label>Music</label>
</div>

<div class="check_div">
<input type="checkbox" class="cat_check">
</div>


</div>

<div class="single_cat">
<label>Miscellaneous</label>


</div>

<div class="check_div">
<input type="checkbox" class="cat_check">
</div>


</div>


<div id="l_search" class="cdiv">




<p  class=" slabel">Min rating: </p> 
<input type="number" id="el0" class="selement numeric" size="5" min="1" max="10"> <br>
<div class="error" id="er0"><p class="error_text"></p></div>
<p  class=" slabel">Max rating: </p> 
<input type="number" id="el1" class="selement numeric" size="5" min="1" max="10">
<div class="error" id="er1"><p class="error_text"></p></div>
<p class=" slabel">Date: </p> 
<select class="selement listbox">
<option>Anytime</option>
<option>This week</option>
<option>This month</option>
<option>This year</option>

</select>

</div>

<div id="s_buttons" >


<input type="submit" value="Search" class="button common_button">

</div>

</div>

</form>

</div>



<div id="search_res">

<div id="top_list">
<h2>Products</h2>

<div id="addprod" class="lab_link">
<label onclick="loadPage('addform.php');">Add new product</label>
</div>






</div>


</div>




</body>


</html>