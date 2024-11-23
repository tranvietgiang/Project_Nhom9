<?php session_start() ?>
<?php require "models/config.php";
require "models/db.php";
require "models/Users.php";
?>

<?php
$thongtin = new Users_shoes;
$user = $_SESSION['username'];
$getNme = $thongtin->GetUserInfo($user);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard - Shoe Store</title>
    <style>
    body {
        font-family: Arial, Helvetica, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f1f1f1;
        color: #333;
    }


    .container {
        max-width: 900px;
        margin: 20px auto;
        background: #fff;
        border-radius: 15px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        padding: 30px;
    }
    </style>
</head>

<body>
    <div class="container">
        <h2>Hello, <?php echo $getNme['nameUser'] ?>!</h2>
        <div>
            <p><?php echo $getNme['email_id'] ?></p>
        </div>

        <div>
            <a href="LogOut.php">Log out</a>
        </div>
        <div>
            <a href="index.php">
                < </a>
        </div>
</body>

</html>