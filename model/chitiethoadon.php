<?php
class CHITITETHOADON
{
    // khai báo các thuộc tính
    private $id;
    private $hoadon_id;
    private $chitiethoadon_id;
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
    public function gethoadon_id()
    {
        return $this->hoadon_id;
    }
    public function sethoadon_id($value)
    {
        $this->hoadon_id = $value;
    }
    public function getchitiethoadon_id()
    {
        return $this->chitiethoadon_id;
    }
    public function setchitiethoadon_id($value)
    {
        $this->chitiethoadon_id = $value;
    }
    public function getthanhtien()
    {
        return $this->thanhtien;
    }
    public function setthanhtien($value)
    {
        $this->thanhtien = $value;
    }
    public function getsoluong()
    {
        return $this->soluong;
    }
    public function setsoluong($value)
    {
        $this->soluong = $value;
    }

    // Lấy danh sách
    public function laychitiethoadon()
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM chitiethoadon ORDER BY id DESC ";
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
    public function timkiemchitiethoadon($search)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM chitiethoadon c, mypham m where m.id = c.mypham_id AND m.hoadon_id like '%$search%'  "; //OR p.tenpl like '%$search%'
            $cmd = $dbcon->prepare($sql);
            // $cmd->bindValue(":hoadon_id", $search);
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
    // public function laychitiethoadontheoloai($loaisp)
    // {
    //     $dbcon = DATABASE::connect();
    //     try {
    //         $sql = "SELECT * FROM chitiethoadon WHERE mypham_id=:madm";
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

    // Lấy mặt hàng theo id
    public function laychitiethoadontheoid($id)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM chitiethoadon WHERE id=:id";
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
    //         $sql = "UPDATE chitiethoadon SET luotxem=luotxem+1 WHERE id=:id";
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
    // // Lấy mặt hàng xem nhiều
    // public function laychitiethoadonxemnhieu()
    // {
    //     $dbcon = DATABASE::connect();
    //     try {
    //         $sql = "SELECT * FROM chitiethoadon ORDER BY luotxem DESC LIMIT 3";
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
    public function themchitiethoadon($chitiethoadon)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "INSERT INTO 
chitiethoadon(hoadon_id,mypham_id,soluong,thanhtien) 
VALUES(:hoadon_id,:mypham_id,:soluong,:thanhtien)";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":hoadon_id", $chitiethoadon->hoadon_id);
            $cmd->bindValue(":mypham_id", $chitiethoadon->mypham_id);
            $cmd->bindValue(":soluong", $chitiethoadon->soluong);
            $cmd->bindValue(":thanhtien", $chitiethoadon->thanhtien);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // Xóa 
    public function xoachitiethoadon($chitiethoadon)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "DELETE FROM chitiethoadon WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":id", $chitiethoadon->id);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // Cập nhật 
    public function suachitiethoadon($chitiethoadon)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "UPDATE chitiethoadon SET hoadon_id=:hoadon_id,
            mypham_id=:mypham_id,
            soluong=:soluong,
            thanhtien=:thanhtien,
            WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":hoadon_id", $chitiethoadon->hoadon_id);
            $cmd->bindValue(":mypham_id", $chitiethoadon->mypham_id);
            $cmd->bindValue(":soluong", $chitiethoadon->soluong);
            $cmd->bindValue(":thanhtien", $chitiethoadon->thanhtien);
            $cmd->bindValue(":id", $chitiethoadon->id);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
}
