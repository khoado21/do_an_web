<style>
    #cart-content td {
        padding: 10px;
        border: 1px solid #ccc;
        height: 50px;
    }

    #cart-content thead th{
        padding: 10px;
        border: 1px solid #ccc;
        height: 100px;
    }

    table
    {
        border-collapse: collapse;
        margin: auto;
    }

    #total_amount td {
        height: auto;
    }

    tr td{
        text-align: center;
    }

    .btn {
        background-color: #f44336;;
        /* Red */
        border: none;
        color: white;
        padding: 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        border-radius: 8px;
    }
</style>
<div class="box-center">
    <!-- The box-center product-->
    <div class="tittle-box-center">
        <h2>Thông tin đơn hàng</h2>
    </div>

    <div class="box-content-center product">
        <!-- The box-content-center -->
        <?php if($total_orders > 0): ?>
        <form>
            <table id="cart-content">
                <thead>
                    <th>Mã đơn hàng</th>
                    <th style="width: 300px;">Tình trạng thanh toán</th>
                    <th>Chi tiết</th>
                </thead>
                <tbody>
                    <?php foreach ($donhang as $row) : ?>
                        <tr>
                            <td>
                            <?php echo $row->MADONHANG ?>
                            </td>
                            <td>
                                <?php if($row->TINHTRANGTHANHTOAN == 0): ?>
                                    <p>Chưa thanh toán</p>
                                    <?php elseif($row->TINHTRANGTHANHTOAN == 1): ?>
                                        <p>Đã thanh toán</p>
                                    <?php elseif($row->TINHTRANGTHANHTOAN == 2): ?>
                                        <p>Thanh toán thất bại</p>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="<?php echo base_url('Order/OrderDetail/'.$row->MADONHANG) ?>">Chi tiết</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </form>
        <?php else: ?>
            <h4 style="text-align: center;">Không có đơn hàng trong tài khoản!</h4>
        <?php endif; ?>
    </div>
</div>