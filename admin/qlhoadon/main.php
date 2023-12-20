<?php include("../inc/top.php") ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DANH SÁCH ĐƠN HÀNG</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Mã hóa đơn</th>
                            <th>Tên khách hàng</th>
                            <th>Số điện thoại</th>
                            <th>Địa chỉ</th>
                            <th>Ngày hóa đơn</th>
                            <th>Ngày giao hàng </th>
                            <th>Tổng tiền</th>
                            <th>Đã thanh toán</th>
                            <th>Trạng thái</th>
                            <th>Hành động</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Mã hóa đơn</th>
                            <th>Tên khách hàng</th>
                            <th>Số điện thoại</th>
                            <th>Địa chỉ</th>
                            <th>Ngày hóa đơn</th>
                            <th>Ngày giao hàng</th>
                            <th>Tổng tiền</th>
                            <th>Đã thanh toán</th>
                            <th>Trạng thái</th>
                            <th>Hành động</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($hoadon as $d) :
                            foreach ($nguoidung as $n) :
                                if ($n["id"] == $d["nguoidung_id"]) { ?>
                                    <tr>
                                        <td><?php echo $d["id"]; ?></td>
                                        <td><?php echo $n["tennd"]; ?></td>
                                        <td><?php echo $n["sdt"]; ?></td>
                                        <td><?php echo $n["diachi"]; ?></td>
                                        <td><?php echo $d["ngayhd"]; ?></td>
                                        <td><?php echo $d["ngaygiaohang"]; ?></td>
                                        <td><?php echo number_format($d["tongtien"]); ?>đ</td>
                                        <!-- cột đã thanh toán -->
                                        <?php
                                        if ($d["dathanhtoan"] == 1) { ?>
                                            <td class="text-success">Đã thanh toán</td>

                                        <?php } else { ?>
                                            <td class="text-danger">Chưa thanh toán</td>
                                        <?php } ?>
                                        <!-- cột trạng thái -->
                                        <?php if ($d["tinhtrang"] == 0) { ?>
                                            <td class="text-secondary">Chờ xác nhận </td>
                                        <?php } elseif ($d["tinhtrang"] == 1) { ?>
                                            <td class="text-success">Đã xác nhận</td>
                                        <?php } elseif ($d["tinhtrang"] == 2) { ?>
                                            <td class="text-success">Đã gửi</td>
                                        <?php } else { ?><td class="text-success">Đã hoàn thành</td><?php } ?>

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
                <div class="row">
                    <div class="col ">
                        <input class="form-control" type="text" name="txtdonhang_id" id="" placeholder="Nhập id đơn hàng muốn xem chi tiết...">
                    </div>
                    <div class="col">
                        <input type="submit" class="btn btn-primary" name="" id="" value="Xem">
                    </div>
                </div>
                </br>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php include("../inc/bottom.php") ?>