<!-- TEST -->
<?php 
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_POST['username'] === " " && $_POST['password'] === " ") {
        $_SESSION['username'] = $_POST['username'];
        header("Location: ../../index.php");
        exit();
    } else {
        $error_message = "Неверный логин или пароль";
    }
}
?>
<!-- TEST -->
 
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Авторизация</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
    <body>
        <div class="limiter">
            <div class="container-login100" style="background-image: url('images/bg-01.jpg');">
                <div class="wrap-login100 p-t-30 p-b-50">
                    <span class="login100-form-title p-b-41">
                        Авторизация
                    </span>
                    <?php if (isset($error_message)): ?>
                        <p class="error"><?php echo $error_message; ?></p>
                    <?php endif; ?>
                    <div class="login100-form validate-form p-b-33 p-t-5">
                        <form method="POST">
                            <div class="wrap-input100 validate-input">
                            <input class="input100" type="text" placeholder="Логин" name="username" />
                                <span class="focus-input100" data-placeholder="&#xe82a;"></span>
                            </div>

                            <div class="wrap-input100 validate-input">
                                <input class="input100" type="password" placeholder="Пароль" name="password" />
                                <span class="focus-input100" data-placeholder="&#xe80f;"></span>
                            </div>

                            <div class="container-login100-form-btn m-t-32">
                                <button class="login100-form-btn" type="submit" value="Войти">Войти</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>