<?php
session_start();
require 'users.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $pass = $_POST['pass'];

    if (isset($users[$email]) && $users[$email]['password'] === $pass) {
        $_SESSION['user'] = $email;
        $_SESSION['access'] = $users[$email]['access'];
        header("Location: dashboard.php");
        exit();
    } else {
        $error = "Invalid login credentials!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Client Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="login-assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="login-assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="login-assets/vendor/animate/animate.css">
    <link rel="stylesheet" type="text/css" href="login-assets/vendor/css-hamburgers/hamburgers.min.css">
    <link rel="stylesheet" type="text/css" href="login-assets/vendor/select2/select2.min.css">
    <link rel="stylesheet" type="text/css" href="login-assets/css/util.css">
    <link rel="stylesheet" type="text/css" href="login-assets/css/main.css">
</head>
<body>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="login-assets/images/img-01.png" alt="IMG">
                </div>

                <form class="login100-form validate-form" method="POST" action="login.php">
                    <span class="login100-form-title">Member Login</span>

                    <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                        <input class="input100" type="text" name="email" placeholder="Email">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100" type="password" name="pass" placeholder="Password">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-lock" aria-hidden="true"></i>
                        </span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">Login</button>
                    </div>

                    <?php if (isset($error)): ?>
                        <div style="color:red;text-align:center;margin-top:15px;">
                            <?= htmlspecialchars($error) ?>
                        </div>
                    <?php endif; ?>

                </form>
            </div>
        </div>
    </div>

    <script src="login-assets/vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="login-assets/vendor/bootstrap/js/popper.js"></script>
    <script src="login-assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="login-assets/vendor/select2/select2.min.js"></script>
    <script src="login-assets/vendor/tilt/tilt.jquery.min.js"></script>
    <script>
        $('.js-tilt').tilt({ scale: 1.1 })
    </script>
    <script src="login-assets/js/main.js"></script>
</body>
</html>
