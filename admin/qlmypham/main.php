<?php include("../inc/top.php"); ?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DANH SÁCH MỸ PHẨM</h6>
        </div>
        <div class="card-body">
            <p><a class=" btn btn-info" href="index.php?action=them">Thêm mỹ phẩm</a></p>
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Tên</th>
                            <th>Phân loại</th>
                            <th>Thương hiệu</th>
                            <th>Hình ảnh</th>
                            <th>Giá gốc</th>
                            <th>Giá bán</th>
                            <th>Số lượng tồn</th>
                            <th>Lượt mua</th>
                            <th>Lượt xem</th>
                            <th>Tình trạng</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Tên</th>
                            <th>Phân loại</th>
                            <th>Thương hiệu</th>
                            <th>Hình ảnh</th>
                            <th>Giá gốc</th>
                            <th>Giá bán</th>
                            <th>Số lượng tồn</th>
                            <th>Lượt mua</th>
                            <th>Lượt xem</th>
                            <th>Tình trạng</th>
                            <th>Hành động</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($mypham as $m) :
                            foreach ($loai as $l) :
                                if ($m["loai_id"] == $l["id"]) { ?>
                                    <tr>
                                        <td><?php echo $m["tenmp"]; ?></td>
                                        <td><?php echo $l["tenloai"]; ?></td>
                                        <td><?php echo $m["thuonghieu"]; ?></td>
                                        <td>
                                            <a href="index.php?action=chitiet&id=<?php echo $m['id']; ?>">
                                                <img style="height:80px;width:50px;" src="../../img/products/<?php echo $m['hinhanh']; ?>" alt="">
                                            </a>
                                        </td>
                                        <td><?php echo $m["giagoc"]; ?></td>
                                        <td><?php echo $m["giaban"]; ?></td>
                                        <td><?php echo $m["soluong"]; ?></td>
                                        <td><?php echo $m["luotmua"]; ?></td>
                                        <td><?php echo $m["luotxem"]; ?></td>
                                        <!-- TÌNH TRẠNG -->
                                        <?php if ($m["tinhtrang"] == 1) { ?>
                                            <td class="text-success"> Còn bán </td>
                                        <?php } elseif ($m["tinhtrang"] == 2) { ?>
                                            <td class="text-warning"> Hết hàng </td>
                                        <?php } else { ?><td class="text-danger"> Nghỉ bán </td><?php } ?>

                                        <td>
                                            <a href="index.php?action=sua&id=<?php echo $m['id']; ?>" class="btn btn-warning">Sửa</a>
                                            <a href="index.php?action=xoa&id=<?php echo  $m['id']; ?>" class="btn btn-danger" onclick="return confirm('Bạn chắc chắn muốn xóa sản phẩm này?')">Xóa</a>
                                        </td>
                                    </tr>
                        <?php } //end if
                            endforeach;
                        endforeach; ?>
                    </tbody>
                </table>
                <!-- Start Pagination -->
                <nav aria-label="...">
                    <ul class="pagination justify-content-center ">
                        <li class="page-item disabled">
                            <a class="page-link" href="index.php?action=pagi_left" tabindex="-1" aria-disabled="true"><i class="text-dark bi bi-arrow-left"></i></a>
                        </li>
                        <li class="page-item"><a class="text-dark page-link" href="index.php?action=phantrang&per_page=4&page=1">1</a></li>
                        <li class="page-item active" aria-current="page">
                            <a class=" text-dark page-link" href="index.php?action=phantrang&per_page=4&page=1">2</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="index.php?action=pagi_right"><i class="text-dark bi bi-arrow-right"></i></a>
                        </li>
                    </ul>
                </nav>
                <!-- End Pagination -->

            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php include("../inc/bottom.php") ?>