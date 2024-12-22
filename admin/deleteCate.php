<?php
session_start();
include "../models/config.php";
include "../models/db.php";
include "code_admin.php";

// Kiểm tra xem người dùng đã đăng nhập chưa
if (!isset($_SESSION['admin']) || $_SESSION['admin'] == 0) {
    header("location: loginAdmin.php");
    return;
}

$addSP = new Admin;

if (isset($_GET['idCate'])) {

    $name = $_GET['idCate'];
    $check = $addSP->CheckCate($name);
    if ($check) {
    } else {
        $addSP->DeleteCate($name);
        header("location: categories.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xóa Mục</title>

</head>

<body>
    <div style="color: #dc3435;" id="alert">
    </div>
    <script>
    function confirmDelete() {
        alert("Mục này không thể xóa vì đã có ràng buộc với sản phẩm!");
        window.location.href = "categories.php";
    }
    window.onload = confirmDelete;
    </script>
</body>

</html>