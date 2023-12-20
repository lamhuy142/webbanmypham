<?php
if (!isset($_SESSION["nguoidung"]))
    header("location:../index.php");

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
        $sua = new MYPHAM();
        $sua->setid($_POST["id"]);
        $sua->setthuonghieu($_POST["txtthuonghieu"]);
        $sua->setmota($_POST["txtmota"]);
        $sua->setloai_id($_POST["optphanloai"]);
        $sua->settenmp($_POST["txttenmp"]);
        $sua->setgiagoc($_POST["txtgiagoc"]);
        $sua->setgiaban($_POST["txtgiaban"]);
        $sua->setsoluong($_POST["txtsoluongton"]);
        $sua->sethinhanh($_POST["txthinh"]);
        $sua->sethinhanh1($_POST["txthinh1"]);
        $sua->sethinhanh2($_POST["txthinh2"]);
        $sua->sethinhanh3($_POST["txthinh3"]);
        $sua->setluotxem($_POST["txtluotxem"]);
        $sua->setluotmua($_POST["txtluotmua"]);
        $sua->settinhtrang($_POST["txttinhtrang"]);

        if ($_FILES["filehinhanh"]["name"] != "") {
            //xử lý load ảnh
            $hinhanh = basename($_FILES["filehinhanh"]["name"]); // đường dẫn ảnh lưu trong db
            $sua->sethinhanh($hinhanh);
            $duongdan = "../../img/products/" . $hinhanh; //nơi lưu file upload
            move_uploaded_file($_FILES["filehinhanh"]["tmp_name"], $duongdan);
        }
        if ($_FILES["filehinhanh1"]["name"] != "") {
            //xử lý load ảnh
            $hinhanh1 = basename($_FILES["filehinhanh1"]["name"]); // đường dẫn ảnh lưu trong db
            $sua->sethinhanh1($hinhanh1);
            $duongdan1 = "../../img/products/" . $hinhanh1; //nơi lưu file upload
            move_uploaded_file($_FILES["filehinhanh1"]["tmp_name"], $duongdan1);
        }
        if ($_FILES["filehinhanh2"]["name"] != "") {
            //xử lý load ảnh
            $hinhanh2 = basename($_FILES["filehinhanh2"]["name"]); // đường dẫn ảnh lưu trong db
            $sua->sethinhanh2($hinhanh2);
            $duongdan2 = "../../img/products/" . $hinhanh2; //nơi lưu file upload
            move_uploaded_file($_FILES["filehinhanh2"]["tmp_name"], $duongdan2);
        }
        if ($_FILES["filehinhanh3"]["name"] != "") {
            //xử lý load ảnh
            $hinhanh3 = basename($_FILES["filehinhanh3"]["name"]); // đường dẫn ảnh lưu trong db
            $sua->sethinhanh3($hinhanh3);
            $duongdan3 = "../../img/products/" . $hinhanh3; //nơi lưu file upload
            move_uploaded_file($_FILES["filehinhanh3"]["tmp_name"], $duongdan3);
        }
        // sửa
        $mp->suamypham($sua);
        // load danh sách
        $loai = $lmp->layloaimypham();
        $mypham = $mp->laymypham();
        include("main.php");
        break;
    default:
        break;
}
