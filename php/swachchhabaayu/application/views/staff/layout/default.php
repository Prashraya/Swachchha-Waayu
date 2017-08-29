<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>स्वच्छ वायु</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Favicons -->
    <link rel="icon" type="image/x-icon" href="<?php echo base_url('assets/staff/img/favicon/favicon.png') ?>" />
    
    <!--Font Awesome-->
    <link href="<?php echo base_url('assets/common-vendor/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet" type="text/css"/>
    
    <!--Bootstrap-->
    <link href="<?php echo base_url('assets/'.BACKENDFOLDER.'/js/vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css"/>
    
    
    <!--Theme-->
    <link href="<?php echo base_url('assets/'.BACKENDFOLDER.'/css/theme/skin-blue.css') ?>" rel="stylesheet" type="text/css"/>
    <!--Select 2-->
    <link href="<?php echo base_url('assets/common-vendor/select2/select2.min.css') ?>" rel="stylesheet" type="text/css"/>
    <!--Sweet Alert-->
    <!--<link href="<?php //echo base_url('assets/common-vendor/sweetalert/sweetalert.css')?>" rel="stylesheet" type="text/css"/>-->
    <!--DataTAble-->
    <link href="<?php echo base_url('assets/'.BACKENDFOLDER.'/js/vendor/datatables/dataTables.bootstrap.css') ?>" rel="stylesheet" type="text/css" />
    
    <!--Jquery UI-->
    <link href="<?php echo base_url('assets/'.BACKENDFOLDER.'/js/vendor/jquery-ui/jquery-ui.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('assets/'.BACKENDFOLDER.'/js/vendor/jquery-ui/jquery.ui.theme.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('assets/'.BACKENDFOLDER.'/js/vendor/jquery-ui/jquery.ui.theme.font-awesome.css') ?>" rel="stylesheet" type="text/css" />
    
    <!--Elfinder-->
    <link href="<?php echo base_url('assets/'.BACKENDFOLDER.'/js/vendor/elfinder/css/elfinder.min.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('assets/'.BACKENDFOLDER.'/js/vendor/elfinder/css/theme.css') ?>" rel="stylesheet" type="text/css" />
    
    <!--Common Css-->
    <link href="<?php echo base_url('assets/'.BACKENDFOLDER.'/css/common/AdminLTE.css') ?>" rel="stylesheet" type="text/css"/>
    <link href="<?php echo base_url('assets/'.BACKENDFOLDER.'/css/common/backend.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('assets/'.BACKENDFOLDER.'/css/common/custom.css') ?>" rel="stylesheet" type="text/css" />
    
    <!--Pages-->
   <?php if(isset($addCss) && !empty($addCss)) {
        foreach($addCss as $css) { ?>
            <link href="<?php echo base_url($css) ?>" rel="stylesheet" type="text/css" />
        <?php }
    } ?>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>

<body class="skin-blue">
<div id="loader-container" style="display: none;">
    <div class="helper">
        <div class="content">
            <div class="loader">Loading...</div>
        </div>
    </div>
</div>
<input type="hidden" value="<?php echo base_url() ?>" id="base-url"/>
<input type="hidden" value="<?php echo base_url(BACKENDFOLDER) ?>" id="admin-base-url"/>
<input type="hidden" value="<?php echo BACKENDFOLDER ?>" id="backend_folder"/>
<input type="hidden" value="<?php echo segment(2) ?>" id="admin-module"/>
<div class="wrapper">
    <header class="main-header">
        <a href="<?php echo base_url(BACKENDFOLDER) ?>" class="logo">स्वच्छ वायु </a>

        <nav class="navbar navbar-static-top" role="navigation">
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="hidden-xs"><?php echo get_userdata('name') ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="user-footer">
                                <a href="<?php echo base_url(BACKENDFOLDER.'/user/create/'.get_userdata('user_id')) ?>" class="btn btn-default btn-flat">Profile</a>
                            </li>
                            <li class="user-footer">
                                <a href="<?php echo base_url(BACKENDFOLDER.'/logout') ?>" class="btn btn-default btn-flat">Sign out</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <?php $this->load->view(BACKENDFOLDER.'/layout/navbar') ?>

    <div class="content-wrapper">
        <section class="content-header">
            <h1>
                <?php echo $module_name ?>
            </h1>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="box box-success">
                        <div class="box-header with-border">
                            <h3 class="box-title"><?php echo ucwords(str_replace('_', ' ', $sub_module_name)) ?></h3>
                            <div class="box-tools pull-right">
                                <?php $this->load->view(BACKENDFOLDER.'/layout/action_butons'); ?>

                            </div>
                        </div>
                        <div class="box-body">
                            <?php flash() ?>
                            <?php $this->load->view($body); ?>
                        </div>
                    </div>

                    
                </div>
            </div>
        </section>
    </div>

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
        </div>
        <strong>Copyright &copy; <?php echo date('Y') ?> <a href="<?php echo base_url() ?>"></a></strong> All rights reserved. </a>
    </footer>
</div>

<div id="editor"></div>

<!-- Modal -->
<div class="modal fade" id="fileSelectorModal" tabindex="-1" role="dialog" aria-labelledby="fileSelectorModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="fileSelectorModalLabel">Files Manager</h4>
            </div>
            <div class="modal-body" id="fileSelector">
            </div>
        </div>
    </div>
</div>
<!--Jquery libraries-->
<script src="<?php echo base_url('assets/'.BACKENDFOLDER.'/js/common/jquery-2.1.3.min.js') ?>"></script>
<script src="<?php echo base_url('assets/'.BACKENDFOLDER.'/js/common/jquery-migrate-1.2.1.js') ?>"></script>
<script src="<?php echo base_url('assets/'.BACKENDFOLDER.'/js/vendor/jquery-validate/jquery.validate.min.js') ?>"></script>
<script src="<?php echo base_url('assets/'.BACKENDFOLDER.'/js/vendor/jquery-ui/jquery-ui.js') ?>" type="text/javascript"></script>

<!--Bootstrap-->
<script src="<?php echo base_url('assets/'.BACKENDFOLDER.'/js/vendor/bootstrap/js/bootstrap.min.js') ?>" type="text/javascript"></script>

<!--Vendor-->
<script src="<?php echo base_url('assets/'.BACKENDFOLDER.'/js/vendor/ckeditor/ckeditor.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/'.BACKENDFOLDER.'/js/vendor/ckfinder/ckfinder.js') ?>" type="text/javascript"></script>
<script src='<?php echo base_url('assets/'.BACKENDFOLDER.'/js/vendor/fastclick/fastclick.min.js') ?>'></script>
<script src="<?php echo base_url('assets/'.BACKENDFOLDER.'/js/vendor/sparkline/jquery.sparkline.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/'.BACKENDFOLDER.'/js/vendor/iCheck/icheck.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/'.BACKENDFOLDER.'/js/vendor/slimScroll/jquery.slimscroll.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/'.BACKENDFOLDER.'/js/vendor/datatables/jquery.dataTables.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/'.BACKENDFOLDER.'/js/vendor/datatables/dataTables.bootstrap.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/'.BACKENDFOLDER.'/js/vendor/elfinder/js/elfinder.min.js') ?>" type="text/javascript"></script>

<!--Common Vendor-->
<script src="<?php echo base_url('assets/common-vendor/select2/select2.min.js') ?>" type="text/javascript"></script>
<!--<script src="<?php //echo base_url('assets/common-vendor/sweetalert/sweetalert.min.js')?>" type="text/javascript"></script>-->

<!--Common-->
<script src="<?php echo base_url('assets/'.BACKENDFOLDER.'/js/common/app.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/'.BACKENDFOLDER.'/js/common/filepicker.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/'.BACKENDFOLDER.'/js/common/scripts.js') ?>"></script>

<!--Pages-->
<?php if(isset($addJs) && !empty($addJs)) {
    foreach($addJs as $js) { ?>
        <script src="<?php echo base_url($js) ?>" type="text/javascript"></script>
    <?php }
} ?>
</body>
</html>