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
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Thông tin người dùng</h1>
        <a href="<?php echo admin_url('nguoidung/edit') ?>" class="btn btn-primary btn-lg" style="margin-bottom: 10px ;">Chỉnh sửa</a>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <form style="overflow: hidden;" action="" method="POST" enctype="multipart/form-data">
                    <div class="mb-3 row">
                            <label for="param_USERNAME" class="col-sm-2 col-form-label">Username:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="param_USERNAME" name="MASP" value="<?php echo $user->USERNAME; ?>" disabled>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="param_USERNAME" class="col-sm-2 col-form-label">Họ và tên:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="param_USERNAME" name="MASP" value="<?php echo $user->HOTEN; ?>" disabled>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="param_USERNAME" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="param_USERNAME" name="MADONHANG" value="<?php echo $user->EMAIL; ?>" disabled>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="param_PASSWORD" class="col-sm-2 col-form-label">Địa chỉ</label>
                            <div class="col-sm-10">
                                <textarea type="text" class="form-control" id="param_PASSWORD" name="DONGIA" disabled><?php echo $user->DIACHI; ?></textarea>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="param_PASSWORD" class="col-sm-2 col-form-label">SDT:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="param_PASSCONF" name="SOLUONG" value="<?php echo $user->SDT; ?>" disabled>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>


</html>