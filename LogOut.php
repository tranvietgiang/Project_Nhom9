<?php session_start() ?>

<?php

unset($_SESSION['username']);
header("location: Login_users.php");
?>