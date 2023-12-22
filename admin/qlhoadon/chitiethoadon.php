<?php include("../inc/top.php") ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">CHI TIẾT ĐƠN <?php ?></h6>
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
                        <?php foreach ($hoadon as $d) : ?>
                            <form action="" method="post">
                                <input type="hidden" name="action" value="xemchitiethd" id="">
                                <input type="hidden" name="id_hd" value="<?php echo $d['id'] ?>" id="">
                                <?php foreach ($nguoidung as $n) :
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
                                            if ($d["tinhtrang"] == 2) { ?>
                                                <td class="text-success "><i class="bi bi-check-circle-fill text-center"></i></td>

                                            <?php } else { ?>
                                                <td class="text-danger"><i class="bi bi-x-circle-fill"></i></span></td>
                                            <?php } ?>
                                            <!-- cột trạng thái -->
                                            <?php if ($d["tinhtrang"] == 0) { ?>
                                                <td class="text-secondary">Chờ xác nhận </td>
                                            <?php } elseif ($d["tinhtrang"] == 1) { ?>
                                                <td class="text-success">Đã xác nhận</td>
                                            <?php } elseif ($d["tinhtrang"] == 2) { ?><td class="text-success">Đã hoàn thành</td>
                                            <?php } elseif ($d["tinhtrang"] == 3) { ?>
                                                <td class="text-secondary">Đơn đã hủy</td>
                                            <?php } ?>

                                            <td>
                                                <?php if ($d["tinhtrang"] == 0) { ?>
                                                    <div class="row">
                                                        <div class="col">
                                                            <a href="index.php?action=khoa&id=<?php echo $d['id']; ?>&tinhtrang=<?php echo $d['tinhtrang']; ?>" class="btn btn-warning">Xác nhận</a>
                                                        </div>
                                                        <div class="col">
                                                            <a href="index.php?action=huydon&id=<?php echo $d['id']; ?>&tinhtrang=<?php echo $d['tinhtrang']; ?>" class="btn btn-secondary">Hủy đơn</a>
                                                        </div>
                                                    </div>
                                                <?php } elseif ($d["tinhtrang"] == 1) { ?>
                                                    <div class="row">
                                                        <div class="col">
                                                            <a href="index.php?action=khoa&id=<?php echo $d['id']; ?>&tinhtrang=<?php echo $d['tinhtrang']; ?>" class="btn btn-warning">Hoàn tất</a>
                                                        </div>
                                                        <div class="col">
                                                            <a href="index.php?action=huydon&id=<?php echo $d['id']; ?>&tinhtrang=<?php echo $d['tinhtrang']; ?>" class="btn btn-secondary">Hủy đơn</a>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                <?php
                                    } //end if
                                endforeach; ?>
                                <div class="row">
                                    <div class="col ">
                                        <input class="form-control" type="text" name="txthoadon_id" id="" placeholder="Nhập id đơn hàng muốn xem chi tiết...">
                                    </div>
                                    <div class="col">
                                        <input type="submit" class="btn btn-primary" name="btnxem" id="btnxem" value="Xem">
                                    </div>
                                </div>
                            </form>
                        <?php endforeach; ?>
                    </tbody>


                </table>

                </br>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php include("../inc/bottom.php") ?>