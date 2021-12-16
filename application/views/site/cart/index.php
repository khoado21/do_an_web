<style>
    #cart-content td {
        padding: 10px;
        border: 1px solid #ccc;
        height: 100px;
    }

    #cart-content thead th{
        padding: 10px;
        border: 1px solid #ccc;
        height: 100px;
    }

    table
    {
        border-collapse: collapse;
    }

    .box-center .box-content-center #cart-content {
        margin-right: 15px;
    }

    #option td {
        height: auto;
    }

    #total_amount td {
        height: auto;
    }

    #image {
        width: 100px;
        height: 100px;
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
        <h2>Thông tin giỏ hàng (Có <?php echo $total_items ?> sản phẩm) </h2>
    </div>

    <div class="box-content-center product">
        <!-- The box-content-center -->
        <?php if($total_items > 0): ?>
        <form action="<?php echo base_url('cart/update') ?>" method="POST">
            <table id="cart-content">
                <thead>
                    <th>Sản phẩm</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá bán</th>
                    <th>Số lượng</th>
                    <th>Tổng số</th>
                    <th>Xóa</th>
                </thead>
                <tbody>
                    <?php $total_amount = 0 ?>
                    <?php foreach ($cart as $row) : ?>
                        <?php $total_amount = $total_amount + $row['price'] * $row['qty'] ?>
                        <tr>
                            <td>
                                <img id="image" src="<?php echo public_url('image/') . $row['image_link'] ?>" alt="<?php echo $row['image_link'] ?>">
                            </td>
                            <td>
                                <?php echo $row['name'] ?>
                            </td>
                            <td>
                                <?php echo $row['price']?>đ
                            </td>
                            <td>
                                <input type="number" name="qty_<?php echo $row['id'] ?>" value="<?php echo $row['qty'] ?>" style="width: 40px;">
                            </td>
                            <td>
                                <?php echo $row['price']*$row['qty'] ?>đ
                            </td>
                            <td>
                                <a href="<?php echo base_url('cart/delete/'.$row['id']) ?>">Xóa</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <tr id="option">
                        <td colspan="6" style="text-align: center;">
                            <a href="<?php echo base_url('cart/delete') ?>"><button type="button" class="btn">Xóa toàn bộ</button></a>
                            <button type="submit" class="btn">Cập nhật</button>
                            <a href="<?php echo base_url('order/checkout') ?>"><button type="button" class="btn" style="background-color:royalblue">Thanh toán</button></a>
                        </td>
                    </tr>
                    <tr id="total_amount">
                        <td colspan="6">
                            Tổng số tiền thanh toán: <b style="color: red;"><?php echo $total_amount ?></b>đ
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
        <?php else: ?>
            <h4 style="text-align: center;">Không có sản phẩm trong giỏ hàng!</h4>
        <?php endif; ?>
    </div>
</div>