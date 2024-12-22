<?php
session_start();
include "../models/config.php";
include "../models/db.php";
include "code_admin.php";

if (!isset($_SESSION['admin']) && ($_SESSION['admin']) == 0) {

    header("location: loginAdmin.php");
    return;
}


$updateSP = new Admin;

if ((isset($_GET['id'])))
    $id_get = $_GET['id'];
$getItemByID = $updateSP->GetItemByID($id_get);
$getAllCateByID = $updateSP->GetAllCateByID($id_get);
$getAllCate = $updateSP->GetAllCate();
?>

<?php
if (isset($_POST['updateSP'])) {
    $name = $_POST['sp-name'];
    $price = $_POST['sp-price'];
    $image = $_FILES["fileUpload"]["name"];
    $category = $_POST['sp-cate'];
    $detail = $_POST['sp-detail'];
    $id = isset($_GET['id']) ? $_GET['id'] : "";

    $uploadOk = 1;

    $targetDir = "../public/img/";
    $targetFile = $targetDir . basename($_FILES["fileUpload"]["name"]);

    if (move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $targetFile)) {
        echo "The file has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }

    if ($_FILES["fileUpload"]["size"] > 500000) {
        echo "<div>Không thêm được file có vượt quá 500000 byte!</div>";
        $uploadOk = 0;
    }

    // Kiểm tra phần mở rộng của tệp
    $imageFileType = strtolower(pathinfo($_FILES["fileUpload"]["name"], PATHINFO_EXTENSION));
    $allowedExtensions = ["jpg", "jpeg", "png", "gif"];

    if (!in_array($imageFileType, $allowedExtensions)) {
        echo "<div>Chỉ chấp nhận các file hình ảnh có đuôi: jpg, jpeg, png, gif.</div>";
        $uploadOk = 0;
    }


    if ($uploadOk == 1) {
        // Cập nhật sản phẩm vào cơ sở dữ liệu
        $updateSP->UpdateProduct($name, $price, $image, $category, $detail, $id);

        header("Location: quanlisanpham.php");
        exit;
    } else {
        // Nếu có lỗi thì không cập nhật vào cơ sở dữ liệu
        echo "<div>Đã có lỗi xảy ra. Vui lòng kiểm tra lại tệp bạn tải lên.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="Website icon" type="jpg" href="../public/img/logoShoes.jpg">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
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

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }

        input[type="text"],
        input[type="file"],
        select,
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        textarea {
            resize: vertical;
        }

        .form-actions {
            text-align: center;
            margin-top: 20px;
        }

        button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        button:hover {
            background-color: #45a049;
        }

        .required {
            color: red;
        }

        /* Chắc chắn các phần tử form sẽ đổ xuống theo dạng cột */
        .form-group {
            display: block;
            width: 100%;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Update Shoe</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <!--  -->
            <?php

            ?>
            <!-- Name Shoe -->
            <div class="form-group">
                <label for="title">Name Shoe <span class="required">*</span></label>
                <input type="text" id="title" name="sp-name" value="<?php echo  $getItemByID[0]['name'] ?>" required>
                <input type="hidden" name="id" value="<?php echo  $getItemByID[0]['id'] ?>" required>
            </div>

            <!-- Price -->
            <div class="form-group">
                <label for="sp-price">Price</label>
                <select name="sp-price" id="sp-price">
                    <option value="<?php echo  $getItemByID[0]['price'] ?>"><?php echo  $getItemByID[0]['price'] ?>
                    </option>
                    <option value="100000 ">100,000</option>
                    <option value="200000">200,000</option>
                    <option value="300000">300,000</option>
                    <option value="400000">400,000</option>
                    <option value="500000">500,000</option>
                </select>
            </div>

            <!-- Image Upload -->
            <div class="form-group">
                <label for="fileUpload">Choose an Image</label>
                <input type="file" id="fileUpload" name="fileUpload">
            </div>

            <!-- Category -->
            <div class="form-group">
                <label for="cate">Choose a Category <span class="required">*</span></label>
                <select id="cate" name="sp-cate">
                    <option value="<?php echo $getAllCateByID[0]['id'] ?>"><?php echo $getAllCateByID[0]['categary'] ?>
                    </option>
                    <?php
                    foreach ($getAllCate as $value):
                    ?>
                        <option value="<?php echo  $value['id'] ?>"> <?php echo $value['categary'] ?>
                        </option>
                    <?php endforeach ?>
                </select>
            </div>

            <!-- Detail -->
            <div class="form-group">
                <label for="detail">Detail</label>
                <textarea id="author" name="sp-detail" rows="4"
                    cols="50"><?php echo $getItemByID[0]['detail']; ?></textarea>
            </div>
            <?php


            ?>
            <!-- Submit Button -->
            <div class="form-actions">
                <button name="updateSP" type="submit">Update</button>
            </div>

            <a href="quanlisanpham.php" class="btn btn-danger">Quay lại</a>
        </form>
    </div>
</body>

</html>