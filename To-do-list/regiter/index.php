<!DOCTYPE html>
<html lang="en">

<head>
	<title>Регистрация</title>
	<meta charset="UTF-8">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico" />
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<!--===============================================================================================-->
</head>

<body>
	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/images.jpg');">
			<div class="wrap-login100">
		
				
			<form method="POST" class="form-inline" action="funch/check.php">
				
                    <span class="login100-form-title p-b-34 p-t-27">
                        регистрация
                        </span>
</br>              
<div class="wrap-input100 validate-input" data-validate = "Enter username">
                            <input type="text" class="input100" name="login" placeholder="Введите логин"  required/><br>	
								</div>

								<div class="wrap-input100 validate-input" data-validate="Enter password">
								<input type="password" class="input100" name="password" placeholder="Введите пароль"  required/><br>
							</div>

							<div class="container-login100-form-btn">
                            <button class="login100-form-btn" name="add" >Зарегистрировaтся</button>
							</div>
</br>
					<div class="text-center p-t-90">

							<a class="txt1" href="../login/index.php" >Уже зарегистрирован?</a>
</div>

				</form>
			</div>
		</div>
	</div>


	<div id="dropDownSelect1"></div>
	<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>

</html>