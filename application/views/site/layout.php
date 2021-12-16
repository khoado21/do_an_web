<!DOCTYPE html>
<html>

<head>
    <?php $this->load->view('site/head'); ?>
</head>
<style>
    .message {
        background-color: #008CBA;
        /* Blue */
        border: none;
        color: white;
        padding: 10px;
        width: 60%;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        cursor: pointer;
        border-radius: 8px;
        margin-left: 100px;
    }

    .center{
        margin: auto;
    }
</style>

<body>

    <a href="#" id="back_to_top">
        <img src="<?php echo public_url() ?>/site/images/top.png" />
    </a>

    <div class="wraper">
        <div class='header'>
            <?php $this->load->view('site/header'); ?>
        </div>

        <div id="container">

            <div class="left">
                <?php $this->load->view('site/left', $this->data); ?>
            </div>

            <div class="content">
               
                    <?php if (isset($message)) : ?>
                        <div class="center">
                        <h3 class="message" style="text-align:center"><?php echo $message ?> </h3>
                        </div>
                        <br>
                    <?php endif; ?>

                <?php $this->load->view($temp); ?>
            </div>

            <div class="right">
                <?php $this->load->view('site/right', $this->data); ?>
            </div>

            <div class="clear"></div>

            <div class="footer">
                <?php $this->load->view('site/footer'); ?>
            </div>

        </div>
    </div>

</body>

</html>