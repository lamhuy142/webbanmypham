<?php include("./inc/top.php") ?>

<!-- Checkout Page Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <h1 class="mb-4">Hóa Đơn Chi Tiết
            <?php if (isset($_SESSION["nguoidung"])) { ?></h1>
        <form action="index.php" method="post">
            <input type="hidden" name="txtid" value="<?php echo $_SESSION["nguoidung"]["id"]; ?>">
            <input type="hidden" name="action" value="luudonhang">
            <div class="row g-5">
                <div class="col-md-12 col-lg-6 col-xl-7">
                    <div class="row">
                        <div class="col-md-12 col-lg-6">
                            <div class="form-item w-100">
                                <label class="form-label my-3">Email<sup>*</sup></label>
                                <input type="text" class="form-control" name="txtemail" value="<?php echo $_SESSION["nguoidung"]["email"]; ?>" disabled>
                            </div>
                        </div>
                        <div class=" col-md-12 col-lg-6">
                            <div class="form-item w-100">
                                <label class="form-label my-3">Số điện thoại<sup>*</sup></label>
                                <input type="text" class="form-control" name="txtsodienthoai" value="<?php echo $_SESSION["nguoidung"]["sdt"] ?>" disabled>
                            </div>
                        </div>
                    </div>
                    <div class="form-item">
                        <label class="form-label my-3">Họ tên<sup>*</sup></label>
                        <input type="text" class="form-control" name="txthoten" value="<?php echo $_SESSION["nguoidung"]["tennd"]; ?>" disabled>
                    </div>
                    <div class="form-item">
                        <label class="form-label my-3">Địa chỉ <sup>*</sup></label>
                        <input type="text" class="form-control" id="diachi" placeholder="Địa chỉ" name="txtdiachi" value="<?php echo $_SESSION['nguoidung']['diachi']; ?>" disabled>
                    </div>
                </div>
            <?php } ?>
            <div class="col-md-12 col-lg-6 col-xl-5">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Sản phẩm</th>
                                <th scope="col">Tên</th>
                                <th scope="col">Đơn giá</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Thành tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($giohang as $id => $mh) : ?>
                                <tr>
                                    <th scope="row">
                                        <div class="d-flex align-items-center mt-2">
                                            <img src="../img/products/<?php echo $mh['hinhanh']; ?>" class="img-fluid rounded-circle" style="width: 90px; height: 90px;" alt="">
                                        </div>
                                    </th>
                                    <td class="py-5"><?php echo mb_substr($mh['tenmp'], 0, 20) . "..."; ?></td>
                                    <td class="py-5"><?php echo number_format($mh['giaban']); ?></td>
                                    <td class="py-5"><?php echo $mh['soluong']; ?></td>
                                    <td class="py-5"><?php echo number_format($mh['thanhtien']); ?></td>
                                </tr>
                            <?php endforeach; ?>

                            <tr>
                                <th scope="row">
                                </th>
                                <td class="py-5">
                                    <p class="mb-0 text-dark text-uppercase py-3">TỔNG TIỀN</p>
                                </td>
                                <td class="py-5"></td>
                                <td class="py-5"></td>
                                <td class="py-5">
                                    <div class="py-3 border-bottom border-top">
                                        <p class="mb-0 text-dark"><?php echo number_format(tinhtiengiohang()); ?></p>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="row g-4 text-center align-items-center justify-content-center pt-4">
                    <input type="submit" class="btn border-secondary py-3 px-4 text-uppercase w-100 text-primary" value="Hoàn Tất Đơn Hàng"></input>
                </div>
            </div>
            </div>
        </form>
    </div>
</div>
<!-- Checkout Page End -->

<?php include("./inc/bottom.php") ?>