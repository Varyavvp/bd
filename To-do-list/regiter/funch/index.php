<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-
scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@opмa регистрачии</title>
</head>

<body>
    <div class="container mt-4">
        <h1>Форма регистрации</h1>
        <form action="funch/check.php" method="post">
            <input type="text" class="form-control" name="login" id="login" placeholder="Введите логин"><br>
            <input type="password" class="form-control" name="pass" id="pass" placeholder="Введите пароль"><br>
            <button class="btn btn-success" type="submit">зарегистрировaтb</button>
        </form>
    </div>
</body>