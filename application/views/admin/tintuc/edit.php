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
        <h1 class="h3 mb-2 text-gray-800">Cập nhật tin tức</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <form style="overflow: hidden;" action="" method="POST" enctype="multipart/form-data">

                        <div class="mb-3 row">
                            <label for="param_TENDM" class="col-sm-2 col-form-label">Tiêu đề</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="param_TENDM" value="<?php echo $info->TIEUDE; ?>" name="TIEUDE" >
                            </div>
                            <div class="name_error"> <?php echo form_error('TIEUDE'); ?></div>
                        </div>

                        <div class="mb-3 row">
                            <label for="param_TENDM" class="col-sm-2 col-form-label">Nguồn</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="param_TENDM" value="<?php echo $info->NGUON; ?>" name="NGUON" >
                            </div>
                            <div class="name_error"> <?php echo form_error('NGUON'); ?></div>
                        </div>

                        <div class="mb-3 row">
                            <label for="param_TENDM" class="col-sm-2 col-form-label">Nội dung</label>
                            <div class="col-sm-10">
                                <input type="textarea" class="form-control" id="param_TENDM" value="<?php echo $info->NOIDUNG; ?>" name="NOIDUNG" >
                            </div>
                            <div class="name_error"> <?php echo form_error('NOIDUNG'); ?></div>
                        </div>

                        <div class="mb-3 row">
                            <label for="param_TENDM" class="col-sm-2 col-form-label">Ngày đăng</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="param_TENDM" value="<?php echo $info->NGAYDANG; ?>" name="NGAYDANG" >
                            </div>
                            <div class="name_error"> <?php echo form_error('NGAYDANG'); ?></div>
                        </div>

                        <div class="mb-3 row">
                            <label for="param_TENDM" class="col-sm-2 col-form-label">Ngày sửa</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="param_TENDM" value="<?php echo $today; ?>" name="NGAYSUA" >
                            </div>
                            <div class="name_error"> <?php echo form_error('NGAYSUA'); ?></div>
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