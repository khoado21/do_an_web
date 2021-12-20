<style>
#image {
        width: 100px;
        height: 100px;
    }
</style>

<html>
<!-- Page Wrapper -->
<div id="wrapper">
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Chi tiết đơn hàng</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Chi tiết đơn hàng</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Sản phẩm</th>
                                <th>Tên sản phẩm</th>
                                <th>Giá bán</th>
                                <th>Số lượng</th>
                                <th>Tổng số</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $total_amount = 0 ?>
                            <?php foreach ($list_ctdh as $row) : ?>
                                <?php $total_amount = $total_amount + $row->DONGIA * $row->SOLUONG ?>
                                <tr>
                                    <td>
                                        <img id="image" src="<?php echo public_url('image/') . $row->HINHANH ?>" alt="<?php echo $row->HINHANH ?>">
                                    </td>
                                    <td>
                                        <?php echo $row->TENSP ?>
                                    </td>
                                    <td>
                                        <?php echo $row->DONGIA ?>đ
                                    </td>
                                    <td style="text-align: center;">
                                        <?php echo $row->SOLUONG ?>
                                    </td>
                                    <td>
                                        <?php echo $row->DONGIA * $row->SOLUONG ?>đ
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            <tr id="total_amount">
                                <td colspan="6">
                                    Tổng số tiền thanh toán: <b style="color: red;"><?php echo $total_amount ?></b>đ
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
</div>

</html>