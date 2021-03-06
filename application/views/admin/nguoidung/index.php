<html>
<!-- Page Wrapper -->
<div id="wrapper">
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <?php if(isset($alert)):?>
        <div class="alert"><?php echo $alert;?></div>
        <?php endif;?>
        
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Người dùng</h1>
        <a href="<?php echo admin_url('nguoidung/add') ?>" class="btn btn-primary btn-lg" style="margin-bottom: 10px ;">Thêm mới</a>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Danh sách người dùng</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>Họ tên</th>
                                <th>Ngày sinh</th>
                                <th>Email</th>
                                <th>Ngày tạo</th>
                                <th>Ngày sửa</th>
                                <th>Vai trò</th>
                                <th>Mã đánh giá</th>
                                <?php if($Admin_info->MANGUOIDUNG == 1): ?>
                                <th>Action</th>
                                <?php endif;?>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Username</th>
                                <th>Họ tên</th>
                                <th>Ngày sinh</th>
                                <th>Email</th>
                                <th>Ngày tạo</th>
                                <th>Ngày sửa</th>
                                <th>Vai trò</th>
                                <th>Mã đánh giá</th>
                                <?php if($Admin_info->MANGUOIDUNG == 1): ?>
                                <th>Action</th>
                                <?php endif;?>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php foreach ($list as $row) : ?>
                                <tr>
                                    <td><?php echo $row->USERNAME ?></td>
                                    <td><?php echo $row->HOTEN ?></td>
                                    <td><?php echo $row->NGAYSINH ?></td>
                                    <td><?php echo $row->EMAIL ?></td>
                                    <td><?php echo $row->NGAYTAO ?></td>
                                    <td><?php echo $row->NGAYSUA ?></td>
                                    <td><?php echo $row->VAITRO ?></td>
                                    <td><?php echo $row->MADANHGIA ?></td>
                                    <?php if($Admin_info->MANGUOIDUNG == 1): ?>
                                    <td>
                                    <span><a href="<?php echo admin_url('nguoidung/edit/' . $row->MANGUOIDUNG) ?>">Edit</a></span>
                                    <span><a onclick="if(confirm('Bạn có chắc muốn xóa dữ liệu?')) commentDelete(1); return false" href="<?php echo admin_url('nguoidung/delete/' . $row->MANGUOIDUNG) ?>">Delete</a></span>
                                    </td>
                                    <?php endif;?>
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

<script>
    $(document).ready(function(){
        if($(".alert").length)
        {
            $(".alert").ready(function(){
                $(".alert").delay(2000).fadeOut("fast");
            });
        }
    });
</script>

</html>