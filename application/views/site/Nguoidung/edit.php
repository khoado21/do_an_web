<div class="box-center">
    <!-- The box-center product-->
    <div class="tittle-box-center">
        <h2>Chỉnh sửa thông tin người dùng</h2>
    </div>
    <div class="box-content-center register">
        <!-- The box-content-center -->
        <h1>Chỉnh sửa thông tin</h1>
        <form enctype="multipart/form-data" action="<?php echo site_url('Nguoidung/edit') ?>" method="post" class="t-form form_action">
            <div class="form-row">
                <label class="form-label" for="param_email">Email:</label>
                <div class="form-item">
                    <input type="text" style="background-color: #f0f0f0; color: #333" value="<?php echo $user->EMAIL ?>" id="email" class="input" disabled>
                    <div class="clear"></div>
                    <div id="email_error" class="error"><?php echo form_error('EMAIL') ?></div>
                </div>
                <div class="clear"></div>
            </div>

            <div class="form-row">
                <label class="form-label" for="param_email">Username:</label>
                <div class="form-item">
                    <input type="text" value="<?php echo $user->USERNAME ?>" name="USERNAME" id="email" class="input">
                    <div class="clear"></div>
                    <div id="email_error" class="error"><?php echo form_error('USERNAME') ?></div>
                </div>
                <div class="clear"></div>
            </div>

            <div class="form-row">
                <label class="form-label" for="param_email">Ngày sinh:</label>
                <div class="form-item">
                    <input type="date" value="<?php echo $user->NGAYSINH ?>" name="NGAYSINH" id="email" class="input">
                    <div class="clear"></div>
                    <div id="email_error" class="error"></div>
                </div>
                <div class="clear"></div>
            </div>

            <div class="form-row">
                <label class="form-label" for="param_name">Họ và tên:</label>
                <div class="form-item">
                    <input type="text" value="<?php echo $user->HOTEN ?>" name="HOTEN" id="name" class="input">
                    <div class="clear"></div>
                    <div id="name_error" class="error"></div>
                </div>
                <div class="clear"></div>
            </div>
            <div class="form-row">
                <label class="form-label" for="param_phone">Số điện thoại:</label>
                <div class="form-item">
                    <input type="text" value="<?php echo $user->SDT ?>" name="SDT" id="phone" class="input">
                    <div class="clear"></div>
                    <div id="phone_error" class="error"><?php echo form_error('SDT') ?></div>
                </div>
                <div class="clear"></div>
            </div>

            <div class="form-row">
                <label class="form-label" for="param_address">Địa chỉ:</label>
                <div class="form-item">
                    <textarea name="DIACHI" id="DIACHI" class="input"><?php echo $user->DIACHI ?></textarea>
                    <div class="clear"></div>
                    <div id="address_error" class="error"><?php echo form_error('DIACHI') ?></div>
                </div>
                <div class="clear"></div>
            </div>

            <div class="form-row">
                <label class="form-label">&nbsp;</label>
                <div class="form-item">
                    <input type="submit" name="submit" value="Cập nhật" class="button">
                </div>
            </div>
        </form>
    </div><!-- End box-content-center register-->
    <div class="clear"></div>
</div>