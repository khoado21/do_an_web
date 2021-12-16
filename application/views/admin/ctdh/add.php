<?php
        $query = $this->db->query("SELECT * FROM donhang");
        $lastrow = $query->last_row();
        $data['lastrow'] = $lastrow;
        $max = $data['lastrow']->MADONHANG;
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
        <h1 class="h3 mb-2 text-gray-800">Thêm mới chi tiết đơn hàng</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <form style="overflow: hidden;" action="" method="POST" enctype="multipart/form-data">

                    <div class="mb-3 row">
                            <label for="param_USERNAME" class="col-sm-2 col-form-label">Mã sản phẩm<span style="color:red">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="param_USERNAME" name="MASP" value="<?php echo set_value('MASP'); ?>">
                            </div>
                            <div class="name_error"> <?php echo form_error('MASP'); ?></div>
                        </div>

                        <div class="mb-3 row">
                            <label for="param_USERNAME" class="col-sm-2 col-form-label">Mã đơn hàng<span style="color:red">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="param_USERNAME" name="MADONHANG" value="<?php echo $max; ?>">
                            </div>
                            <div class="name_error"> <?php echo form_error('MADONHANG'); ?></div>
                        </div>

                        <div class="mb-3 row">
                            <label for="param_PASSWORD" class="col-sm-2 col-form-label">Đơn giá<span style="color:red">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="param_PASSWORD" name="DONGIA" value="<?php echo set_value('DONGIA'); ?>">
                            </div>
                            <div class="name_error"><?php echo form_error('DONGIA'); ?></div>
                        </div>

                        <div class="mb-3 row">
                            <label for="param_PASSWORD" class="col-sm-2 col-form-label">Số lượng<span style="color:red">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="param_PASSCONF" name="SOLUONG" value="<?php echo set_value('SOLUONG'); ?>">
                            </div>
                            <div class="name_error"><?php echo form_error('SOLUONG'); ?></div>
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