<!DOCTYPE html>
<html lang="en">
<head>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?=$judul ?></title>
        <link type="text/css" href="<?php echo BASE_URL('bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
        <link type="text/css" href="<?php echo BASE_URL('bootstrap/css/bootstrap-responsive.min.css') ?>" rel="stylesheet">
        <link type="text/css" href="<?php echo BASE_URL('css/theme.css') ?>" rel="stylesheet">
        <link type="text/css" href="<?php echo BASE_URL('images/icons/css/font-awesome.css') ?>" rel="stylesheet">
         <link href="<?php echo BASE_URL('assets/fontawesome-free-5.7.0-web/css/all.css') ?>" rel="stylesheet">
        
    </head>
    <body>
        
        <!-- /navbar -->
        <div class="wrapper">
            <div class="container">
                <div class="row" style="width:100%;">
                    <!--/.span3-->
                    <div class="span9">
                        <div class="content">
                           <div style="background-color:#cccccc; overflow: auto;padding-left:15px;padding-right:15px;padding-top:30px;padding-bottom:15px;text-align:center;margin-bottom:50px;" class="clear_fix">
                            <h1>Selamat Datang di Dashboard <?php echo $this->session->userdata('logged_in')['level'] ?></h1>
                           </div>
                    </div>
                    <!--/.span9-->
                </div>
                <div class="span3">
                        <div class="content">
                           <div style="background-color:#cccccc; overflow: auto;width:550px;height:150px;padding-left:15px;padding-right:15px;padding-top:30px;padding-bottom:15px;text-align:center;" class="clear_fix">
                            <span style="font-size: 72px;">
                             <i class="fas fa-wheelchair"></i>
                            </span>
                            <h3 style="margin-top:20px;"><a href="<?php echo BASE_URL(''); ?>index.php/grafik">Registrasi Rawat Jalan</a></h3>
                           </div>
                        </div>
                    </div>
                      <div class="span3">
                        <div class="content">
                           <div style="width:100px;height:1px;padding-left:15px;padding-right:15px;padding-top:30px;padding-bottom:15px;text-align:center;" class="clear_fix">
                           </div>
                        </div>
                    </div>
                     <div class="span3">
                        <div class="content">
                           <div style="background-color:#cccccc; overflow: auto;width:260px;height:150px;padding-left:0px;padding-right:15px;padding-top:30px;padding-bottom:15px;text-align:center;" class="clear_fix">
                            <span style="font-size: 72px;">
                             <i class="fas fa-user"></i>
                            </span>
                            <h3 style="margin-top:20px;"><a href="<?php echo BASE_URL(''); ?>index.php/grafik">Registrasi Pasien</a></h3>
                           </div>
                        </div>
                    </div>
                   
            </div>
            <!--/.container-->
        </div>
        <!--/.wrapper-->
        <div class="footer">
            <div class="container">
               
            </div>
        </div>
        <script src="<?php echo BASE_URL('scripts/jquery-1.9.1.min.js') ?>" type="text/javascript"></script>
        <script src="<?php echo BASE_URL('scripts/jquery-ui-1.10.1.custom.min.js')?> " type="text/javascript"></script>
        <script src="<?php echo BASE_URL('bootstrap/js/bootstrap.min.js" type="text/javascript') ?>"></script>
        <script src="<?php echo BASE_URL('scripts/flot/jquery.flot.js" type="text/javascript') ?>"></script>
        <script src="<?php echo BASE_URL('scripts/flot/jquery.flot.resize.js" type="text/javascript') ?>"></script>
        <script src="<?php echo BASE_URL('scripts/datatables/jquery.dataTables.js" type="text/javascript') ?>"></script>
        <script src="<?php echo BASE_URL('scripts/common.js') ?>    " type="text/javascript"></script>
      
    </body>
