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
}
