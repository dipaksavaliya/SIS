<?php
	include 'connection.php';
	$delete_record = $_GET['del'];
	$que = "delete from s_data where s_id = '$delete_record'";
	if(mysql_query($que)){
		echo "<script>window.open('view.php','_self')</script>";
	}
?>