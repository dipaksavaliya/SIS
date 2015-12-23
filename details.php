<?php
	session_start();
	if(!$_SESSION['admin_name']){
		header('location:admin_login.php');
	}
?>

<?php
	include 'connection.php';
	
	@$show_record = $_GET['details'];
	$que = "select * from s_data where s_id = '$show_record'";
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
<title>Details</title>
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
	<table class="rwd-table" align="center" width="80%">
    	<tr bgcolor="#e67e22">
            <td>Hello, <font style="color:#0FF"><?php echo $_SESSION['admin_name']; ?></font>, You are an admin.</td>
        	<td>
            	<a href="user_registration.php" style="color:#0FF">Add New Record</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="edit.php?edit=<?php echo $details_id; ?>" style="color:#0FF">Edit this record</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="view.php" style="color:#0FF">View all the Records</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="logout.php" style="color:#0FF">Logout</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </td> 
            <td></td>
            <td></td>
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