<?php
include "header.php";
require "models/product.php";
$product = new product;

if (isset($_GET['search']) && !empty($_GET['search'])):

    $search = $_GET['search'];
    $searchCount = $product->SearchCount($search);

    // hiển thị 5 sản phẩm trên 1 trang
    $count = 4;

    // Lấy số trang trên thanh địa chỉ
    $page = isset($_GET['page']) ? $_GET['page'] : 1;

    // Tính tổng số dòng, ví dụ kết quả là 18
    $total = count($searchCount);

    // lấy đường dẫn đến file hiện hành
    $url = $_SERVER['PHP_SELF'] . "?search=" . $search;

    $searchPaginate  = $product->SearchPaginate($search, $page, $count);

    if (empty($searchPaginate)): // Kiểm tra nếu không có kết quả tìm kiếm  Re-focus 
        echo '<p style="position: relative;  
        display: flex;  
        color: #000;  
        justify-content: center;  
        margin-top: 50px;  
        font-size: 20px">No results found for "' . htmlspecialchars($search) . '"</p>';
        // focus tìm lại
        echo '<div style="margin-left:720px" class="btn btn-danger" onclick="document.getElementById(\'search-input\').focus(); return false;">Re-Find</div>';

    else:
?>
        <link rel="Website icon" type="jpg" href="public/img/logoShoes.jpg">
        <!-- Link bootstrap 5 -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

        <style>
            img.image_search {
                object-fit: cover;
                width: 300px;
                height: 300px;
                border-radius: 10px;
                border: 3px solid #dc3545;
                margin: 0 0 15px 0;
                background-color: #000;
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
                transition: transform 0.3s, box-shadow 0.3s;
            }

            img.image_search:hover {
                transform: scale(1.05);
                box-shadow: 0 4px 15px rgba(0, 0, 0, 0.5);
            }
        </style>
        <section class="container">
            <div style="border-top: 3px solid #000; margin:50px 0 3px 0">
                <h1 style="text-align: center;  margin: 20px 0 50px 0;">Sản Phẩm tìm kiếm</h1>
            </div>
            <div class="row">
                <?php foreach ($searchPaginate as $value): ?>
                    <div class="col-3">
                        <img class="image_search" src="public/img/<?php echo $value['image'] ?>" alt="img-fluid"><br>
                        <h5><?php echo $value['name'] ?></h5>
                        <b>Giá: $<?php echo $value['price'] ?></b><br>
                        <span><?php echo $value['star'] ?></span>
                    </div>
                <?php endforeach ?>
            </div>
            <div style="display: flex;
            align-items: center;
            justify-content: center; " class="pagination mt-5">
                <?php echo $product->paginate($url, $total, $page, $count, 2) ?>
            </div>
        </section>
<?php endif;
endif;

echo "<p>Please input key need find!</p>"
?>

<?php
include "DuoiMain.php";
include "footer.php";
?>