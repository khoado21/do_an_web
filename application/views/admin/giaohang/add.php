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
        <h1 class="h3 mb-2 text-gray-800">Thêm mới giao hàng</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <form style="overflow: hidden;" action="<?php echo admin_url('giaohang/add'); ?>" method="POST" enctype="multipart/form-data">

                    <div class="mb-3 row">
                            <label for="param_USERNAME" class="col-sm-2 col-form-label">Tên người giao<span style="color: red;">*</span></label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="param_USERNAME" name="TENNGUOIGIAO">
                            </div>
                            <div class="name_error"> <?php echo form_error('TENGUOIGIAO'); ?></div>
                        </div>

                        <div class="mb-3 row">
                            <label for="param_USERNAME" class="col-sm-2 col-form-label">SDT<span style="color: red;">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="param_USERNAME" name="SDT">
                            </div>
                            <div class="name_error"> <?php echo form_error('SDT'); ?></div>
                        </div>

                        <div class="mb-3 row">
                            <label for="param_USERNAME" class="col-sm-2 col-form-label">Ngày giao</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" id="param_USERNAME" name="NGAYGIAO">
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