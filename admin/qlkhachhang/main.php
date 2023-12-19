<?php include("../inc/top.php") ?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DANH SÁCH KHÁCH HÀNG</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Hình ảnh </th>
                            <th>Tên </th>
                            <th>Email</th>
                            <th>Số điện thoại</th>
                            <th>Địa chỉ</th>
                            <th>Loại </th>
                            <th>Trạng thái</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Hình ảnh</th>
                            <th>Tên </th>
                            <th>Email</th>
                            <th>Số điện thoại</th>
                            <th>Địa chỉ</th>
                            <th>Loại </th>
                            <th>Trạng thái</th>
                            <th>Hành động</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($nguoidung as $n) :
                            foreach ($loai as $l) :
                                if ($n["loaind_id"] == $l["id"] && $n["loaind_id"] == 2) { ?>
                                    <tr>
                                        <td><img style="height:80px;" src="../../img/user/<?php echo $n['hinhanh']; ?>" alt=""></td>
                                        <td><?php echo $n["tennd"]; ?></td>
                                        <td><?php echo $n["email"]; ?></td>
                                        <td><?php echo $n["sdt"]; ?></td>
                                        <td><?php echo $n["diachi"]; ?></td>
                                        <td><?php echo $l["tenlnd"]; ?></td>
                                        <?php if ($n["tinhtrang"] == 1) { ?>
                                            <td class="text-info">Hoạt động</td>
                                        <?php } //end if tinhtrang 
                                        else {
                                        ?>
                                            <td class="text-danger">Khóa</td>
                                        <?php }  ?>
                                        <td>
                                            <a href="index.php?action=khoa&id=<?php echo $n['id']; ?>&tinhtrang=<?php echo $n['tinhtrang']; ?>" class="btn btn-warning">Khóa</a>
                                            <a href="index.php?action=xoa&id=<?php echo  $n['id']; ?>" class="btn btn-danger" onclick="return confirm('Bạn chắc chắn muốn xóa sản phẩm này?')">Xóa</a>
                                        </td>
                                    </tr>
                        <?php
                                } //end if
                            endforeach;
                        endforeach; ?>
                    </tbody>
                </table>
                <p><a class="btn btn-info" href="index.php?action=them">Thêm người dùng</a></p>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php include("../inc/bottom.php") ?>