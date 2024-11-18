<?php
require 'models/config.php';
require 'models/Db.php';
require 'models/loginDB.php';
$call = new login_shoes;


if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];


    $arrTem = [$email, $old_password, $new_password . $confirm_password];

    $check = false;
    foreach ($arrTem as $value) {
        if (empty($value)) {
            $check = true;
            break;
        }
    }

    if ($check) {
        echo "<div class='Notify'> Vui lòng nhập đầu thông tin!</div>";
        return;
    }


    if ($new_password != $confirm_password) {
        echo "<div class='Notify'>Mk new ko trùng nhau!</div>";
        return;
    }


    // Call ChangPassword function to update password
    $changPassword = $call->ChangPassword($new_password, $email, $old_password);

    // Check if password was changed successfully
    if ($changPassword) {
        header("location: Login.php");
    } else {
        echo "<div class='Notify'>Email hoặc mật khẩu cũ không đúng</div>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <style>
        body {
            font-family: monospace, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;

        }

        #duynhat>img {
            border: 1px solid #45a049;
            object-fit: contain;
            width: 100%;
            margin-left: -3px;
            height: 561.5px;
            border-radius: 5px;
        }

        #duynhat>img {

            position: absolute;
            text-transform: uppercase;
            margin-left: 120px;
            margin-top: 30px;
        }


        .change-password-container {
            background-color: white;
            padding: 20px;
            padding: 70px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .change-password-container h1 {
            text-align: center;
        }

        .input-field {
            outline: none;
            width: 250px;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .input-field:focus {
            border: 1px solid #45a049;
        }

        .btn {
            width: 275px;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }


        .message {
            text-align: center;
            color: red;
            margin-top: 10px;
        }

        #div {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100px;
            height: 30px;
            background-color: #4CAF50;
            border-radius: 5px;
            margin-left: 90px;
        }

        #div>a {
            text-decoration: none;
            color: #f4f4f4;
        }

        .btn:hover,
        #div:hover {
            background-color: #45a049;
        }


        section>div>img {
            display: inline-block;
            object-fit: cover;
            width: 20px;
            height: 20px;
            background-color: transparent;
            cursor: pointer;
        }

        section#section>div {
            border: 1px solid #45a049;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2px;
            border-radius: 10px;
            margin-top: 10px;
            width: 30px;
            height: 30px;
        }

        .Notify {
            z-index: 999;
            color: red;
        }
    </style>
</head>

<body>
    <div>
        <h1>Welcome to shoe our</h1>
        <img src="https://htmldemo.net/james/james/img/product/25.png" alt="">
    </div>
    <div class="change-password-container">
        <h1>Change Password</h1>
        <form method="POST">
            <input type="email" name="email" class="input-field" placeholder="Email" require><br>
            <input type="password" name="old_password" class="input-field showClass" placeholder="Old Password"><br>
            <input type="password" name="new_password" class="input-field showClass" placeholder="New Password"><br>
            <input type="password" name="confirm_password" class="input-field showClass"
                placeholder="Confirm New Password"><br>
            <button type="submit" name="login" class="btn">Change Password</button>
        </form>
        <section id="section">
            <div>
                <img class="show"
                    src="https://static.vecteezy.com/system/resources/previews/022/782/488/non_2x/hidden-icon-visible-invisible-icon-eye-icon-look-and-vision-hide-unhide-symbol-human-eye-magic-eye-cross-symbol-sencitive-content-see-unsee-incognito-mood-blind-sign-free-vector.jpg"
                    alt="Show Password">
            </div>
        </section>
        <div id="div">
            <a href="Login.php">Turn back</a>
        </div>
    </div>
    <script>
        const show = document.querySelector('.show');
        const inputs = document.querySelectorAll(".showClass");

        show.addEventListener('click', () => {
            inputs.forEach(icon => {
                if (icon.type === "password") {
                    icon.type = "text";
                    show.src =
                        "https://static.vecteezy.com/system/resources/previews/006/082/476/non_2x/preview-show-interface-icon-free-vector.jpg";
                } else {
                    icon.type = "password";
                    show.src =
                        "https://static.vecteezy.com/system/resources/previews/022/782/488/non_2x/hidden-icon-visible-invisible-icon-eye-icon-look-and-vision-hide-unhide-symbol-human-eye-magic-eye-cross-symbol-sencitive-content-see-unsee-incognito-mood-blind-sign-free-vector.jpg";
                }
            })
        })
    </script>
</body>

</html>