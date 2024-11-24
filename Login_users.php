<?php session_start(); ?>
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
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }


        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f4f4f4;
        }

        header>div>img {
            border: 1px solid #45a049;
            object-fit: contain;
            width: 100%;
            margin-left: -3px;
            height: 561.5px;
            border-radius: 5px;
        }

        header>div>h1 {

            position: absolute;
            text-transform: uppercase;
            margin-left: 100px;
            margin-top: 30px;
        }

        section {
            background-color: #ffffff;
            width: 400px;
            padding: 20px;
            height: 562px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333333;
        }

        form input[type="text"],
        form input[type="password"] {
            width: 100%;
            padding: 10px;
            margin: 15px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
            outline: none;
        }

        form input:focus {
            border: 1px solid #4CAF50;
        }

        form input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            font-size: 16px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 30px;
        }

        form input[type="submit"]:hover {
            background-color: #45a049;
        }

        .options {
            text-align: center;
            margin-top: 10px;
        }

        .options a {
            text-decoration: none;
            color: #4CAF50;
            font-size: 14px;
        }

        .options a:hover {
            text-decoration: underline;
        }

        #showPass {
            position: absolute;
            cursor: pointer;
            margin-left: -30px;
            margin-top: 25px;
            width: 20px;
            height: 20px;
        }
    </style>
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
                <input type="password" placeholder="Password" name="password" id="password">
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