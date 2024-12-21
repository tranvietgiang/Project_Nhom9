<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Admin Cửa Hàng Giày</title>
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
    width: 250px;
    background-color: #2c3e50; /* Màu nền tối */
    color: white;
    padding: 20px;
    height: 100vh; /* Chiều cao đầy đủ */
    box-shadow: 2px 0 5px rgba(0, 0, 0, 0.2); /* Đổ bóng */
}

.sidebar h2 {
    text-align: center;
    font-size: 24px;
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
    display: block; /* Đảm bảo toàn bộ vùng nhấp được */
    padding: 10px;
    border-radius: 5px; /* Bo góc */
    transition: background-color 0.3s; /* Hiệu ứng chuyển màu */
}

.sidebar ul li a:hover {
    background-color: #34495e; /* Màu nền khi di chuột */
}

.content {
    flex-grow: 1;
    padding: 20px;
    background-color: #ecf0f1; /* Màu nền cho nội dung chính */
}

h1 {
    color: #2c3e50; /* Màu tiêu đề */
    border-bottom: 2px solid #3498db; /* Đường viền dưới */
    padding-bottom: 10px;
}

.statistics {
    margin-top: 20px;
    background: white;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.stat-card {
    background: #e0f7fa; /* Màu nền cho thẻ thống kê */
    padding: 15px;
    margin-bottom: 20px;
    border-radius: 5px;
    border-left: 5px solid #3498db; /* Đường viền bên trái */
}

.stat-card p {
    margin: 0;
    font-size: 18px;
    color: #2980b9; /* Màu chữ */
}

h2 {
    color: #2980b9; /* Màu tiêu đề phụ */
}

ul {
    padding-left: 20px;
}

ul li {
    margin: 8px 0;
    color: #2c3e50; /* Màu chữ danh sách */
}

/* Responsive Design */
@media (max-width: 768px) {
    .container {
        flex-direction: column; /* Chuyển sang cột trên thiết bị nhỏ */
    }
    
    .sidebar {
        width: 100%; /* Chiều rộng 100% trên thiết bị nhỏ */
        height: auto; /* Chiều cao tự động */
    }
}

</style>
<body>
    <div class="container">
        <nav class="sidebar">
            <h2>Trang Admin</h2>
            <ul>
                <li><a href="quanlisanpham.php">Quản lý sản phẩm</a></li>
                <li><a href="#">Quản lý đơn hàng</a></li>
                <li><a href="#">Quản lý khách hàng</a></li>
                <li><a href="#">Thống kê</a></li>
                <li><a href="#">Đăng xuất</a></li>
           
            </ul>
        </nav>
        <main class="content">
            <h1>Tổng quan</h1>
            <div class="statistics">
                <h2>Thống kê Doanh Thu</h2>
                <div class="stat-card">
                    <p>Tổng doanh thu: <strong>10,000,000 VNĐ</strong></p>
                </div>
                <h2>Sản phẩm bán chạy</h2>
                <ul>
                    <li>Giày Sneaker A</li>
                    <li>Giày Thể Thao B</li>
                    <li>Giày Da C</li>
                </ul>
            </div>
        </main>
    </div>
    
    <script src="script.js"></script>
</body>
</html>