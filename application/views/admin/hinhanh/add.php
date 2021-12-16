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
        <h1 class="h3 mb-2 text-gray-800">Thêm mới hình ảnh</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <form style="overflow: hidden;" action="" method="POST" enctype="multipart/form-data">
                        <div class="mb-3 row" style="margin-top: 10px;">
                            <label for="param_MASP" class="col-sm-2 col-form-label">Mã sản phẩm<span style="color:red">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="param_MASP" value="<?php echo set_value('MASP'); ?>" name="MASP">
                            </div>
                            <div class="name_error"><?php echo form_error('MASP'); ?> </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="param_HINHANH" class="col-sm-2 col-form-label">Hình ảnh<span style="color:red">*</span></label>
                            <div class="mb-3 col-sm-3">
                            <input class="form-control" type="file" id="formFile" name="HINHANH">
                            </div>
                        </div>

                        <div class="col text-center">
                            <input type="submit" class="btn btn-primary" value="Submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>


</html>