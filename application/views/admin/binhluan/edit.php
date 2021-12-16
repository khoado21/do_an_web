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
        <h1 class="h3 mb-2 text-gray-800">Cập nhật dữ liệu bình luận</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <form style="overflow: hidden;" action="" method="POST" enctype="multipart/form-data">

                        <div style="margin-top: 15px">

                            <div class="mb-3 row">
                                <label for="param_DIACHI" class="col-sm-2 col-form-label">Mã người dùng<span style="color:red">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="param_DIACHI" name="MANGUOIDUNG" value="<?php echo $info->MANGUOIDUNG; ?>">
                                </div>
                                <div class="name_error"> <?php echo form_error('MANGUOIDUNG'); ?></div>
                            </div>

                            <div class="mb-3 row">
                                <label for="param_SDT" class="col-sm-2 col-form-label">Nội dung</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="param_SDT" name="NOIDUNG" value="<?php echo $info->NOIDUNG; ?>">
                                </div>
                                <div class="name_error"> <?php echo form_error('NOIDUNG'); ?></div>
                            </div>

                            <div class="mb-3 row">
                                <label for="param_TINHTRANGXACNHAN" class="col-sm-2 col-form-label">Ngày tạo</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" id="param_TINHTRANGXACNHAN" name="NGAYTAO" value="<?php echo $info->NGAYTAO; ?>">
                                </div>
                                <div class="name_error"> <?php echo form_error('NGAYTAO'); ?></div>
                            </div>

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