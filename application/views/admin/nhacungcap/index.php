<html>
<!-- Page Wrapper -->
<div id="wrapper">
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Danh mục sản phẩm</h1>
        <a href="<?php echo admin_url('nhacungcap/add') ?>" class="btn btn-primary btn-lg" style="margin-bottom: 10px ;">Thêm mới</a>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Danh sách mã danh mục</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Tên nhà cung cấp</th>
                                <th>Địa chỉ</th>
                                <th>Thành phố</th>
                                <th>Số điện thoại</th>
                                <th>Tình trạng xác nhận</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Tên nhà cung cấp</th>
                                <th>Địa chỉ</th>
                                <th>Thành phố</th>
                                <th>Số điện thoại</th>
                                <th>Tình trạng xác nhận</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php foreach ($list as $row) : ?>
                                <tr>
                                    <td><?php echo $row->TENNCC ?></td>
                                    <td><?php echo $row->DIACHI ?></td>
                                    <td><?php echo $row->THANHPHO ?></td>
                                    <td><?php echo $row->SDT ?></td>
                                    <td><?php echo $row->TINHTRANGXACNHAN ?></td>
                                    <td>
                                        <span><a href="<?php echo admin_url('nhacungcap/edit/' . $row->MANCC) ?>">Edit</a></span>
                                        <span>|</span>
                                        <span><a onclick="if(confirm('Bạn có chắc muốn xóa dữ liệu?')) commentDelete(1); return false" href="<?php echo admin_url('nhacungcap/delete/' . $row->MANCC) ?>">Delete</a></span>
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