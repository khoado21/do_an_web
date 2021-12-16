<html>
<!-- Page Wrapper -->
<div id="wrapper">
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <?php echo $alert; ?>
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Hình ảnh</h1>
        <a href="<?php echo admin_url('hinhanh/add') ?>" class="btn btn-primary btn-lg" style="margin-bottom: 10px ;">Thêm mới</a>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Danh sách hình ảnh</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Mã ảnh</th>
                                <th>Mã sản phẩm</th>
                                <th>Link ảnh</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Mã ảnh</th>
                                <th>Mã sản phẩm</th>
                                <th>Link ảnh</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php foreach ($list as $row) : ?>
                                <tr>
                                    <td><?php echo $row->MAANH ?></td>
                                    <td><?php echo $row->MASP ?></td>
                                    <td><img src="<?php echo public_url('image') . '/' . $row->LINKANH ?>" width="100px" height="100px"></td>
                                    <td>
                                        <span><a href="<?php echo admin_url('hinhanh/edit/' . $row->MAANH) ?>">Edit</a></span>
                                        <span>|</span>
                                        <span><a onclick="if(confirm('Bạn có chắc muốn xóa dữ liệu?')) commentDelete(1); return false" href="<?php echo admin_url('hinhanh/delete/' . $row->MAANH) ?>">Delete</a></span>
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