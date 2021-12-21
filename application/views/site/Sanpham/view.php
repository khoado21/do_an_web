<!-- video -->
<script type='text/javascript' src='<?php echo public_url() ?>/site/tivi/jwplayer.js'></script>
<script type='text/javascript'>
    jQuery('document').ready(function() {
        jwplayer('mediaspace').setup({
            'flashplayer': '<?php echo public_url() ?>/site/tivi/player.swf',
            'file': 'https://www.youtube.com/watch?v=zAEYQ6FDO5U',
            'controlbar': 'bottom',
            'width': '560',
            'height': '315',
            'autoplay': true
        });
    })
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('a.tab').click(function() {
            var an_di = $('a.selected').attr('rel'); //lấy title của thẻ <a class='active'>
            $('div#' + an_di).hide(); //ẩn thẻ <div id='an_di'>
            $('a.selected').removeClass('selected');
            $(this).addClass('selected');
            var hien_thi = $(this).attr('rel'); //lấy title của thẻ <a> khi ta kick vào nó
            $('div#' + hien_thi).show(); //hiện lên thẻ <div id='hien_thi'>
        });
    });
</script>

<!-- zoom image -->
<script type='text/javascript' src='<?php echo public_url() ?>/site/jqzoom_ev/js/jquery-1.6.js'></script>
<script src="<?php echo public_url() ?>/site/jqzoom_ev/js/jquery.jqzoom-core.js" type="text/javascript"></script>
<link rel="stylesheet" href="<?php echo public_url() ?>/site/jqzoom_ev/css/jquery.jqzoom.css" type="text/css">
<script type="text/javascript">
    $(document).ready(function() {
        $('.jqzoom').jqzoom({
            zoomType: 'standard', // zoom type
            lens: true,
            preloadImages: false,
            alwaysOn: false
        });
    });
</script>

<!-- end zoom image -->

<!-- Raty -->
<script type="text/javascript">
    $(document).ready(function() {
        //raty
        $('.raty_detailt').raty({
            score: function() {
                return $(this).attr('data-score');
            },
            half: true,
            click: function(score, evt) {
                var rate_count = $('.rate_count');
                var rate_count_total = rate_count.text();
                $.ajax({
                    url: 'http://localhost/webphp/product/raty.html',
                    type: 'POST',
                    data: {
                        'id': '9',
                        'score': score
                    },
                    dataType: 'json',
                    success: function(data) {
                        if (data.complete) {
                            var total = parseInt(rate_count_total) + 1;
                            rate_count.html(parseInt(total));
                        }
                        alert(data.msg);
                    }
                });
            }
        });
    });
</script>
<!--End Raty -->

<div class="box-center">
    <!-- The box-center product-->
    <div class="tittle-box-center">
        <h2>Chi tiết sản phẩm</h2>
    </div>
    <div class="box-content-center product">
        <!-- The box-content-center -->
        <div class='product_view_img'>
            <a href="<?php echo public_url('image/') . $sanpham->HINHANH ?>" class="jqzoom" rel='gal1' title="triumph">
                <img src="<?php echo public_url('image/') . $sanpham->HINHANH ?>" alt='Tivi LG 520' style="width:280px !important">
            </a>
            <div class='clear' style='height:10px'></div>
            <div class="clearfix">
                <ul id="thumblist">
                    <li>
                        <a class="zoomThumbActive" href='javascript:void(0);' rel="{gallery: 'gal1', smallimage: '<?php echo public_url('image/') . $sanpham->HINHANH ?>',largeimage: '<?php echo public_url('image/') . $sanpham->HINHANH ?>'}">
                            <img src='<?php echo public_url('image/') . $sanpham->HINHANH ?>'>
                        </a>
                    </li>
                    <?php foreach ($image_list as $image) : ?>
                        <?php if ($image->LINKANH == '') : ?>
                            <?php continue; ?>
                        <?php else : ?>
                            <li>
                                <a href='javascript:void(0);' rel="{gallery: 'gal1', smallimage: '<?php echo public_url('image/') . $image->LINKANH ?>',largeimage: '<?php echo public_url('image/') . $image->LINKANH ?>'}">
                                    <img src='<?php echo public_url('image/') . $image->LINKANH ?>'>
                                </a>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>

        <div class='product_view_content'>
            <h1><?php echo $sanpham->TENSP ?></h1>

            <p class='option'>
                <?php if ($sanpham->GIAKM > 0) : ?>
                    <span class='product_price'><?php echo $sanpham->GIAKM ?> đ</span>
                    <span class='price_old'><?php echo $sanpham->DONGIA ?></span>
                <?php else : ?>
                    <span class='product_price'><?php echo $sanpham->DONGIA ?> đ</span>
                <?php endif;  ?>
            </p>

            <p class='option'>
                Danh mục:
                <a href="<?php echo base_url('product/catalog' . $catalog->MADM) ?>" title="<?php echo $catalog->TENDM ?>">
                    <b><?php echo $catalog->TENDM ?></b>
                </a>
            </p>

            <?php if ($sanpham->LUOTXEM != '') : ?>
                <p class='option'>
                    Lượt xem: <b><?php echo $sanpham->LUOTXEM ?></b>
                </p>
            <?php endif; ?>

            <?php if ($sanpham->BAOHANH != '') : ?>
                <p class='option'>
                    Bảo hành: <b><?php echo $sanpham->BAOHANH ?></b>
                </p>
            <?php endif; ?>

            <div class='action'>
                <a class='button' style='float:left;padding:8px 15px;font-size:16px' href="<?php echo base_url('cart/add/' . $sanpham->MASP) ?>" title='Mua ngay'>Thêm vào giỏ hàng</a>
                <div class='clear'></div>
            </div>

        </div>
        <div class='clear' style='height:15px'></div>
        <center>
            <!-- AddThis Button BEGIN -->
            <script type="text/javascript">
                var switchTo5x = true;
            </script>
            <script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
            <script type="text/javascript">
                stLight.options({
                    publisher: "19a4ed9e-bb0c-4fd0-8791-eea32fb55964",
                    doNotHash: false,
                    doNotCopy: false,
                    hashAddressBar: false
                });
            </script>
            <span class='st_facebook_hcount' displayText='Facebook'></span>
            <span class='st_fblike_hcount' displayText='Facebook Like'></span>
            <span class='st_googleplus_hcount' displayText='Google +'></span>
            <span class='st_twitter_hcount' displayText='Tweet'></span>
            <!-- AddThis Button END -->
        </center>
        <div class='clear' style='height:10px'></div>
        <table width="100%" cellspacing="0" cellpadding="3" border="0" class="tbsicons">
            <tbody>
                <tr>
                    <td width="25%"><img alt="Phục vụ chu đáo" src="<?php echo public_url('site') ?>/images/icon-services.png">
                        <div>Phục vụ chu đáo</div>
                    </td>
                    <td width="25%"><img alt="Giao hàng đúng hẹn" src="<?php echo public_url('site') ?>/images/icon-shipping.png">
                        <div>Giao hàng đúng hẹn</div>
                    </td>
                    <td width="25%"><img alt="Đổi hàng trong 24h" src="<?php echo public_url('site') ?>/images/icon-delivery.png">
                        <div>Đổi hàng trong 24h</div>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="usual" id="usual1">
        <ul>
            <li><a title="Chi tiết sản phẩm" rel='tab2' href='javascript:void(0)' class="tab selected">Chi
                    tiết sản phẩm</a></li>
        </ul>
    </div><!-- end  <div class="usual" id="usual1">-->

    <div class="usual-content">
        <div id="tab2" style="display: block;">
            <p>
                B&agrave;i viết cho sản phẩm n&agrave;y đang được cập nhật ...</p>
            <!-- comment facebook -->
            <center>
                <div id="fb-root"></div>
                <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v12.0" nonce="95Qrdrnh"></script>
                <div class="fb-comments" data-href="http://localhost/webphp/index.php/san-pham-Tivi-LG-520/9.html" data-num-posts="5" data-width="550" data-colorscheme="light"></div>
            </center>
        </div>
    </div>
</div>