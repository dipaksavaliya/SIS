<?php
	session_start();
	if(!$_SESSION['teacher']){
		header('location:teacher_login.php');
	}
?>

<?php
	include 'connection.php';
	
	@$add_id = $_GET['addid'];
	$que = "select * from s_data where s_id = '$add_id'";
	$run = mysql_query($que);
	while($row = mysql_fetch_array($run)){
		$edit_mark = $row[0];
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
<title>Add Marks</title>
	<link rel="stylesheet" href="style/normalize.css">
    <link rel="stylesheet" href="style/table_style.css">
    <link rel="shortcut icon" href="../favicon.ico">
    <link rel="stylesheet" type="text/css" href="style/default.css" />
    <link rel="stylesheet" type="text/css" href="style/component.css" />
    <link rel="stylesheet" type="text/css" href="style/style.css" media="all" />
    <link rel="stylesheet" type="text/css" href="style/table_style.css">
    <script src="js/modernizr.js"></script>
    <script src="js/modernizr.custom.js"></script>
</head>
<body>
	<br />
    <div class="container">      
    <div  class="form">
	<form method="post" action="add_marks.php?edit_mark=<?php echo $edit_mark; ?>" id="addmarksform">
	<table class="rwd-table" align="center">
    	<tr bgcolor="#e67e22">
            <td>Hello, <font style="color:#0FF"><?php echo $_SESSION['teacher']; ?></font>, Welcome to website.</td>
            <td><a href="student_list.php" style="color:#0FF">Student List</a></td>
            <td><a href="teacher_logout.php" style="color:#0FF">Logout</a></td>
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
            <td><input id="name" name="marks" placeholder="Add Marks" required tabindex="1" type="text" value="<?php echo $s_marks; ?>"></td>
        </tr>
        <tr>
        	<td><input class="buttom" name="submit" id="submit" tabindex="5" value="Update Marks" type="submit" onClick="myfunction();"></td>
        </tr>
	</table>
    </form> 
</div>      
</div>
</body>
<script>
	function myfunction(){
		alert('Record updated Successfully.');
	}
</script>
</html>

<?php
	include 'connection.php';
	if(isset($_POST['submit'])){
		$edit_record = $_GET['edit_mark'];
		@$add_marks = $_POST['marks'];
		
		$que = "update s_data set s_marks='$add_marks' where s_id='$edit_record'";
			
			if(mysql_query($que)){
				echo "<script>window.open('student_list.php','_self')</script>";
			}
	}
?>