<?php
	session_start();
	if(!$_SESSION['admin_name']){
		header('location:admin_login.php');
	}
?>

<!DOCTYPE html>
<html>
<head>
<title>Student Registration Form</title>
	<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7; IE=EmulateIE9">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no"/>
	<link rel="stylesheet" type="text/css" href="style/style.css" media="all" />
    <!--<link rel="stylesheet" type="text/css" href="style/demo.css" media="all" />-->
    <link rel="stylesheet" type="text/css" href="style/table_style.css">
</head>
<body>
<div class="container">      
      <div  class="form">
      		<form method="post" action="user_registration.php" id="registrationform">
      		<table class="rwd-table" align="center" width="60%">
            	<tr>
                	<td style="color:#FFF; font-size:26px" colspan="2">Register Student</td>
                </tr>
                <tr>
                    <td><input type="button" value="Logout" class="buttom" onClick="fnlogout();" /></td>
                     <td><input type="button" value="View All Records" class="buttom" onClick="fnopen();" /></td>
                </tr>
            	<tr>
                    <th>First Name</th>
                    <td><input id="name" name="first_name" placeholder="First Name" required tabindex="1" type="text"></td>
        		</tr>
                <tr>
                	<th>Last Name</th>
                    <td><input id="name" name="last_name" placeholder="Sirname" required tabindex="1" type="text"></td>
                </tr>
                <tr>
                	<th>College's Name</th>
                	<td><input id="name" name="college_name" placeholder="College Name" required tabindex="1" type="text"></td>
                </tr>
                <tr>
                	<th>Enrollment No.</th>
                    <td><input id="name" name="enroll_no" placeholder="Enrollment Number" required tabindex="1" type="text"></td>
                </tr>
                <tr>
                	<th>Gender</th>
                    <td>
                    	<select class="select-style gender" name="gender">
                        <option value="select">i am..</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="other">Other</option>
                        </select><br><br>
                    </td>
                </tr>
                <tr>
                	<th>Year</th>
                    <td>
                    	<select class="select-style gender" name="year">
                        <option value="select">Year</option>
                        <option value="1st Year">1st</option>
                        <option value="2nd Year">2nd</option>
                        <option value="3rd Year">3rd</option>
                        <option value="4th Year">4th</option>
                        </select><br><br>
                    </td>
                </tr>
                <tr>
                	<th>Branch</th>
                	<td>
                        <select class="select-style gender" name="branch">
                        <option value="select">Branch</option>
                        <option value="Information Techology">Information Technology</option>
                        <option value="Computer Science">Computer Science</option>
                        <option value="Chemical Engineering">Chemical Engineering</option>
                        <option value="Electrical Engineering">Electrical Engineering</option>
                        <option value="Electronics and Communication">Electronics and Communication</option>
                        <option value="Mechanical Engineering">Mechanical Engineering</option>
                        </select><br><br>
                    </td>
                </tr>
                <tr>
                	<td><input class="buttom" name="submit" id="submit" tabindex="5" value="Add Record" type="submit" onClick="myfunction();"></td>
                       
                </tr>
            </table>
	</form> 
</div>      
</div>
<script>
	function myfunction(){
		alert('Record Added Successfully.');
	}
	function fnopen(){
		window.open('view.php','_self');
	}
	function fnlogout(){
		window.open('logout.php','_self');
	}
</script>
</body>
</html>

<?php
	include 'connection.php';
	if(isset($_POST['submit'])){
		@$first_name = $_POST['first_name'];
		@$last_name = $_POST['last_name'];
		@$college_name = $_POST['college_name'];
		@$enroll_no = $_POST['enroll_no'];
		@$gender = $_POST['gender'];
		@$year = $_POST['year'];
		@$branch = $_POST['branch'];
		if($gender == 'select'){
			echo "<script>alert('Select Gender.')</script>";
		}elseif($year == 'select'){
			echo "<script>alert('Select Year')</script>";
		}elseif($branch == 'select'){
			echo "<script>alert('Select Branch')</script>";
		}
		
			$que = "insert into s_data(s_first,s_last,s_college,s_enrollment,s_gender,s_year,s_branch) values ('$first_name','$last_name','$college_name','$enroll_no','$gender','$year','$branch')";
			
			if(mysql_query($que)){
				echo "<script>window.open('view.php','_self')</script>";
			}
	}
?>
