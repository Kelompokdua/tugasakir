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
        
    </head>
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                        <i class="icon-reorder shaded"></i></a><a class="brand" href="index.html">Puskesmasku</a>
                    <div class="nav-collapse collapse navbar-inverse-collapse">
                        <ul class="nav nav-icons">
                            <li class="active"><a href="#"><i class="icon-envelope"></i></a></li>
                            <li><a href="#"><i class="icon-eye-open"></i></a></li>
                            <li><a href="#"><i class="icon-bar-chart"></i></a></li>
                        </ul>
                        <form class="navbar-search pull-left input-append" action="#">
                        <input type="text" class="span3">
                        <button class="btn" type="button">
                            <i class="icon-search"></i>
                        </button>
                        </form>
                        <ul class="nav pull-right">
                            <li><a href="#">Selamat Datang : <?php echo $this->session->userdata('logged_in')['username'] ?> </a></li>
                        </ul>
                    </div>
                    <!-- /.nav-collapse -->
                </div>
            </div>
            <!-- /navbar-inner -->
        </div>
        <!-- /navbar -->
        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="span3">
                        <div class="sidebar">
                            <ul class="widget widget-menu unstyled">
                                <li class="active"><?php echo "<a href='".base_url()."index.php/home'>"; ?><i class="menu-icon icon-dashboard"></i>Beranda
                                </a></li>
                                <li><?php echo "<a href='".base_url()."index.php/jadwal'>"; ?><i class="menu-icon icon-bullhorn"></i>Jadwal</a>
                                    <?php if($this->session->userdata('logged_in')['level'] == 'admin' ||$this->session->userdata('logged_in')['level'] == 'operator' ): ?>
                                     <li><?php echo "<a href='".base_url()."index.php/penverifikasian'>"; ?><i class="menu-icon icon-check"></i>Acc Pengobatan</a>
                                      <?php endif; ?>   
                                     <?php if($this->session->userdata('logged_in')['level'] == 'admin' || $this->session->userdata('logged_in')['level'] == 'dokter'): ?>
                                 <li><?php echo "<a href='".base_url()."index.php/pengobatan'>"; ?><i class="menu-icon icon-tasks"></i>Pengobatan</a></li>
                                       <?php endif; ?>  
                               
                                
                            </ul>
                            <!--/.widget-nav-->
                            
                            <!--/.widget-nav-->
                           
                            <ul class="widget widget-menu unstyled">
                                <li><a class="collapsed" data-toggle="collapse" href="#togglePages"><i class="menu-icon icon-cog">
                                </i><i class="icon-chevron-down pull-right"></i><i class="icon-chevron-up pull-right">
                                </i>Pengaturan</a>
                                    <ul id="togglePages" class="collapse unstyled">
                                        <?php if($this->session->userdata('logged_in')['level'] == 'admin'): ?>
                                        <li><?php echo "<a href='".base_url()."index.php/jees'>"; ?><i class="icon-inbox"></i> List akun </a></li>
                                         <?php endif; ?> 
                                         <?php if($this->session->userdata('logged_in')['level'] == 'admin' ||$this->session->userdata('logged_in')['level'] == 'operator' ): ?>
                                         <li><?php echo "<a href='".base_url()."index.php/obat'>"; ?><i class="menu-icon icon-inbox"></i>Pergudangan Obat  </a></li>

                                         <li><?php echo "<a href='".base_url()."index.php/jadwal2'>"; ?><i class="menu-icon icon-bullhorn"></i>Jadwal Kerja Semua</a>
                                       <?php endif; ?> 
                                    </ul>
                                </li>
                                <li><?php echo "<a href='".base_url()."index.php/login/logout'>"; ?><i class="menu-icon icon-signout"></i>Logout </a></li>
                            </ul>
                        
                        </div>
                        <!--/.sidebar-->
                    </div>
                    <!--/.span3-->
                    <div class="span9">
                        <div class="content">
                           <div style="background-color:#cccccc; overflow: auto;" class="clear_fix">
                            <h1>Selamat Datang : <?php echo $this->session->userdata('logged_in')['username'] ?> </h1>
                            <h1>Jabatan [  <?php echo $this->session->userdata('logged_in')['level'] ?> ]</h1>
                           </div>
                        <!--/.content-->
                    </div>
                    <!--/.span9-->
                </div>
            </div>
            <!--/.container-->
        </div>
        <!--/.wrapper-->
        <div class="footer">
            <div class="container">
                <b class="copyright">&copy; 2014 Edmin - EGrappler.com </b>All rights reserved.
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
