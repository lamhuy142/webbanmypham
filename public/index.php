<?php
require("../model/database.php");
require("../model/mypham.php");
require("../model/loaimypham.php");
require("../model/nguoidung.php");

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

switch ($action) {
    case "macdinh":
        $loai = $lmp->layloaimypham();
        $mypham = $mp->laymypham();
        include("main.php");
        break;
    case "xemtatca":
        $mypham = $mp->laymypham();
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
            include("detail.php");
        }
        break;
    case "dangnhap":
        include("login.php");
        break;
    case "xulydangnhap":
        $email = $_POST["txtemail"];
        $matkhau= $_POST["txtmatkhau"];
        if ($nd->kiemtranguoidunghople($email, $matkhau) == TRUE) {
            $_SESSION["nguoidung"] = $nd->laythongtinnguoidung($email);
            if ($_SESSION["nguoidung"]["loaind_id"] == "3") {
                $mypham = $mp->laymypham();
                include("main.php");
            } else {
            }
        } else {
            include("login.php");
        }
        break;
    case "dangky":

        include("dangky.php");
        break;
    case "quenmatkhau":

        include("forgot-password.php");
        break;
    default:
        break;
}

?>