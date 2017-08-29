<!DOCTYPE html>
<html>
    <head>
        <title>स्वच्छ वायु</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <!-- Fav-icon -->
        <link rel="icon" type="image/x-icon" href="<?php echo base_url('assets/front/images/favicon/favicon.png') ?>" />

        <link href="<?php echo base_url('assets/front/js/vendor/bootstrap/bootstrap.min.css') ?>" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url('assets/front/css/main.css') ?>" rel="stylesheet" type="text/css"/>

        <!-- loading custom css -->
        <?php
        if (isset($addCss) && !empty($addCss)) {
            foreach ($addCss as $css) {
                ?>
                <link href="<?php echo base_url($css) ?>" rel="stylesheet" type="text/css"/>
                <?php
            }
        }
        ?>
    </head>
    <body>
        <input type="hidden" value="<?php echo base_url() ?>" id="base-url"/>
        <header>
            <nav class="header-nav-wrap">
                <div class="container">                
                    <a href="<?php echo base_url();?>" class="header-logo"><img class="img-responsive" src="<?php echo base_url('assets/front/images/logo.png') ?>" alt="" /></a>                       <div class="navigation">
                        <a href="<?php echo base_url();?>">Pollution Levels</a>
                        <a href="<?php echo base_url().'data';?>">Data Analysis</a>
                    </div>
                </div>
            </nav>
        </header>
        <?php if (isset($is_home) && ($is_home == 'yes')) {

                $this->load->view('frontend/layout/homepage');
            } else {

                $this->load->view('frontend/layout/innerpage');
            }
        ?>
        
        <script src="<?php echo base_url('assets/front/js/jquery-1.12.3.min.js') ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/front/js/vendor/bootstrap/bootstrap.min.js') ?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/front/js/vendor/bootstrap/bootstrap-tabcollapse.js') ?>" type="text/javascript"></script>
        <!--Google Map-->
        <?php if (segment(1) == '') { ?>
            <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBR4Zo882-PWzI23GvnkyD1L-_ILqhuIpw&callback=initMap"></script>
        <?php } ?>

        <script src="<?php echo base_url('assets/front/js/main.js') ?>" type="text/javascript"></script>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script src="https://www.google.com/jsapi"></script>
        <!-- ***** Page JS ***** -->
        <?php
        if (isset($addJs) && !empty($addJs)) {
            foreach ($addJs as $js) {
                ?>
                <script src="<?php echo base_url($js) ?>" type="text/javascript"></script>
                <?php
            }
        }
        ?>
    </body>
</html>