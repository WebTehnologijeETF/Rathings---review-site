


<!DOCTYPE HTML>
<html>
<head>
<title>Contact us</title>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="../css/main.css">
<link rel="shortcut icon" type="image/png" href="/images/favicon.png"/>
<script src="../js/gvalidation.js"></script>
<script src="../js/contact-validation.js"></script>
<script src="../js/load.js"></script>
</head>
<body id="main_body" onload="fieldsValidationC();">




<?php require "header.php"; ?>

<?php require 'cValidationS.php'; ?>



<form method="post" action="contact.php" id="cform" onsubmit="return validateFormC();">
<div class="contact" class="container">
<h2>Contact us</h2>


<p class="note"><i>Note: Fields marked with * are mandatory</i></p>
<div id="l_contact" class="cdiv">

<p  class=" clabel">First name*: </p>
<p  class=" clabel">Last name*: </p> 
<p  class=" clabel">Email*: </p> 
<p class=" clabel">Site rating (1-10): </p> 
<p  class=" clabel">Message urgency*: </p> 
<p  class=" clabel">Message text*: </p> 
</div>

<div id="r_contact" class="cdiv">
<input  type="text" id="el0" class="celement textbox <?php if(isset($_POST['name'])) toggleBorder($nameErr); ?>" name="name" value="<?php 
     printItem("name");
?>">

<div class="error <?php if(isset($_POST['name'])) toggleIcon($nameErr); ?>" id="er0"><p class="error_text"><?php if(isset($_POST['name'])) echo $nameErr; ?></p></div>

<input type="text" id="el1" class="celement textbox <?php if(isset($_POST['lastname'])) toggleBorder($lastnameErr); ?>" size="40" name="lastname" value="<?php printItem("lastname");?>">
<div class="error <?php if(isset($_POST['lastname'])) toggleIcon($lastnameErr); ?> " id="er1"><p class="error_text"><?php if(isset($_POST['lastname'])) echo $lastnameErr; ?></p></div>
<input type="text" id="el2" class="celement textbox <?php if(isset($_POST['email'])) toggleBorder($emailErr); ?>" size="40" name="email" value="<?php printItem("email");?>">
<div class="error <?php if(isset($_POST['email'])) toggleIcon($emailErr); ?> " id="er2"><p class="error_text"><?php if(isset($_POST['email'])) echo $emailErr; ?></p></div>
<input type="number" id="el3" class="celement numeric <?php if(isset($_POST['rating'])) toggleBorder($ratingErr); ?>" size="5" min="1" max="10" name="rating" value="<?php printItem("rating");?>">
<div class="error <?php if(isset($_POST['rating'])) toggleIcon($ratingErr); ?>" id="er3"><p class="error_text"><?php if(isset($_POST['rating'])) echo $ratingErr; ?></p></div>
<input type="range" id="el4" class="celement textbox range <?php if(isset($_POST['urgency'])) toggleBorder($urgencyErr); ?>" name="urgency" value="<?php printItem("urgency");?>">
<div class="error <?php if(isset($_POST['urgency'])) toggleIcon($urgencyErr); ?> " id="er4"><p class="error_text"><?php if(isset($_POST['urgency'])) echo $urgencyErr; ?></p></div> 
<textarea id="el5" class="celement textarea <?php if(isset($_POST['message'])) toggleBorder($messageErr); ?>" cols="30" rows="7" name="message"><?php printItem("message");?></textarea>
<div class="error <?php if(isset($_POST['message'])) toggleIcon($messageErr); ?>" id="er5"><p class="error_text"><?php if(isset($_POST['message'])) echo $messageErr; ?></p></div>
</div>

<div id="c_buttons" >

<input type="reset" value="Reset" class="button common_button">
<input type="submit" value="Send" class="button common_button">

</div>

</div>

</form>







</body>

</html>