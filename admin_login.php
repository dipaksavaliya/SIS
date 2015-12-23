<?php
	session_start();
?>

<?php
    include 'connection.php';
    if(isset($_POST['login'])){
        $admin_name = $_SESSION['admin_name'] = $_POST['admin_name'];
        $admin_pass = $_POST['admin_pass'];
        $que = "select * from login where user_name='$admin_name' AND user_password='$admin_pass'";
        $run = mysql_query($que);
        if(mysql_num_rows($run)>0){
            echo "<script>window.open('view.php','_self')</script>";
        } else {
            echo "<script>alert('Password or username is incorrect!')</script>";
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
  	<meta charset="UTF-8">
  	<title>Admin Login</title>
    <link rel="stylesheet" href="style/login_style.css"media="screen" type="text/css" />
</head>

<body>
  	<span class="button" id="toggle-login">Admin Log in</span>
	<div id="login">
  	<div id="triangle"></div>
  	<h1>Log in</h1>
  	<form action="admin_login.php" method="post">
    	<input type="text" placeholder="Admin Name" name="admin_name" />
    	<input type="password" placeholder="Password" name="admin_pass" />
    	<input type="submit" name="login" value="Log in" />
  	</form>
	</div>

  	<script src='http://codepen.io/assets/libs/fullpage/jquery.js'></script>
  	<script src="js/login_index.js"></script>
</body>
</html>

