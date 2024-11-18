<?php

include "header.php";

if (isset($_GET['search'])):

    $search = $_GET['search'];

    $temp_search = $item_navbar->Search($search);

    if (empty($temp_search)): // Kiểm tra nếu không có kết quả tìm kiếm
        echo '<p style="position: relative; color: #000;">No results found for "' . htmlspecialchars($search) . '"</p>';
    else:
?>

        <style>
            img.image_search {
                object-fit: cover;
                width: 300px;
                height: auto;
                border-radius: 5px;
                border: 1px solid #817272
            }
        </style>
        <section class="container">
            <div style="border-top: 3px solid #000; margin:50px 0 3px 0">
                <h1 style="text-align: center;  margin: 20px 0 50px 0;">Sản Phẩm tìm kiếm</h1>
            </div>
            <div class="row">
                <?php foreach ($temp_search as $value): ?>
                    <div class="col-3">
                        <img class="image_search" src="<?php echo $value['image'] ?>" alt=""><br>
                        <h3><?php echo $value['name'] ?></h3>
                        <b><?php echo $value['price'] ?></b><br>
                        <span><?php echo $value['tinhTrang'] ?></span><br>
                        <span>
                            <?php echo $value['star'] ?>
                        </span>
                        <div class="TXS">
                            <a href="#"><button class="btn btn-danger">Thêm</button> </a>
                            <a href="#"><button class="btn btn-danger">Xóa</button></a>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </section>
<?php endif;
endif;
?>

<?php
include "DuoiMain.php";
include "footer.php";
?>