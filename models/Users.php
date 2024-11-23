<?php
class Users_shoes extends Db
{
    public function CheckLogin($tk, $mk)
    {
        $sql = self::$connection->prepare("SELECT * FROM `tb_users` WHERE `username` = ?");
        $sql->bind_param("s", $tk);
        $sql->execute();

        $result = $sql->get_result()->fetch_assoc();

        if ($result && password_verify($mk, $result['password'])) {
            return true;
        }

        return false;
    }

    // lấy tên user dựa vào tên tài khoản
    public function GetUserInfo($username)
    {
        $sql = self::$connection->prepare("SELECT nameUser, email_id FROM `tb_users` WHERE username = ?");
        $sql->bind_param("s", $username);
        $sql->execute();

        // Lấy kết quả trả về và kiểm tra
        $result = $sql->get_result()->fetch_all(MYSQLI_ASSOC);

        if (count($result) > 0) {
            // Trả về mảng chứa nameUser và email
            return $result[0];  // Mảng chứa nameUser và email
        } else {
            // Nếu không tìm thấy người dùng, trả về null
            return null;
        }
    }



    public function ChangPassword($pass_new, $email, $pass_old,)
    {
        $sql = self::$connection->prepare("UPDATE `tb_users` SET `password` = ? WHERE `email_id` = ? AND `password` = ?");

        // Liên kết tham số với kiểu dữ liệu tương ứng
        $sql->bind_param("sss", $pass_new, $email, $pass_old);

        $sql->execute();


        if ($sql->affected_rows > 0) {
            return true;
        } else {
            return false;
        }

        return $result;
    }
    public function Register($nameUser, $username, $password, $email)
    {
        $encryption = password_hash($password, PASSWORD_DEFAULT);
        $sql = self::$connection->prepare("INSERT INTO `tb_users` (`nameUser`,`username`, `password`, `email_id`, `role`) VALUES (?, ?, ?, ?, 'Customer')");

        // $encryption = hash("sha512", $password);
        $sql->bind_param('ssss', $nameUser, $username, $encryption, $email);
        // Thực thi câu lệnh
        $sql->execute();

        return true;
    }
    public function checkusername($user)
    {
        $sql = self::$connection->prepare("SELECT * FROM `tb_users` WHERE username = ?");
        $sql->bind_param("s", $user);
        $sql->execute();
        $item = $sql->get_result();
        if ($item->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }
    public function checkemail($email)
    {
        $sql = self::$connection->prepare("SELECT * FROM `tb_users` WHERE email_id = ?");
        $sql->bind_param("s", $email);
        $sql->execute();
        $item = $sql->get_result();
        if ($item->num_rows > 0) {
            return true;
        } else {
            return false;
        }
    }
}
