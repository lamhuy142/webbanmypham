<?php include("../inc/top.php"); ?>

<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DANH SÁCH PHÂN LOẠI</h6>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <tr>
                    <th>ID</th>
                    <th>Tên loại sản phẩm</th>
                    <th>Sửa</th>
                    <th>Xóa</th>
                </tr>
                <?php
                foreach ($phanloai as $l) :
                    if ($l["id"] == $idsua) { // hiển thị form
                ?>
                        <tr>
                            <form method="post">
                                <input type="hidden" name="action" value="capnhat">
                                <input type="hidden" name="id" value="<?php echo $l["id"]; ?>">
                                <td><?php echo $l["id"]; ?></td>
                                <td><input class="form-control" name="ten" type="text" value="<?php echo $l["tenloai"]; ?>"></td>
                                <td><input class="btn btn-success" type="submit" value="Lưu"></td>
                            </form>
                            <td><a href="index.php?action=xoa&id=<?php echo $l["id"]; ?>" class="btn btn-danger">Xóa</a></td>
                        </tr>

                    <?php
                    } // end if 
                    else {
                    ?>
                        <tr>
                            <td><?php echo $l["id"]; ?></td>
                            <td><?php echo $l["tenloai"]; ?></td>
                            <td><a href="index.php?action=sua&id=<?php echo $l["id"]; ?>" class="btn btn-warning">Sửa</a></td>
                            <td><a href="index.php?action=xoa&id=<?php echo $l["id"]; ?>" class="btn btn-danger">Xóa</a></td>
                        </tr>
                <?php
                    } // end else
                endforeach;
                ?>
            </table>

            <h4><a class="text-decoration-none text-info" data-bs-toggle="collapse" data-bs-target="#demo">Thêm mới</a>
                <h4>

                    <div id="demo" class="collapse">

                        <form method="post">
                            <input type="hidden" name="action" value="them">
                            <div class="row">
                                <div class="col">
                                    <input type="text" class="form-control" name="ten" placeholder="Nhập tên phân loại">
                                </div>
                                <div class="col">
                                    <input type="submit" class="btn btn-info" value="Lưu">
                                </div>
                                <div class="col"></div>
                            </div>
                        </form>
                    </div>

        </div>
    </div>
</div>
<?php include("../inc/bottom.php"); ?>