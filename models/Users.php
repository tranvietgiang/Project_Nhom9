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
        $sql = self::$connection->prepare("SELECT nameUser, email_id, id FROM `tb_users` WHERE username = ?");
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




    public function ChangePassword($pass_new, $email, $pass_old)
    {
        // Truy vấn lấy mật khẩu cũ
        $getPass = self::$connection->prepare("SELECT `password` FROM `tb_users` WHERE `email_id` = ?");
        $getPass->bind_param("s", $email);
        $getPass->execute();
        $result = $getPass->get_result()->fetch_assoc();

        // Kiểm tra mật khẩu cũ
        if ($result && password_verify($pass_old, $result['password'])) {
            // Hash mật khẩu mới
            $hash = password_hash($pass_new, PASSWORD_DEFAULT);

            // Cập nhật mật khẩu mới
            $update = self::$connection->prepare("UPDATE `tb_users` SET `password` = ? WHERE `email_id` = ?");
            $update->bind_param("ss", $hash, $email);
            return $update->execute();
        }

        return false;
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

    public function MyAccount()
    {
        $sql = self::$connection->prepare("SELECT * FROM `tb_myaccount`");
        $sql->execute();

        $result = $sql->get_result()->fetch_all(MYSQLI_ASSOC);

        return $result;
    }


    // save img
    public function UploadImg($file)
    {
        $sql = self::$connection->prepare("INSERT INTO `tb_fileimg` (`filename`) VALUES(?)");
        $sql->bind_param("s", $file);
        return $sql->execute(); // Trả về true nếu thành công
    }

    // save img
    public function GetImg()
    {
        $sql = self::$connection->prepare("SELECT * FROM `tb_fileimg`");
        $sql->execute();

        $result = $sql->get_result()->fetch_assoc();

        return $result;
    }
}
