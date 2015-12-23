<?php
	session_start();
	if(!$_SESSION['admin_name']){
		header('location:admin_login.php');
	}
?>

<?php
	include 'connection.php';
	
	@$edit_record = $_GET['edit'];
	$que = "select * from s_data where s_id = '$edit_record'";
	$run = mysql_query($que);
	while($row = mysql_fetch_array($run)){
		$edit_id = $row[0];
		$f_name = $row[1];
		$l_name = $row[2];
		$c_name = $row[3];
		$enroll_number = $row[4];
		$s_gender = $row[5];
		$s_year = $row[6];
		$s_branch = $row[7];
	}
?>

<!DOCTYPE html>
<html>
<head>
<title>Record Update Form</title>
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
      		<form method="post" action="edit.php?edit_form=<?php echo $edit_id; ?>" id="registrationform">
      		<table class="rwd-table" align="center" width="60%">
            	<tr>
                	<td style="color:#FFF; font-size:26px" colspan="2">Update Record</td>
                </tr>
                <tr>
                    <td><input type="button" value="Logout" class="buttom" onClick="fnlogout();" /></td>
                     <td><input type="button" value="View All Records" class="buttom" onClick="fnopen();" /></td>
                </tr>
            	<tr>
                    <th>First Name</th>
                    <td><input id="name" name="f_name" required tabindex="1" type="text" value="<?php echo $f_name; ?>"></td>
        		</tr>
                <tr>
                	<th>Last Name</th>
                    <td><input id="name" name="l_name" required tabindex="1" type="text" value="<?php echo $l_name; ?>"></td>
                </tr>
                <tr>
                	<th>College's Name</th>
                	<td><input id="name" name="c_name" required tabindex="1" type="text" value="<?php echo $c_name; ?>"></td>
                </tr>
                <tr>
                	<th>Enrollment No.</th>
                    <td><input id="name" name="enroll_number" required tabindex="1" type="text" value="<?php echo $enroll_number;?>"></td>
                </tr>
                <tr>
                	<th>Gender</th>
                    <td>
                    	<select class="select-style gender" name="s_gender">
                        <option value="<?php echo $s_gender; ?>"><?php echo $s_gender; ?></option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="other">Other</option>
                        </select><br><br>
                    </td>
                </tr>
                <tr>
                	<th>Year</th>
                    <td>
                    	<select class="select-style gender" name="s_year">
                        <option value="<?php echo $s_year; ?>"><?php echo $s_year; ?></option>
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
                        <select class="select-style gender" name="s_branch">
                        <option value="<?php echo $s_branch; ?>"><?php echo $s_branch; ?></option>
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
                	<td><input class="buttom" name="update" id="submit" tabindex="5" value="Update Record" onClick="fnupdate()" type="submit"></td>
                </tr>
            </table>
	</form> 
</div>      
</div>

	<script>
		function fnupdate() {
			alert("Record is updated.");
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
	if(isset($_POST['update'])){
		$edit_record1 = $_GET['edit_form'];
		$first = $_POST['f_name'];
		$last = $_POST['l_name'];
		$college = $_POST['c_name'];
		$enroll = $_POST['enroll_number'];
		$gen = $_POST['s_gender'];
		$year = $_POST['s_year'];
		$branch = $_POST['s_branch'];
		
		$query = "update s_data set s_first='$first',s_last='$last',s_college='$college',s_enrollment='$enroll',s_gender='$gen',s_year='$year',s_branch='$branch' where s_id='$edit_record1'";
		
		if(mysql_query($query)){
			echo "<script>window.open('view.php','_self');</script>";
		}
	}
?>