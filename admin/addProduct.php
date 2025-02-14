<?php
session_start();
include "../models/config.php";
include "../models/db.php";
include "code_admin.php";

if (!isset($_SESSION['admin']) && ($_SESSION['admin']) == 0) {

    header("location: loginAdmin.php");
    return;
}

$addSP = new Admin;
$cate = $addSP->GetAllCate();

?>
<?php
if (isset($_POST['addSP'])) {

    $name = $_POST['sp-name'];
    $price = $_POST['sp-price'];
    $image = $_FILES["fileUpload"]["name"];
    $category = $_POST['sp-cate'];
    $detail = $_POST['sp-detail'];


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
        $addSP->AddProduct($name, $price, $image, $category, $detail);
        header("Location: quanlisanpham.php");
    } else {

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
        margin-bottom: 15px;
    }

    label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
        color: #555;
    }

    input[type="text"],
    input[type="file"],
    textarea,
    select {
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
    </style>
</head>

<body>
    <div class="container">
        <h1>Add New Shoe</h1>
        <form action="" method="post" enctype="multipart/form-data">
            <!-- Name Shoe -->
            <div class="form-group">
                <label for="title">Name Shoe <span class="required">*</span></label>
                <input type="text" id="title" name="sp-name" required>
            </div>

            <!-- Price -->
            <div class="form-group">
                <label for="sp-price">Price</label>
                <select name="sp-price" id="sp-price">
                    <option value="">-- Select Price --</option>
                    <option value="100000">100,000</option>
                    <option value="200000">200,000</option>
                    <option value="300000">300,000</option>
                    <option value="400000">400,000</option>
                    <option value="500000">500,000</option>
                </select>
            </div>


            <!-- Image Upload -->
            <div class="form-group">
                <label for="fileUpload">Choose an Image</label>
                <input onchange="DisLayImage()" type="file" id="fileUpload" name="fileUpload">
                <span id="displayImagePre"></span>
            </div>


            <!-- Category -->
            <div class="form-group">
                <label for="cate">Choose a Category <span class="required">*</span></label>
                <select id="cate" name="sp-cate">
                    <option value="">Select a category</option>
                    <?php
                    foreach ($cate as $value):
                    ?>
                    <option value="<?php echo $value['id'] ?>"><?php echo $value['categary'] ?></option>
                    <?php endforeach ?>
                </select>
            </div>

            <!-- Detail -->
            <div class="form-group">
                <label for="detail">Detail</label>
                <textarea id="author" name="sp-detail" rows="4" cols="50"></textarea>
            </div>

            <!-- Submit Button -->
            <div class="form-actions">
                <button name="addSP" type="submit">Add</button>
            </div>


            <a href="quanlisanpham.php" class="btn btn-danger">Quay lại</a>
        </form>
    </div>
    <script>
    function DisLayImage() {
        let fileUpLoad = document.getElementById("fileUpload").files;
        if (fileUpLoad.length > 0) {
            const fileToImage = fileUpLoad[0];
            const fileReader = new FileReader();
            fileReader.onload = function(fileEvent) {
                var a = fileEvent.target.result;
                var b = document.createElement('img');
                b.src = a;

                document.getElementById('displayImagePre').innerHTML = b.outerHTML;
            }
            fileReader.readAsDataURL(fileToImage);
        }
    }
    </script>
</body>

</html>