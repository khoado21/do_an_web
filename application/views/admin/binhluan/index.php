<html>
<!-- Page Wrapper -->
<div id="wrapper">
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Danh mục bình luận</h1>
        <a href="<?php echo admin_url('binhluan/add') ?>" class="btn btn-primary btn-lg" style="margin-bottom: 10px ;">Thêm mới</a>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Danh sách bình luận</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Mã bình luận</th>
                                <th>Mã người dùng</th>
                                <th>Nội dung</th>
                                <th>Ngày tạo</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Mã bình luận</th>
                                <th>Mã người dùng</th>
                                <th>Nội dung</th>
                                <th>Ngày tạo</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php foreach ($list as $row) : ?>
                                <tr>
                                    <td><?php echo $row->MABINHLUAN ?></td>
                                    <td><?php echo $row->MANGUOIDUNG ?></td>
                                    <td><?php echo $row->NOIDUNG ?></td>
                                    <td><?php echo $row->NGAYTAO ?></td>
                                    <td>
                                        <span><a href="<?php echo admin_url('binhluan/edit/' . $row->MABINHLUAN) ?>">Edit</a></span>
                                        <span>|</span>
                                        <span><a onclick="if(confirm('Bạn có chắc muốn xóa dữ liệu?')) commentDelete(1); return false" href="<?php echo admin_url('binhluan/delete/' . $row->MABINHLUAN) ?>">Delete</a></span>
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