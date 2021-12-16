<html>
<!-- Page Wrapper -->
<div id="wrapper">
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <?php echo $alert; ?>
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Sản phẩm</h1>
        <a href="<?php echo admin_url('sanpham/add') ?>" class="btn btn-primary btn-lg" style="margin-bottom: 10px ;">Thêm mới</a>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Danh sách sản phẩm</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Tên sản phẩm</th>
                                <th>Hình ảnh</th>
                                <th>Mã thương hiệu</th>
                                <th>Mã danh mục</th>
                                <th>Đơn giá</th>
                                <th>Giá khuyến mãi</th>
                                <th>Bảo hành</th>
                                <th>Lượt xem</th>
                                <th>Ngày đăng</th>
                                <th>Số lượng</th>
                                <th>Bán chạy</th>
                                <th>Tình trạng SP</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Tên sản phẩm</th>
                                <th>Hình ảnh</th>
                                <th>Mã thương hiệu</th>
                                <th>Mã danh mục</th>
                                <th>Đơn giá</th>
                                <th>Giá khuyến mãi</th>
                                <th>Bảo hành</th>
                                <th>Lượt xem</th>
                                <th>Ngày đăng</th>
                                <th>Số lượng</th>
                                <th>Bán chạy</th>
                                <th>Tình trạng SP</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php foreach ($list as $row) : ?>
                                <tr>
                                    <td><?php echo $row->TENSP ?></td>
                                    <td><img src="<?php echo public_url('image').'/'.$row->HINHANH ?>" width="100px" height="100px"></td>
                                    <td><?php echo $row->MATHUONGHIEU ?></td>
                                    <td><?php echo $row->MADM ?></td>
                                    <td><?php echo $row->DONGIA ?></td>
                                    <td><?php echo $row->GIAKM ?></td>
                                    <td><?php echo $row->BAOHANH ?></td>
                                    <td><?php echo $row->LUOTXEM ?></td>
                                    <td><?php echo $row->NGAYDANG ?></td>             
                                    <td><?php echo $row->SOLUONG ?></td>
                                    <td><?php echo $row->BANCHAY ?></td>
                                    <td><?php echo $row->TINHTRANGSP ?></td>
                                    <td>
                                    <span><a href="<?php echo admin_url('sanpham/edit/' . $row->MASP) ?>">Edit</a></span>
                                    <span><a onclick="if(confirm('Bạn có chắc muốn xóa dữ liệu?')) commentDelete(1); return false" href="<?php echo admin_url('sanpham/delete/' . $row->MASP) ?>">Delete</a></span>
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