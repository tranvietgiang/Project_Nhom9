<?php
session_start();
if (!isset($_SESSION['username']) && ($_SESSION['username']) == 0) {

    header("location: Login_users.php");
    return;
}

require "models/config.php";
require "models/Db.php";
require "models/product.php";
?>
<!-- handle whe user để login -->
<?php

$name = new product;

if (isset($_GET['id'])) {
    $id_sp = $_GET['id'];
    $getNameSP = $name->GetNameSP($id_sp);
} else {
    echo "error!";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- link bootstrap 5 -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet" />
</head>
<style>
    #review {
        text-align: center;
    }

    #review form input,
    textarea {
        margin: 10px;
    }

    #review form input:focus,
    textarea:focus {
        outline: none;
        border: 2px solid green;
    }

    div#image_review {
        background-color: #fff;
        /* Ensure the background is white */
    }

    #image_review {
        object-fit: cover;
        width: 400px;
        height: 400px;
        border-radius: 5px;
        background-image: linear-gradient(#fff, #fff);
        /* Creates a solid white background */
        border: 2px solid #dc3435;
    }

    section#review h1 {
        margin: 20px 0 100px 0;
    }

    #b_name {
        font-family: 'Courier New', Courier, monospace;
    }

    .col-3 {
        margin-top: 60px;
        margin-left: -70px;
    }
</style>

<body>
    <section id="review">
        <h1>Detail product</h1>
        <form action="" class="container" method="get">
            <div class="row">
                <div class="col-6">
                    <img id="image_review" src="public/img/<?php echo $getNameSP['image'] ?>" alt="">
                </div>
                <div class="col-3">
                    <h5>Name: <b id="b_name"><?php echo $getNameSP['name'] ?></b></h5><br>
                    <textarea name="review" placeholder="Comment" id="" cols="50" rows="11"></textarea>
                    <button class="btn btn-danger">Send</button>
                </div>
            </div>
        </form>
        <div>
            <a href="index.php"><button class="btn btn-danger">turn back</button></a>
        </div>
        <?php


        ?>
    </section>

</body>

</html>