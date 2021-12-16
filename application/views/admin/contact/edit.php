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
        <h1 class="h3 mb-2 text-gray-800">Cập nhật dữ liệu liên hệ</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <form style="overflow: hidden;" action="" method="POST" enctype="multipart/form-data">

                        <div style="margin-top: 15px">

                            <div class="mb-3 row">
                                <label for="param_DIACHI" class="col-sm-2 col-form-label">Họ tên<span style="color:red">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="param_DIACHI" name="HOTEN" value="<?php echo $info->HOTEN; ?>">
                                </div>
                                <div class="name_error"> <?php echo form_error('HOTEN'); ?></div>
                            </div>

                            <div class="mb-3 row">
                                <label for="param_THANHPHO" class="col-sm-2 col-form-label">Email<span style="color:red">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="param_THANHPHO" name="EMAIL" value="<?php echo $info->EMAIL; ?>">
                                </div>
                                <div class="name_error"> <?php echo form_error('EMAIL'); ?></div>
                            </div>

                            <div class="mb-3 row">
                                <label for="param_SDT" class="col-sm-2 col-form-label">Nội dung</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="param_SDT" name="NOIDUNG" value="<?php echo $info->NOIDUNG; ?>">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="param_TINHTRANGXACNHAN" class="col-sm-2 col-form-label">Tình trạng đơn</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="param_TINHTRANGXACNHAN" name="TINHTRANGDON" value="<?php echo $info->TINHTRANGDON; ?>">
                                </div>
                            </div>

                            <div class="mb-3 row">
                                <label for="param_TINHTRANGXACNHAN" class="col-sm-2 col-form-label">Ngày gửi</label>
                                <div class="col-sm-10">
                                    <input type="date" class="form-control" id="param_TINHTRANGXACNHAN" name="NGAYGUI" value="<?php echo $info->NGAYGUI; ?>">
                                </div>
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