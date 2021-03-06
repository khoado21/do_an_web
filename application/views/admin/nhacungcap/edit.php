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
        <h1 class="h3 mb-2 text-gray-800">Cập nhật dữ liệu người dùng</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <form style="overflow: hidden;" action="" method="POST" enctype="multipart/form-data">

                        <div class="mb-3 row">
                            <label for="param_TENNCC" class="col-sm-2 col-form-label">Tên nhà cung cấp</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="param_TENNCC" value="<?php echo $info->TENNCC; ?>" name="TENNCC" >
                            </div>
                            <div class="name_error"> <?php echo form_error('TENNCC'); ?></div>
                        </div>

                        <div class="mb-3 row">
                            <label for="param_DIACHI" class="col-sm-2 col-form-label">Địa chỉ</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="param_DIACHI" value="<?php echo $info->DIACHI; ?>" name="DIACHI" >
                            </div>
                            <div class="name_error"> <?php echo form_error('DIACHI'); ?></div>
                        </div>


                        <div class="mb-3 row">
                            <label for="param_THANHPHO" class="col-sm-2 col-form-label">Thành phố</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="param_THANHPHO" value="<?php echo $info->THANHPHO; ?>" name="THANHPHO" >
                            </div>
                            <div class="name_error"> <?php echo form_error('THANHPHO'); ?></div>
                        </div>


                        <div class="mb-3 row">
                            <label for="param_SDT" class="col-sm-2 col-form-label">Số điện thoại</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="param_SDT" value="<?php echo $info->SDT; ?>" name="SDT" >
                            </div>
                            <div class="name_error"> <?php echo form_error('SDT'); ?></div>
                        </div>

                        <div class="mb-3 row">
                            <label for="param_TINHTRANGXACNHAN" class="col-sm-2 col-form-label">Tình trạng xác nhận</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="param_TINHTRANGXACNHAN" value="<?php echo $info->TINHTRANGXACNHAN; ?>" name="TINHTRANGXACNHAN" >
                            </div>
                            <div class="name_error"> <?php echo form_error('TINHTRANGXACNHAN'); ?></div>
                        </div>


                        <div class="col text-center">
                            <input type="submit" class="btn btn-primary" value="Update">
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>


</html>