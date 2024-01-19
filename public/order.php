<?php include("./inc/top.php") ?>

<!-- Checkout Page Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <h1 class="mb-4">Đơn Mua
            <?php if (isset($_SESSION["nguoidung"])) { ?></h1>
        <form action="index.php" method="post">
            <input type="hidden" name="txtid" value="<?php echo $_SESSION["nguoidung"]["id"]; ?>">
            <input type="hidden" name="action" value="luudonhang">
            <div class="row g-3">
                <div class="col-md-12 col-lg-6 col-xl-4 bg-light rounded-4">
                    <img  class="text-center rounded-circle" src="../img/user/<?php echo $_SESSION["nguoidung"]["hinhanh"];   ?>" alt="">
                </div>
            <?php } ?>
            <div class="col-md-12 col-lg-6 col-xl-8">
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
            </div>
            </div>
        </form>
    </div>
</div>
<!-- Checkout Page End -->

<?php include("./inc/bottom.php") ?>