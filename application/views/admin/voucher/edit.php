<?php
$today = date('Y-m-d');
?>

<html>
<style>
    .name_error {
        color: red;
        margin-left: 12px;
    }

    .important {
        color: red;
    }
</style>
<div id="wrapper">
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <?php echo $message; ?>
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Cập nhật voucher</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <form style="overflow: hidden;" action="" method="POST" enctype="multipart/form-data">
                        <div style="margin-top: 15px;">
                            <div class="mb-3 row">
                                <label for="param_TENDM" class="col-sm-2 col-form-label">Mã voucher<span style="color:red">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="param_TENDM" value="<?php echo $info->MAVOUCHER; ?>" name="MAVOUCHER">
                                </div>
                                <div class="name_error"> <?php echo form_error('MAVOUCHER'); ?></div>
                            </div>

                            <div class="mb-3 row">
                                <label for="param_TENDM" class="col-sm-2 col-form-label">Tên mã voucher<span style="color:red">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="param_TENDM" value="<?php echo $info->TENMA; ?>" name="TENMA">
                                </div>
                                <div class="name_error"> <?php echo form_error('TENMA'); ?></div>
                            </div>

                            <div class="mb-3 row">
                                <label for="param_TENDM" class="col-sm-2 col-form-label">Ngày bắt đầu</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" id="param_TENDM" value="<?php echo $info->NGAYBD; ?>" name="NGAYBD">
                                </div>
                                <div class="name_error"> <?php echo form_error('NGAYBD'); ?></div>
                            </div>

                            <div class="mb-3 row">
                                <label for="param_TENDM" class="col-sm-2 col-form-label">Ngày kết thúc</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" id="param_TENDM" value="<?php echo $info->NGAYKT; ?>" name="NGAYKT">
                                </div>
                                <div class="name_error"> <?php echo form_error('NGAYKT'); ?></div>
                            </div>

                            <div class="mb-3 row">
                                <label for="param_TENDM" class="col-sm-2 col-form-label">Tỉ lệ<span style="color:red">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="param_TENDM" value="<?php echo $info->TYLE; ?>" name="TYLE">
                                </div>
                                <div class="name_error"> <?php echo form_error('TYLE'); ?></div>
                            </div>

                            <div class="mb-3 row">
                                <label for="param_TENDM" class="col-sm-2 col-form-label">Trạng thái<span style="color:red">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="param_TENDM" value="<?php echo $info->TRANGTHAI; ?>" name="TRANGTHAI">
                                </div>
                                <div class="name_error"> <?php echo form_error('TYLE'); ?></div>
                            </div>

                            <div class="col text-center">
                                <input type="submit" class="btn btn-primary" value="Update">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>


</html>