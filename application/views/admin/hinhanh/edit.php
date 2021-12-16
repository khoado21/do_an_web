<html>
<style>
    .name_error {
        color: red;
        margin-left: 12px;
    }

    .important {
        color: red;
        margin-left: 12px;
        margin-top: 6px;
    }
</style>
<div id="wrapper">
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <?php echo $message; ?>
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Cập nhật dữ liệu sản phẩm</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <form style="overflow: hidden;" action="" method="POST" enctype="multipart/form-data">

                        <div class="mb-3 row" style="margin-top: 10px;">
                            <label for="param_HOTEN" class="col-sm-2 col-form-label">Mã sản phẩm</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" value="<?php echo $info->MASP; ?>" name="MASP">
                            </div>
                            <div class="name_error"><?php echo form_error('TENSP'); ?> </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="param_MAQUYEN" class="col-sm-2 col-form-label">Hình ảnh đại diện</label>
                            <div class="col-sm-5">
                            <input class="form-control" type="file" id="formFile" name="HINHANH"?>
                            </div>
                            <div class="important">Nếu không update ảnh thì để trống</div>
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