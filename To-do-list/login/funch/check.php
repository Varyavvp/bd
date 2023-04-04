<?php

$login = filter_var(
    trim($_POST['login']),
     FILTER_SANITIZE_STRING);
$pass = filter_var(
    trim($_POST['password']),
    FILTER_SANITIZE_STRING);
$mysqli = new mysqli("localhost", "u0941340_pva","eS2gT8aG0fzD5jM1", "u0941340_pva");
$res_query = $mysqli->query("SELECT * FROM `users-list` 
WHERE `login` ='$login'");
$user = $res_query->fetch_assoc();
if(!$user) {
    echo "Такой пользователь не найден";
    exit();
}

$fk = $user['id'];

$mysqli->close();
header("location: http://dev.rea.hrel.ru/PVA/To-do-list/list/index.php?ID_t=$fk");


?>