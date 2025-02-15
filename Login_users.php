<?php session_start(); ?>
<?php
if (isset($_SESSION['username'])) {
    header("location: User_ID.php");
}
?>
<?php
require 'models/config.php';
require 'models/Db.php';
require 'models/Users.php';



$login = new Users_shoes;

?>
<?php

if (isset($_POST['Login'])) {

    $tk = $_POST['username'];
    $mk = $_POST['password'];

    $checkLG = $login->CheckLogin($tk, $mk);

    if (empty($tk) || empty($mk)) {
        echo "<div style='color: red;
        text-align: center;
        position: absolute;
        margin-left: 570px;
        margin-top: -140px'>Username or password empty!</div>";
    } else if ($checkLG) {
        $_SESSION['username'] = $tk;
        $emailUser =  $login->GetEmailUser($tk);

        $_SESSION['userEmail'] = $emailUser[0]['email_id'];

        header("location: index.php");
        exit();
    } else {
        echo "<div style='color: red;
        text-align: center;
        position: absolute;
        margin-left: 570px;
        margin-top: -140px'>Username or password wrong!</div>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="Website icon" type="jpg" href="public/img/logoShoes.jpg">
    <link rel="stylesheet" href="./Component/css/login_uses.css">
</head>

<body>
    <header>
        <div>
            <h1>Welcome to shoe our</h1>
            <img src="https://htmldemo.net/james/james/img/product/25.png" alt="">
        </div>
    </header>
    <section>
        <h1>Login</h1>
        <form action="" method="POST">
            <input type="text" placeholder="Username" name="username">
            <div style="position: relative;">
                <input type="password" class="form-control" placeholder="Password" name="password" id="password">
                <img id="showPass"
                    src="https://static.vecteezy.com/system/resources/previews/022/782/488/non_2x/hidden-icon-visible-invisible-icon-eye-icon-look-and-vision-hide-unhide-symbol-human-eye-magic-eye-cross-symbol-sencitive-content-see-unsee-incognito-mood-blind-sign-free-vector.jpg"
                    alt="Show Password">
            </div>
            <input type="submit" name="Login" value="Login">
            <div class="options">
                <a href="ChangPassword.php">Forgot password?</a><br>
                <a href="RegisterCa.php">Register</a>
            </div>
            <div>
                <a href="index.php">Turn back</a>
            </div>
        </form>
        <!-- js -->
        <script>
            const showPass = document.getElementById('showPass');
            const passwordField = document.getElementById('password');


            showPass.addEventListener('click', () => {
                // Ngừng hành động mặc định của sự kiện để tránh reload trang
                if (passwordField.type === 'password') {
                    passwordField.type = 'text';
                    showPass.src =
                        "https://static.vecteezy.com/system/resources/previews/006/082/476/non_2x/preview-show-interface-icon-free-vector.jpg"
                } else {
                    passwordField.type = 'password';
                    showPass.src =
                        "https://static.vecteezy.com/system/resources/previews/022/782/488/non_2x/hidden-icon-visible-invisible-icon-eye-icon-look-and-vision-hide-unhide-symbol-human-eye-magic-eye-cross-symbol-sencitive-content-see-unsee-incognito-mood-blind-sign-free-vector.jpg"
                }
            });
        </script>
        <!-- endJs -->
    </section>
</body>

</html>