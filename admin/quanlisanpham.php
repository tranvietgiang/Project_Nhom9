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

    .seach {
        display: flex;
        align-items: center;
        margin-bottom: 20px;
    }

    .seach input {
        border: 1px solid #ccc;
        border-radius: 4px;
        margin-right: 10px;
        font-size: 16px;
    }

    .seach button {
        background-color: #28a745;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    .seach button:hover {
        background-color: #218838;
    }
</style>

<body>
    <div class="container">
        <nav class="sidebar">
            <h2>Trang Admin</h2>
            <ul>
                <li><a href="quanlisanpham.php">Quản lý sản phẩm</a></li>
                <li><a href="categories.php">Quản lý Loại</a></li>
                <li><a href="thongKe.php">Thống kê</a></li>
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
            <div class="seach">
                <form action="timkiemphantrang.php" method="get">
                    <input type="text" name="key" placeholder="Tìm kiếm sản phẩm..."
                        style="padding: 10px; width: 200px;">
                    <button type="submit" style="padding: 10px;">Tìm kiếm</button>
                </form>
            </div>
            <a href="addProduct.php"> <button style="margin: 0 0 20px 0" class="btn add-product">Thêm Sản
                    Phẩm</button></a>
            <div class="product-list">
                <?php
                $count = 6;
                $page = isset($_GET['page']) ? $_GET['page'] : 1;
                $total = count($product->hienthisanpham());

                $url  = $_SERVER['PHP_SELF'];
                $sanpham = $product->hienthiphantrang($page, $count);
                ?>
                <div class="widget-content nopadding">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Hình ảnh</th>
                                <th>Tên sản phẩm</th>
                                <th>Giá</th>
                                <th>Loại</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($sanpham as $value): ?>
                                <tr>
                                    <td width="250">
                                        <img src="../public/img/<?php echo $value['image']; ?>" width="200px" height="200px"
                                            alt="<?php echo htmlspecialchars($value['name']); ?>">
                                    </td>
                                    <td><?php echo htmlspecialchars($value['name']); ?></td>
                                    <td><?php echo number_format($value['price'], 0, ',', '.'); ?> VNĐ</td>
                                    <td><?php echo $value['categary']; ?></td>
                                    <td>
                                        <a href="updateSP.php?id=<?php echo $value['id']; ?>"
                                            class="btn btn-success btn-mini">Sửa</a>
                                        <a href="delete.php?id=<?php echo $value['id']; ?>"
                                            class="btn btn-danger btn-mini">Xóa</a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <div style="margin: 20px 0 0 550px;" class="phantrang">Trang:
                    <?php echo $product->paginate($url, $total, $count, $page) ?>
                </div>
            </div>
        </main>
    </div>

    <script src="script.js"></script>
</body>

</html>