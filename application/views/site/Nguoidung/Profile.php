<style>
    .btn {
        background-color: #f44336;
        /* Red */
        border: none;
        color: white;
        padding: 10px;
        width: 150px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        cursor: pointer;
        border-radius: 8px;
    }

    .profile {
        background-color: #f0f0f0;
        border: none;
        color: #333;
        padding: 10px;
        width: 100%;
        text-decoration: none;
        font-size: 16px;
        border-radius: 8px;
    }

    .profile tr
    {
        height: 25px;
    }

    .center table {
        margin-left: auto;
        margin-right: auto;
    }
</style>

<div class="center" style="text-align: center;">
    <!-- The box-center product-->
    <div>
        <div>
            <h2>Thông tin người dùng</h2>
        </div>
        <br>
        <div>
            <table class="profile">
                <tr>
                    <td>Họ tên: <?php echo $user->HOTEN ?></td>
                </tr>
                <tr>
                    <td>Username: <?php echo $user->USERNAME ?></td>
                </tr>
                <tr>
                    <td>Email: <?php echo $user->EMAIL ?></td>
                </tr>
                <tr>
                    <td>Địa chỉ: <?php echo $user->DIACHI ?></td>
                </tr>
                <tr>
                    <td>SDT: <?php echo $user->SDT ?></td>
                </tr>
            </table>
        </div>
    </div>
    <br>
    <a href="<?php echo site_url('Nguoidung/edit') ?>"><button type="submit" class="btn">Sửa thông tin</button></a>
    <a href="<?php echo site_url('Nguoidung/changePassword') ?>"><button type="submit" class="btn">Đổi mật khẩu</button></a>
    <a href="<?php echo site_url('Cart/CartHistory') ?>"><button type="submit" class="btn">Lịch sử đơn hàng</button></a>
</div>