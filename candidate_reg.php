<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <script src="js/jquery.js"></script>
    <script src="js/form_generation.js"></script>
    <title>Registration</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
</head>

<body>
<?php include("dbconnect.php")?>												<!---the form starts here --->
<div style="margin-left:30px;margin-right: 30px">
<form class="form-horizontal" role="form" method="post" name="candidate" >
<center><h3>Personal Details</h3></center>

<div class="row">
    <div class="col-lg-2"></div>
    <label for="contact" class="col-lg-2">Primary Mobile Number *</label>
    <div class="col-lg-2"><input id="contact" name="contact" class="form-control" placeholder="Primary Contact" type="text" maxlength="10" onKeyPress="return isNumber(event)"/>
    </div>
    <div class="col-lg-4"><input type="button" class="btn btn-success" value="Add Secondary Contact" id="add_number">
        <input type="button" class="btn btn-danger" id="remove_number" value="Remove Contact"></div>
</div>
<br>
<div class="row">
    <div class="col-lg-4"></div>
    <div id="contact_holder"></div>
</div>
<div class="row" style="margin-top: 6px">
    <div class="col-lg-2"></div>
    <div class="col-lg-2">
        <label >Name *</label>
    </div>
    <div class="col-lg-2"><input type="text" class="form-control" name="fname" placeholder="First Name" /></div>
    <div class="col-lg-2"><input type="text" class="form-control" name="mname" placeholder="Middle Name"/></div>
    <div class="col-lg-2"><input type="text" class="form-control" name="lname" placeholder="Last Name"/></div>
</div>
<br>
<div class="row">
    <div class="col-lg-2"></div>
    <label class="col-lg-2"> Email ID ***</label>
    <div class="col-lg-3"> <input class="form-control" type="email" name="email" placeholder="Your Email Id"/></div>
</div>
<br>

<div class="row">
    <div class="col-lg-2"></div>
    <label class="col-lg-2">City *</label>
    <div class="col-lg-2">
        <select class="form-control" id="city" name="city" onchange="get_areas(this.value)" >
            <option>-Select-</option>
            <option value="Faridabad">Faridabad</option>
            <option value="Ghaziabad">Ghaziabad</option>
            <option value="Gurgaon">Gurgaon</option>
            <option value="Delhi">Delhi</option>
            <option value="Noida">Noida</option>
        </select>
    </div>
    <div class="col-lg-1"><b>Residence Locality *</b> </div>
    <div class="col-lg-4">
        <select class="form-control" id="residence" name="residence">
            <option>--Select--</option>
        </select>
    </div>
</div>
<br>
<div class="row">
    <div class="col-lg-2"></div>
    <label class="col-lg-2"> Address</label>
    <div class="col-lg-3"><textarea rows="4" cols="50" id="address" class="form-control" style="resize:none"></textarea></div>
</div>
<br>
<div class="row">
    <div class="col-lg-2"></div>
    <label class="col-lg-2">Prefered Cities For Jobs</label>
    <div class="col-lg-2">   <select class="form-control" id="job_city" name="job_city" onchange="get_job_areas(this.value)">
            <option>-Select-</option>
            <option value="Faridabad">Faridabad</option>
            <option value="Ghaziabad">Ghaziabad</option>
            <option value="Gurgaon">Gurgaon</option>
            <option value="Delhi">Delhi</option>
            <option value="Noida">Noida</option>
        </select>
    </div>
    <div class="col-lg-2"><b>Preferred Location For Job</b></div>
    <div class="col-lg-3"><select class="form-control" id="job_location" name="job_location">
            <option>--Select--</option>
        </select>
    </div>
</div>
<br>
<div class="row">
    <div class="col-lg-2"></div>
    <label class="col-lg-2"> Gender *</label>
    <div class="col-lg-2">
        <label class="radio">Male <input type="radio" value="Male" name="gender" /></label>
        <label class="radio">Female <input type="radio" value="Female" name="gender" /></label>
        <label class="radio"> Others  <input type="radio" value="Others" name="gender" /></label>
    </div>
</div>
<br>
<div class="row">
    <div class="col-lg-2"></div>
    <label class="col-lg-2">Age *</label>
    <div class="col-lg-2">
        <select id="age" name="age" class="form-control">
            <option>--Select--</option>
        </select>
    </div>
    <label class="col-lg-1">Date Of Birth : </label>
    <div class="col-lg-2"><input min="1930-1-1" max="<?php echo date("Y-m-d")?>" type="date" name="dob" class="form-control"/></div>
</div>
<br>
<div class="row">
    <div class="col-lg-2"></div>
    <label class="col-lg-2">Marital Status</label>
    <div class="col-lg-2">
        <select name="marital" class="form-control"> <option>--Select--</option>
            <option value="Unmarried">Unmarried</option>
            <option value="Married">Married</option>
            <option value="Divorced">Divorced</option>
            <option value="Widowed">Widowed</option>
        </select></td>
    </div>
</div>
<br>
<div class="row">
    <div class="col-lg-2"></div>
    <label class="col-lg-2">Religion </label>
    <div class="col-lg-2"><select name="religion" class="form-control">
            <option>--Select--</option>
            <option value="Hindu">Hindu</option>
            <option value="Muslim">Muslim</option>
            <option value="Christian">Christian</option>
            <option value="Sikh">Sikh</option>
            <option value="Buddhist">Buddhist</option>
            <option value="Jainism">Jainism</option>
            <option value="Judaism">Judaism</option>
            <option value="Jewish">Jewish</option>
        </select>
    </div>
</div>
<br>
<div class="row">
    <div class="col-lg-2"></div>
    <label class="col-lg-2">Any Handicap ? </label>
    <div class="col-lg-4">
        <select name="handicap" class="form-control" multiple>
            <option value="Completely Blind">Completely Blind</option>
            <option value="Partially Blind">Partially Blind</option>
            <option value="Completely Deaf">Completely Deaf</option>
            <option value="Partially Deaf">Partially Deaf</option>
            <option value="Mute">Mute</option>
            <option value="Speech Impaired">Speech Impaired</option>
            <option value="Both Legs Disabled">Both Legs Disabled</option>
            <option value="Both Arms Disabled">Both Arms Disabled</option>
            <option value="One Arm Disabled">One Arm Disabled</option>
            <option value="One Leg Disabled">One Leg Disabled</option>
            <option value="Stiff Back And Hips">Stiff Back And Hips</option>
        </select>
    </div>
</div>
<br>
<div class="row">
    <div class="col-lg-2"></div>
    <label class="col-lg-2">Have you ever worked in Defence Services / Police Forces ? ***</label>
    <div class="col-lg-2">
        <select class="form-control" name="serviceman" onchange="add_force(this.value)">
            <option>--Select--</option>
            <option value="Yes">Yes</option>
            <option value="No">No</option>
        </select>
    </div>
    <div class="col-lg-2"><b>Select Force Name ***</b></div>
    <div class="col-lg-2">
        <select id="force" name="force" class="form-control">
            <option>--Select--</option>
        </select>
    </div>
    <div class="col-lg-1"><b>Rank ***</b></div>
    <div class="col-lg-1"> <input type="text" class="form-control" name="rank" id="rank"/></div>
</div>
<div class="row">
    <div class="col-lg-4"></div>
    <label  class="col-lg-2">Date of Joining</label>
    <div class="col-lg-2">
        <input id="doj" class="form-control" type="date" name="doj" min="1930-1-1" max="<?php echo date("Y-m-d")?>"/>
    </div>
    <label  class="col-lg-2">Date of Discharge</label>
    <div class="col-lg-2">
        <input id="dod" type="date" class="form-control" name="dod" min="1930-1-1" max="<?php echo date("Y-m-d")?>"/>
    </div>
</div>
<br>
<div class="row">
    <div class="col-lg-1"></div>
    <label class="col-lg-1">Height *</label>
    <div class="col-lg-2">
        <select class="form-control" name="feet"><option>--Select--</option></select>
    </div>
    <div class="col-lg-1">feet</div>
    <div class="col-lg-2">
        <select class="form-control" name="inches"><option>--Select--</option></select>
    </div>
    <div class="col-lg-1">inches</div>
    <label class="col-lg-1"> Weight * </label>
    <div class="col-lg-2">
        <select class="form-control" name="weight" ><option>--Select--</option></select></div>
    <div class="col-lg-1">Kgs</div>

</div>
<hr>
<center>
    <h3>Qualifications</h3></center>
<div id ="qualification_container">
    <div class="row" id="row0">
        <div class="col-lg-1"></div>
        <div class="col-lg-2" id="lbl0"><b>Highest Qualification/Highest Degree Earned :</b></div>
        <div id="qual0" class="col-lg-2"><br>
            <select name="qualification0" class="form-control qualification0" title="1" onchange="
                  qualification_details(this.value,this.name,this.title,this)">
                <option>--Select--</option>
                <?php $query="select * from qualification";
                $result=mysql_query($query);
                while($row=mysql_fetch_assoc($result))
                {
                    echo "<option value='".$row['qualification_level']."'>".$row['qualification_level']."</option>";
                }
                ?>
            </select>
        </div>

        <div id="spec0" class="col-lg-2">
            Specialization <select name="specialization0" class="form-control specialization0" disabled="disabled">
                <option>--Select--</option>
            </select>
        </div>

        <div id="ct0" class="col-lg-2">
            Course-Type :  <select name="course_type0"  class="form-control course_type0" disabled="disabled">
                <option>--Select--</option>
                <option value="Correspondence/Distance Learning">Correspondence/Distance Learning</option>
                <option value="Regular/Full-Time">Regular/Full-Time</option>
                <option value="Part-Time">Part-Time</option>
            </select>
        </div>

        <div id="cy0" class="col-lg-2">
            Completed in : <select name="course_year0" class="form-control course_year0" disabled="disabled" onfocus="fill_year(this)">
                <option>--Select--</option>
            </select>
        </div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-lg-1"></div>
     <label class="col-lg-2">Languages You Know :</label>
</div>

<div id="lang_container">
    <div class="row" id="lang_div0">
        <div class="col-lg-1"></div>
        <div id="lang_name0" class="col-lg-1"><br>Language 1 </div>
        <div class="col-lg-2">
            <br>
            <select class="form-control" id="lang0" name="lang0" onchange="lang_manage(this,this.value)">
                <option>--Select--</option>
            </select>
        </div>
        <div class="col-lg-2">
            Speak : <select id="speak0" name="speak0" class="form-control" disabled="disabled">
                <option>--Select--</option>
                <option value="Beginner">Beginner</option>
                <option value="Intermediate">Intermediate</option>
                <option value="Expert">Expert</option>
            </select>
        </div>
        <div class="col-lg-2">
            Write : <select id="write0" name="write0" class="form-control" disabled="disabled">
                <option>--Select--</option>
                <option value="Beginner">Beginner</option>
                <option value="Intermediate">Intermediate</option>
                <option value="Expert">Expert</option>
            </select>
        </div>
        <div class="col-lg-2">
            Read : <select id="read0" name="read0" class="form-control" disabled="disabled">
                <option>--Select--</option>
                <option value="Beginner">Beginner</option>
                <option value="Intermediate">Intermediate</option>
                <option value="Expert">Expert</option>
            </select>
        </div>
        <div class="col-lg-2">
            <br>
            <input type="button" id="add_lang" value="+" class="btn-success btn-sm">
            <input type="button" id="remove_lang" value="-" class="btn-danger btn-sm">
        </div>
    </div>
</div>

<hr>
<center>
    <h3>Current Employment Details</h3></center>
<div class="row">
    <div class="col-lg-2"></div>
    <label class="col-lg-2">Current Employment Status</label>
    <div class="col-lg-3">
        <select class="form-control" name="job_status">
            <option>--Select--</option>
            <option value="Doing Permanent Full-Time Job">Doing Permanent Full-Time Job</option>
            <option value="Doing Permanent Part-Time Job">Doing Permanent Part-Time Job</option>
            <option value="Doing Contract Job on Per Day Basis">Doing Contract Job on Per Day Basis</option>
            <option value="Doing Home Based Job">Doing Home Based Job</option>
            <option value="Currently Unemployed">Currently Unemployed</option>
            <option value="Fresher">Fresher</option>
        </select>
    </div>
</div>
<br>
<div class="row">
    <div class="col-lg-1"></div>
    <label class="col-lg-3">
        Since how many years / months have you been doing your current job ?  *</label>
    <div class="col-lg-2">
        <select class="form-control" name="job_years" id="job_years"><option>--Select--</option></select>
    </div>
    <div class="col-lg-1">Years</div>
    <div class="col-lg-2">
        <select name="job_months" class="form-control" id="job_months"><option>--Select--</option></select>
    </div>
    <div class="col-lg-1"> Months</div>
</div>
<br>
<div class="row">
    <div class="col-lg-1"></div>
    <label class="col-lg-3">Enter a Headline for your profile</label>
    <div class="col-lg-4">
        <input class="form-control" type="text" name="headline" maxlength="50" style="width:350px" placeholder="Describe your professional background in one line."/>
        This Profile Headline is the first thing Employers will see
    </div>
</div>
<br>
<div class="row">
    <div class="col-lg-2"></div>
    <label class="col-lg-2">Current Job Type *</label>
    <div class="col-lg-2">
        <input type="text" class="form-control" name="job_type">
    </div>
</div>
<br>

<div class="row">
    <div class="col-lg-2"></div>
    <label class="col-lg-2">Current Job Specification *</label>
    <div class="col-lg-2">
        <input type="text" class="form-control" name="job_spec">
    </div>
</div>
<br>
<div class="row">
    <div class="col-lg-2"></div>
    <label class="col-lg-2">Company Name</label>
    <div class="col-lg-2">
        <input type="text" name="company_name" style="width: 300px" class="form-control" />
    </div>

</div>
<br>
<div class="row">
    <div class="col-lg-2"></div>
    <label class="col-lg-2">Company Address </label>
    <div class="col-lg-3">
        <textarea class="form-control" rows="5" cols="50" name="company_add"></textarea>
    </div>
</div>
<br>
<div class="row">
    <div class="col-lg-2"></div>
    <label class="col-lg-2">Job City </label>
    <div class="col-lg-2">
        <select name="prev_job_city" class="form-control">
            <option>-Select-</option>
            <option value="Faridabad">Faridabad</option>
            <option value="Ghaziabad">Ghaziabad</option>
            <option value="Gurgaon">Gurgaon</option>
            <option value="Delhi">Delhi</option>
            <option value="Noida">Noida</option>
        </select>
    </div>
</div>
<br>
<div class="row">
    <div class="col-lg-2"></div>
    <label class="col-lg-2">Key Skill *</label>
    <div class="col-lg-4">
        <input class="form-control" type="text"/>
    </div>
</div>
<br>
<div class="row">
    <div class="col-lg-4"></div>
        <div class="col-lg-4"><input type="submit" value="Register" class="btn-primary btn-lg" style="width: 150px"/> </div>
    </div>
    </div>

</form>

</div>                                   <!-- form ends here-->
</body>
</html>