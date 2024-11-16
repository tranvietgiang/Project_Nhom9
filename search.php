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

        <body>
            <section>
                <?php foreach ($temp_search as $value): ?>
                    <h1><?php echo htmlspecialchars($value['name']); ?></h1>
                    <img style="object-fit: contain; width: 300px; height: 300px;"
                        src="<?php echo htmlspecialchars($value['image']); ?>" alt="">
                <?php endforeach ?>
            </section>
        </body>

        </html>

<?php endif;
endif;
?>