
<?php
       require_once '../conn.php';
        if($_GET['id'] && $_GET['tig'] ){
	    $task_id = $_GET['id'];
	    $id=$_GET['tig'];
 		$res_query = $conn->query("SELECT * FROM `task_i` where `id` = $task_id") or die(mysqli_errno($conn));
	    $task = $res_query->fetch_array();
		//header('location: ..//index.php');
		}

?> 
<!DOCTYPE html>
<html>
	<head>
	    <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
		<meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
      	<link rel="stylesheet" type="text/css" href="../css/main2.css">
		<title>Переименовать</title>
	</head>
	<body>
	<div class="container-login100" style="background-image: url('images/images.jpg');">
	<nav class="navbar navbar-default">
	</nav>
   <div class="limiter">
	<div class="wrap-login100">
	<h3 class="text-primary">Изменить задание</h3></br>
	<div class="search">
		<form method="POST" class="form-inline" action='../funch/rename.php?id=<?=$_GET['id']?>&tig=<?=$_GET['tig']?>'>
		<input type="hidden" name="id" value="<?=$task['id']?>">
		<input  class="form-control" type="text" name="task" value="<?=$task['task']?>"></br>
	</br>
		<button class="login100-form-btn" type="sumbit" name="add">Изменить</button>
	</form>
	</div>
      </div>
    </div>
	</body>
</html>
