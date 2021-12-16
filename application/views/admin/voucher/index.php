<html>
<!-- Page Wrapper -->
<div id="wrapper">
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Danh mục tin tức</h1>
        <a href="<?php echo admin_url('voucher/add') ?>" class="btn btn-primary btn-lg" style="margin-bottom: 10px ;">Thêm mới</a>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Danh sách tin tức</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Mã voucher</th>
                                <th>Tên mã</th>
                                <th>Ngày bắt đầu</th>
                                <th>Ngày kết thúc</th>
                                <th>Tỉ lệ</th>
                                <th>Trạng thái</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Mã voucher</th>
                                <th>Tên mã</th>
                                <th>Ngày bắt đầu</th>
                                <th>Ngày kết thúc</th>
                                <th>Tỉ lệ</th>
                                <th>Trạng thái</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php foreach ($list as $row) : ?>
                                <tr>
                                    <td><?php echo $row->MAVOUCHER ?></td>
                                    <td><?php echo $row->TENMA ?></td>
                                    <td><?php echo $row->NGAYBD ?></td>
                                    <td><?php echo $row->NGAYKT ?></td>
                                    <td><?php echo $row->TYLE ?></td>
                                    <td><?php echo $row->TRANGTHAI ?></td>
                                    <td>
                                        <span><a href="<?php echo admin_url('voucher/edit/' . $row->MAVOUCHER) ?>">Edit</a></span>
                                        <span>|</span>
                                        <span><a onclick="if(confirm('Bạn có chắc muốn xóa dữ liệu?')) commentDelete(1); return false" href="<?php echo admin_url('voucher/delete/' . $row->MAVOUCHER) ?>">Delete</a></span>
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