<!DOCTYPE html>
<?
// include_once("funch/cheking_log.php")?>
<html lang="ru">

<head>
	<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1" />
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>

<body>

	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/images.jpg');">
			<div class="wrap-login100">

				
					<h3 class="text-primary">Список дел</h3>
					<div class="search">
						<input type="text" class="searchTerm" placeholder="Type">
						<button type="submit" class="searchButton">
						🔍︎
						</button>
					<form action="funch/up.php?id=<?=$_GET['ID_t']?>">
					<button type="submit" class="Buttonclick">
					↑
						</button>
</form>
<form action="funch/down.phpid=<?= $_GET['ID_t'] ?>">
						<button type="submit" class="Buttonclick">
						↓
						</button>
</form>
						</div>
						<form method="POST" class="form-inline" action="funch/add_query.php?id=<?= $_GET['ID_t'] ?>">
					<hr style="border-top:1px dotted #ccc;" />
					<div class="col-md-2"></div>
					<div class="container-login100-form-btn">
						<center>

							<br />
							
							<table class="table"  class="sort">
								<thead>
									<tr>
										<th>№</th>
										<th><a href="funch/add_query.php?id=<?= $_GET['ID_t'] ?>&sortnum=<?= $sort?>">Задача</a></th>
										<th><a href="funch/add_query.php?id=<?= $_GET['ID_t'] ?>&sortnum=<?= $sort?>">Статус</a></th>
										<th><a href="funch/add_query.php?id=<?= $_GET['ID_t'] ?>&sortnum=<?= $sort?>">Дата</a></th>
									</tr>
								</thead>
								<tbody>
									<?php
									require 'conn.php';
									$id = $_GET['ID_t'];
									$sort = $fetch;
									$query = $conn->query("SELECT * FROM `task_i` WHERE `id_users` =  '$id' ");
									$count = 1;
									while ($fetch = $query->fetch_array()) {

										?>

										<?php
										require 'conn.php';
										$query = $conn->query("SELECT * FROM `task_i` WHERE `id_users` =  $id ");
										$count = 1;
										while ($fetch = $query->fetch_assoc()) {
											$id_tk = $fetch['id'];
											$query2 = $conn->query("SELECT * FROM `STATUS` WHERE `id_t` =  $id_tk ");
											$fetch2 = $query2->fetch_array()
												?>
											<tr>
												<td>
													<?php echo $count++ ?>
												</td>
												<td contenteditable='true'>
													<?php echo $fetch['task'] ?>
												</td>
												<td>
													<?php

													echo ($fetch2['position'])

														?>
												</td>
												<td contenteditable='true'>
												<?php echo $fetch['CreatedAt']?>
												</td>

												<td colspan="2">
													<center>

														<a href="funch/update_task.php?id=<?= $fetch['id'] ?>&tig=<?= $fetch['id_users'] ?>"
															class="link">✓</a>

														<a href="funch/unupdate_task.php?id=<?= $fetch['id'] ?>&tig=<?= $fetch['id_users'] ?>"
															class="link">☓</a>

														<a href="funch/retext_task.php?id=<?= $fetch['id'] ?>&tig=<?= $fetch['id_users'] ?>"
															class="link">✎</a>

														<a href="funch/delete_query.php?id=<?= $fetch['id'] ?>&tig=<?= $fetch['id_users'] ?>"
															class="link">
															🗑️
														</a>
													</center>
												</td>
											</tr>
											<?}?>
										<?php } ?>
									
								</tbody>
							</table>
							<div>
								<h4>Добавить задачу</h4>
								<input type="text" class="form-control" name="task" required />
								</br></br>
								<div class="container-login100-form-btn">
									<button class="login100-form-btn" name="add">
										+
									</button>
								</div>
								<div class="text-center p-t-90">
									<a class="txt1" href="../login/index.php">
										Выйти
									</a>
								</div>
							</div>
					</div>
			</div>

		</div>
</body>

</html>