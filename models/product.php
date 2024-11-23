<?php 
class product extends Db{
    public function getallproduct(){
        $sql = self::$connection->prepare("SELECT * FROM `product` ORDER by `createdate` DESC");
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }
    public function getpricebig(){
        $sql  = self::$connection->prepare("SELECT * FROM `product` ORDER by `price` DESC");
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }

}

?>