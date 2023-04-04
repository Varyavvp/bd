<?php
    require_once '../conn.php';
    if($_GET['id'] && $_GET['tig']){
    if(ISSET($_POST['add'])){
		if($_POST['task'] != "" ){
    $id = $_POST['id'];
    $id_t= $_GET['tig'];
    $task = $_POST['task'];

   
    $conn->query("UPDATE `task_i` SET `task` = '$task' WHERE `task_i`.`id` = $id") ;

    header("location: ../index.php?ID_t=$id_t");
        }
    }
}
    
?>