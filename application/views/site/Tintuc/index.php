<style>
    .TITTLE a {
        font-size: 18px;
        margin-bottom: 5px;
        
    }

    .TITTLE{
        width: 560px;
    }
    

    .TITTLE a:hover {
        color: #17a2b8;
        font-size: 18px;
        margin-bottom: 5px;
    }

    .date-post {
        color: coral;
        margin-bottom: 15px;
        margin-top: 5px;
    }

    .text {
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        /* number of lines to show */
        line-clamp: 2;
        -webkit-box-orient: vertical;
        font-size: 15px;
        width: 560px;
    }

    .readmore a {
        color: #E4C2B1;
        background: #343434;
        font-size: 12px;
        line-height: 12px;
        display: inline-block;
        text-decoration: none;
        text-transform: none;
        padding: 8px 14px;
        margin-top: 5px;
        margin-bottom: 5px;
    }

    .readmore a:hover {
        color: white;
        background: #ED7F46;
        ;
        font-size: 12px;
        line-height: 12px;
        display: inline-block;
        text-decoration: none;
        text-transform: none;
        padding: 8px 14px;
    }

    .box-line{
        color: #e7e7e7;
        width: 560px;
        border-width: 0;
        height:2px;
        background-color:#e7e7e7;
    }
</style>

<div class="box-center">
    <!-- The box-center product-->
    <div class="tittle-box-center">
        <h2>Tin tức</h2>
    </div>

    <div class="box-content-center">
        <!-- The box-content-center -->
        <?php foreach ($list as $row) : ?>
                <?php $newDate = date("d-m-Y", strtotime($row->NGAYDANG)); ?>
                <div class="TITTLE"><a href="<?php echo site_url('tintuc/view/') . $row->MATINTUC ?>"><?php echo $row->TIEUDE ?></a></div>
                <div class="date-post"> Ngày đăng:<?php echo $newDate ?></div>
                <div class="text"><?php echo $row->NOIDUNG ?></div>
                <div class="readmore"><a href="<?php echo site_url('tintuc/view/') . $row->MATINTUC ?>">Xem thêm</a></div>
            <br>
            <hr class="box-line">
            <br>
            <br>
        <?php endforeach ?>
        <div class="clear"></div>
        <div class="pagination">
            <?php echo $this->pagination->create_links() ?>
        </div>
    </div>
</div>