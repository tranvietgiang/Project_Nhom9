<?php
session_start();
include "../models/config.php";
include "../models/db.php";
include "code_admin.php";

if (!isset($_SESSION['admin']) && ($_SESSION['admin']) == 0) {

    header("location: loginAdmin.php");
    return;
}

$cate = new Admin;
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Loại</title>
    <link rel="stylesheet" href="style.css">
</head>
<style>
body {
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;
}

.container {
    display: flex;
}

.sidebar {
    width: 280px;
    background-color: #34495e;
    color: white;
    padding: 20px;
    height: 100vh;
    box-shadow: 2px 0 5px rgba(0, 0, 0, 0.2);
}

.sidebar h2 {
    text-align: center;
    font-size: 26px;
    margin-bottom: 30px;
}

.sidebar ul {
    list-style-type: none;
    padding: 0;
}

.sidebar ul li {
    margin: 15px 0;
}

.sidebar ul li a {
    color: white;
    text-decoration: none;
    display: block;
    padding: 12px 15px;
    border-radius: 5px;
    transition: background-color 0.3s;
    font-size: 16px;
}

.sidebar ul li a:hover {
    background-color: #2c3e50;
}

.content {
    flex-grow: 1;
    padding: 20px;
    background-color: #ecf0f1;
}

h1 {
    color: #2c3e50;
    border-bottom: 2px solid #3498db;
    padding-bottom: 10px;
}

.btn {
    background-color: #3498db;
    color: white;
    border: none;
    padding: 10px 15px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s;
    font-size: 16px;
}

.btn:hover {
    background-color: #2980b9;
}

table {
    border-collapse: collapse;
    width: 100%;
    text-align: left;
}

table th,
table td {
    border: 1px solid #ddd;
    padding: 8px;
}

table th {
    background-color: #f2f2f2;
    text-align: center;
}

table tr:nth-child(even) {
    background-color: #f9f9f9;
}

table tr:hover {
    background-color: #ddd;
}

tr {
    text-align: center;
}

td a {
    display: inline-block;
    margin: 5px;
}

/* Responsive Design */
@media (max-width: 768px) {
    .container {
        flex-direction: column;
    }

    .sidebar {
        width: 100%;
        height: auto;
    }
}


a {
    text-decoration: none;
    color: #f4f4f4;
}
</style>

<body>
    <div class="container">
        <nav class="sidebar">
            <h2>Trang Admin</h2>
            <ul>
                <li><a href="quanlisanpham.php">Quản lý sản phẩm</a></li>
                <li><a href="#">Quản lý Loại</a></li>
                <li><a href="#">Thống kê</a></li>
                <li><a href="logOutAdmin.php">Đăng xuất</a></li>
            </ul>
        </nav>
        <main class=" content" style="max-width: 1200px;">
            <div>
                <p>Xin Chào Admin:
                    <?php $adminIfo = $cate->GetInfoAdmin();
                    echo $adminIfo[0]['nameUser'];
                    ?>
                </p>
            </div>
            <h1>Quản Lý Sản Phẩm</h1>
            <a href="addCate.php"> <button style="margin: 0 0 20px 0" class="btn add-product">Thêm Sản
                    Phẩm</button></a>
            <div class="product-list">
                <?php
                $displayCate = $cate->GetAllCate();
                ?>
                <div class="widget-content nopadding">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Tên Loại</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($displayCate as $value): ?>
                            <tr>

                                <td><?php echo htmlspecialchars($value['categary']); ?></td>
                                <td id="td">
                                    <a href="updateCate.php?idCate=<?php echo $value['id'] ?>"
                                        class="btn btn-success btn-mini">Sửa</a>
                                    <a href="deleteCate.php?idCate=<?php echo $value['id'] ?>"
                                        class="btn btn-danger btn-mini">Xóa</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
        </main>
    </div>
</body>

</html>