<html>
<!-- Page Wrapper -->
<div id="wrapper">
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <?php echo $alert; ?>
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
                                <th>Mã đơn hàng</th>
                                <th>Mã voucher</th>
                                <th>Mã giao hàng</th>
                                <th>Mã người dùng</th>
                                <th>Ngày đặt</th>
                                <th>Ngày ship</th>
                                <th>Tổng đơn</th>
                                <th>Họ tên</th>
                                <th>SDT</th>
                                <th>Địa chỉ</th>
                                <th>Giới tính</th>
                                <th>Email</th>
                                <th>Ghi chú</th>
                                <th>Số theo dõi</th>
                                <th>Vận chuyển</th>
                                <th>Tình trạng thanh toán</th>
                                <th>Ngày thanh toán</th>
                                <th>Ngày hết hạn</th>
                                <th>TransactionID</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Mã đơn hàng</th>
                                <th>Mã voucher</th>
                                <th>Mã giao hàng</th>
                                <th>Mã người dùng</th>
                                <th>Ngày đặt</th>
                                <th>Ngày ship</th>
                                <th>Tổng đơn</th>
                                <th>Họ tên</th>
                                <th>SDT</th>
                                <th>Địa chỉ</th>
                                <th>Giới tính</th>
                                <th>Email</th>
                                <th>Ghi chú</th>
                                <th>Số theo dõi</th>
                                <th>Vận chuyển</th>
                                <th>Tình trạng thanh toán</th>
                                <th>Ngày thanh toán</th>
                                <th>Ngày hết hạn</th>
                                <th>TransactionID</th>
                                <th>Action</th>
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
                                    <td><?php echo $row->NGAYSHIP ?></td>
                                    <td><?php echo $row->TONGDON ?></td>
                                    <td><?php echo $row->HOTEN ?></td>
                                    <td><?php echo $row->SDT ?></td>
                                    <td><?php echo $row->DIACHI ?></td>
                                    <td><?php echo $row->GIOITINH ?></td>
                                    <td><?php echo $row->EMAIL ?></td>
                                    <td><?php echo $row->GHICHU ?></td>
                                    <td><?php echo $row->SOTHEODOI ?></td>
                                    <td><?php echo $row->VANCHUYEN ?></td>
                                    <td><?php echo $row->TINHTRANGTHANHTOAN ?></td>
                                    <td><?php echo $row->NGAYTHANHTOAN ?></td>
                                    <td><?php echo $row->NGAYHETHAN ?></td>
                                    <td><?php echo $row->TRANSACTIONID ?></td>
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