<style>
    .payment_method {
    background-color: rgb(237, 246, 255);
    border-radius: 16px;
    width: 70%;
    height: 150px;
    margin: auto;
    display: none;
}

    .word_header {
    font-family: "Muli-Black.ttf";
    color: rgb(45, 67, 121);
    font-size: 18px;
    line-height: 1.4;
    text-align: center;
    vertical-align: middle;
}

    .word_detail {
    font-family: "SVN-Circular Book.otf";
    color: rgb(61, 78, 94);
    font-size: 18px;
    line-height: 1.6;
    text-align: center;
    vertical-align: middle;
}

#method1{
    display: none;
}

#method2{
    display: none;
}

</style>

<div class="box-center">
    <!-- The box-center product-->
    <div class="tittle-box-center">
        <h2>Thông tin nhận hàng</h2>
    </div>
    <div class="box-content-center register">
        <!-- The box-content-center -->
        <h1>Thông tin nhận hàng</h1>
        <form enctype="multipart/form-data" action="<?php echo site_url('Order/checkout') ?>" method="post" class="t-form form_action">
            <div class="form-row">
                <label class="form-label" for="param_email">Số tiền cần thanh toán:</label>
                <div class="form-item">
                    <input type="text" style="color: red;" value="<?php echo number_format($total_amount) ?>đ" name="total_amount" id="email" class="input" disabled>
                    <div class="clear"></div>
                    <div id="email_error" class="error"><?php echo form_error('EMAIL') ?></div>
                </div>
                <div class="clear"></div>
            </div>

            <div class="form-row">
                <label class="form-label" for="param_email">Email:<span class="req">*</span></label>
                <div class="form-item">
                    <input type="text" value="<?php echo isset($user->EMAIL) ? $user->EMAIL : '' ?>" name="EMAIL" id="email" class="input">
                    <div class="clear"></div>
                    <div id="email_error" class="error"><?php echo form_error('EMAIL') ?></div>
                </div>
                <div class="clear"></div>
            </div>

            <div class="form-row">
                <label class="form-label" for="param_name">Họ và tên:<span class="req">*</span></label>
                <div class="form-item">
                    <input type="text" value="<?php echo isset($user->HOTEN) ? $user->HOTEN : '' ?>" name="HOTEN" id="name" class="input">
                    <div class="clear"></div>
                    <div id="name_error" class="error"><?php echo form_error('HOTEN') ?></div>
                </div>
                <div class="clear"></div>
            </div>

            <div class="form-row">
                <label class="form-label" for="param_phone">Số điện thoại:<span class="req">*</span></label>
                <div class="form-item">
                    <input type="text" value="<?php echo isset($user->SDT) ? $user->SDT : '' ?>" name="SDT" id="phone" class="input">
                    <div class="clear"></div>
                    <div id="phone_error" class="error"><?php echo form_error('SDT') ?></div>
                </div>
                <div class="clear"></div>
            </div>

            <div class="form-row">
                <label class="form-label" for="param_address">Địa chỉ:<span class="req">*</span></label>
                <div class="form-item">
                    <textarea name="DIACHI" id="DIACHI" class="input"><?php echo isset($user->DIACHI) ? $user->DIACHI : '' ?></textarea>
                    <div class="clear"></div>
                    <div id="address_error" class="error"><?php echo form_error('DIACHI') ?></div>
                </div>
                <div class="clear"></div>
            </div>

            <div class="form-row">
                <label class="form-label" for="param_address">Ghi chú:</label>
                <div class="form-item">
                    <textarea name="MESSAGE" id="DIACHI" class="input"></textarea>
                    <div class="clear"></div>
                    <div id="address_error" class="error"><?php echo form_error('MESSAGE') ?></div>
                </div>
                <div class="clear"></div>
            </div>

            <div class="form-row">
                <table>
                    <tr>
                        <td style="width: 140px; ">
                            Thanh toán qua:<span class="req">*</span>
                        </td>
                        <td style="width: 140px;">
                            <div class="form-item">
                                <input class="radio1" type="radio" value="nganluong" name="payment">
                                <label>Ngân hàng</label>
                                <div class="clear"></div>
                            </div>
                        </td>
                    </tr>
                    <tr style="height: 50px;" >
                        <td></td>
                        <td>
                            <div class="form-item">
                                <input class="radio2" type="radio" value="tienmat" name="payment">
                                <label>Tiền mặt</label>
                                <div class="clear"></div>
                            </div>
                        </td>
                    </tr>
                </table>
            </div>

            <div class="payment_method" id="method1">
                <h3 class="word_header">Ngân hàng BIDV</h3>
                <br>
                <h3 class="word_detail">
                    Chủ tài khoản: Công ty Anh em wjpu
                    <br>
                    Địa chỉ ở đây
                    <br>
                    <span style="font-weight: bold;">123456789 gì đó</span>
                </h3>
            </div>

            <div class="payment_method" id="method2">
            <h3 class="word_detail">
                    Khách hàng sẽ trả tiền sau khi nhận hàng
                </h3>
            </div>

            <div class="form-row">
                <label class="form-label">&nbsp;</label>
                <div class="form-item">
                    <input type="submit" name="submit" value="Thanh toán" class="button">
                </div>
            </div>
        </form>
    </div><!-- End box-content-center register-->
    <div class="clear"></div>
</div>

<script>
$(document).ready(function(){
  $(".radio1").click(function(){
    $("#method2").css('display', 'none');
    $("#method1").css('display', 'inline-block');
  });

  $(".radio2").click(function(){
    $("#method1").css('display', 'none');
    $("#method2").css('display', 'inline-block');
  });
});
</script>