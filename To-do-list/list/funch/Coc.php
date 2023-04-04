<?php
require_once '../conn.php';
if($_GET['ID_t']){
$task = $_GET['task'];
$id= $_GET['ID_t'];


$res_query = $conn->query("SELECT `id` FROM `task_i` WHERE `task` = '$task'");

$task_i = $res_query->fetch_assoc();

$id_t = $task_i['id'];


$conn->query("INSERT INTO `STATUS`( `id_t`, `position`) VALUES ('$id_t', 'NONE')");

header("location: ../index.php?ID_t=$id");

}

?>