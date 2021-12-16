<div class="box-center">
    <!-- The box-center product-->
    <div class="tittle-box-center">
        <h2>Đăng kí thành viên</h2>
    </div>
    <div class="box-content-center register">
        <!-- The box-content-center -->
        <h1>Đăng ký thành viên</h1>
        <form enctype="multipart/form-data" action="<?php echo site_url('Nguoidung/register')?>" method="post" class="t-form form_action">
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
                <label class="form-label" for="param_email">Username:<span class="req">*</span></label>
                <div class="form-item">
                    <input type="text" value="<?php echo set_value('USER') ?>" name="USERNAME" id="email" class="input">
                    <div class="clear"></div>
                    <div id="email_error" class="error"><?php echo form_error('USERNAME') ?></div>
                </div>
                <div class="clear"></div>
            </div>

            <div class="form-row">
                <label class="form-label" for="param_email">Ngày sinh:</label>
                <div class="form-item">
                    <input type="date" value="<?php echo set_value('NGAYSINH') ?>" name="NGAYSINH" id="email" class="input">
                    <div class="clear"></div>
                    <div id="email_error" class="error"></div>
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
                <label class="form-label" for="param_re_password">Gõ lại mật khẩu:<span class="req">*</span></label>
                <div class="form-item">
                    <input type="password" name="PASSCONF" id="re_password" class="input">
                    <div class="clear"></div>
                    <div id="re_password_error" class="error"><?php echo form_error('PASSCONF') ?></div>
                </div>
                <div class="clear"></div>
            </div>
            <div class="form-row">
                <label class="form-label" for="param_name">Họ và tên:<span class="req">*</span></label>
                <div class="form-item">
                    <input type="text" value="<?php echo set_value('HOTEN') ?>" name="HOTEN" id="name" class="input">
                    <div class="clear"></div>
                    <div id="name_error" class="error"></div>
                </div>
                <div class="clear"></div>
            </div>
            <div class="form-row">
                <label class="form-label" for="param_phone">Số điện thoại:<span class="req">*</span></label>
                <div class="form-item">
                    <input type="text" value="<?php echo set_value('SDT') ?>" name="SDT" id="phone" class="input">
                    <div class="clear"></div>
                    <div id="phone_error" class="error"><?php echo form_error('SDT') ?></div>
                </div>
                <div class="clear"></div>
            </div>

            <div class="form-row">
                <label class="form-label" for="param_address">Địa chỉ:<span class="req">*</span></label>
                <div class="form-item">
                    <textarea name="DIACHI" id="DIACHI" class="input"><?php echo set_value('DIACHI') ?></textarea>
                    <div class="clear"></div>
                    <div id="address_error" class="error"><?php echo form_error('DIACHI') ?></div>
                </div>
                <div class="clear"></div>
            </div>

            <div class="form-row">
                <label class="form-label">&nbsp;</label>
                <div class="form-item">
                    <input type="submit" name="submit" value="Đăng ký" class="button">
                </div>
            </div>
        </form>
    </div><!-- End box-content-center register-->
    <div class="clear"></div>
</div>