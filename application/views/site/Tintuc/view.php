<style>
    .TITTLE {
        font-size: 18px;
        margin-bottom: 5px;
    }


    .date-post {
        color: coral;
        margin-bottom: 15px;
        margin-top: 5px;
    }

    .text {
        font-size: 15px;
    }

</style>

<div class="box-center">
    <!-- The box-center product-->
    <div class="tittle-box-center">
        <h2>Tin tức</h2>
    </div>

    <div class="box-content-center">
        <!-- The box-content-center -->
        <?php $newDate = date("d-m-Y", strtotime($news->NGAYDANG)); ?>
        <div class="TITTLE"><?php echo $news->TIEUDE ?></div>
        <div class="date-post"> Ngày đăng:<?php echo $newDate ?></div>
        <br>
        <div class="text"><?php echo $news->NOIDUNG ?></div>
        <br>
        <div class="text">Nguồn: <?php echo $news->NGUON ?></div>
        <div class="clear"></div>
    </div>
</div>