<?php
// if (!isset($_SESSION["nguoidung"]))
//     header("location:../index.php");

require("../../model/database.php");
require("../../model/loaimypham.php");
require("../../model/mypham.php");



// Xét xem có thao tác nào được chọn
if (isset($_REQUEST["action"])) {
    $action = $_REQUEST["action"];
} else {   // mặc định là xem danh sách
    $action = "xem";
}

$lmp = new LOAIMYPHAM();
$mp = new MYPHAM();

$idsua = 0;

switch ($action) {
    case "xem":
        $loai = $lmp->layloaimypham();
        $mypham = $mp->laymypham();
        include("main.php");
        break;
    case "xoa":
        $xoa = new MYPHAM();
        $xoa->setid($_GET["id"]);
        $mypham = $mp->xoamypham($xoa);
        $loai = $lmp->layloaimypham();
        $mypham = $mp->laymypham();
        include("main.php");
        break;
    case "them":
        $loai = $lmp->layloaimypham();
        $mypham = $mp->laymypham();
        include("add.php");
        break;
    case "xulythem":
        //xử lý load ảnh
        $hinhanh = basename($_FILES["fileanh"]["name"]); // đường dẫn ảnh lưu trong db
        $duongdan = "../../img/products/" . $hinhanh; //nơi lưu file upload
        move_uploaded_file($_FILES["fileanh"]["tmp_name"], $duongdan);
        //xử lý load ảnh
        $hinhanh1 = basename($_FILES["fileanh1"]["name"]); // đường dẫn ảnh lưu trong db
        $duongdan1 = "../../img/products/" . $hinhanh1; //nơi lưu file upload
        move_uploaded_file($_FILES["fileanh1"]["tmp_name"], $duongdan);
        //xử lý load ảnh
        $hinhanh2 = basename($_FILES["fileanh2"]["name"]); // đường dẫn ảnh lưu trong db
        $duongdan2 = "../../img/products/" . $hinhanh2; //nơi lưu file upload
        move_uploaded_file($_FILES["fileanh2"]["tmp_name"], $duongdan);
        //xử lý load ảnh
        $hinhanh3 = basename($_FILES["fileanh3"]["name"]); // đường dẫn ảnh lưu trong db
        $duongdan3 = "../../img/products/" . $hinhanh; //nơi lưu file upload
        move_uploaded_file($_FILES["fileanh3"]["tmp_name"], $duongdan);
        //xử lý thêm mặt hàng
        $moi = new MYPHAM();
        $moi->settenmp($_POST["txttenmp"]);
        $moi->setloai_id($_POST["optphanloai"]);
        $moi->setthuonghieu($_POST["txtthuonghieu"]);
        $moi->sethinhanh1($hinhanh1);
        $moi->sethinhanh2($hinhanh2);
        $moi->sethinhanh3($hinhanh3);
        $moi->setgiagoc($_POST["txtgianhap"]);
        $moi->setgiaban($_POST["txtgiaban"]);
        $moi->setsoluong($_POST["txtsoluongton"]);
        $moi->setmota($_POST["txtmota"]);
        $moi->sethinhanh($hinhanh);
        // thêm
        $mp->themmypham($moi);      

        // load sản phẩm
        $loai = $lmp->layloaimypham();
        $mypham = $mp->laymypham();
        include("main.php");
        break;
    case "sua":
        if (isset($_GET["id"])) {
            $mpht = $mp->laymyphamtheoid($_GET["id"]);
            $loai = $lmp->layloaimypham();
            include("update.php");
        } else {
            $mypham = $mp->laymypham();
            include("main.php");
        }
        break;
    case "xulysua": // lưu dữ liệu sửa mới vào db

        // gán dữ liệu từ form
        $spsua = new SANPHAM();
        $spsua->setid($_POST["txtid"]);
        $spsua->setmota($_POST["txtmota"]);
        $spsua->setphanloaisp($_POST["optphanloai"]);
        $spsua->settensp($_POST["txttensp"]);
        $spsua->setgiagoc($_POST["txtgiagoc"]);
        $spsua->setgiaban($_POST["txtgiaban"]);
        $spsua->setsoluongton($_POST["txtsoluongton"]);
        $spsua->sethinhanh($_POST["txthinhcu"]);
        $spsua->setluotxem($_POST["txtluotxem"]);
        $spsua->setluotmua($_POST["txtluotmua"]);

        if ($_FILES["filehinhanh"]["name"] != "") {
            //xử lý load ảnh
            $hinhanh = "images/products/" . basename($_FILES["filehinhanh"]["name"]); // đường dẫn ảnh lưu trong db
            $spsua->sethinhanh($hinhanh);
            $duongdan = "../../" . $hinhanh; //nơi lưu file upload
            move_uploaded_file($_FILES["filehinhanh"]["tmp_name"], $duongdan);
        }
        // sửa
        $sp->suasanpham($spsua);
        // load danh sách
        $sanpham = $sp->laysanpham();
        include("main.php");
        break;
    default:
        break;
}
