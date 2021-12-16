<html>
<!-- Page Wrapper -->
<div id="wrapper">
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Danh mục liên hệ</h1>
        <a href="<?php echo admin_url('contact/add') ?>" class="btn btn-primary btn-lg" style="margin-bottom: 10px ;">Thêm mới</a>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Danh sách liên hệ</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Mã liên hệ</th>
                                <th>Họ tên</th>
                                <th>Email</th>
                                <th>Nội dung</th>
                                <th>Tình trạng đơn</th>
                                <th>Ngày gửi</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Mã liên hệ</th>
                                <th>Họ tên</th>
                                <th>Email</th>
                                <th>Nội dung</th>
                                <th>Tình trạng đơn</th>
                                <th>Ngày gửi</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php foreach ($list as $row) : ?>
                                <tr>
                                    <td><?php echo $row->MALH ?></td>
                                    <td><?php echo $row->HOTEN ?></td>
                                    <td><?php echo $row->EMAIL ?></td>
                                    <td><?php echo $row->NOIDUNG ?></td>
                                    <td><?php echo $row->TINHTRANGDON ?></td>
                                    <td><?php echo $row->NGAYGUI ?></td>
                                    <td>
                                        <span><a href="<?php echo admin_url('contact/edit/' . $row->MALH) ?>">Edit</a></span>
                                        <span>|</span>
                                        <span><a onclick="if(confirm('Bạn có chắc muốn xóa dữ liệu?')) commentDelete(1); return false" href="<?php echo admin_url('contact/delete/' . $row->MALH) ?>">Delete</a></span>
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