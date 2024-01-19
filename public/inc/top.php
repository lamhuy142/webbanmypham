<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="images/carousel/makeup.jpg" type="image/x-icon">

    <title>
        Mỹ Phẩm
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Bootstrap icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" /> -->

    <!-- slider stylesheet -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="../public/inc/css/bootstrap.css" />
    <!-- Custom styles for this template /css/style.css-->
    <link href="../public/inc/css/style.css" rel="stylesheet" />
    <!--responsive style /css/responsive.css-->
    <link href="../public/inc/css/responsive.css" rel="stylesheet" />

</head>

<body>
    <div class="hero_area">
        <!-- header section strats -->
        <header class="header_section">
            <nav class="navbar navbar-expand-lg custom_nav-container ">
                <a class="navbar-brand" href="index.php">
                    <span>LH SHOP</span>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class=""></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav  ">
                        <li class="nav-item 
                        <?php if (strpos($_SERVER["REQUEST_URI"], "macdinh") != false) echo "active"; ?>
                        ">
                            <a class="nav-link" href="index.php?action=macdinh">Trang Chủ </a> <!-- <span class="sr-only">(current)</span>-->
                        </li>
                        <li class="nav-item
                        <?php if (strpos($_SERVER["REQUEST_URI"], "xemtatca") != false) echo "active"; ?>
                        ">
                            <a class="nav-link" href="index.php?action=xemtatca">
                                Cửa Hàng
                            </a>
                        </li>
                        <li class="nav-item
                        <?php if (strpos($_SERVER["REQUEST_URI"], "gioithieu") != false) echo "active"; ?>
                        ">
                            <a class="nav-link" href="index.php?action=gioithieu">
                                Giới Thiệu
                            </a>
                        </li>
                        <li class="nav-item
                        <?php if (strpos($_SERVER["REQUEST_URI"], "contact") != false) echo "active"; ?>
                        ">
                            <a class="nav-link" href="index.php?action=lienhe">Liên Hệ</a>
                        </li>
                    </ul>
                    <form class="d-flex" method="post" action="index.php?action=search">
                        <div class="input-group ps-2">
                            <input type="text" class="form-control " placeholder="Search" name="txtsearch">
                            <button type="submit" class=" btn btn-light" name="timkiem"><i class="bi bi-search-heart-fill"></i></button>
                        </div>
                    </form>
                    <div class="user_option">
                        <?php if (isset($_SESSION["nguoidung"]) && !empty($_SESSION["nguoidung"]["tennd"])) { ?>
                            <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
                                <ul class="navbar-nav">
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            <img class="img-profile rounded-circle" style="height:30px; width: 30px; " src="../img/user/<?php echo $_SESSION['nguoidung']['hinhanh']; ?>" alt="">
                                            <?php echo $_SESSION["nguoidung"]["tennd"]; ?>
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-secondary" aria-labelledby="navbarDarkDropdownMenuLink">
                                            <li><a class="dropdown-item" href="index.php?action=hoso&id=<?php echo $_SESSION["nguoidung"]["id"] ?>">Thông Tin</a></li>
                                            <li><a class="dropdown-item" href="index.php?action=dangxuat">Đăng Xuất</a></li>
                                            <li><a class="dropdown-item" href="index.php?action=donmua">Đơn Mua</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <a href="index.php?action=xemgiohang">
                                <i class="bi bi-bag-fill "></i><span class="badge bg-danger text-white ms-1 rounded-pill"><?php echo demsoluongtronggio(); ?></span> <!--<php echo is_array($sogio); >-->
                            </a>
                        <?php } else { ?>
                            <a href="#">
                                <i class="bi bi-bag-fill "></i>
                            </a>
                            <a href="index.php?action=dangnhap">
                                Đăng nhập <i class="bi bi-door-open-fill"></i>
                            </a>
                            <a href="index.php?action=dangky">
                                Đăng ký
                            </a>
                        <?php } ?>
                    </div>
                </div>
            </nav>
        </header>
        <!-- end header section -->

    </div>
    <!-- end hero area -->