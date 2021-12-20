<?php
$this->load->view('site/slide');
?>

<div class="box-center">
    <!-- The box-center product-->
    <div class="tittle-box-center">
        <h2>Sản phẩm mới</h2>
    </div>
   
    <div class="box-content-center product">
        <!-- The box-content-center -->
        <?php foreach($sanpham_new as $row): ?>
        <div class="product_item">
            <h3>
                <a href="<?php echo base_url('sanpham/view/'.$row->MASP) ?>" title="Sản phẩm">
                <?php echo $row->TENSP ?> </a>
            </h3>
            <div class="product_img">
                <a href="<?php echo base_url('sanpham/view/'.$row->MASP) ?>" title="Sản phẩm">
                    <img src="<?php echo public_url('image').'/'.$row->HINHANH ?>" alt="">
                </a>
            </div>
            <p class="price">
                5,400,000 đ
            </p>
            <!-- <center>
                <div class="raty" style="margin: 10px 0px; width: 100px;" id="9" data-score="4" title="good">
                <img src="site/raty/img/star-on.png" alt="1" title="good">
                <img src="<?php echo public_url() ?>site/raty/img/star-on.png" alt="2" title="good">
                <img src="<?php echo public_url() ?>site/raty/img/star-on.png" alt="3" title="good">
                <img src="<?php echo public_url() ?>site/raty/img/star-on.png" alt="4" title="good">
                <img src="<?php echo public_url() ?>site/raty/img/star-off.png" alt="5" title="good">
                <input type="hidden" name="score" value="4" readonly="readonly"></div>
            </center> -->
            <div class="action">
                <p style="float:left;margin-left:10px">Lượt xem: <b><?php echo $row->LUOTXEM ?></b></p>
                <a class="button" href="<?php echo base_url('cart/add/'.$row->MASP) ?>" title="Mua ngay">Mua ngay</a>
                <div class="clear"></div>
            </div>  
        </div> 
        <?php endforeach; ?>    
        <div class="clear"></div>
    </div>

    <div class="tittle-box-center">
        <h2>Sản phẩm được xem nhiều nhất</h2>
    </div>
   
    <div class="box-content-center product">
        <!-- The box-content-center -->
        <?php foreach($sanpham_luotxem as $row): ?>
        <div class="product_item">
            <h3>
                <a href="<?php echo base_url('sanpham/view/'.$row->MASP) ?>" title="Sản phẩm">
                <?php echo $row->TENSP ?> </a>
            </h3>
            <div class="product_img">
                <a href="<?php echo base_url('sanpham/view/'.$row->MASP) ?>" title="Sản phẩm">
                    <img src="<?php echo public_url('image').'/'.$row->HINHANH ?>" alt="">
                </a>
            </div>
            <p class="price">
                5,400,000 đ
            </p>
            <!-- <center>
                <div class="raty" style="margin: 10px 0px; width: 100px;" id="9" data-score="4" title="good">
                <img src="site/raty/img/star-on.png" alt="1" title="good">
                <img src="<?php echo public_url() ?>site/raty/img/star-on.png" alt="2" title="good">
                <img src="<?php echo public_url() ?>site/raty/img/star-on.png" alt="3" title="good">
                <img src="<?php echo public_url() ?>site/raty/img/star-on.png" alt="4" title="good">
                <img src="<?php echo public_url() ?>site/raty/img/star-off.png" alt="5" title="good">
                <input type="hidden" name="score" value="4" readonly="readonly"></div>
            </center> -->
            <div class="action">
                <p style="float:left;margin-left:10px">Lượt xem: <b><?php echo $row->LUOTXEM ?></b></p>
                <a class="button" href="<?php echo base_url('cart/add/'.$row->MASP) ?>" title="Mua ngay">Mua ngay</a>
                <div class="clear"></div>
            </div>  
        </div> 
        <?php endforeach; ?>    
        <div class="clear"></div>
    </div>

</div>