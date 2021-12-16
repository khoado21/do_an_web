<div class="box-center">
    <!-- The box-center product-->
    <div class="tittle-box-center">
        <h2>Tìm kiếm với giá từ "<?php echo number_format($price_from) ?>đ" tới "<?php echo number_format($price_to) ?>đ"</h2>
    </div>

    <div class="box-content-center product">
        <!-- The box-content-center -->
        <?php foreach ($list as $row) : ?>
            <div class="product_item">
                <h3>
                    <a href="<?php echo base_url('sanpham/view/'.$row->MASP) ?>" title="Sản phẩm">
                        <?php echo $row->TENSP ?> </a>
                </h3>
                <div class="product_img">
                    <a href="<?php echo base_url('sanpham/view/'.$row->MASP) ?>" title="Sản phẩm">
                        <img src="<?php echo public_url('image') . '/' . $row->HINHANH ?>" alt="">
                    </a>
                </div>
                <p class="price">
                    <?php if ($row->GIAKM > 0) : ?>
                        <?php echo $row->GIAKM ?> đ<span class='price_old'><?php echo $row->DONGIA ?></span>
                    <?php else : ?>
                        <?php echo $row->DONGIA ?>đ
                    <?php endif;  ?>

                </p>
                <!-- <center>
                    <div class="raty" style="margin: 10px 0px; width: 100px;" id="9" data-score="4" title="good">
                </center> -->
                <div class="action">
                    <p style="float:left;margin-left:10px">Lượt xem: <b><?php echo $row->LUOTXEM ?></b></p>
                    <a class="button" href="them-vao-gio-9.html" title="Mua ngay">Mua ngay</a>
                    <div class="clear"></div>
                </div>
            </div>
        <?php endforeach; ?>
        <div class="clear"></div>
    </div>
</div>