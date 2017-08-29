<!doctype html>

<html lang="en">

<head>
    <meta charset="utf-8">

    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Fav-icon -->
    <link rel="icon" type="image/x-icon" href="<?php echo base_url('uploads/favicon.png') ?>" />
    <!--Bootstrap-->
    <link href="<?php echo base_url('assets/'.BACKENDFOLDER.'/js/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css"/>
    <!--Font Awesome-->
    <link href="<?php echo base_url('assets/common-vendor/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url('assets/'.BACKENDFOLDER.'/css/common/AdminLTE.css') ?>" rel="stylesheet" type="text/css"/>
    
    <link href="<?php echo base_url('assets/'.BACKENDFOLDER.'/css/theme/skin-blue.css') ?>" rel="stylesheet" type="text/css"/>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>

<body class="login-page">

<div class="login-box">
    <div class="login-logo">
       स्वच्छ वायु
    </div>
    <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <?php flash() ?>
        <?php $this->load->view($body); ?>
    </div>
</div>

<script src="<?php echo base_url('assets/'.BACKENDFOLDER.'/js/common/jquery-2.1.3.min.js') ?>"></script>
<!--Bootstrap-->
<script src="<?php echo base_url('assets/'.BACKENDFOLDER.'/js/vendor/bootstrap/js/bootstrap.min.js') ?>" type="text/javascript"></script>


</body>
</html>