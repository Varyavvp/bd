<?php 
include_once("db_connect.php");
include_once("config.php");
include_once("err_handler.php");

include_once("functions.php");

include_once("find_token.php");




if(!isset($_GET['type'])) {
    echo ajax_echo(
        "Ошибка!", // Заголовок ответа
        "Вы не указали GET параметр type", // Описание ответа
        true, // Наличие ошибка
        "ERROR", // Результат ответа
        null // Дополнительные данные для ответа
    );
    exit();
}

// Операции на вывод записей //

if(preg_match_all("/^(list_cats)$/ui", $_GET['type'])){
   
    $query = "SELECT `id`,  `first_name` FROM `cats`";
   
    $res_query = mysqli_query($connection, $query);
    if(!$res_query){
        echo ajax_echo(
            "Ошибка!", 
            "Ошибка в запросе", 
            true, 
            "ERROR", 
            null 
        );
        exit();
    }
    $arr_list = array();
    $rows = mysqli_num_rows($res_query);
    for ($i=0; $i < $rows; $i++) { 
        $row = mysqli_fetch_assoc($res_query);
        array_push($arr_list, $row);
    }   
    echo ajax_echo(
        "Список кошек", 
        "Вывод списка кошек", 
        false, 
        "SUCCESS", 
        $arr_list 
    );

    exit();
}

if(preg_match_all("/^(list_cat_info)$/ui", $_GET['type'])){
   
    $query = "SELECT `id`, `species`, `price` FROM `cat_info`";
    
    $res_query = mysqli_query($connection, $query);
    if(!$res_query){
        echo ajax_echo(
            "Ошибка!", 
            "Ошибка в запросе", 
            true, 
            "ERROR", 
            null 
        );
        exit();
    }
    $arr_list = array();
    $rows = mysqli_num_rows($res_query);

    for ($i=0; $i < $rows; $i++) { 
        $row = mysqli_fetch_assoc($res_query);
        array_push($arr_list, $row);
    } 
    echo ajax_echo(
        "Список пород", // Заголовок ответа
        "Вывод списка пород", // Описание ответа
        false, // Наличие ошибка
        "SUCCESS", // Результат ответа
        $arr_list // Дополнительные данные для ответа
    );
    exit();
}

if(preg_match_all("/^(list_cat_ purchase)$/ui", $_GET['type'])){

    $query = "SELECT `cat_ purchase`.`id`, `cat_info`.`species`, `cats`.`first_name` FROM `cat_ purchase` 
    INNER JOIN `cats` ON `cat_id`=`cats`.`id`
    INNER JOIN `cat_info` ON `cat_info_id`=`cat_info`.`id` ";

    $res_query = mysqli_query($connection, $query);

    if(!$res_query){
        echo ajax_echo(
            "Ошибка!", 
            "Ошибка в запросе",
            true, 
            "ERROR", 
            null 
        );
        exit();
    }
 
   
    $arr_list = array();
    $rows = mysqli_num_rows($res_query);

    for ($i=0; $i < $rows; $i++) { 
        $row = mysqli_fetch_assoc($res_query);
        array_push($arr_list, $row);
    }
   
    echo ajax_echo(
        "Список котов, которых привезли", 
        "Вывод списка поступивших котов", 
        false, 
        "SUCCESS", 
        $arr_list 
    );

    exit();
}

if(preg_match_all("/^(list_comments)$/ui", $_GET['type'])){
    $query = "SELECT `comments`.`id`, `cats`.`first_name`, `comment` FROM `comments` 
    INNER JOIN `cats` ON `cat_id`=`cats`.`id`";
    $res_query = mysqli_query($connection, $query);

    if(!$res_query){
        echo ajax_echo(
            "Ошибка!",
            "Ошибка в запросе", 
            true, 
            "ERROR", 
            null 
        );
        exit();
    }

    $arr_list = array();
    $rows = mysqli_num_rows($res_query);

    for ($i=0; $i < $rows; $i++) { 
        $row = mysqli_fetch_assoc($res_query);
        array_push($arr_list, $row);
    }

    
    echo ajax_echo(
        "Список комментариев", 
        "Вывод списка комментариев", 
        false, 
        "SUCCESS", 
        $arr_list 
    );
    exit();
}

if(preg_match_all("/^(list_api)$/ui", $_GET['type'])){
    $query = "SELECT `id`, `date_of_created` FROM `api`";
    $res_query = mysqli_query($connection, $query);

    if(!$res_query){
        echo ajax_echo(
            "Ошибка!",
            "Ошибка в запросе", 
            true, 
            "ERROR", 
            null 
        );
        exit();
    }

    $arr_list = array();
    $rows = mysqli_num_rows($res_query);

    for ($i=0; $i < $rows; $i++) { 
        $row = mysqli_fetch_assoc($res_query);
        array_push($arr_list, $row);
    }

    
    echo ajax_echo(
        "Список токенов", 
        "Вывод списка токенов", 
        false, 
        "SUCCESS", 
        $arr_list 
    );

    exit();
}

// Операции на добавление новых записей //

else if(preg_match_all("/^(add_cats)$/ui", $_GET['type'])){
    if(!isset($_GET['first_name'])) {
        echo ajax_echo(
            "Ошибка!", 
            "Вы не указали GET параметр gender_name", 
            true, 
            "ERROR", 
            null // 
        );
        exit();
    }
    if(!isset($_GET['gender'])) {
        echo ajax_echo(
            "Ошибка!",
            "Вы не указали GET параметр gender", 
            true, 
            "ERROR", 
            null 
        );
        exit();
    }
    if(!isset($_GET['age'])) {
        echo ajax_echo(
            "Ошибка!", 
            "Вы не указали GET параметр age", 
            true, 
            "ERROR", 
            null 
        );
        exit();
    }
    $query = "INSERT INTO `cats`(
         `first_name`, 
         `gender`,
         `age`) VALUES (
             '". $_GET['first_name'] ."',
             '". $_GET['gender'] ."',
             '". $_GET['age'] ."'
             )";
    $res_query = mysqli_query($connection, $query);

    if(!$res_query){
        echo ajax_echo(
            "Ошибка!", 
            "Ошибка в запросе", 
            true, 
            "ERROR", 
            null 
        );
        exit();
    }
    echo ajax_echo(
        "Успех!",
        "Новый кот успешно добавлен в базу данных", 
        false, 
        "SUCCESS", 
        null 
    );
    exit();
}

else if(preg_match_all("/^(add_cat_info)$/ui", $_GET['type'])){
    if(!isset($_GET['species'])) {
        echo ajax_echo(
            "Ошибка!", 
            "Вы не указали GET параметр species", 
            true, 
            "ERROR", 
            null 
        );
        exit();
    }
    if(!isset($_GET['price'])) {
        echo ajax_echo(
            "Ошибка!", 
            "Вы не указали GET параметр price", 
            true, 
            "ERROR", 
            null 
        );
        exit();
    }
    $query = "INSERT INTO `cat_info`(`species`, `price`) VALUES ('" . $_GET['species'] . "', '". $_GET['price'] ."')";
    $res_query = mysqli_query($connection, $query);

    if(!$res_query){
        echo ajax_echo(
            "Ошибка!", 
            "Ошибка в запросе", 
            true, 
            "ERROR", 
            null 
        );
        exit();
    }

    echo ajax_echo(
        "Успех!", 
        "Новая порода успешно добавлена в базу данных", 
        false, 
        "SUCCESS", 
        null 
    );
    exit();
}

else if(preg_match_all("/^(add_comment)$/ui", $_GET['type'])){
    
    if(!isset($_GET['cat_info_id'])) {
        echo ajax_echo(
            "Ошибка!", 
            "Вы не указали GET параметр cat_info_id", 
            true, 
            "ERROR", 
            null 
        );
        exit();
    }
    if(!isset($_GET['cat_id'])) {
        echo ajax_echo(
            "Ошибка!", // Заголовок ответа
            "Вы не указали GET параметр cat_id", // Описание ответа
            true, // Наличие ошибка
            "ERROR", // Результат ответа
            null // Дополнительные данные для ответа
        );
        exit();
    }
    if(!isset($_GET['comment'])) {
        echo ajax_echo(
            "Ошибка!", // Заголовок ответа
            "Вы не указали GET параметр comment", // Описание ответа
            true, // Наличие ошибка
            "ERROR", // Результат ответа
            null // Дополнительные данные для ответа
        );
        exit();
    }

    $query = "INSERT INTO `comments`(`cat_info_id`, `cat_id`, `comment`) VALUES ('" . $_GET['cat_info_id'] . "', '". $_GET['cat_id'] ."', '". $_GET['comment'] ."')";
    $res_query = mysqli_query($connection, $query);

    if(!$res_query){
        echo ajax_echo(
            "Ошибка!", // Заголовок ответа
            "Ошибка в запросе", // Описание ответа
            true, // Наличие ошибка
            "ERROR", // Результат ответа
            null // Дополнительные данные для ответа
        );
        exit();
    }

    echo ajax_echo(
        "Успех!", // Заголовок ответа
        "Новый коментарий о питомце успешно добавлен в базу данных", // Описание ответа
        false, // Наличие ошибка
        "SUCCESS", // Результат ответа
        null // Дополнительные данные для ответа
    );
    exit();
}

// Операции на редактирование записей //

else if(preg_match_all("/^(upd_cats)$/ui", $_GET['type'])){
    if(!isset($_GET['first_name'])) {
        echo ajax_echo(
            "Ошибка!", // Заголовок ответа
            "Вы не указали GET параметр first_name", // Описание ответа
            true, // Наличие ошибка
            "ERROR", // Результат ответа
            null // Дополнительные данные для ответа
        );
        exit();
    }
    if(!isset($_GET['gender'])) {
        echo ajax_echo(
            "Ошибка!", // Заголовок ответа
            "Вы не указали GET параметр gender_name", // Описание ответа
            true, // Наличие ошибка
            "ERROR", // Результат ответа
            null // Дополнительные данные для ответа
        );
        exit();
    }
    if(!isset($_GET['age'])) {
        echo ajax_echo(
            "Ошибка!", // Заголовок ответа
            "Вы не указали GET параметр age", // Описание ответа
            true, // Наличие ошибка
            "ERROR", // Результат ответа
            null // Дополнительные данные для ответа
        );
        exit();
    }
   
        if(!isset($_GET['id'])) {
            echo ajax_echo(
                "Ошибка!", // Заголовок ответа
                "Вы не указали GET параметр id", // Описание ответа
                true, // Наличие ошибка
                "ERROR", // Результат ответа
                null // Дополнительные данные для ответа
        );
        exit();
    }
    $query = "UPDATE `cats` SET 
        `first_name` = '". $_GET['first_name'] ."',       
        `gender` = '". $_GET['gender'] ."',
        `age` = '". $_GET['age'] ."',
        WHERE `id` = '". $_GET['id'] ."'";
    $res_query = mysqli_query($connection, $query);

    if(!$res_query){
        echo ajax_echo(
            "Ошибка!", // Заголовок ответа
            "Ошибка в запросе.", // Описание ответа
            true, // Наличие ошибка
            "ERROR", // Результат ответа
            null // Дополнительные данные для ответа
        );
        exit();
    }

    echo ajax_echo(
        "Успех!", // Заголовок ответа
        "Обновление информации о коте прошло успешно", // Описание ответа
        false, // Наличие ошибка
        "SUCCESS", // Результат ответа
        null // Дополнительные данные для ответа
    );
    exit();
}

else if(preg_match_all("/^(upd_cat_info)$/ui", $_GET['type'])){
    if(!isset($_GET['species'])) {
        echo ajax_echo(
            "Ошибка!", // Заголовок ответа
            "Вы не указали GET параметр species", // Описание ответа
            true, // Наличие ошибка
            "ERROR", // Результат ответа
            null // Дополнительные данные для ответа
        );
        exit();
    }
    if(!isset($_GET['price'])) {
        echo ajax_echo(
            "Ошибка!", // Заголовок ответа
            "Вы не указали GET параметр price", // Описание ответа
            true, // Наличие ошибка
            "ERROR", // Результат ответа
            null // Дополнительные данные для ответа
        );
        exit();
    }
        if(!isset($_GET['id'])) {
            echo ajax_echo(
                "Ошибка!", // Заголовок ответа
                "Вы не указали GET параметр id", // Описание ответа
                true, // Наличие ошибка
                "ERROR", // Результат ответа
                null // Дополнительные данные для ответа
        );
        exit();
    }
    $query = "UPDATE `cat_info` SET `species` = '". $_GET['species'] ."', `price` = '". $_GET['price'] ."' WHERE `id` = '". $_GET['id'] ."'";
    $res_query = mysqli_query($connection, $query);

    if(!$res_query){
        echo ajax_echo(
            "Ошибка!", // Заголовок ответа
            "Ошибка в запросе", // Описание ответа
            true, // Наличие ошибка
            "ERROR", // Результат ответа
            null // Дополнительные данные для ответа
        );
        exit();
    }

    echo ajax_echo(
        "Успех!", // Заголовок ответа
        "Обновление информации о породе прошло успешно", // Описание ответа
        false, // Наличие ошибка
        "SUCCESS", // Результат ответа
        null // Дополнительные данные для ответа
    );
    exit();
}

else if(preg_match_all("/^(upd_cat_ purchase)$/ui", $_GET['type'])){

    if(!isset($_GET['cat_info_id'])) {
        echo ajax_echo(
            "Ошибка!", // Заголовок ответа
            "Вы не указали GET параметр cat_info_id", // Описание ответа
            true, // Наличие ошибка
            "ERROR", // Результат ответа
            null // Дополнительные данные для ответа
        );
        exit();
    }
    if(!isset($_GET['cat_id'])) {
        echo ajax_echo(
            "Ошибка!", // Заголовок ответа
            "Вы не указали GET параметр cat_id", // Описание ответа
            true, // Наличие ошибка
            "ERROR", // Результат ответа
            null // Дополнительные данные для ответа
        );
        exit();
    }
    if(!isset($_GET['id'])) {
        echo ajax_echo(
        "Ошибка!", // Заголовок ответа
        "Вы не указали GET параметр id", // Описание ответа
        true, // Наличие ошибка
        "ERROR", // Результат ответа
        null // Дополнительные данные для ответа
        );
        exit();
    }
    $query = "UPDATE `cat_ purchase` SET `cat_info_id` = '". $_GET['cat_info_id'] ."', `cat_id` = '". $_GET['cat_id'] ."' WHERE `id` = '". $_GET['id'] ."'";
    $res_query = mysqli_query($connection, $query);

    if(!$res_query){
        echo ajax_echo(
            "Ошибка!", // Заголовок ответа
            "Ошибка в запросе", // Описание ответа
            true, // Наличие ошибка
            "ERROR", // Результат ответа
            null // Дополнительные данные для ответа
        );
        exit();
    }

    echo ajax_echo(
        "Успех!", // Заголовок ответа
        "Обновление информации о поступившем коте прошло успешно", // Описание ответа
        false, // Наличие ошибка
        "SUCCESS", // Результат ответа
        null // Дополнительные данные для ответа
    );
    exit();
}


$res=mysqli_query($db,"INSER INTO logs (date,ip) VALUES ('".time()."',INET_ATON('".$_SERVER['REMOTE_ADDR']."'))"); 

