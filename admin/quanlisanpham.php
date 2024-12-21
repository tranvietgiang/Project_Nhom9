<?php
session_start();
include "../models/config.php";
include "../models/db.php";
include "code_admin.php";

if (!isset($_SESSION['admin']) && ($_SESSION['admin']) == 0) {

    header("location: loginAdmin.php");
    return;
}

$product = new Admin;
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Sản Phẩm</title>
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
        /* Giữ chiều rộng thanh bên hợp lý */
        background-color: #34495e;
        /* Màu nền tối hơn để dễ nhìn */
        color: white;
        padding: 20px;
        height: 100vh;
        box-shadow: 2px 0 5px rgba(0, 0, 0, 0.2);
    }

    .sidebar h2 {
        text-align: center;
        font-size: 26px;
        /* Kích thước phông chữ tiêu đề */
        margin-bottom: 30px;
        /* Khoảng cách dưới tiêu đề */
    }

    .sidebar ul {
        list-style-type: none;
        padding: 0;
    }

    .sidebar ul li {
        margin: 15px 0;
        /* Khoảng cách giữa các mục */
    }

    .sidebar ul li a {
        color: white;
        text-decoration: none;
        display: block;
        padding: 12px 15px;
        /* Padding cho các liên kết */
        border-radius: 5px;
        /* Độ cong cho các liên kết */
        transition: background-color 0.3s;
        font-size: 16px;
        /* Kích thước phông chữ cho liên kết */
    }

    .sidebar ul li a:hover {
        background-color: #2c3e50;
        /* Màu nền khi hover */
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
        /* Kích thước phông chữ cho nút */
    }

    .btn:hover {
        background-color: #2980b9;
    }

    .product-card {
        background: white;
        border-radius: 5px;
        padding: 15px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        flex: 0 1 calc(33.33% - 20px);
        text-align: center;
        box-sizing: border-box;
    }

    .product-card img {
        max-width: 100%;
        height: auto;
        border-radius: 5px;
    }

    .product-card h3 {
        font-size: 18px;
        margin: 10px 0;
    }

    .product-card .price {
        font-size: 16px;
        color: #e74c3c;
    }

    .product-card .type {
        font-size: 14px;
        color: #7f8c8d;
    }

    .actions {
        margin-top: 10px;
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

        .product-card {
            flex: 0 1 calc(50% - 20px);
        }
    }

    @media (max-width: 480px) {
        .product-card {
            flex: 0 1 100%;
        }
    }

    a {
        text-decoration: none;
        color: #f4f4f4;
    }
</style>

<body>
    <style>
        .image-container {
            background-color: white;
            /* Nền màu trắng cho trường hợp hình ảnh không được chèn */
            background-size: cover;
            /* Phủ kín toàn bộ phần tử */
            background-position: center;
            /* Căn giữa hình ảnh */
            background-repeat: no-repeat;
            /* Không lặp lại hình ảnh */
        }
    </style>
    <div class="container">
        <nav class="sidebar">
            <h2>Trang Admin</h2>
            <ul>
                <li><a href="#">Quản lý sản phẩm</a></li>
                <li><a href="#">Quản lý đơn hàng</a></li>
                <li><a href="#">Quản lý khách hàng</a></li>
                <li><a href="home.php">Thống kê</a></li>
                <li><a href="logOutAdmin.php">Đăng xuất</a></li>
            </ul>
        </nav>
        <main class=" content" style="max-width: 1200px;">
            <div>
                <p>Xin Chào Admin:
                    <?php $adminIfo = $product->GetInfoAdmin();
                    echo $adminIfo[0]['nameUser'];
                    ?>
                </p>
            </div>
            <h1>Quản Lý Sản Phẩm</h1>
            <a href="addProduct.php"> <button style="margin: 0 0 20px 0" class="btn add-product">Thêm Sản
                    Phẩm</button></a>
            <div class="product-list">
                <?php
                $count = 6;
                $page = isset($_GET['page']) ? $_GET['page'] : 1;
                $total = count($product->hienthisanpham());

                $url  = $_SERVER['PHP_SELF'];
                $sanpham = $product->hienthiphantrang($page, $count);

                foreach ($sanpham as $value):
                ?>
                    <div class="product-card">
                        <img style="object-fit: contain; width: 300px; height: 300px;"
                            src="../public/img/<?php echo $value['image'] ?>" class="img-fluid image-container">
                        <h3><?php echo $value['name'] ?></h3>
                        <p class="price"><?php echo number_format($value['price'], 0, ',', '.') ?> VNĐ</p>
                        <p class="type">Loại: <?php echo $value['catalogue'] ?></p>
                        <div class="actions">
                            <a href="updateSP.php?id=<?php echo $value['id'] ?>"> <button class="btn edit">Sửa</button></a>
                            <button class="btn delete"><a href="delete.php?id=<?php echo $value['id'] ?>">Xóa</a></button>
                        </div>
                    </div>
                <?php endforeach; ?>
                <div style="margin: 20px 0 0 550px;" class="phantrang">Trang:
                    <?php echo $product->paginate($url, $total, $count, $page) ?>
                </div>
            </div>
        </main>
    </div>

    <script src="script.js"></script>
</body>

</html>