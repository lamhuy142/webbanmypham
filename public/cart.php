<?php include("./inc/top.php") ?>

<!-- Cart Page Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <?php
        if (demhangtronggio() == 0) { ?>
            <h3 class="text-secondary">Giỏ hàng rỗng!</h3>
            <p>Vui lòng chọn sản phẩm...</p>
        <?php } else { ?>
            <div class="table-responsive">
                <form action="index.php">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Hình ảnh</th>
                                <th scope="col">Tên</th>
                                <th scope="col">Đơn giá</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Tổng tiền</th>
                                <th scope="col">Xóa khỏi giỏ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($giohang as $id => $mh) : ?>
                                <tr>
                                    <th scope="row">
                                        <div class="d-flex align-items-center">
                                            <img src="../img/products/<?php echo $mh['hinhanh']; ?>" class="img-fluid me-5 rounded-circle" style="width: 80px; height: 80px;" alt="">
                                        </div>
                                    </th>
                                    <td>
                                        <p class="mb-0 mt-4"><?php echo mb_substr($mh['tenmp'], 0, 30) . "..."; ?></p>
                                    </td>
                                    <td>
                                        <p class="mb-0 mt-4"><?php echo number_format($mh["giaban"]); ?>đ</p>
                                    </td>
                                    <td>
                                        <div class="input-group quantity mt-4" style="width: 100px;">
                                            <div class="input-group-btn">
                                                <a href="index.php?action=giamsoluong&id=<?php echo $id; ?>" class="btn btn-sm btn-minus rounded-circle bg-light border">
                                                    <i class="bi bi-dash-circle-fill"></i>
                                                </a>
                                            </div>
                                            <input type="text" class="form-control form-control-sm text-center border-0" value="<?php echo $mh['soluong']; ?>">
                                            <div class="input-group-btn">
                                                <a href="index.php?action=tangsoluong&id=<?php echo $id; ?>" class="btn btn-sm btn-plus rounded-circle bg-light border">
                                                    <i class="bi bi-plus-circle-fill"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                    <!-- <td>
                                        <input class="form-control text-center" type="number" name="mh[<php echo $id; ?>]" id="" value="<php echo $mh["soluong"]; ?>">
                                    </td> -->
                                    <td>
                                        <p class="mb-0 mt-4"><?php echo number_format($mh['thanhtien']); ?>đ</p>
                                    </td>
                                    <td>

                                        <a href="index.php?action=xoamathang&id=<?php echo $id; ?>" class="btn btn-md rounded-circle bg-light border mt-4">
                                            <i class="fa fa-times text-danger"></i>
                                        </a>



                                    </td>
                                </tr>
                            <?php endforeach; ?>


                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col">
                            <a class="text-decoration-none text-danger" href="index.php?action=xoagiohang">Xóa giỏ hàng</a>
                            (Xóa một mặt hàng nhập số lượng = 0)
                        </div>
                        <div class="col text-end">
                            <input type="hidden" name="action" value="capnhatgio">
                            <input type="submit" class="btn btn-secondary text-warning" value="Cập nhật">

                        </div>
                    </div>

                </form>
            <?php } ?>

            </div>

            <!-- <div class="mt-5">
                <input type="text" class="border-0 border-bottom rounded me-5 py-3 mb-4" placeholder="Nhập mã giảm giá">
                <button class="btn border-secondary rounded-pill px-4 py-3 text-primary" type="button">Áp dụng </button>
            </div> -->
            <div class="row g-4 justify-content-end">
                <div class="col-8"></div>
                <div class="col-sm-8 col-md-7 col-lg-6 col-xl-4">
                    <div class="bg-light rounded">
                        <div class="p-4">
                            <h1 class="display-6 mb-4">Cart <span class="fw-normal">Total</span></h1>
                            <div class="d-flex justify-content-between mb-4">
                                <h5 class="mb-0 me-4">Subtotal:</h5>
                                <p class="mb-0"><?php echo number_format(tinhtiengiohang()); ?></p>
                            </div>
                            <div class="d-flex justify-content-between">
                                <h5 class="mb-0 me-4">Shipping</h5>
                                <div class="">
                                    <p class="mb-0">Flat rate: $3.00</p>
                                </div>
                            </div>
                            <p class="mb-0 text-end">Shipping to Ukraine.</p>
                        </div>
                        <div class="py-4 mb-4 border-top border-bottom d-flex justify-content-between">
                            <h5 class="mb-0 ps-4 me-4">Total</h5>
                            <p class="mb-0 pe-4"><?php echo number_format(tinhtiengiohang()); ?></p>
                        </div>
                        <a href="index.php?action=thanhtoan" class="btn border-secondary rounded-pill px-4 py-3 text-success text-uppercase mb-4 ms-4">Thanh toán</a>
                        <!-- <button class="btn border-secondary rounded-pill px-4 py-3 text-primary text-uppercase mb-4 ms-4" type="button">Proceed Checkout</button> -->
                    </div>
                </div>
            </div>
    </div>
</div>
<!-- Cart Page End -->

<?php include("./inc/bottom.php") ?>