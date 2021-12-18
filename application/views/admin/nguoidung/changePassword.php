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
    <?php if(isset($message)): ?>
        <?php echo $message; ?>
    <?php endif; ?>
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Đổi mật khẩu</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <form style="overflow: hidden;" action="<?php echo admin_url('Nguoidung/changePassword') ?>" method="POST" enctype="multipart/form-data">

                        <div class="mb-3 row" style="margin-top: 10px;">
                        <label for="param_PASSWORD" class="col-sm-2 col-form-label">Mật khẩu mới<span style="color:red">*</span></label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="param_PASSWORD" name="NEWPASS">
                            </div>
                            <div class="name_error"><?php echo form_error('NEWPASS'); ?> </div>
                        </div>

                        <div class="mb-3 row">
                        <label for="param_PASSWORD" class="col-sm-2 col-form-label">Nhập lại mật khẩu mới<span style="color:red">*</span></label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="param_PASSWORD" name="NEWPASSCONF">
                            </div>
                            <div class="name_error"><?php echo form_error('NEWPASSCONF'); ?> </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="param_PASSWORD" class="col-sm-2 col-form-label">Xác nhận mật khẩu cũ<span style="color:red">*</span></label>
                            <div class="col-sm-10">
                                <input type="password" class="form-control" id="param_PASSWORD" name="PASSWORD">
                            </div>
                            <div class="name_error"><?php echo form_error('PASSCONF'); ?> </div>
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