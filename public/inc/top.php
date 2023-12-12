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
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">

    <title>
        Mỹ Phẩm
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />

    <!-- slider stylesheet -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />

    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="../public/inc/css/bootstrap.css" />

    <!-- Custom styles for this template /css/style.css -->
    <link href="../public/inc/css/style.css" rel="stylesheet" />
    <!-- responsive style /css/responsive.css-->
    <link href="../public/inc/css/responsive.css" rel="stylesheet" />
</head>

<body>
    <div class="hero_area">
        <!-- header section strats -->
        <header class="header_section">
            <nav class="navbar navbar-expand-lg custom_nav-container ">
                <a class="navbar-brand" href="index.php">
                    <span>
                        LH SHOP
                    </span>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class=""></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav  ">
                        <li class="nav-item 
                        <?php if (strpos($_SERVER["REQUEST_URI"], "index") != false) echo "active"; ?>
                        ">
                            <a class="nav-link" href="index.php">Trang Chủ </a> <!-- <span class="sr-only">(current)</span>-->
                        </li>
                        <li class="nav-item
                        <?php if (strpos($_SERVER["REQUEST_URI"], "") != false) echo "active"; ?>
                        ">
                            <a class="nav-link" href="index.php?action=xemtatca">
                                Cửa Hàng
                            </a>
                        </li>
                        <li class="nav-item
                        <?php if (strpos($_SERVER["REQUEST_URI"], "about") != false) echo "active"; ?>
                        ">
                            <a class="nav-link" href="about.php">
                                Giới Thiệu
                            </a>
                        </li>
                        <li class="nav-item
                        <?php if (strpos($_SERVER["REQUEST_URI"], "contact") != false) echo "active"; ?>
                        ">
                            <a class="nav-link" href="contact.php">Liên Hệ</a>
                        </li>
                    </ul>
                    <div class="user_option">
                        <a href="login.php">
                            <i class="fa fa-user" aria-hidden="true"></i>
                            <span>
                                Đăng Nhập
                            </span>
                        </a>
                        <a href="">
                            <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                        </a>
                        <form class="form-inline ">
                            <div class="input-group rounded">
                                <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                                <span class="input-group-text border-0" id="search-addon">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </span>
                            </div>
                            <!-- <button class="btn nav_search-btn" type="submit">
                                <i class="fa fa-search" aria-hidden="true"></i>
                            </button> -->
                        </form>
                    </div>
                </div>
            </nav>
        </header>
        <!-- end header section -->

    </div>
    <!-- end hero area -->