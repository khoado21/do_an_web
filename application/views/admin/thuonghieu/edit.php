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
        <h1 class="h3 mb-2 text-gray-800">Cập nhật dữ liệu người dùng</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <form style="overflow: hidden;" action="" method="POST" enctype="multipart/form-data">

                        <div class="mb-3 row">
                            <label for="param_TENTHUONGHIEU" class="col-sm-2 col-form-label">Tên thương hiệu</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="param_TENTHUONGHIEU" value="<?php echo $info->TENTHUONGHIEU; ?>" name="TENTHUONGHIEU" >
                            </div>
                            <div class="name_error"> <?php echo form_error('TENTHUONGHIEU'); ?></div>
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