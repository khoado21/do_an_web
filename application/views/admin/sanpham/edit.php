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
                            <label for="param_HOTEN" class="col-sm-2 col-form-label">Tên sản phẩm</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" value="<?php echo $info->TENSP; ?>" name="TENSP">
                            </div>
                            <div class="name_error"><?php echo form_error('TENSP'); ?> </div>
                        </div>

                        <div class="mb-3 row" style="margin-top: 10px;">
                            <label for="param_HOTEN" class="col-sm-2 col-form-label">Mã thương hiệu</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="param_HOTEN" value="<?php echo $info->MATHUONGHIEU; ?>" name="MATHUONGHIEU">
                            </div>
                            <div class="name_error"><?php echo form_error('MATHUONGHIEU'); ?> </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="param_USERNAME" class="col-sm-2 col-form-label">Mã danh mục</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="param_USERNAME" name="MADM" value="<?php echo $info->MADM; ?>">
                            </div>
                            <div class="name_error"> <?php echo form_error('MADM'); ?></div>
                        </div>

                        <div class="mb-3">
                            <label for="exampleFormControlTextarea1" class="form-label">Chi tiết</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="CHITIET" rows="3" value="<?php echo $info->CHITIET; ?>"></textarea>
                        </div>

                        <div class="mb-3 row">
                            <label for="param_MAQUYEN" class="col-sm-2 col-form-label">Đơn giá</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="param_MAQUYEN" name="DONGIA" value="<?php echo $info->DONGIA; ?>">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="param_MAQUYEN" class="col-sm-2 col-form-label">Hình ảnh đại diện</label>
                            <div class="col-sm-5">
                            <input class="form-control" type="file" id="formFile" name="HINHANH"?>
                            </div>
                            <div class="important">Nếu không update ảnh thì để trống</div>
                        </div>

                        <div class="mb-3 row">
                            <label for="param_VAITRO" class="col-sm-2 col-form-label">Giá khuyến mãi</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="param_VAITRO" name="GIAKM" value="<?php echo $info->GIAKM; ?>">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="param_PASSWORD" class="col-sm-2 col-form-label">Bảo hành</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="param_PASSWORD" name="BAOHANH" value="<?php echo $info->BAOHANH; ?>">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="param_PASSWORD" class="col-sm-2 col-form-label">Số lượng</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="param_PASSWORD" name="SOLUONG" value="<?php echo $info->SOLUONG; ?>">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="param_PASSWORD" class="col-sm-2 col-form-label">Tình trạng SP</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="param_PASSWORD" name="TINHTRANGSP" value="<?php echo $info->TINHTRANGSP; ?>">
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