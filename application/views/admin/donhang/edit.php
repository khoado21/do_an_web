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
        <h1 class="h3 mb-2 text-gray-800">Cập nhật dữ liệu đơn hàng</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <form style="overflow: hidden;" action="" method="POST" enctype="multipart/form-data">

                    <div class="mb-3 row" style="margin-top: 10px;">
                            <label for="param_HOTEN" class="col-sm-2 col-form-label">Mã đơn hàng<span style="color:red">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" aria-label="Disabled input example" readonly id="param_HOTEN" value="<?php echo $info->MADONHANG; ?>" name="MADONHANG">
                            </div>
                            <div class="name_error"><?php echo form_error('MADONHANG'); ?> </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="param_USERNAME" class="col-sm-2 col-form-label">Mã voucher</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="param_USERNAME" name="MAVOUCHER" value="<?php echo $info->MAVOUCHER; ?>">
                            </div>
                            <div class="name_error"> <?php echo form_error('MAVOUCHER'); ?></div>
                        </div>

                        <div class="mb-3 row">
                            <label for="param_PASSWORD" class="col-sm-2 col-form-label">Mã giao hàng</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="param_PASSWORD" name="MAGIAOHANG" value="<?php echo $info->MAGIAOHANG; ?>">
                            </div>
                            <div class="name_error"><?php echo form_error('MAGIAOHANG'); ?></div>
                        </div>

                        <div class="mb-3 row">
                            <label for="param_PASSWORD" class="col-sm-2 col-form-label">Mã người dùng</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="param_PASSCONF" name="MANGUOIDUNG" value="<?php echo $info->MANGUOIDUNG; ?>">
                            </div>
                            <div class="name_error"><?php echo form_error('MANGUOIDUNG'); ?></div>
                        </div>

                        <div class="mb-3 row">
                            <label for="param_DATE" class="col-sm-2 col-form-label">Ngày đặt</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="param_DATE" name="NGAYDAT" value="<?php echo $info->NGAYDAT; ?>">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="param_EMAIL" class="col-sm-2 col-form-label">Ngay ship</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="param_EMAIL" name="NGAYSHIP" value="<?php echo $info->NGAYSHIP; ?>">
                            </div>
                            <div class="name_error"><?php echo form_error('NGAYSHIP'); ?></div>
                        </div>


                        <div class="mb-3 row">
                            <label for="param_NGAYTAO" class="col-sm-2 col-form-label">Tổng đơn</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="param_NGAYTAO" name="TONGDON" value="<?php echo $info->TONGDON; ?>">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="param_NGAYSUA" class="col-sm-2 col-form-label">Họ tên</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="param_NGAYSUA" name="HOTEN" value="<?php echo $info->HOTEN; ?>">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="param_MAQUYEN" class="col-sm-2 col-form-label">SDT<span style="color:red">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="param_MAQUYEN" name="SDT" value="<?php echo $info->SDT; ?>">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="param_VAITRO" class="col-sm-2 col-form-label">Địa chỉ<span style="color:red">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="param_VAITRO" name="DIACHI" value="<?php echo $info->DIACHI; ?>">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="param_TRANGTHAI" class="col-sm-2 col-form-label">Giới tính</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="param_TRANGTHAI" name="GIOITINH" value="<?php echo $info->GIOITINH; ?>">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="param_TRANGTHAI" class="col-sm-2 col-form-label">EMAIL</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="param_TRANGTHAI" name="EMAIL" value="<?php echo $info->EMAIL; ?>">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="param_TRANGTHAI" class="col-sm-2 col-form-label">Ghi chú</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="param_TRANGTHAI" name="GHICHU" value="<?php echo $info->GHICHU; ?>">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="param_TRANGTHAI" class="col-sm-2 col-form-label">Số theo dõi</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="param_TRANGTHAI" name="SOTHEODOI" value="<?php echo $info->SOTHEODOI; ?>">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="param_TRANGTHAI" class="col-sm-2 col-form-label">Vận chuyển</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="param_TRANGTHAI" name="VANCHUYEN" value="<?php echo $info->VANCHUYEN; ?>">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="param_TRANGTHAI" class="col-sm-2 col-form-label">Tình trạng thanh toán</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="param_TRANGTHAI" name="TINHTRANGTHANHTOAN" value="<?php echo $info->TINHTRANGTHANHTOAN; ?>">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="param_TRANGTHAI" class="col-sm-2 col-form-label">Ngày thanh toán</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="param_TRANGTHAI" name="NGAYTHANHTOAN" value="<?php echo $info->NGAYTHANHTOAN; ?>">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="param_TRANGTHAI" class="col-sm-2 col-form-label">Ngày hết hạn</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="param_TRANGTHAI" name="NGAYHETHAN" value="<?php echo $info->NGAYHETHAN; ?>">
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