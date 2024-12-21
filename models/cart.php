<?php
class cart extends Db{
 
    
    // lấy prodduct theo iduser 
    public function getallcart($iduser){
        $sql = self::$connection->prepare("SELECT * FROM `cart` WHERE `user_id`= ? ORDER BY `id` DESC");
        $sql->bind_param("i",$iduser);
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }

    // thêm product

    public  function addcart($id_user,$soluong,$name,$price,$image){
        $sql=self::$connection->prepare("INSERT INTO `cart`(`id`, `user_id`, `quantiy`, `name`, `price`, `image`)
                                         VALUES ('',?,?,?,?,?)");
        $sql ->bind_param("iisis",$id_user,$soluong,$name,$price,$image);
        $sql->execute();
        return true;
    }

    // xóa sản phẩm 
    public function remove($id){
            $sql = self::$connection->prepare("DELETE FROM `cart` WHERE `id`= ?");        
            $sql->bind_param("i",$id);
            $sql->execute();
           
            return true;

    }
}
?>