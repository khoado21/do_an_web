<html>

<head>
    <?php $this->load->view('admin/login/head'); ?>
</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                    </div>
                                    <form class="user" method="POST" action="" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" id="param_EMAIL" aria-describedby="emailHelp" placeholder="Enter Email Address..." name="EMAIL">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" id="param_PASSWORD" placeholder="Password" name="PASSWORD">
                                        </div>
                                        <input type="submit" class="btn btn-primary btn-user btn-block" value="Login">
                                        <div style="color: red;"><?php echo form_error('Login') ?></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo public_url() ?>admin/startbootstrap-sb-admin-2-master/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo public_url() ?>admin/startbootstrap-sb-admin-2-master/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo public_url() ?>admin/startbootstrap-sb-admin-2-master/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo public_url() ?>admin/startbootstrap-sb-admin-2-master/js/sb-admin-2.min.js"></script>

</body>

</html>