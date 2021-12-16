<div class="box-center">
    <!-- The box-center product-->
    <div class="tittle-box-center">
        <h2>Đổi mật khẩu</h2>
    </div>
    <div class="box-content-center register">
        <!-- The box-content-center -->
        <h1>Đổi mật khẩu</h1>
        <form enctype="multipart/form-data" action="<?php echo site_url('Nguoidung/changePassword')?>" method="post" class="t-form form_action">
            <div class="form-row">
                <label class="form-label" for="param_password">Mật khẩu mới:<span class="req">*</span></label>
                <div class="form-item">
                    <input type="password" name="PASSWORD" id="password" class="input">
                    <div class="clear"></div>
                    <div id="password_error" class="error"><?php echo form_error('PASSWORD') ?></div>
                </div>
                <div class="clear"></div>
            </div>

            <div class="form-row">
                <label class="form-label" for="param_re_password">Nhập lại mật khẩu:<span class="req">*</span></label>
                <div class="form-item">
                    <input type="password" name="PASSCONF" id="re_password" class="input">
                    <div class="clear"></div>
                    <div id="re_password_error" class="error"><?php echo form_error('PASSCONF') ?></div>
                </div>
                <div class="clear"></div>
            </div>
            
            <div class="form-row">
                <label class="form-label">&nbsp;</label>
                <div class="form-item">
                    <input type="submit" name="submit" value="Đổi mật khẩu" class="button">
                </div>
            </div>
        </form>
    </div><!-- End box-content-center register-->
    <div class="clear"></div>
</div>