<?php
	session_start();
	if(!$_SESSION['username']){
		header('location:login.php');
	}
?>

<?php
	include 'connection.php';
	
	@$show_record = $_GET['details'];
	if($_SESSION['username'] != $show_record){
		echo "<script>alert('You are not valid')</script>";
		echo "<script>window.open('student_logout.php','_self')</script>";
	}
	$query = "select s_id from s_data where s_enrollment='$show_record'";
	$runquery = mysql_query($query);
	while($row_id = mysql_fetch_array($runquery)){
		$user_id = $row_id[0];
	}
	$que = "select * from s_data where s_id = '$user_id'";
	$run = mysql_query($que);
	while($row = mysql_fetch_array($run)){
		$details_id = $row[0];
		$f_name = $row[1];
		$l_name = $row[2];
		$c_name = $row[3];
		$enroll_number = $row[4];
		$s_gender = $row[5];
		$s_year = $row[6];
		$s_branch = $row[7];
		$s_marks = $row[8];
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Home Page</title>
	<link rel="stylesheet" href="style/normalize.css">
    <link rel="stylesheet" href="style/table_style.css">
    <link rel="shortcut icon" href="../favicon.ico">
    <link rel="stylesheet" type="text/css" href="style/default.css" />
    <link rel="stylesheet" type="text/css" href="style/component.css" />
    <script src="js/modernizr.js"></script>
    <script src="js/modernizr.custom.js"></script>
</head>
<body>
	<br />
	<table class="rwd-table" align="center">
    	<tr bgcolor="#e67e22">
            <td>Hello, <font style="color:#0FF"><?php echo $f_name." ".$l_name; ?></font>, Welcome to website.</td>
            <td><a href="student_logout.php" style="color:#0FF">Logout</a></td>
        </tr>
    	<tr>
            <th>Enrollment Number</th>
            <td><?php echo $enroll_number; ?></td>
        </tr>
        <tr>
            <th>First Name</th>
            <td><?php echo $f_name; ?></td>
        </tr>
        <tr>
            <th>Last Name</th>
            <td><?php echo $l_name; ?></td>
		</tr>
        <tr>
            <th>College Name</th>
            <td><?php echo $c_name; ?></td>
		</tr>
        <tr>
            <th>Gender</th>
            <td><?php echo $s_gender; ?></td>
		</tr>
        <tr>
            <th>Year</th>
            <td><?php echo $s_year; ?></td>
		</tr>
        <tr>
            <th>Branch</th>
            <td><?php echo $s_branch; ?></td>
	</tr>
	<tr>
	    <th>Marks</th>
	    <td><?php echo $s_marks; ?></td>
	</tr>
	</table>
</body>
</html>