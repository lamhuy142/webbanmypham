<?php
class GIOHANG
{
    // khai báo các thuộc tính
    private $id;
    private $nguoidung_id;
    private $mypham_id;
    private $soluong;
    private $thanhtien;


    public function getid()
    {
        return $this->id;
    }
    public function setid($value)
    {
        $this->id = $value;
    }
    public function getnguoidung_id()
    {
        return $this->nguoidung_id;
    }
    public function setnguoidung_id($value)
    {
        $this->nguoidung_id = $value;
    }
    public function getmypham_id()
    {
        return $this->mypham_id;
    }
    public function setmypham_id($value)
    {
        $this->mypham_id = $value;
    }
    public function getsoluong()
    {
        return $this->soluong;
    }
    public function setsoluong($value)
    {
        $this->soluong = $value;
    }
    public function getthanhtien()
    {
        return $this->thanhtien;
    }
    public function setthanhtien($value)
    {
        $this->thanhtien = $value;
    }

    // Lấy danh sách
    public function laygiohang()
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM giohang ORDER BY id DESC ";
            $cmd = $dbcon->prepare($sql);
            $cmd->execute();
            $result = $cmd->fetchAll();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // Tìm kiếm 
    public function timkiemgiohang($search)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM giohang  where mypham_id like '%$search%'  "; //OR p.tenpl like '%$search%'
            $cmd = $dbcon->prepare($sql);
            // $cmd->bindValue(":nguoidung_id", $search);
            $cmd->execute();
            $result = $cmd->fetchAll();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    // // Lấy danh sách mặt hàng thuộc 1 danh mục
    // public function laygiohangtheoloai($loaisp)
    // {
    //     $dbcon = DATABASE::connect();
    //     try {
    //         $sql = "SELECT * FROM giohang WHERE mypham_id=:madm";
    //         $cmd = $dbcon->prepare($sql);
    //         $cmd->bindValue(":madm", $loaisp);
    //         $cmd->execute();
    //         $result = $cmd->fetchAll();
    //         return $result;
    //     } catch (PDOException $e) {
    //         $error_message = $e->getMessage();
    //         echo "<p>Lỗi truy vấn: $error_message</p>";
    //         exit();
    //     }
    // }

    // Lấy giohang theo id
    public function laygiohangtheoid($id)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM giohang WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id", $id);
            $cmd->execute();
            $result = $cmd->fetch();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // // Cập nhật lượt xem
    // public function tangluotxem($id)
    // {
    //     $dbcon = DATABASE::connect();
    //     try {
    //         $sql = "UPDATE giohang SET luotxem=luotxem+1 WHERE id=:id";
    //         $cmd = $dbcon->prepare($sql);
    //         $cmd->bindValue(":id", $id);
    //         $result = $cmd->execute();
    //         return $result;
    //     } catch (PDOException $e) {
    //         $error_message = $e->getMessage();
    //         echo "<p>Lỗi truy vấn: $error_message</p>";
    //         exit();
    //     }
    // }
    // Lấy mặt hàng xem nhiều
    // public function laygiohangxemnhieu()
    // {
    //     $dbcon = DATABASE::connect();
    //     try {
    //         $sql = "SELECT * FROM giohang ORDER BY luotxem DESC LIMIT 3";
    //         $cmd = $dbcon->prepare($sql);
    //         $cmd->execute();
    //         $result = $cmd->fetchAll();
    //         return $result;
    //     } catch (PDOException $e) {
    //         $error_message = $e->getMessage();
    //         echo "<p>Lỗi truy vấn: $error_message</p>";
    //         exit();
    //     }
    // }
    // Thêm mới
    public function themgiohang($giohang)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "INSERT INTO 
giohang(nguoidung_id,mypham_id,soluong,thanhtien) 
VALUES(:nguoidung_id,:mypham_id,:soluong,:thanhtien)";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":nguoidung_id", $giohang->nguoidung_id);
            $cmd->bindValue(":mypham_id", $giohang->mypham_id);
            $cmd->bindValue(":soluong", $giohang->soluong);
            $cmd->bindValue(":thanhtien", $giohang->thanhtien);

            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // Xóa 
    public function xoagiohang($giohang)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "DELETE FROM giohang WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id", $giohang->id);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // Cập nhật 
    public function suagiohang($giohang)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "UPDATE giohang SET nguoidung_id=:nguoidung_id,
            mypham_id=:mypham_id,
            soluong=:soluong,
            thanhtien=:thanhtien
            WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":nguoidung_id", $giohang->nguoidung_id);
            $cmd->bindValue(":mypham_id", $giohang->mypham_id);
            $cmd->bindValue(":soluong", $giohang->soluong);
            $cmd->bindValue(":thanhtien", $giohang->thanhtien);
            $cmd->bindValue(":id", $giohang->id);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
}
