<div id="logo">


<div id="logo_text">

<label id="left_logo">Rat</label>
<label id="middle_logo">h</label>
<label id="right_logo">ings</label>
</div>

</div>

<div id="search_box">
<input type="text"  maxlength="50" id="search_text" placeholder="Search for products...">
<div id="search_icon_cont">
<img src="/images/search.png" alt="search" class="search_img" >
</div>
</div>

<div id="login_div">
<a onclick='loadPage("login.php");' class="login_label">Log in</a>
<a onclick='loadPage("register.php");' class="login_label">Register</a>
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

<li class="menu_item">
<a onclick='loadPage("products-table.php");'>MANAGE PRODUCTS</a> 
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