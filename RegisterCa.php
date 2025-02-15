<?php session_start() ?>
<?php
require "models/config.php";
require "models/db.php";
require "models/Users.php";

$thongtin = new Users_shoes;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="Website icon" type="jpg" href="public/img/logoShoes.jpg">
    <link rel="stylesheet" href="./Component/css/register.css">
</head>

<body>
    <div class="registration-container">
        <h1>Register</h1>
        <form method="POST">
            <input type="text" name="nameUser" class="input-field" placeholder="My name" required><br>
            <input type="text" name="username" class="input-field" placeholder="Username" required><br>
            <input type="email" name="email" class="input-field" placeholder="Email" required><br>
            <input type="password" name="password" class="input-field" placeholder="Password" required><br>
            <input type="password" name="confirm_password" class="input-field" placeholder="Confirm Password"
                required><br>
            <button type="submit" class="btn" name="submit">Register</button>


        </form>
        <div class="link-buttons">
            <button class="link-button" onclick="window.location.href='login.php'">Back to Login</button>
            <button class="link-button" onclick="window.location.href='change_password.php'">Change Password</button>
        </div>
    </div>
    <?php
    if (isset($_POST['submit'])) {
        $nameUser = $_POST['nameUser'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $comfirm = $_POST['confirm_password'];
        $_SESSION['email_id'] = $_POST['email'];

        if ($password !== $comfirm) {
            echo "<p style='color:red; text-align:center;'> mật khẩu mới không trùng nhau</p";
        } else 
                if ($thongtin->checkusername($username)) {
            echo "<p style='color:red; text-align:center;'>tên đăng nhập đã tồn tại.</p";
        } else if ($thongtin->checkemail($email)) {
            echo "<p style='color:red; text-align:center;'>email đã tồn tại</p";
        } else {
            // Gọi phương thức dangki và lưu kết quả
            $dangki = $thongtin->Register($nameUser, $username, $password, $email);
            header("location:Login_users.php");
            echo "<p style='color:red; text-align:center;'>đăng kí thành công</p";
        }
    }
    ?>
</body>

</html>