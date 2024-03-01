<?php
class MYPHAM
{
    // khai báo các thuộc tính
    private $idmp;
    private $tenmp;
    private $loai_id;
    private $thuonghieu;
    private $hinhanh1;
    private $hinhanh2;
    private $hinhanh3;
    private $giagoc;
    private $giaban;
    private $soluong;
    private $luotmua;
    private $luotxem;
    private $mota;
    private $tinhtrang;
    private $hinhanh;
    
    public function getidmp()
    {
        return $this->idmp;
    }
    public function setidmp($value)
    {
        $this->idmp = $value;
    }
    public function gettenmp()
    {
        return $this->tenmp;
    }
    public function settenmp($value)
    {
        $this->tenmp = $value;
    }
    public function getloai_id()
    {
        return $this->loai_id;
    }
    public function setloai_id($value)
    {
        $this->loai_id = $value;
    }
    public function getthuonghieu()
    {
        return $this->thuonghieu;
    }
    public function setthuonghieu($value)
    {
        $this->thuonghieu = $value;
    }
    public function gethinhanh1()
    {
        return $this->hinhanh1;
    }
    public function sethinhanh1($value)
    {
        $this->hinhanh1 = $value;
    }
    public function gethinhanh2()
    {
        return $this->hinhanh2;
    }
    public function sethinhanh2($value)
    {
        $this->hinhanh2 = $value;
    }
    public function gethinhanh3()
    {
        return $this->hinhanh3;
    }
    public function sethinhanh3($value)
    {
        $this->hinhanh3 = $value;
    }
    public function getgiagoc()
    {
        return $this->giagoc;
    }
    public function setgiagoc($value)
    {
        $this->giagoc = $value;
    }
    public function getgiaban()
    {
        return $this->giaban;
    }
    public function setgiaban($value)
    {
        $this->giaban = $value;
    }
    public function getsoluong()
    {
        return $this->soluong;
    }
    public function setsoluong($value)
    {
        $this->soluong = $value;
    }
    
    public function getmota()
    {
        return $this->mota;
    }
    public function setmota($value)
    {
        $this->mota = $value;
    }
    public function gettinhtrang()
    {
        return $this->tinhtrang;
    }
    public function settinhtrang($value)
    {
        $this->tinhtrang = $value;
    }
    public function getluotxem()
    {
        return $this->luotxem;
    }
    public function setluotxem($value)
    {
        $this->luotxem = $value;
    }
    public function getluotmua()
    {
        return $this->luotmua;
    }
    public function setluotmua($value)
    {
        $this->luotmua = $value;
    }
    public function gethinhanh()
    {
        return $this->hinhanh;
    }
    public function sethinhanh($value)
    {
        $this->hinhanh = $value;
    }


    // Lấy danh sách
    public function laymypham()
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM mypham ORDER BY idmp DESC ";
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
    public function timkiemmypham($search)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM mypham WHERE tenmp like '%$search%'  "; //OR p.tenpl like '%$search%' //m, loaimypham l where m.loai_id = l.id AND m.
            $cmd = $dbcon->prepare($sql);
            // $cmd->bindValue(":tenmp", $search);
            $cmd->execute();
            $result = $cmd->fetchAll();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    // Lấy danh sách mặt hàng thuộc 1 danh mục
    public function laymyphamtheoloai($loaisp)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM mypham WHERE loai_id=:madm";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":madm", $loaisp);
            $cmd->execute();
            $result = $cmd->fetchAll();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }

    // Lấy mặt hàng theo id
    public function laymyphamtheoid($idmp)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM mypham WHERE idmp=:idmp";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":idmp", $idmp);
            $cmd->execute();
            $result = $cmd->fetch();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // Cập nhật lượt xem
    public function tangluotxem($idmp)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "UPDATE mypham SET luotxem=luotxem+1 WHERE idmp=:idmp";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":idmp", $idmp);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // Lấy mặt hàng xem nhiều
    public function laymyphamxemnhieu()
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "SELECT * FROM mypham ORDER BY luotxem DESC LIMIT 3";
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
    // Thêm mới
    public function themmypham($mypham)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "INSERT INTO 
mypham(tenmp,loai_id,thuonghieu,hinhanh1,hinhanh2,hinhanh3,giagoc,giaban,soluong,luotmua,luotxem,mota,tinhtrang,hinhanh) 
VALUES(:tenmp,:loai_id,:thuonghieu,:hinhanh1,:hinhanh2,:hinhanh3,:giagoc,:giaban,:soluong,0,0,:mota,1,:hinhanh)";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":tenmp", $mypham->tenmp);
            $cmd->bindValue(":loai_id", $mypham->loai_id);
            $cmd->bindValue(":thuonghieu", $mypham->thuonghieu);
            $cmd->bindValue(":hinhanh1", $mypham->hinhanh1);
            $cmd->bindValue(":hinhanh2", $mypham->hinhanh2);
            $cmd->bindValue(":hinhanh3", $mypham->hinhanh3);
            $cmd->bindValue(":giagoc", $mypham->giagoc);
            $cmd->bindValue(":giaban", $mypham->giaban);
            $cmd->bindValue(":soluong", $mypham->soluong);
            $cmd->bindValue(":mota", $mypham->mota);
            $cmd->bindValue(":hinhanh", $mypham->hinhanh);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // Xóa 
    public function xoamypham($mypham)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "DELETE FROM mypham WHERE idmp=:idmp";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":idmp", $mypham->idmp);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // Cập nhật 
    public function suamypham($mypham)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "UPDATE mypham SET tenmp=:tenmp,
            loai_id=:loai_id,
            thuonghieu=:thuonghieu,
            hinhanh1=:hinhanh1,
            hinhanh2=:hinhanh2,
            hinhanh3=:hinhanh3,
            giagoc=:giagoc,
            giaban=:giaban,
            soluong=:soluong,
            luotmua=:luotmua,
            luotxem=:luotxem,
            mota=:mota,
            tinhtrang=:tinhtrang,
            hinhanh=:hinhanh
            WHERE id=:id";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":tenmp", $mypham->tenmp);
            $cmd->bindValue(":loai_id", $mypham->loai_id);
            $cmd->bindValue(":thuonghieu", $mypham->thuonghieu);
            $cmd->bindValue(":hinhanh1", $mypham->hinhanh1);
            $cmd->bindValue(":hinhanh2", $mypham->hinhanh2);
            $cmd->bindValue(":hinhanh3", $mypham->hinhanh3);
            $cmd->bindValue(":giagoc", $mypham->giagoc);
            $cmd->bindValue(":giaban", $mypham->giaban);
            $cmd->bindValue(":soluong", $mypham->soluong);
            $cmd->bindValue(":luotmua", $mypham->luotmua);
            $cmd->bindValue(":luotxem", $mypham->luotxem);
            $cmd->bindValue(":mota", $mypham->mota);
            $cmd->bindValue(":tinhtrang", $mypham->tinhtrang);
            $cmd->bindValue(":hinhanh", $mypham->hinhanh);
            $cmd->bindValue(":id", $mypham->id);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    public function capnhatsoluong($idmp, $soluong)
    {
        $dbcon = DATABASE::connect();
        try {
            $sql = "UPDATE mypham SET soluong=soluong - :soluong WHERE idmp=:idmp";
            $cmd = $dbcon->prepare($sql);
            $cmd->bindValue(":soluong", $soluong);
            $cmd->bindValue(":idmp", $idmp);
            $result = $cmd->execute();
            return $result;
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
    }
    // Hàm gợi ý sản phẩm
    public function getRecommendedProducts($userPreferences) 
    {
        //global $conn;
        $dbcon = DATABASE::connect();
        try{
            // Chuyển đổi các thuộc tính người dùng thành câu truy vấn SQL
        $preferences = implode("', '", $userPreferences);
        
        // Truy vấn MySQL để lấy sản phẩm gợi ý dựa trên thuộc tính
        $sql = "SELECT * FROM mypham WHERE attribute IN ('$preferences') ORDER BY RAND() LIMIT 5";
        $cmd = $dbcon->prepare($sql);
        $result = $cmd->execute();
            return $result;
        }catch (PDOException $e) {
            $error_message = $e->getMessage();
            echo "<p>Lỗi truy vấn: $error_message</p>";
            exit();
        }
        
        //$result = $conn->query($sql);
        
        // if ($result->num_rows > 0) {
        //     while($row = $result->fetch_assoc()) {
        //         echo "<p><strong>" . $row["product_name"]. "</strong><br>" . $row["description"]. "</p>";
        //     }
        // } else {
        //     echo "Không có sản phẩm gợi ý.";
        // }
    }

        // // Thử nghiệm
        // $userPreferences = ['moisturizing', 'organic'];
        // getRecommendedProducts($userPreferences);
}
