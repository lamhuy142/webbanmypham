<?php include("./inc/top.php") ?>
<!-- Product section-->
<section class="py-5">
    <div class="container px-4 px-lg-5 my-5">
        <div class="row gx-4 gx-lg-5 align-items-center">
            <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="/images/products/<?php echo $mpct['hinhanh']; ?>" alt="<?php echo $mpct['tenmp']; ?>" /></div>
            <div class="col-md-6">
                <div class="small mb-1">SKU: BST-498</div>
                <h1 class="display-5 fw-bolder"><?php echo $mpct['tenmp']; ?></h1>
                <div class="fs-5 mb-5">
                    <?php if ($mpct['giagoc'] != $mpct['giaban']) { ?>
                        <span class="text-decoration-line-through"><?php echo number_format($mpct['giagoc']); ?></span>
                    <?php } ?>
                    <span><?php echo number_format($mpct['giaban']); ?>đ</span>
                </div>
                <p class="lead"></p>
                <form method="post" class="form-inline">
                    <input type="hidden" name="action" value="chovaogio">
                    <input type="hidden" name="id" value="<?php echo $mpct["id"]; ?>">
                    <div class="d-flex">
                        <input class="form-control text-center me-3" id="inputQuantity" type="number" value="1" style="max-width: 3rem" />
                        <button class="btn btn-outline-dark flex-shrink-0" type="button">
                            <i class="bi-cart-fill me-1"></i>
                            Thêm vào giỏ hàng
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
        <h2 class="fw-bolder mb-4">Related products</h2>
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <div class="col mb-5">
                <div class="card h-100">
                    <!-- Product image-->
                    <img class="card-img-top" src="https://dummyimage.com/450x300/dee2e6/6c757d.jpg" alt="..." />
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder">Fancy Product</h5>
                            <!-- Product price-->
                            $40.00 - $80.00
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="#">View options</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include("./inc/bottom.php") ?>