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
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thống Kê Sản Phẩm</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background-color: #f5f5f5;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .stat-section {
            margin-bottom: 20px;
            padding: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            background: #fafafa;
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .stat-section:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
        }

        .stat-section label {
            font-weight: bold;
            color: #555;
            margin-bottom: 10px;
            display: block;
        }

        .stat-section div {
            padding: 10px;
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        .user-statistics {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 20px auto;
            font-family: Arial, sans-serif;
        }

        .user-statistics label {
            font-weight: bold;
            color: #333;
            font-size: 18px;
            display: block;
            margin-bottom: 10px;
        }

        .user-statistics div,
        .user-statistics p {
            font-size: 16px;
            margin: 8px 0;
            color: #555;
        }

        .user-statistics p {
            font-style: italic;
        }

        .user-statistics span {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- statistical -->
        <h1>Thống Kê Sản Phẩm</h1>

        <div class="stat-section">
            <label for="">Sản phẩm Rating cao nhất</label>
            <div>
                <?php
                $raTingLike = $thongKe->GetRaTingLike();
                echo $raTingLike[0]['name'];
                ?>
            </div>
            <img style="object-fit: contain;" width="200" height="200"
                src="../public/img/<?php echo $raTingLike[0]['image']; ?>" alt="">
            <p>Rating: <?php $raTing =  $raTingLike[0]['RaTingLike'];
                        echo $totalRT = round($raTing, 2);
                        ?>⭐</p>
        </div>

        <div class="stat-section user-statistics">
            <label for="">Sản phẩm Rating Thấp nhất</label>
            <div>
                <?php
                $raTingDislike = $thongKe->GetRaTingDislike();
                echo $raTingDislike[0]['name'];
                ?>
            </div>
            <img style="object-fit: contain;" width="200" height="200"
                src="../public/img/<?php echo $raTingDislike[0]['image']; ?>" alt="">
            <p>Rating: <?php $raTing =  $raTingDislike[0]['RaTingDislike'];
                        echo $totalDRT = round($raTing, 2);
                        ?>⭐</p>
        </div>

        <div class="stat-section user-statistics">
            <label for="">Thống Kê Người Dùng Tương Tác Nhiều Nhất</label>
            <div>Name:
                <?php $cmt = $thongKe->GetCMT();
                echo $cmt[0]['nameUser'];
                ?>
            </div>
            <p>Email: <?php echo $cmt[0]['username']; ?></p>
            <p>Số Lần CMT:
                <?php
                echo $cmt[0]['SoLanCMT'];
                ?>
            </p>
        </div>
    </div>
    <div><a href="quanlisanpham.php">Quay Lại</a></div>
    <div><a href="thongKe2d.php">Next 2d</a></div>
</body>

</html>