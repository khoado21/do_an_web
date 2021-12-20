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
        <h2>Chi tiết đơn hàng</h2>
    </div>

    <div class="box-content-center product">
        <!-- The box-content-center -->
        <form>
            <table id="cart-content">
                <thead>
                    <th>Sản phẩm</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá bán</th>
                    <th>Số lượng</th>
                    <th>Tổng số</th>
                </thead>
                <tbody>
                    <?php $total_amount = 0 ?>
                    <?php foreach ($list_ctdh as $row) : ?>
                        <?php $total_amount = $total_amount + $row->DONGIA * $row->SOLUONG ?>
                        <tr>
                            <td>
                                <img id="image" src="<?php echo public_url('image/') . $row->HINHANH ?>" alt="<?php echo $row->HINHANH ?>">
                            </td>
                            <td>
                                <?php echo $row->TENSP ?>
                            </td>
                            <td>
                                <?php echo $row->DONGIA?>đ
                            </td>
                            <td style="text-align: center;">
                                <?php echo $row->SOLUONG ?>
                            </td>
                            <td>
                                <?php echo $row->DONGIA * $row->SOLUONG ?>đ
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <tr id="total_amount">
                        <td colspan="6">
                            Tổng số tiền thanh toán: <b style="color: red;"><?php echo $total_amount ?></b>đ
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
</div>