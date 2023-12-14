<?php include("./inc/top.php") ?>
<!-- shop section -->

<section class="shop_section layout_padding">
  <div class="container">
    <?php foreach($loai as $l):
      $i = 0; ?>
      <div class="heading_container heading_center p-4">
        <h2 class="">
          <a class="text-decoration-none text-muted" href=""><?php echo $l["tenloai"]; ?></a>
        </h2>
      </div>
      <div class="row">
        <?php foreach ($mypham as $m) :
          if ($m["loai_id"] == $l["id"] && $i < 4) {
            $i++; ?>
            <div class="col-sm-6 col-md-4 col-lg-3">
              <div class="card">
                <!-- Top Card -->
                <a href="index.php?action=chitiet&id=<?php echo $m["id"]; ?>">
                  <img width="100%" class=" card-img-top" src="./images/products/<?php echo $m["hinhanh1"]; ?>" alt="">

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
                </a>
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

<!-- saving section -->

<section class="saving_section ">
  <div class="box">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-6">
          <div class="img-box">
            <img src="images/products/saving-img.png" alt="">
          </div>
        </div>
        <div class="col-lg-6">
          <div class="detail-box">
            <div class="heading_container">
              <h2>
                Best Savings on <br>
                new arrivals
              </h2>
            </div>
            <p>
              Qui ex dolore at repellat, quia neque doloribus omnis adipisci, ipsum eos odio fugit ut eveniet blanditiis praesentium totam non nostrum dignissimos nihil eius facere et eaque. Qui, animi obcaecati.
            </p>
            <div class="btn-box">
              <a href="#" class="btn1">
                Buy Now
              </a>
              <a href="#" class="btn2">
                See More
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- end saving section -->

<!-- gift section -->

<section class="gift_section layout_padding-bottom">
  <div class="box ">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-5">
          <div class="img_container">
            <div class="img-box">
              <img src="images/products/gifts.png" alt="">
            </div>
          </div>
        </div>
        <div class="col-md-7">
          <div class="detail-box">
            <div class="heading_container">
              <h2>
                Gifts for your <br>
                loved ones
              </h2>
            </div>
            <p>
              Omnis ex nam laudantium odit illum harum, excepturi accusamus at corrupti, velit blanditiis unde perspiciatis, vitae minus culpa? Beatae at aut consequuntur porro adipisci aliquam eaque iste ducimus expedita accusantium?
            </p>
            <div class="btn-box">
              <a href="#" class="btn1">
                Buy Now
              </a>
              <a href="#" class="btn2">
                See More
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- end gift section -->


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