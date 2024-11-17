<?php

include "header.php";

if (isset($_GET['search'])):

    $search = $_GET['search'];

    $temp_search = $item_navbar->Search($search);

    if (empty($temp_search)): // Kiểm tra nếu không có kết quả tìm kiếm
        echo '<p style="position: relative; color: #000;">No results found for "' . htmlspecialchars($search) . '"</p>';
    else:
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
.shoes_find {
    position: relative;
    z-index: 999;
}
</style>

<body>
    <section id="SearchTopSP">
        <div style="border-top: 3px solid #000; margin:50px 0 3px 0">
            <h1 style="text-align: center;  margin: 20px 0 50px 0;">Sản Phẩm tìm kiếm</h1>
        </div>
        <div style="display: flex; align-items: center; justify-content: center;" class="">
            <div style="background-color: #b2bec3; padding: 20px; border-radius: 5px;">
                <?php foreach ($temp_search as $value): ?>
                <a href="#">
                    <img src="<?php echo htmlspecialchars($value['image']) ?>" width="255" height="255" />
                </a>
                <div class="price">
                    <h2><?php echo htmlspecialchars($value['name']) ?></h2>
                    <b class="gia">
                        <? echo $value['price'] ?>
                    </b>
                    <div class="star">
                        <?php echo "<i>" . $value['star'] . "</i>" ?>
                    </div>
                </div>
                <?php endforeach ?>
            </div>
        </div>
    </section>
</body>

</html>
<?php endif;
endif;
?>
<?php
include "DuoiMain.php";
include "footer.php";
?>