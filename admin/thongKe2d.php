<?php
session_start();
include "../models/config.php";
include "../models/db.php";
include "code_admin.php";

if (!isset($_SESSION['admin']) && ($_SESSION['admin']) == 0) {
    header("location: loginAdmin.php");
    return;
}

$thongKe = new Admin;
// Lấy dữ liệu thống kê
$raTingLike = $thongKe->GetRaTingLike();
$raTingDislike = $thongKe->GetRaTingDislike();
$cmt = $thongKe->GetCMT();

// Dữ liệu cho biểu đồ
$dataLabels = ['Product like', 'Product dislike', 'User cmt'];
$dataValues = [
    round($raTingLike[0]['RaTingLike'], 2),
    round($raTingDislike[0]['RaTingDislike'], 2),
    $cmt[0]['SoLanCMT']
];

// Chuyển đổi dữ liệu PHP sang JSON
$jsonLabels = json_encode($dataLabels);
$jsonValues = json_encode($dataValues);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thống Kê Biểu Đồ</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="Website icon" type="jpg" href="../public/img/logoShoes.jpg">
</head>

<body>
    <div class="container">
        <h1>Biểu Đồ Thống Kê 2D</h1>
        <canvas id="myChart" width="400" height="200"></canvas>
        <div><a href="quanlisanpham.php">Quay Lại</a></div>
    </div>

    <script>
        // Lấy dữ liệu từ PHP (được chuyển sang JSON)
        var labels = <?php echo $jsonLabels; ?>;
        var data = <?php echo $jsonValues; ?>;

        // Tạo biểu đồ
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar', // Hoặc 'pie', 'line', tùy thuộc vào loại biểu đồ bạn muốn
            data: {
                labels: labels,
                datasets: [{
                    label: 'Thống Kê Sản Phẩm và Người Dùng',
                    data: data,
                    backgroundColor: ['#4caf50', '#f44336', '#2196f3'], // Màu sắc cho từng cột
                    borderColor: ['#388e3c', '#d32f2f', '#1976d2'],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>

</html>