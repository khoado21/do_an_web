<html>
<!-- Page Wrapper -->
<div id="wrapper">
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <?php echo $alert; ?>
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Chi tiết đơn hàng</h1>
        <a href="<?php echo admin_url('ctdh/add') ?>" class="btn btn-primary btn-lg" style="margin-bottom: 10px ;">Thêm mới</a>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Danh sách chi tiết đơn hàng</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Mã sản phẩm</th>
                                <th>Mã đơn hàng</th>
                                <th>Đơn giá</th>
                                <th>Số lượng</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Mã sản phẩm</th>
                                <th>Mã đơn hàng</th>
                                <th>Đơn giá</th>
                                <th>Số lượng</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php foreach ($list as $row) : ?>
                                <tr>
                                    <td><?php echo $row->MASP ?></td>
                                    <td><?php echo $row->MADONHANG ?></td>
                                    <td><?php echo $row->DONGIA ?></td>
                                    <td><?php echo $row->SOLUONG ?></td>
                                    <td>
                                        <span><a href="<?php echo admin_url('ctdh/edit/' .$row->MASP.'/'.$row->MADONHANG) ?>">Edit</a></span>
                                        <span>|</span>
                                        <span><a onclick="if(confirm('Bạn có chắc muốn xóa dữ liệu?')) commentDelete(1); return false" href="<?php echo admin_url('ctdh/delete/' .$row->MASP.'/'.$row->MADONHANG) ?>">Delete</a></span>
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