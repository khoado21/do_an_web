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
        <?php if (isset($message)) : ?>
            <?php echo $message; ?>
        <?php endif ?>
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Cập nhật dữ liệu đơn hàng</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <form style="overflow: hidden;" action="" method="POST" enctype="multipart/form-data">

                        <div class="mb-3 row">
                            <label for="param_USERNAME" class="col-sm-2 col-form-label">Tên người giao<span style="color: red;">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="param_USERNAME" name="TENNGUOIGIAO" value="<?php echo $info->TENNGUOIGIAO ?>">
                            </div>
                            <div class="name_error"> <?php echo form_error('TENGUOIGIAO'); ?></div>
                        </div>

                        <div class="mb-3 row">
                            <label for="param_USERNAME" class="col-sm-2 col-form-label">SDT<span style="color: red;">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="param_USERNAME" name="SDT" value="<?php echo $info->SDT ?>">
                            </div>
                            <div class="name_error"> <?php echo form_error('SDT'); ?></div>
                        </div>

                        <div class="mb-3 row">
                            <label for="param_USERNAME" class="col-sm-2 col-form-label">Ngày giao</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="param_USERNAME" name="NGAYGIAO" value="<?php echo $info->NGAYGIAO ?>">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="param_USERNAME" class="col-sm-2 col-form-label">Xác nhận</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="param_USERNAME" name="XACNHAN" value="<?php echo $info->XACNHAN ?>">
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