<?php

include_once("config.php");
include_once("db_connect.php");
    $login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
    $pass = filter_var(trim($_POST['password']),FILTER_SANITIZE_STRING);
    $has_pass = password_hash($pass, PASSWORD_DEFAULT);

    if (mb_strlen($login) < 5 || mb_strlen($login) > 90) {
        echo "Недоспутимая длина логина";
        exit();
    } else if (mb_strlen($pass) < 3 || mb_strlen($pass) > 50) {
        echo "Недоспутимая длина пароля";
        exit();
    }
    $mysqli = new mysqli("localhost", "u0941340_pva","eS2gT8aG0fzD5jM1", "u0941340_pva");
    $res_query = $mysqli->query("SELECT * FROM `users-list` 
    WHERE `login` ='$login'");
    $user = $res_query->fetch_array();
       if($user) {
        echo ("Извините, введённый вами логин уже зарегистрирован. Введите другой логин.");
       }
else{
$string = $_POST['login'];
$chr_ru = "А-Яа-яЁё0-9\s`~!@#$%^&*()_+-={}|:;<>?,.\/\"\'\\\[\]";
    if (preg_match("/^[$chr_ru]+$/u", $string)) 
{
    echo ("Введите логин латинскими буквами");
}
else{
$query =  ("INSERT INTO `users-list` (`login`, `password`)
values('$login', '$has_pass')");
$res_query = mysqli_query($connection, $query);
  echo('регистрация прошла успешно');
    //header('location:../index.php');
    }
}

?>