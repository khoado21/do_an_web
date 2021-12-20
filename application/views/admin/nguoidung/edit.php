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
        <h1 class="h3 mb-2 text-gray-800">Cập nhật dữ liệu người dùng</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <form style="overflow: hidden;" action="<?php echo admin_url('Nguoidung/edit')?>" method="POST" enctype="multipart/form-data">

                        <div class="mb-3 row" style="margin-top: 10px;">
                            <label for="param_HOTEN" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" value="<?php echo $user->EMAIL; ?>" aria-label="Disabled input example" disabled readonly>
                            </div>
                        </div>

                        <div class="mb-3 row" style="margin-top: 10px;">
                            <label for="param_HOTEN" class="col-sm-2 col-form-label">Họ và tên</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="param_HOTEN" value="<?php echo $user->HOTEN; ?>" name="HOTEN">
                            </div>
                            <div class="name_error"><?php echo form_error('HOTEN'); ?> </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="param_USERNAME" class="col-sm-2 col-form-label">Username</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="param_USERNAME" name="USERNAME" value="<?php echo $user->USERNAME; ?>">
                            </div>
                            <div class="name_error"> <?php echo form_error('USERNAME'); ?></div>
                        </div>

                        <div class="mb-3 row">
                            <label for="param_USERNAME" class="col-sm-2 col-form-label">SDT</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="param_USERNAME" name="SDT" value="<?php echo $user->SDT; ?>">
                            </div>
                            <div class="name_error"> <?php echo form_error('SDT'); ?></div>
                        </div>

                        <div class="mb-3 row">
                            <label for="param_PASSWORD" class="col-sm-2 col-form-label">Địa chỉ</label>
                            <div class="col-sm-10">
                                <textarea type="text" class="form-control" id="param_PASSWORD" name="DIACHI"><?php echo $user->DIACHI; ?></textarea>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="param_DATE" class="col-sm-2 col-form-label">Ngày sinh</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="param_DATE" name="NGAYSINH" value="<?php echo $user->NGAYSINH; ?>">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="param_VAITRO" class="col-sm-2 col-form-label">Vai trò</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="param_VAITRO" name="VAITRO" value="<?php echo $user->VAITRO; ?>">
                            </div>
                            <div class="name_error"> <?php echo form_error('VAITRO'); ?></div>
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