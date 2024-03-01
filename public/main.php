<?php include("./inc/top.php") ?>
<!-- shop section -->

<section class="shop_section layout_padding">
  <div class="container">
    <?php foreach ($loai as $l) :
      $i = 0; ?>
      <div class="heading_container heading_center p-4">
        <h2 class="">
          <a class="text-decoration-none text-muted" href=""><?php echo $l["tenloai"]; ?></a>
        </h2>
      </div>
      <div class="row">
        <?php foreach ($mypham as $m) :
          if ($m["loai_id"] == $l["idlmp"] && $i < 4) {
            $i++; ?>
            <div class="col-sm-6 col-md-4 col-lg-3">
              <div class="card">
                <!-- Top Card -->
                <a href="index.php?action=chitiet&idmp=<?php echo $m["idmp"]; ?>">
                  <img width="80px" height="300px" class=" card-img-top" src="../img/products/<?php echo $m['hinhanh']; ?>" alt="">

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
                        <?php echo mb_substr($m["tenmp"], 0, 35) . "..."; ?>
                      </h6>
                    </div>
                </a>
                <div class="detail-box">
                  <h6>
                    <!-- Product price-->
                    <?php if ($m["giaban"] != $m["giagoc"]) { ?>
                      <span class="text-muted text-decoration-line-through"><?php echo number_format($m["giagoc"]); ?>đ</span>
                    <?php } // end if 
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
              <!-- Product actions-->
              <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                <form method="post">
                  <input type="hidden" name="action" value="chovaogio">
                  <input type="hidden" name="idmp" value="<?php echo $m["idmp"]; ?>">
                  <input class="form-control  btn btn-outline-info mt-auto" type="submit" name="btnchonmua" value="Chọn mua">
                </form>
              </div>

              <!-- End Footer Card -->

            </div>
      </div>
<?php }
        endforeach;
      endforeach; ?>
  </div>
  <div class="btn-box">
    <a href="index.php?action=xemtatca">
      Xem Tất Cả
    </a>
  </div>
  </div>
</section>

<!-- end shop section -->



<!-- contact section -->

<section class="contact_section ">
  <div class="container px-0">
    <div class="heading_container ">
      <h2 class="">
        Contact Us
      </h2>
    </div>
  </div>
  <div class="container container-bg">
    <div class="row">
      <div class="col-lg-7 col-md-6 px-0">
        <div class="map_container">
          <div class="map-responsive">
            <iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&q=Eiffel+Tower+Paris+France" width="600" height="300" frameborder="0" style="border:0; width: 100%; height:100%" allowfullscreen></iframe>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-5 px-0">
        <form action="#">
          <div>
            <input type="text" placeholder="Name" />
          </div>
          <div>
            <input type="email" placeholder="Email" />
          </div>
          <div>
            <input type="text" placeholder="Phone" />
          </div>
          <div>
            <input type="text" class="message-box" placeholder="Message" />
          </div>
          <div class="d-flex ">
            <button>
              SEND
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>

<!-- end contact section -->

<!-- info section -->
<?php include("./inc/bottom.php") ?>