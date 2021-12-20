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
        <h1 class="h3 mb-2 text-gray-800">Thêm mới sản phẩm</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <form style="overflow: hidden;" action="" method="POST" enctype="multipart/form-data">
                        <div class="mb-3 row" style="margin-top: 10px;">
                            <label for="param_TENSP" class="col-sm-2 col-form-label">Tên sản phẩm<span style="color:red">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="param_TENSP" value="<?php echo set_value('TENSP'); ?>" name="TENSP">
                            </div>
                            <div class="name_error"><?php echo form_error('TENSP'); ?> </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="param_MATHUONGHIEU" class="col-sm-2 col-form-label">Mã thương hiệu<span style="color:red">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="param_MATHUONGHIEU" name="MATHUONGHIEU" value="<?php echo set_value('MATHUONGHIEU'); ?>">
                            </div>
                            <div class="name_error"> <?php echo form_error('MATHUONGHIEU'); ?></div>
                        </div>

                        <div class="mb-3 row">
                            <label for="param_MADM" class="col-sm-2 col-form-label">Mã danh mục<span style="color:red">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="param_MADM" name="MADM">
                            </div>
                            <div class="name_error"><?php echo form_error('MADM'); ?></div>
                        </div>

                        <div class="mb-3 row">
                            <label for="param_CHITIET" class="col-sm-2 col-form-label">Chi tiết</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="param_CHITIET" name="CHITIET">
                            </div>
                            <div class="name_error"><?php echo form_error('CHITIET'); ?></div>
                        </div>

                        <div class="mb-3 row">
                            <label for="param_DONGIA" class="col-sm-2 col-form-label">Đơn giá<span style="color:red">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="param_DONGIA" name="DONGIA">
                            </div>
                            <div class="name_error"><?php echo form_error('DONGIA'); ?></div>
                        </div>

                        <div class="mb-3 row">
                            <label for="param_HINHANH" class="col-sm-2 col-form-label">Hình ảnh đại diện<span style="color:red">*</span></label>
                            <div class="mb-3 col-sm-3">
                                <input class="form-control" type="file" id="formFile" name="HINHANH">
                            </div>
                            <div class="name_error"><?php echo form_error('HINHANH'); ?></div>
                        </div>

                        <div class="mb-3 row">
                            <label for="param_GIAKM" class="col-sm-2 col-form-label">Giá khuyến mãi</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="param_GIAKM" name="GIAKM">
                            </div>
                        </div>


                        <div class="mb-3 row">
                            <label for="param_BAOHANH" class="col-sm-2 col-form-label">Bảo hành<span style="color:red">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="param_BAOHANH" name="BAOHANH">
                            </div>
                            <div class="name_error"><?php echo form_error('BAOHANH'); ?></div>
                        </div>

                        <div class="mb-3 row">
                            <label for="param_SOLUONG" class="col-sm-2 col-form-label">Số lượng<span style="color:red">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="param_SOLUONG" name="SOLUONG">
                            </div>
                            <div class="name_error"><?php echo form_error('SOLUONG'); ?></div>
                        </div>

                        <div class="mb-3 row">
                            <label for="param_TINHTRANGSP" class="col-sm-2 col-form-label">Tình trạng SP<span style="color:red">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="param_TINHTRANGSP" name="TINHTRANGSP">
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