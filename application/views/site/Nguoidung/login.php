<style>
    .message {
        background-color: #f44336;
        /* Red */
        border: none;
        color: white;
        padding: 10px;
        width: 60%;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        cursor: pointer;
        border-radius: 8px;
        margin-left: 100px;
    }

    .center {
        margin: auto;
    }
</style>

<div class="box-center">
    <!-- The box-center product-->
    <div class="tittle-box-center">
        <h2>Đăng nhập</h2>
    </div>
    <div class="box-content-center register">
        <!-- The box-content-center -->
        <?php echo form_error('Login') ?>
        <h1>Đăng nhập</h1>
        <form enctype="multipart/form-data" action="<?php echo site_url('Nguoidung/login') ?>" method="post" class="t-form form_action">
            <div class="form-row">
                <label class="form-label" for="param_email">Email:<span class="req">*</span></label>
                <div class="form-item">
                    <input type="text" value="<?php echo set_value('EMAIL') ?>" name="EMAIL" id="email" class="input">
                    <div class="clear"></div>
                    <div id="email_error" class="error"><?php echo form_error('EMAIL') ?></div>
                </div>
                <div class="clear"></div>
            </div>

            <div class="form-row">
                <label class="form-label" for="param_password">Mật khẩu:<span class="req">*</span></label>
                <div class="form-item">
                    <input type="password" name="PASSWORD" id="password" class="input">
                    <div class="clear"></div>
                    <div id="password_error" class="error"><?php echo form_error('PASSWORD') ?></div>
                </div>
                <div class="clear"></div>
            </div>

            <div class="form-row">
                <label class="form-label">&nbsp;</label>
                <div class="form-item">
                    <input type="submit" name="submit" value="Đăng nhập" class="button">
                </div>
            </div>
        </form>
    </div><!-- End box-content-center register-->
    <div class="clear"></div>
</div>