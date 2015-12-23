<?php
	session_start();
	if(!$_SESSION['admin_name']){
		header('location:admin_login.php');
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>View Records</title>
	<link rel="stylesheet" href="style/normalize.css">
    <link rel="stylesheet" href="style/table_style.css">
    <link rel="shortcut icon" href="../favicon.ico">
    <link rel="stylesheet" type="text/css" href="style/default.css" />
    <link rel="stylesheet" type="text/css" href="style/component.css" />
    <script src="js/modernizr.js"></script>
    <script src="js/modernizr.custom.js"></script>
</head>

<body>
	<br>   
    <table class="rwd-table">
    	<tr bgcolor="#e67e22">
        	<td colspan="2"><a href="user_registration.php" style="color:#0FF">Add New Record</a></td>
            <td colspan="2">Hello, <font style="color:#0FF"><?php echo $_SESSION['admin_name']; ?></font>, You are an admin.</td>
            <td colspan="3"><a href="view.php" style="color:#0FF">View all the Records</a></td>
            <td colspan="3"><a href="logout.php" style="color:#0FF">Logout</a></td>
            <td></td>
        </tr>
    	<tr>
            <th>Enrollment Number</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>College Name</th>
            <th>Gender</th>
            <th>Year</th>
            <th>Branch</th>
            <th>Edit</th>
            <th>Delete</th>
            <th>Details</th>
      	</tr>
      	<tr>
        <?php
			include 'connection.php';
			@$view = $_GET['view'];
			if($view == "" || $view == "1"){
				$view1 = 0;
			}else{
				$view1 = ($view * 5) - 5;
			}
			$que = "select * from s_data order by 1 DESC limit $view1,5";
			$run = mysql_query($que);
			while($row = mysql_fetch_array($run)){
				$s_id = $row[0];
				$s_first = $row[1];
				$s_last = $row[2];
				$s_college = $row[3];
				$s_enrollment = $row[4];
				$s_gender = $row[5];
				$s_year = $row[6];
				$s_branch = $row[7];
        ?>
            <td><?php echo $s_enrollment; ?></td>
            <td><?php echo $s_first; ?></td>
            <td><?php echo $s_last; ?></td>
            <td><?php echo $s_college; ?></td>
            <td><?php echo $s_gender; ?></td>
            <td><?php echo $s_year; ?></td>
            <td><?php echo $s_branch; ?></td>
            <td><a href="edit.php?edit=<?php echo $s_id; ?>" style="color:#FFF">Edit</a></td>
            <td><a onClick=fndelete(); href="delete.php?del=<?php echo $s_id; ?>" style="color:#FFF">Delete</a></td>
            <td><a href="details.php?details=<?php echo $s_id; ?>" style="color:#FFF">Details</td>
      	</tr>
        <?php } ?>
        <tr>
        	<?php
			$run2 = mysql_query("select * from s_data order by 1 DESC");
			$count = mysql_num_rows($run2);
			$a = $count/5;
			$a = ceil($a);
			?>
			<td>
            <?php
			for($b = 1;$b <= $a;$b++){
				?><a href="view.php?view=<?php echo $b; ?>" style="color:#FFF; padding:10px;"><?php echo $b." "; ?></a><?php
			}
			?>
			</td>
        </tr>
    </table>
    <br>
    <div class="main clearfix">
    <div class="column">
	<div id="sb-search" class="sb-search">
    <form action="view.php" method="get">
    	<input class="sb-search-input" placeholder="Enter enrollment number to search.." type="text" value="" name="search" id="search">
		<input class="sb-search-submit" type="submit" value="">
		<span class="sb-icon-search"></span>
    </form>
    </div>
    </div>
    </div>
    
    <?php
		if(isset($_GET['search'])){
			$search_record = $_GET['search'];
			$query = "select * from s_data where s_enrollment = '$search_record'";
			$runquery = mysql_query($query);
			while($row2 = mysql_fetch_array($runquery)){
				$fname = $row2['s_first'];
				$lname = $row2['s_last'];
				$cname = $row2['s_college'];
				$enroll = $row2['s_enrollment'];
				$gender = $row2['s_gender'];
				$year = $row2['s_year'];
				$branch = $row2['s_branch'];
				
    ?>
    
    <table class="rwd-table">
    	<h1 align="center">Search Result</h1>
    	<tr>
            <th>Enrollment Number</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>College Name</th>
            <th>Gender</th>
            <th>Year</th>
            <th>Branch</th>
            <th>Edit</th>
            <th>Delete</th>
            <th>Details</th>
      	</tr>
      	<tr>
            <td><?php echo $enroll; ?></td>
            <td><?php echo $fname; ?></td>
            <td><?php echo $lname; ?></td>
            <td><?php echo $cname; ?></td>
            <td><?php echo $gender; ?></td>
            <td><?php echo $year; ?></td>
            <td><?php echo $branch; ?></td>
            <td><a href="edit.php?edit=<?php echo $s_id; ?>" style="color:#FFF">Edit</a></td>
            <td><a onClick=fndelete(); href="delete.php?del=<?php echo $s_id; ?>" style="color:#FFF">Delete</a></td>
            <td><a href="details.php?details=<?php echo $s_id; ?>" style="color:#FFF">Details</td>
      	</tr>
        <?php }} ?>
    </table>
   
	<script src='http://codepen.io/assets/libs/fullpage/jquery.js'></script>
  	<script src="js/index.js"></script>
    <script>
		function fndelete(){
			confirm('Are you sure to delete record?');
		}
    </script>
    <script src="js/classie.js"></script>
	<script src="js/uisearch.js"></script>
	<script>
		new UISearch( document.getElementById( 'sb-search' ) );
	</script>
    
</body>
</html>