<?php


class Admin extends Db
{

    // thêm sản phẩm
    public function AddProduct($name, $price, $image, $catalogue, $detail)
    {
        $sql = self::$connection->prepare("INSERT INTO `product`(`name`, `price`, `image`, `catalogue`, `detail`) VALUES(?,?,?,?,?)");
        $sql->bind_param("sdsis", $name, $price, $image, $catalogue, $detail);

        return $sql->execute();
    }

    public function DisplayProduct()
    {
        $sql = self::$connection->prepare("SELECT * FROM `product`");
        $sql->execute();

        $result = $sql->get_result()->fetch_all(MYSQLI_ASSOC);

        return $result;
    }

    //update
    public function UpdateProduct($name, $price, $image, $catalogue, $detail, $idSP)
    {
        $sql = self::$connection->prepare("UPDATE `product`
        SET `name`= ? ,`price`= ?,`image`= ?,`catalogue`= ?, `detail`= ?  WHERE `id` = ?");
        $sql->bind_param("sdsisi", $name, $price, $image, $catalogue, $detail, $idSP);
        return $sql->execute();
    }
    public function hienthisanpham()
    {
        $sql = self::$connection->prepare("SELECT * FROM `product` ");
        $sql->execute();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }
    public function delete($id)
    {
        $sql = self::$connection->prepare("DELETE FROM `product` WHERE `id`= ?");
        $sql->bind_param("i", $id);
        return $sql->execute();
    }
    public function hienthiphantrang($page, $count)
    {
        $start = ($page - 1) * $count;
        $sql = self::$connection->prepare("SELECT * FROM `product` ORDER BY `createdate` DESC LIMIT ?,?");
        $sql->bind_param("ii", $start, $count);
        $sql->execute();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }
    function paginate($url, $total, $count, $page)
    {
        $totalLinks = ceil($total / $count);
        $link = "";
        for ($j = 1; $j <= $totalLinks; $j++) {
            $link = $link . "<a style='color: red;' href='$url?page=$j'> $j </a>";
        }
        return $link;
    }

    public function GetItemByID($id)
    {
        $sql = self::$connection->prepare("SELECT * FROM `product` WHERE `id` = ?");
        $sql->bind_param("i", $id);
        $sql->execute();

        $result = $sql->get_result()->fetch_all(MYSQLI_ASSOC);

        return $result;
    }

    public function GetAllCate()
    {
        $sql = self::$connection->prepare("SELECT * FROM `categary`");
        $sql->execute();

        $result = $sql->get_result()->fetch_all(MYSQLI_ASSOC);

        return $result;
    }

    public function CheckLoginAdmin($email_id)
    {
        $sql = self::$connection->prepare("SELECT `email_id` FROM `tb_users` WHERE `email_id` = ? AND `role` = 'admin'");
        $sql->bind_param("s", $email_id);
        $sql->execute();

        $result = $sql->get_result()->fetch_assoc();

        return $result ? true : false;
    }

    public function GetInfoAdmin()
    {
        $sql = self::$connection->prepare("SELECT * FROM `tb_users` WHERE `role` = 'admin'");
        $sql->execute();

        $result = $sql->get_result()->fetch_all(MYSQLI_ASSOC);

        return $result;
    }

    // code phần cate
    public function AddCate($name)
    {
        $sql = self::$connection->prepare("INSERT INTO `categary`(`categary`) VALUES (?)");
        $sql->bind_param("s", $name);
        return $sql->execute();
    }
    // code phần cate
    public function DeleteCate($id)
    {
        $sql = self::$connection->prepare("DELETE FROM `categary` WHERE `id` = ?");
        $sql->bind_param("i", $id);
        return $sql->execute();
    }
    // code phần cate
    public function UpdateCate($name)
    {
        $sql = self::$connection->prepare("UPDATE `categary` SET `categary` = ? WHERE `id` = ?");
        $sql->bind_param("s", $name);
        return $sql->execute();
    }

    public function GetCateByID($id)
    {
        $sql = self::$connection->prepare("SELECT * FROM `categary` WHERE `id` = ?");
        $sql->bind_param("i", $id);
        $sql->execute();

        $result = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $result;
    }
    // đếm số trang tìm được
    public function SearchCount($nameSP)
    {
        $sql = self::$connection->prepare("SELECT * FROM `product` WHERE `name` LIKE ?");

        $findGanDung = "%$nameSP%";
        $sql->bind_param("s", $findGanDung);
        $sql->execute();

        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }

    // in ra phân trang
    public function SearchPaginate($keyword, $page, $count)
    {
        // Tính số thứ tự trang bắt đầu
        $start = ($page - 1) * $count;
        $sql = self::$connection->prepare("SELECT * FROM `product` WHERE `name` LIKE ? LIMIT ?,?");
        $keyword = "%$keyword%";
        $sql->bind_param("sii", $keyword, $start, $count);
        $sql->execute();
        $items = array();
        $items = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $items;
    }

    // phân trang
    function paginate1($url, $total, $page, $count, $offset)
    {
        if ($total <= 0) {
            return "";
        }
        $totalLinks = ceil($total / $count);
        if ($totalLinks <= 1) {
            return "";
        }
        $from = $page - $offset;
        $to = $page + $offset;

        if ($from <= 0) {
            $from = 1;
            $to = $offset * 2;
        }
        if ($to > $totalLinks) {
            $to = $totalLinks;
        }

        $link = "<div class='pagination'>"; // Bắt đầu phần phân trang
        $prev = "";
        $next = "";

        for ($j = $from; $j <= $to; $j++) {
            if ($page == $j) {
                $link .= "<a class='page-link active' href='$url&page=$j'>$j</a>"; // Trang hiện tại
            } else {
                $link .= "<a class='page-link' href='$url&page=$j'>$j</a>"; // Các trang khác
            }
        }

        if ($page > 1) {
            $prevPage = $page - 1;
            $prev = "<a class='page-link' href='$url&page=$prevPage'>Prev</a>"; // Liên kết trang trước
        }

        if ($page < $totalLinks) {
            $nextPage = $page + 1;
            $next = "<a class='page-link' href='$url&page=$nextPage'>Next</a>"; // Liên kết trang tiếp theo
        }

        $link .= $prev . $next . "</div>"; // Kết thúc phần phân trang
        return $link;
    }

    // code thống kê

    public function GetRaTingLike()
    {
        $sql = self::$connection->prepare(" SELECT  `sp`.`name`,   `sp`.`image`,SUM(`cmt`.star) / COUNT(*)  AS 'RaTingLike'
        FROM 
            `tb_comment` `cmt` JOIN `product` `sp` ON `cmt`.`idShoes` = `sp`.`id`
        GROUP BY 
            `sp`.`id`, `sp`.`name`, `sp`.`image`
        ORDER BY 
            SUM(`cmt`.star) DESC
        LIMIT 1;");
        $sql->execute();

        $result = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $result;
    }

    public function GetRaTingDislike()
    {
        $sql = self::$connection->prepare("SELECT  `sp`.`name`,   `sp`.`image`,SUM(`cmt`.star) / COUNT(*)  AS 'RaTingDislike'
        FROM 
            `tb_comment` `cmt` JOIN `product` `sp` ON `cmt`.`idShoes` = `sp`.`id`
        GROUP BY 
            `sp`.`id`, `sp`.`name`, `sp`.`image`
        ORDER BY 
            SUM(`cmt`.star)
        LIMIT 1;");
        $sql->execute();

        $result = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $result;
    }

    public function GetCMT()
    {
        $sql = self::$connection->prepare("SELECT `user`.`nameUser`, `user`.`username`, COUNT(`cmt`.`comment`) AS 'SoLanCMT'
        FROM `tb_comment` `cmt` JOIN `tb_users` `user` 
        ON `cmt`.`nameUser` = `user`.`username`
        GROUP BY 
        `user`.`nameUser`, `user`.`username`
        ORDER BY  COUNT(`cmt`.`comment`) DESC LIMIT 1");
        $sql->execute();

        $result = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $result;
    }
}
