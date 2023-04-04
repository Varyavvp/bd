<?php
	require_once '../conn.php';
	if($_GET['id']  ){
		$id=$_GET['id'];   

 
/* Проверка GET-переменной*/
$sort = @$_GET['sort'];
if (array_key_exists($sort, $sort_list)) {
	$sort_sql = $sort_list[$sort];
} else {
	$sort_sql = reset($sort_list);
}
 
/* Запрос в БД */
$sth = $conn->query("SELECT * FROM `task_i` ORDER BY `task_i`.`CreatedAt` ASC") or die(mysqli_errno($conn));;
$list = $sth->fetch_assoc();

 

header("location ../index.php");
    }
?>