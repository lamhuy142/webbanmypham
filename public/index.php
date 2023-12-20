<?php
require("../model/database.php");
require("../model/mypham.php");
require("../model/loaimypham.php");
require("../model/nguoidung.php");
require("../model/giohang.php");
require("../model/chitiethoadon.php");
require("../model/hoadon.php");

// Hàm validate email
function validateEmail($email)
{
    // Kiểm tra tính hợp lệ của email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return false;
    }
    return true;
}

// Hàm validate mật khẩu
function validatePassword($password)
{
    // Kiểm tra tính hợp lệ của mật khẩu, ví dụ: ít nhất 6 ký tự
    if (strlen($password) < 6) {
        return false;
    }
    return true;
}

// Xét xem có thao tác nào được chọn
// Biến $isLogin cho biết người dùng đăng nhập chưa
$isLogin = isset($_SESSION["nguoidung"]);
if (isset($_REQUEST["action"])) {
    $action = $_REQUEST["action"];
} else {   // mặc định là xem danh sách
    $action = "macdinh";
}

$mp = new MYPHAM();
$lmp = new LOAIMYPHAM();
$nd = new NGUOIDUNG();
$gh = new GIOHANG();
$cthd = new CHITITETHOADON();
$hd = new HOADON();

switch ($action) {
    case "macdinh":
        $id = $_SESSION["nguoidung"]["id"];
        $sogio = $gh->demgiohang($id);
        $loai = $lmp->layloaimypham();
        $mypham = $mp->laymypham();
        include("main.php");
        break;
    case "search":
        if (isset($_POST["timkiem"])) {
            $ten_tk = $_POST["txtsearch"];
            if ($ten_tk != "") {
                // lấy thông tin sản phẩm
                $mypham = $mp->timkiemmypham($ten_tk);
                $id = $_SESSION["nguoidung"]["id"];
                $sogio = $gh->demgiohang($id);
                include("search.php");
            } else {
                $id = $_SESSION["nguoidung"]["id"];
                $sogio = $gh->demgiohang($id);
                $loai = $lmp->layloaimypham();
                $mypham = $mp->laymypham();
                include("main.php");
            }
        }
        break;
    case "xemtatca":
        $mypham = $mp->laymypham();
        $id = $_SESSION["nguoidung"]["id"];
        $sogio = $gh->demgiohang($id);
        include("shop.php");
        break;
    case "chitiet":
        if (isset($_GET["id"])) {
            $id_mp = $_GET["id"];
            // tăng lượt xem lên 1
            $mp->tangluotxem($id_mp);
            // lấy thông tin chi tiết sản phẩm
            $mpct = $mp->laymyphamtheoid($id_mp);
            // lấy các sản phẩm cùng danh mục
            $loai_id = $mpct["loai_id"];
            // $mypham = $mp->laymyphamtheoloai($loai_id);
            $mypham = $mp->laymypham();
            $id = $_SESSION["nguoidung"]["id"];
            $sogio = $gh->demgiohang($id);
            include("detail.php");
        }
        break;
    case "hoso":
        $id = $_SESSION["nguoidung"]["id"];
        $sogio = $gh->demgiohang($id);
        include("profile.php");
        break;
    case "xlhoso":
        $sua = new NGUOIDUNG();
        $id = $_POST["txtid"];
        $email = $_POST["txtemail"];
        $sdt = $_POST["txtsdt"];
        $tennd = $_POST["txttennd"];
        $hinhanh = $_POST["txthinhanh"];
        $diachi = $_POST["txtdiachi"];

        if ($_FILES["fhinhanh"]["name"] != null) {
            $hinhanh = basename($_FILES["fhinhanh"]["name"]);
            $duongdan = "../img/user/" . $hinhanh;
            move_uploaded_file($_FILES["fhinhanh"]["tmp_name"], $duongdan);
        }

        $nd->capnhatnguoidung($id, $email, $sdt, $tennd, $hinhanh, $diachi);
        $_SESSION["nguoidung"] = $nd->laythongtinnguoidung($email);
        $id = $_SESSION["nguoidung"]["id"];
        $sogio = $gh->demgiohang($id);
        include("profile.php");
        break;
    case "dangnhap":
        include("login.php");
        break;
    case "xulydangnhap":

        $email = $_POST["txtemail"];
        $matkhau = $_POST["txtmatkhau"];

        // Kiểm tra tính hợp lệ của email và mật khẩu
        if (validateEmail($email) && validatePassword($matkhau)) {
            if ($nd->kiemtranguoidunghople($email, $matkhau) == TRUE) {
                $_SESSION["nguoidung"] = $nd->laythongtinnguoidung($email);
                if ($_SESSION["nguoidung"]["loaind_id"] == 2) {
                    $mypham = $mp->laymypham();
                    $loai = $lmp->layloaimypham();
                    $id = $_SESSION["nguoidung"]["id"];
                    $sogio = $gh->demgiohang($id);
                    include("main.php");
                } elseif ($_SESSION["nguoidung"]["loaind_id"] == 1) {
                    $mypham = $mp->laymypham();
                    header("Location:../admin/index.php");
                } else {
                    $thongbao = "Nhập sai mật khẩu hoặc email";
                    include("login.php");
                }
            } else {
                $thongbao = "Nhập sai mật khẩu hoặc email";
                include("login.php");
            }
        } else {
            $thongbao = "Mật khẩu hoặc email khôgn hợp lệ";
            include("login.php");
        }
        break;
    case "dangxuat":
        unset($_SESSION["nguoidung"]);
        $loai = $lmp->layloaimypham();
        $mypham = $mp->laymypham();
        include("main.php");
        break;
    case "dangky":
        include("register.php");
        break;
    case "xulydangky":
        $them = new NGUOIDUNG();
        $them = $nd->settennd($_POST["txttennd"]);
        $them = $nd->setdiachi($_POST["txtdiachi"]);
        $them = $nd->setemail($_POST["txtemail"]);
        $them = $nd->setmatkhau($_POST["txtmatkhau"]);
        $them = $nd->setsdt("");
        $them = $nd->setloaind_id(2);

        $nd->themnguoidung($them);
        // $nguoidung = $nd->laynguoidungtheoid($_POST["txtid"]);
        // $mypham = $mp->laymypham();
        // $loai = $lmp->layloaimypham();
        include("profile.php");
        break;
    case "giohang":
        $giohang = $gh->laygiohang();
        $mypham = $mp->laymypham();
        $id = $_SESSION["nguoidung"]["id"];
        $sogio = $gh->demgiohang($id);
        include("cart.php");
        break;
    case "chovaogio":
        if (isset($_REQUEST["id"]))
            $idmp = $_REQUEST["id"];
        if (isset($_REQUEST["innd"]))
            $idnd = $_REQUEST["innd"];
        if (isset($_REQUEST["soluong"]))
            $soluong = $_REQUEST["soluong"];
        else
            $soluong = "1";

        $mypham = $mp->laymyphamtheoid($idmp);
        $thanhtien = $soluong * $mypham["giaban"];
        $giohang = new GIOHANG();
        $giohang = $gh->setnguoidung_id($idnd);
        $giohang = $gh->setmypham_id($idmp);
        $giohang = $gh->setsoluong($soluong);
        $giohang = $gh->setthanhtien($thanhtien);

        $gh->themgiohang($giohang);

        
        $giohang = $gh->laygiohang();
        $dh_dadat = $dhct->laydonhangct();
        $sanpham = $sp->laysanpham();
        $donhang = $dh->laydonhang();
        $nguoidung = $nd->laynguoidung();
        include("cart.php");
        break;
    case "quenmatkhau":

        include("forgot-password.php");
        break;
    default:
        break;
}
