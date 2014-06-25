<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="js/jquery.js"></script>
<script src="js/form_validation.js"></script>
<title>Registration</title>
</head>

<body>
	<?php include("dbconnect.php")?>
    												<!---the form starts here --->
<form method="post" name="candidate" action="jobseeker_part2.php" >
    <center><h3>Personal Details</h3></center>
<table width="80%" border="1" cellspacing="3" cellpadding="3">
  <tr>
    <td scope="row">Primary Mobile Number *</td>
    <td  align="left">
        <input  name="contact" type="text" maxlength="10" onKeyPress="return isNumber(event)"/>
        <div id="contact_holder"></div>
        <input type="button" value="Add Secondary Contact" id="add_number">
         <input type="button" id="remove_number" value="Remove Contact">
    </td>
    <td align="left"><div id="num_msg"></div></td>
  </tr>
  <tr>
    <td  scope="row">First Name *</td>
    <td><input type="text" name="fname" /></td>
    
  </tr>
  <tr>
    <td  scope="row">Middle Name</td>
    <td><input type="text" name="mname" /></td>
    
  </tr>
  <tr>
    <td  scope="row">Last Name</td>
    <td><input type="text" name="lname" /></td>
    
  </tr>
  <tr>
    <td  scope="row">Email ID ***</td>
    <td><input type="email" name="email" /></td>
    
  </tr>
  <tr>
    <td  scope="row">City *</td>
    <td>
        <select id="city" name="city" onchange="get_areas(this.value)" >
          <option>-Select-</option>
            <option value="Faridabad">Faridabad</option>
            <option value="Ghaziabad">Ghaziabad</option>
            <option value="Gurgaon">Gurgaon</option>
            <option value="Delhi">Delhi</option>
            <option value="Noida">Noida</option>
       </select>
        Residence Locality *
        <select id="residence" name="residence"  style="width: 140px">
            <option>--Select--</option>
        </select>
    </td>
    
  </tr>

  <tr>
    <td scope="row">Address</td>
    <td><textarea id="address"></textarea></td>
    
  </tr>
  <tr>
    <td scope="row">Prefered Cities For Jobs</td>
    <td>
        <select id="job_city" name="job_city" onchange="get_job_areas(this.value)">
            <option>-Select-</option>
            <option value="Faridabad">Faridabad</option>
            <option value="Ghaziabad">Ghaziabad</option>
            <option value="Gurgaon">Gurgaon</option>
            <option value="Delhi">Delhi</option>
            <option value="Noida">Noida</option>
        </select>
        Preferred Location For Job <select id="job_location" name="job_location" style="width: 140px">
            <option>--Select--</option>
            </select>
    </td>
    
  </tr>
  <tr>
    <td scope="row"></td>
    <td>

    </td>
    
  </tr>
  <tr>
    <td scope="row">Gender *</td>
    <td>
      Male : <input type="radio" value="Male" name="gender" />
      Female : <input type="radio" value="Female" name="gender" />
      Others : <input type="radio" value="Others" name="gender" />
    </td>
    
  </tr>
  <tr>
    <td scope="row">Age *</td>
    <td>
      <select id="age" name="age">
          <option>--Select--</option>
      </select>

        Date Of Birth : <input min="1930-1-1" max="<?php echo date("Y-m-d")?>" type="date" name="dob">
    </td>
  </tr>
   <tr>
        <td>Marital Status </td>
       <td><select name="marital">
               <option>--Select--</option>
               <option value="Unmarried">Unmarried</option>
               <option value="Married">Married</option>
               <option value="Divorced">Divorced</option>
               <option value="Widowed">Widowed</option>
       </select></td>
       
   </tr>
    <tr>
        <td>Religion </td>
        <td><select name="religion">
                <option>--Select--</option>
                <option value="Hindu">Hindu</option>
                <option value="Muslim">Muslim</option>
                <option value="Christian">Christian</option>
                <option value="Sikh">Sikh</option>
                <option value="Buddhist">Buddhist</option>
                <option value="Jainism">Jainism</option>
                <option value="Judaism">Judaism</option>
                <option value="Jewish">Jewish</option>
                <option value="Other">Other</option>
            </select></td>
        
    </tr>
    <tr>
        <td>Any Handicap ? </td>
        <td>
            Completely Blind<input type="checkbox" name="handicap" value="Completely Blind">
            Partially Blind<input type="checkbox" name="handicap" value="Partially Blind"><br>
            Completely Deaf<input type="checkbox" name="handicap" value="Completely Deaf">
            Partially Deaf<input type="checkbox" name="handicap" value="Partially Deaf"><br>
            Mute<input type="checkbox" name="handicap" value="Mute">
            Speech Impaired<input type="checkbox" name="handicap" value="Speech Impaired"><br>
            Both Legs Disabled<input type="checkbox" name="handicap" value="Both Legs Disabled">
            Both Arms Disabled<input type="checkbox" name="handicap" value="Both Arms Disabled"><br>
            One Arm Disabled<input type="checkbox" name="handicap" value="One Arm Disabled">
            One Leg Disabled<input type="checkbox" name="handicap" value="One Leg Disabled"><br>
            Stiff Back And Hips<input type="checkbox" name="handicap" value="Stiff Back And Hips">
        </td>
        
    </tr>
    <tr>
        <td>Have you ever worked in Defence Services / Police Forces ? ***</td>
        <td>
           <select name="serviceman" onchange="add_force(this.value)">
                <option>--Select--</option>
                <option value="Yes">Yes</option>
                <option value="No">No</option>
            </select>
           Select Force Name *** <select id="force" name="force">
                <option>--Select--</option>
            </select>
            Rank *** <input type="text" name="rank" id="rank"/><br>
            Date of Joining : <input id="doj" type="date" name="doj" min="1930-1-1" max="<?php echo date("Y-m-d")?>"/>
            Date of Discharge : <input id="dod" type="date" name="dod" min="1930-1-1" max="<?php echo date("Y-m-d")?>"/>
        </td>
    </tr>
    <tr>
        <td>Height * : <select name="feet"><option>--Select--</option></select> feet
               <select name="inches"><option>--Select--</option></select> inches </td>
        <td>Weight * : <select name="weight" ><option>--Select--</option></select> Kgs</td>
    </tr>
</table>

    <hr>

        <center><h3>Qualifications</h3></center>
  <table>
      <tr>
          <td>
              <div id="container_label">
              <div>Highest Qualification/Highest Degree Earned :</div>
              </div>
          </td>
          <td>
              <div id="container_fields">
                 <div>
                      <select style="width: 100px" name="qualification"  class="qualification" onchange="
                  qualification_details(this.value,this.selectedIndex,this.name)">
                          <option>--Select--</option>
                          <?php $query="select * from qualification";
                          $result=mysql_query($query);
                          while($row=mysql_fetch_assoc($result))
                          {
                              echo "<option value='".$row['qualification_level']."'>".$row['qualification_level']."</option>";
                          }
                          ?>
                        </select>
                        Specialization : <select name="specialization0"  class="specialization0" disabled="disabled" style="width: 180px">
                          <option>--Select--</option>
                          <option name="B.A.(Pass)">B.A.(Pass)</option>
                          <option name="B.Com(Pass)">B.Com(Pass)</option>
                          <option name="B.A.(Pass)">B.Sc(General)</option>
                          <option disabled>-----------</option>

                        </select>
                        Course-Type :  <select name="course_type0"  class="course_type0" style="width: 80px" disabled="disabled">
                          <option>--Select--</option>
                          <option value="Correspondence/Distance Learning">Correspondence/Distance Learning</option>
                          <option value="Regular/Full-Time">Regular/Full-Time</option>
                          <option value="Part-Time">Part-Time</option>
                        </select>
                        Completed in : <select name="course_year0"  class="course_year0" disabled="disabled" onfocus="fill_year(this)">
                        </select>
                    </div>
               </div>
          </td>
      </tr>
  </table>
<input type="submit" value="submit"/>
<input type="reset" value="reset"/>
</form>
                                            <!-- form ends here-->
</body>
</html>