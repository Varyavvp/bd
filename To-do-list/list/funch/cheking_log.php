<?php
	require_once '../conn.php';
	if($_GET['ID_t'] && $_GET['task_id'] ){
		$task_id = $_GET['task_id'];
		$id=$_GET['ID_t'];
		$conn->query(
		"DELETE FROM `task_i` WHERE `task_i`.`id` = $task_id") 
		or die(mysqli_errno($conn));
		header("location: ../index.php?ID_t=$id");
	}	
?>