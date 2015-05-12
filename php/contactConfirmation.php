



<div class="contact">
<h2>Contact form data</h2>

<p><i>Please check if you have filled the form correctly.</i></p> <br>


<form method="post" action="sendMail.php">

<div id="formData">
<label class="citem">First name: </label> <label name="name"><?php printItem("name"); ?></label> <br> <br>
<label class="citem">Last name: </label> <label><?php printItem("lastname"); ?></label> <br> <br>
<label class="citem">Email: </label>  <label name="email"><?php printItem("email"); ?></label> <br> <br>
<label class="citem">Site rating: </label> <label><?php printItem("rating"); ?></label> <br> <br>
<label class="citem">Message urgency: </label> <label><?php echo printItem("urgency"); echo '%' ?></label> <br> <br>
<label class="citem">Message: </label> <label><?php printItem("message"); ?></label> <br> <br>

</div> <br> <br>

<?php 

session_start();

$_SESSION['name'] = htmlspecialchars($_POST['name']);
$_SESSION['lastname'] = htmlspecialchars($_POST['lastname']);
$_SESSION['email'] = htmlspecialchars($_POST['email']);
$_SESSION['rating'] = htmlspecialchars($_POST['rating']);
$_SESSION['urgency'] = htmlspecialchars($_POST['urgency']);
$_SESSION['message'] = htmlspecialchars($_POST['message']);


 ?>


<div class="mes">
<p>Are you sure you want to submit this data?</p>
</div>

<div id="sure_but">
<input type="submit" value="I am sure" class="button common_button">
</div>

</form>

<div class="mes">
<p>If you have made a mistake in filling the form, you can correct the data below.</p>
</div>





</div>

