<?php
	session_start();
    include 'connection.php';
    if(isset($_POST['login'])){
        $user_name = $_SESSION['teacher'] = $_POST['username'];
        $user_pass = $_POST['password'];
        $que = "select * from teacher_login where user_id='$user_name' AND user_pass='$user_pass'";
        $run = mysql_query($que);
        if(mysql_num_rows($run)>0){
            header('location:student_list.php');
        } else {
            echo "<script>alert('Password or username is incorrect!')</script>";
        }
    }
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Teacher Login</title>
<link rel="stylesheet" href="style/login_style.css"media="screen" type="text/css" />
</head>
<body>
	<span class="button" id="toggle-login">User Log in</span>
	<div id="login">
  	<div id="triangle"></div>
  	<h1>Log in</h1>
  	<form action="teacher_login.php" method="post">
    	<input type="text" placeholder="Username" name="username" />
    	<input type="password" placeholder="Password" name="password" />
    	<input type="submit" name="login" value="Log in" />
  	</form>
	</div>

  	<script src='http://codepen.io/assets/libs/fullpage/jquery.js'></script>
  	<script src="js/login_index.js"></script>
</body>
</html>

