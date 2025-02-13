<?php
session_start();

require "models/config.php";
require "models/db.php";
require "models/product.php";
$product = new product;

$iduser = $_SESSION['username'];
$getiduser = $product->GetIDuser($iduser);
$_SESSION['iduser'] = $getiduser['id'];

$image = $_GET['image'];
$name = $_GET['name'];
$size = $_GET['sizeShoe'];
$amount = $_GET['soLuongShoe'];

$sp = $product->getallproduct();

// check user có tồn tại không rồi mới thêm vào listheart
$product->AddListHeart($image, $iduser, $name, $size, $amount);


$show = $product->ShowListHeart();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="">
        <h2 class="d-flex justify-content-center pt-5">List Heart Shoe</h2>
    </div>
    <!-- Table list shoe -->
    <div style="max-width: 1000px;" class="container-fluid">
        <div class="row-fluid">
            <div class="widget-content">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Size</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($show as $value): ?>
                        <tr>
                            <td><img style="object-fit: cover;" height="300" width="300"
                                    src="public/img/<?php echo $value['image'] ?>" alt="">
                            </td>
                            <td><?php echo $value['name'] ?></td>
                            <td><?php echo $value['size'] ?></td>
                            <td><?php echo $value['amount'] ?></td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div><a href="index.php">Quay về</a></div>
</body>

</html>