    <div class="box-left">
        <div class="title tittle-box-left">
            <h2> Tìm kiếm theo giá </h2>
        </div>
        <div class="content-box">
            <!-- The content-box -->
            <form class="t-form form_action" method="get" style="padding:10px" action="<?php echo site_url('sanpham/searchbyprice') ?>" name="search">

                <div class="form-row">
                    <label for="param_price_from" class="form-label" style="width:70px">Giá từ:<span class="req">*</span></label>
                    <div class="form-item" style="width:90px">
                        <select class="input" id="price_from" name="price_from">
                            <?php for($i = 0; $i <= 50000000; $i = $i+1000000): ?>
                                <option value="<?php echo $i ?>"><?php echo number_format($i) ?> đ</option>
                            <?php endfor; ?>
                        </select>
                        <div class="clear"></div>
                        <div class="error" id="price_from_error"></div>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="form-row">
                    <label for="param_price_from" class="form-label" style="width:70px">Giá tới:<span class="req">*</span></label>
                    <div class="form-item" style="width:90px">
                        <select class="input" id="price_to" name="price_to">
                        <?php for($i = 0; $i <= 50000000; $i = $i+1000000): ?>
                                <option value="<?php echo $i ?>"><?php echo number_format($i) ?> đ</option>
                            <?php endfor; ?>
                        </select>
                        <div class="clear"></div>
                        <div class="error" id="price_from_error"></div>
                    </div>
                    <div class="clear"></div>
                </div>

                <div class="form-row">
                    <label class="form-label">&nbsp;</label>
                    <div class="form-item">
                        <input type="submit" class="button" name="search" value="Tìm kiềm" style="height:30px !important;line-height:30px !important;padding:0px 10px !important">
                    </div>
                    <div class="clear"></div>
                </div>
            </form>
        </div><!-- End content-box -->
    </div>


    <div class="box-left">
        <div class="title tittle-box-left">
            <h2> Danh mục sản phẩm </h2>
        </div>
        <div class="content-box">
            <!-- The content-box -->
            <ul class="catalog-main">
                <?php foreach ($danhmuc as $row): ?>
                <li>
                    <span><a href="<?php echo base_url('sanpham/catalog'.'/'.$row->MADM); ?>" title="<?php echo $row->TENDM; ?>"><?php echo $row->TENDM; ?></a></span>
                    <!-- lay danh sach danh muc con -->
                </li>
                <?php endforeach; ?>
            </ul>
        </div><!-- End content-box -->
    </div>