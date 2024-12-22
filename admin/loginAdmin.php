<?php

session_start();
include "../models/config.php";
include "../models/Db.php";
include "code_admin.php";

$admin = new Admin;

?>
<?php

if (isset($_GET['send'])) {

    $_SESSION['admin'] = $_GET['email_id'];
    $admin123 = $_SESSION['admin'];

    if ($admin->CheckLoginAdmin($admin123)) {

        header("location: quanlisanpham.php");
    } else {
        echo "err";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="Website icon" type="jpg" href="../public/img/logoShoes.jpg">
    <title>Document</title>
</head>
<style>
    /* Container cho form */
    .login-container {
        width: 100%;
        max-width: 400px;
        margin: 50px auto;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 10px;
        background-color: #f9f9f9;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    /* Form */
    .login-form {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }

    /* Label */
    .login-form label {
        font-size: 14px;
        font-weight: bold;
        color: #333;
    }

    /* Input */
    .login-form .form-control {
        width: 100%;
        padding: 10px;
        font-size: 14px;
        border: 1px solid #ccc;
        border-radius: 5px;
        transition: border-color 0.3s ease;
    }

    /* Input khi focus */
    .login-form .form-control:focus {
        border-color: #ff4d4d;
        outline: none;
        box-shadow: 0 0 5px rgba(255, 77, 77, 0.5);
    }

    /* Nút Đăng Nhập */
    .login-form .btn {
        padding: 10px;
        font-size: 16px;
        font-weight: bold;
        background-color: #ff4d4d;
        border: none;
        border-radius: 5px;
        color: white;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    /* Hiệu ứng hover cho nút */
    .login-form .btn:hover {
        background-color: #cc0000;
    }

    /* Đảm bảo biểu mẫu thân thiện với thiết bị di động */
    @media (max-width: 768px) {
        .login-container {
            padding: 15px;
        }

        .login-form .btn {
            font-size: 14px;
        }
    }
</style>

<body>
    <div class="login-container">
        <form action="" method="get" class="login-form">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="email_id" class="form-control" required>
            </div>
            <button type="submit" name="send" class="btn btn-danger">Đăng Nhập</button>
        </form>
    </div>


</body>

</html>