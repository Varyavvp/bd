<?php
	require_once '../conn.php';
 
	if($_GET['id'] && $_GET['tig'] ){
		$task_id = $_GET['id'];
		$id=$_GET['tig'];
 		$conn->query("UPDATE `STATUS` SET `position`='NONE' WHERE `id_t` = $task_id") or die(mysqli_errno($conn));
		 header("location: ../index.php?ID_t=$id");
	}
?>