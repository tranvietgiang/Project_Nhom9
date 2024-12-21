<?php

class review extends Db
{
    public function Comment($nameUser, $comment, $idShoe, $star)
    {
        // Chỉ định rõ các cột cần chèn dữ liệu (ngoại trừ id tự động tăng)
        $sql = self::$connection->prepare("INSERT INTO `tb_comment` (`nameUser`, `comment`, `idShoes`, `star`) VALUES (?, ?, ?, ?)");
        $sql->bind_param("ssis", $nameUser, $comment, $idShoe, $star);

        // Thực thi truy vấn
        $sql->execute();

        // Kiểm tra xem bản ghi đã được thêm thành công chưa
        return $sql->affected_rows > 0;
    }



    // public function PrintComment($nameUser)
    // {
    //     $sql = self::$connection->prepare("SELECT cm.`nameUser`, cm.`comment`
    //     FROM `tb_comment` cm,`product`sp
    //     WHERE cm.`idShoes` = sp.id AND nameUser = ?");

    //     $sql->bind_param("s", $nameUser);
    //     $sql->execute();

    //     $result = $sql->get_result()->fetch_all(MYSQLI_ASSOC);

    //     return $result;
    // }

    public function PrintComment($idShoe)
    {
        $sql = self::$connection->prepare("SELECT `nameUser`, `comment`, `star` 
        FROM `tb_comment` 
        WHERE `idShoes` = ?");
        $sql->bind_param("i", $idShoe);
        $sql->execute();

        $result = $sql->get_result()->fetch_all(MYSQLI_ASSOC);

        return $result;
    }

    public function DeleteComment($nameUser, $comment)
    {
        $sql = self::$connection->prepare("DELETE FROM `tb_comment` where `nameUser` = ? AND comment = ?");
        $sql->bind_param("ss", $nameUser, $comment);


        if ($sql->execute()) {
            return true;
        } else {
            // Handle the error, e.g., log it or display a message  
            return false;
        }
    }


    // Rating star
    public function GetStarByid($idShoe)
    {
        $sql = self::$connection->prepare(
            "SELECT  SUM(star) AS `totalRatings` , COUNT(*) AS `countReviews`
        FROM `tb_comment` 
        WHERE `idShoes` = ?"
        );

        $sql->bind_param("i", $idShoe);
        $sql->execute();

        $result = $sql->get_result()->fetch_all(MYSQLI_ASSOC);

        return $result;
    }
}