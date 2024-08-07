<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

function logout() {
    session_destroy();
    header("Location: login.php");
    exit();
}

if (isset($_POST['logout'])) {
    logout();
}
?>

<!DOCTYPE html>
<html>
    <link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<head>
    <link rel="stylesheet" href="style2.css">
    <meta charset="utf-8" />
    <title>Успешная авторизация</title>
    <meta charset="utf-8">
</head>
<body>
    <div class="container-login100" style="background-image: url('images/bg-01.jpg');">
        <div class="success-content">
            <h2>Успешная авторизация</h2>
            <div class="content">
                <p class="p">Вы успешно авторизированы!</p>
                <form method="post">
                    <button class="logout" name="logout" type="submit">Выйти</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
