
<?php
if (!isset($_SESSION["nguoidung"]))
    header("location:../index.php");

require("../../model/database.php");
require("../../model/loaimypham.php");

// Xét xem có thao tác nào được chọn
if (isset($_REQUEST["action"])) {
    $action = $_REQUEST["action"];
} else {   // mặc định là xem danh sách
    $action = "xem";
}

$lmp = new LOAIMYPHAM();
$idsua = 0;

switch ($action) {
    case "xem":
        $phanloai = $lmp->layloaimypham();
        include("main.php");
        break;
    case "sua": // hiển thị form
        $idsua = $_GET["id"];
        $phanloai = $lmp->layloaimypham();
        include("main.php");
        break;
    case "capnhat": // lưu dữ liệu sửa mới vào db
        // gán dữ liệu từ form
        $lmpmoi = new LOAIMYPHAM();
        $lmpmoi->setid($_POST["id"]);
        $lmpmoi->settenloai($_POST["ten"]);
        // sửa
        $lmp->sualoaimypham($lmpmoi);
        // load danh sách
        $phanloai = $lmp->layloaimypham();
        include("main.php");
        break;
    case "them":
        // gán dữ liệu từ form
        $lmpmoi = new LOAIMYPHAM();
        $lmpmoi->settenloai($_POST["ten"]);
        // thêm
        $lmp->themloaimypham($lmpmoi);
        // load danh sách
        $phanloai = $lmp->layloaimypham();
        include("main.php");
        break;
    case "xoa":
        // lấy dòng muốn xóa
        $lmpxoa = new LOAIMYPHAM();
        $lmpxoa->setid($_GET["id"]);
        // xóa
        $lmp->xoaloaimypham($lmpxoa);
        // load danh sách
        $phanloai = $lmp->layloaimypham();
        include("main.php");
        break;
    default:
        break;
}
?>
