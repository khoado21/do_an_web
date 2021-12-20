<!-- The Support -->
<div class="box-right">
    <div class="title tittle-box-right">
        <h2> Hỗ trợ trực tuyến </h2>
    </div>
    <div class="content-box">
        <!-- goi ra phuong thuc hien thi danh sach ho tro -->
        <div class="support">
            <strong>Hoang van tuyen </strong>

            <p>
                <img style="margin-bottom:-3px" src="<?php echo public_url() ?>/site/images/phone.png"> 01686039488
            </p>

            <p>
                <a rel="nofollow" href="mailto:hoangvantuyencnt@gmail.com">
                    <img style="margin-bottom:-3px" src="<?php echo public_url() ?>/site/images/email.png"> Email: hoangvantuye...
                </a>
            </p>
            <p>
                <a rel="nofollow" href="skype:tuyencnt90">
                    <img style="margin-bottom:-3px" src="<?php echo public_url() ?>/site/images/skype.png"> Skype: tuyencnt90 </a>
            </p>
        </div>
    </div>
</div>
<!-- End Support -->

<!-- The news -->
<div class="box-right">
    <div class="title tittle-box-right">
        <h2> Bài viết mới </h2>
    </div>
    <div class="content-box">
        <ul class="news">
            <?php foreach($tintuc as $row): ?>
            <li>
                <a href="<?php echo site_url('Tintuc/view/').$row->MATINTUC ?>" title="<?php echo $row->TIEUDE ?>">
                <?php echo $row->TIEUDE ?> </a>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div> <!-- End news -->

<!-- The Ads -->
<div class="box-right">
    <div class="title tittle-box-right">
        <h2> Quảng cáo </h2>
    </div>
    <div class="content-box">
        <a href="">
            <img src="<?php echo public_url() ?>/site/images/ads.png">
        </a>
    </div>
</div>
<!-- End Ads -->

<!-- The Fanpage -->
<div class="box-right">
    <div class="title tittle-box-right">
        <h2> Fanpage </h2>
    </div>
    <div class="content-box">

        <iframe src="http://www.facebook.com/plugins/likebox.php?href=https://www.facebook.com/NAPXDD&amp;width=190&amp;height=300&amp;show_faces=true&amp;colorscheme=light&amp;stream=false&amp;border_color&amp;header=true" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:190px; height:300px;" allowtransparency="true">
        </iframe>

    </div>
</div>
<!-- End Fanpage -->
