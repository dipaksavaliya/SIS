<?php
	session_start();      
    include 'connection.php';
    if(isset($_POST['login'])){
        $user_name = $_SESSION['username'] = $_POST['username'];
        $user_pass = $_POST['password'];
        $que = "select * from user_login where user_id='$user_name' AND user_pass='$user_pass'";
        $run = mysql_query($que);
        if(mysql_num_rows($run)>0){
            header('location:student_homepage.php?details='.$user_name);
        } else {
            echo "<script>alert('Password or username is incorrect!')</script>";
        }
    }        
?>

<!DOCTYPE html>
<html>
<head>
  	<meta charset="UTF-8">
  	<title>User Login</title>
    <link rel="stylesheet" href="style/login_style.css"media="screen" type="text/css" />
</head>

<body>
  	<span class="button" id="toggle-login">User Log in</span>
	<div id="login">
  	<div id="triangle"></div>
  	<h1>Log in</h1>
  	<form action="login.php" method="post">
    	<input type="text" placeholder="Enrollment No." name="username" />
    	<input type="password" placeholder="Password" name="password" />
    	<input type="submit" name="login" value="Log in" />
  	</form>
	</div>

  	<script src='http://codepen.io/assets/libs/fullpage/jquery.js'></script>
  	<script src="js/login_index.js"></script>
</body>
</html>

