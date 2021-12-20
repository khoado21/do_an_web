<html>
<!-- Page Wrapper -->
<div id="wrapper">
    <!-- Begin Page Content -->
    <div class="container-fluid">
    <?php if(isset($alert)): ?>
        <?php echo $alert; ?>
        <?php endif; ?>
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Đơn hàng</h1>
        <a href="<?php echo admin_url('donhang/add') ?>" class="btn btn-primary btn-lg" style="margin-bottom: 10px ;">Thêm mới</a>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Danh sách đơn hàng</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Mã giao hàng</th>
                                <th>Tên người giao</th>
                                <th>Ngày giao</th>
                                <th>SDT</th>
                                <th>Xác nhận</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Mã giao hàng</th>
                                <th>Tên người giao</th>
                                <th>Ngày giao</th>
                                <th>SDT</th>
                                <th>Xác nhận</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php foreach ($list as $row) : ?>
                                <tr>
                                    <td><?php echo $row->MADONHANG ?></td>
                                    <td><?php echo $row->MAVOUCHER ?></td>
                                    <td><?php echo $row->MAGIAOHANG ?></td>
                                    <td><?php echo $row->MANGUOIDUNG ?></td>
                                    <td><?php echo $row->NGAYDAT ?></td>
                                    <td>
                                        <span><a href="<?php echo admin_url('donhang/edit/' . $row->MADONHANG) ?>">Edit</a></span>
                                        <span><a onclick="if(confirm('Bạn có chắc muốn xóa dữ liệu?')) commentDelete(1); return false" href="<?php echo admin_url('donhang/delete/' . $row->MADONHANG) ?>">Delete</a></span>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
</div>

</html>