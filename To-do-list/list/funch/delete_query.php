<?php
	require_once '../conn.php';
	if($_GET['id'] && $_GET['tig'] ){
		$task_id = $_GET['id'];
		$id=$_GET['tig'];
		$conn->query(
		"DELETE FROM `STATUS` WHERE `id_t` = $task_id") 
		or die(mysqli_errno($conn));
		
		header("location: ../funch/cheking_log.php?ID_t=$id&task_id=$task_id");
	}	
?>