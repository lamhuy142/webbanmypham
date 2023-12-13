<?php include("./inc/top.php") ?>
<!-- Product section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="row gx-4 gx-lg-5 align-items-center">
            <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="./images/products/<?php echo $mpct['hinhanh1']; ?>" alt="<?php echo $mpct['hinhanh']; ?>" /></div>
            <div class="col-md-6  ">
                <h3 class="fw-bolder "><?php echo $mpct['tenmp']; ?></h3>
                <div class="fs-5 mb-5">
                    <?php if ($mpct['giagoc'] != $mpct['giaban']) { ?>
                        <span class="text-decoration-line-through text-secondary h6"><?php echo number_format($mpct['giagoc']); ?></span>
                    <?php } ?>
                    <span class="h6"><?php echo number_format($mpct['giaban']); ?>đ</span>
                </div>
                <form method="post" class="form-inline">
                    <input type="hidden" name="action" value="chovaogio">
                    <input type="hidden" name="id" value="<?php echo $mpct["id"]; ?>">
                    <div class="row ps-0">
                        <label class="text-secondary " for="txtsoluong">Số lượng</label>
                    </div>
                    <div class="col-auto">
                        <input class="form-control text-center " id="inputQuantity" name="txtsoluong" type="number" value="1" style="max-width: 3rem" />
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-outline-dark flex-shrink-0 mt-3" type="button">
                            <i class="bi-cart-fill"></i>
                            Thêm vào giỏ hàng
                        </button>
                        <button class="btn btn-danger flex-shrink-0 mt-3 " type="button">
                            Mua ngay
                        </button>

                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- Related items section-->
<section class="py-5 bg-light">
    <div class="container px-4 px-lg-5 mt-5">
        <h2 class="fw-bolder mb-4">Những sản phẩm khác</h2>
        <div class="row   justify-content-center"> <!--gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4-->
            <?php foreach ($mypham as $m) :
                if ($m["id"] != $mpct["id"]) { ?>
                    <div class="col mb-5">
                        <div class="card h-25">
                            <!-- Product image-->
                            <img width="50px" class="card-img-top" src="./images/products/<?php echo $m['hinhanh1']; ?>" alt="<?php echo $m['hinhanh1']; ?>" />
                            <!-- Product details-->
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <!-- Product name-->
                                    <h5 class="fw-bolder"><?php echo mb_substr($m["tenmp"], 0, 30) . "..."; ?></h5>
                                    <!-- Product price-->
                                    <?php if ($m['giagoc'] != $m['giaban']) { ?>
                                        <span class="text-decoration-line-through text-secondary h6"><?php echo number_format($m['giagoc']); ?></span>
                                    <?php } ?>
                                    <span class="h6"><?php echo number_format($m['giaban']); ?>đ</span>
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="index.php?action=chitiet&id=<?php echo $m["id"]; ?>">Xem chi tiết</a></div>
                            </div>
                        </div>
                    </div>
            <?php } //end if
            endforeach; ?>
        </div>


    </div>
</section>
<?php include("./inc/bottom.php") ?>