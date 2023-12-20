<?php include("./inc/top.php") ?>

<!-- shop section -->

<section class="shop_section layout_padding">
    <div class="container">
        <div class="heading_container heading_center">
            <h2>
                KẾT QUẢ TÌM KIẾM
            </h2>
        </div>
        <div class="row">
            <?php if(!empty($mypham)){ 
            foreach ($mypham as $m) : ?>
                <div class="col-sm-6 col-md-4 col-lg-3">
                    <div class="card">
                        <!-- Top Card -->
                        <a href="index.php?action=chitiet&id=<?php echo $m['id']; ?>">
                            <img width="80px" height="300px" class=" card-img-top" src="../img/products/<?php echo $m["hinhanh"]; ?>" alt="">
                            <!-- End Top Card -->

                            <!-- Body Card -->
                            <div class="card-body p-4">
                                <div class="">
                                    <span>
                                        <!-- Sale badge-->
                                        <?php if ($m["giaban"] != $m["giagoc"]) { ?>
                                            <div class="badge bg-danger text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Giảm giá</div>
                                        <?php } // end if 
                                        ?>
                                    </span>
                                </div>
                                <!-- Name -->
                                <div class="detail-box">
                                    <h6 class="text-decoration-none text-muted">
                                        <?php echo mb_substr($m["tenmp"], 0, 45) . "..."; ?>
                                    </h6>
                                </div>
                                <div class="detail-box">
                                    <h6>
                                        <!-- Product price-->
                                        <?php if ($m["giaban"] != $m["giagoc"]) { ?>
                                            <span class="text-muted text-decoration-line-through"><?php echo number_format($m["giagoc"]); ?>đ</span><?php } // end if 
                                                                                                                                                    ?>
                                        <span class="text-danger fw-bolder"><?php echo number_format($m["giaban"]); ?>đ</span>
                                    </h6>
                                </div>
                                <!-- Product reviews-->
                                <div class="detail-box">
                                    <div class="d-flex justify-content small text-warning mb-2">
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                        <div class="bi-star-fill"></div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Body Card -->

                            <!-- Footer Card -->
                            <!-- Product actions-->
                            <div class="card-footer p-2 pt-0 border-top-0 bg-transparent">
                                <div class="text-center"><a class="btn btn-outline-info mt-auto" href="index.php?action=chovaogio&id=<?php echo $m["id"]; ?>&soluong=1">
                                        Chọn mua</a></div>
                            </div>
                            <!-- End Footer Card -->
                        </a>
                    </div>
                </div>
            <?php endforeach;
            }else{
                echo "<p>Kết quả tìm kiếm không có. Vui lòng nhập từ khóa khác...</p>";
            } ?>
        </div>
    </div>
</section>

<!-- end shop section -->

<!-- info section -->
<?php include("./inc/bottom.php") ?>