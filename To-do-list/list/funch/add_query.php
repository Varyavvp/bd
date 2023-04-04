<?php
require_once '../conn.php';
if($_GET['id']){
	if(ISSET($_POST['add'])){
		if($_POST['task'] != "" ){
			$task = $_POST['task'];
		    $id= $_GET['id'];
			$conn->query("INSERT INTO `task_i`(`id_users`,`task`) VALUES ('$id','$task')");
			
			header("location: ../funch/Coc.php?ID_t=$id&task=$task");;
		}
	}
}

?>
