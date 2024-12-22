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

?>
<?php
if (isset($_POST['addCate'])) {

    $name = $_POST['sp-cate'];

    $addSP->AddCate($name);
    header("location: categories.php");
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
        <h1>Add New Type </h1>
        <form action="" method="post">
            <!-- Name Shoe -->
            <div class="form-group">
                <label for="title">Type Shoe <span class="required">*</span></label>
                <input type="text" id="title" name="sp-cate" required>
            </div>
            <!-- Submit Button -->
            <div class="form-actions">
                <button name="addCate" type="submit">Add</button>
            </div>
            <a href="categories.php" class="btn btn-danger">Quay lại</a>
        </form>
    </div>
</body>

</html>