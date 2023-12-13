<?php
require("../model/database.php");
require("../model/mypham.php");
require("../model/loaimypham.php");

// Xét xem có thao tác nào được chọn
if (isset($_REQUEST["action"])) {
    $action = $_REQUEST["action"];
} else {   // mặc định là xem danh sách
    $action = "macdinh";
}

$mp = new MYPHAM();
$lmp = new LOAIMYPHAM();

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
            $mypham = $mp->laymyphamtheoloai($loai_id);
            include("chitiet.php");
        }
        break;
    case "xulydangnhap":
        
        include("main.php");
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