<?php 
class categary extends Db{
    public function getallcategary(){
        $sql = self::$connection->prepare("SELECT * FROM `categary`");
        $sql->execute();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }
}
?>