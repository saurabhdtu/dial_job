<html>
<head>
   <title>step form</title>
   <link href="css/stepform.css" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.css"/>
</head>
<script src="js/stepformscript.js" type="text/javascript"></script>
<script src="js/stepform.js" type="text/javascript"></script>
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/form_validation.js"></script>
<?php include("dbconnect.php")?>
<!-- multistep form -->
<form id="msform" name="candidate" method="post" action="jobseeker_reg.php">
	<!-- progressbar -->
	<ul id="progressbar">
		<li class="active">Personal Details</li>
		<li>Social Profiles</li>
		<li>Personal Details</li>
        <li>your location</li>
	</ul>
	<!-- fieldsets -->
	<fieldset>
		<h2 class="fs-title">Personal Details</h2>
		<h3 class="fs-subtitle">Step 1</h3>
        Primary Mobile Number * : <input  name="contact" placeholder="Primary Contact" type="text" maxlength="10" onKeyPress="return isNumber(event)"/>
        <div id="contact_holder"></div>
        <input type="button" value="Add" id="add_number">
        <input type="button" id="remove_number" value="Remove"><br>
        Name * : <input type="text" name="fname" placeholder="First Name *"/>
        <input type="text" name="mname" placeholder="Middle Name"/>
        <input type="text" name="lname" placeholder="Last Name"/><br>
        Email *** : <input type="email" name="email" placeholder="Your Email ID"/><br>
        City * : <select id="city" name="city" onchange="get_areas(this.value)" >
            <option>-Select-</option>
            <option value="Faridabad">Faridabad</option>
            <option value="Ghaziabad">Ghaziabad</option>
            <option value="Gurgaon">Gurgaon</option>
            <option value="Delhi">Delhi</option>
            <option value="Noida">Noida</option>
        </select>

        <br>
		<input type="button" name="next" class="next action-button" value="Next" />
	</fieldset>
	<fieldset>
		<h2 class="fs-title">Social Profiles</h2>
		<h3 class="fs-subtitle">Your presence on the social network</h3>
		<input type="text" name="twitter" placeholder="Twitter" />
		<input type="text" name="facebook" placeholder="Facebook" />
		<input type="text" name="gplus" placeholder="Google Plus" />
		<input type="button" name="previous" class="previous action-button" value="Previous" />
		<input type="button" name="next" class="next action-button" value="Next" />
	</fieldset>
	<fieldset>
		<h2 class="fs-title">Personal Details</h2>
		<h3 class="fs-subtitle">We will never sell it</h3>
		<input type="text" name="frname" placeholder="First Name" />
		<input type="text" name="lrname" placeholder="Last Name" />
		<input type="text" name="prhone" placeholder="Phone" />
		<textarea name="arddress" placeholder="Address"></textarea>
		<input type="button" name="previous" class="previous action-button" value="Previous" />
		<input type="button" name="next" class="next action-button" value="next" />
	</fieldset>
	<fieldset>
		<h2 class="fs-title">Personal Details</h2>
		<h3 class="fs-subtitle">We will never sell it</h3>
		<input type="text" name="fname" placeholder="First Name" />
		<input type="text" name="lname" placeholder="Last Name" />
		<input type="text" name="phone" placeholder="Phone" />
		<textarea name="address" placeholder="Address"></textarea>
		<input type="button" name="previous" class="previous action-button" value="Previous" />
        <input type="submit" name="submit" value="FinalSubmit" />
	</fieldset>

</form>

<!-- jQuery -->

<!-- jQuery easing plugin -->


</html>