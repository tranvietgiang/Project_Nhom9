<?php
class product extends Db
{
    public function getallproduct()
    {
        $sql = self::$connection->prepare("SELECT * FROM `product` ORDER by `createdate` DESC");
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }
    public function getpricebig()
    {
        $sql  = self::$connection->prepare("SELECT * FROM `product` ORDER by `price` DESC");
        $sql->execute();
        $item = array();
        $item = $sql->get_result()->fetch_all(MYSQLI_ASSOC);
        return $item;
    }

    // getName product
    public function GetNameSP($id)
    {
        $sql = self::$connection->prepare("SELECT `name`, `image` FROM `product` WHERE id = ?");
        $sql->bind_param("i", $id);

        $sql->execute();

        $result = $sql->get_result()->fetch_assoc();
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
    function paginate($url, $total, $page, $count, $offset)
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
        //$offset quy định số lượng link hiển thị ở 2 bên trang hiện hành
        //$offset = 2 và $page = 5,lúc này thanh phân trang sẽ hiển thị: 3 4 5 6 7
        if ($from <= 0) {
            $from = 1;
            $to = $offset * 2;
        }
        if ($to > $totalLinks) {
            $to = $totalLinks;
        }
        $link = "";
        $prev = "";
        $next = "";
        for ($j = $from; $j <= $to; $j++) {
            if ($page == $j) {
                // User is on the current page  
                $link .= "<a class='page-link active ' href='$url&page=$j'>$j</a>";
            } else {
                $link .= "<a class='page-link ' href='$url&page=$j'>$j</a>";
            }
        }

        if ($page > 1) {
            $prevPage = $page - 1;
            $prev = "<a class='page-link' href='$url&page=$prevPage'>Prev Link</a>";
        }

        if ($page < $totalLinks) {
            $nextPage = $page + 1;
            $next = "<a  class='page-link' href='$url&page=$nextPage'>Next Link</a>";
        }
        return $prev . $link . $next;
    }
}
