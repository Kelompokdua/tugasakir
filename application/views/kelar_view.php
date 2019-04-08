<!DOCTYPE html>
<html lang="en">
<head>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?=$judul ?></title>
        <link type="text/css" href="<?php echo BASE_URL('bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link type="text/css" href="<?php echo BASE_URL('bootstrap/css/bootstrap-responsive.min.css') ?>" rel="stylesheet">
    <link type="text/css" href="<?php echo BASE_URL('css/theme.css" rel="stylesheet') ?>">
    <link type="text/css" href="<?php echo BASE_URL('images/icons/css/font-awesome.css" rel="stylesheet') ?>">
    </head>
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".navbar-inverse-collapse">
                        <i class="icon-reorder shaded"></i></a><a class="brand" href="#">Puskesmasku</a>
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
                              <?php $session_data = $this->session->userdata('logged_in');
            $data['username'] = $session_data['username']; ?>
            
                            <li><a href="#">Selamat Datang : <?php echo $data['username'] ?> </a></li>
                          
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
                            <div class="module message">
                                <div class="module-head">
                                    <h3>
                                        Resep selesai</h3>

                               
                                </div>
                                <div class="module-body table">
                                    <table class="table table-message">
                                        <thead>
                                            <tr class="heading">
                                                
                                                <td class="cell-title">
                                                    Nama Pasien
                                                </td>
                                                <td class="cell-time align-right">
                                                    Umur
                                                </td>
                                                <td class="cell-time align-right">
                                                    Keluhan
                                                </td>
                                                <td class="cell-time align-right">
                                                    Foto Luka
                                                </td>
                                                <td class="cell-time align-right">
                                                    keterangan obat
                                                </td>
                                                <td class="cell-time align-right">
                                                    status
                                                </td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if(is_array($kelir)){ ?>
                                            <?php foreach($kelir as $row): ?>
                                            <tr>
                                                
                                                <td class="cell-title"><?=$row->nama_pasien?></td>
                                                <td class="cell-time align-right"><?=$row->umur?></td>
                                                <td class="cell-time align-right"><?=$row->keluhan?></td>
                                                <td class="cell-time align-right"><img src="<?=BASE_URL('/assets/uploads/'.$row->foto_luka)?>" style="width:340px;height:200px;">
                                                <td class="cell-time align-right"><?=$row->ket_obat?></td>
                                                <td class="cell-time align-right"><?=$row->status?></td>
                                            </tr>
                                            <?php endforeach; ?>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                    <br><br><br>  <input type="button" class="btn btn-info" value="Print" onclick="window.location.href='http://localhost/TugasAkhir/index.php/printer/semua'" />
                                </div>
                                <div class="module-foot">
                                </div>
                            </div>
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
                <b class="copyright">&copy; Kelompok2  </b>All rights reserved.
            </div>
        </div>
       <script src="<?php echo BASE_URL('scripts/jquery-1.9.1.min.js') ?>" type="text/javascript"></script>
        <script src="<?php echo BASE_URL('scripts/jquery-ui-1.10.1.custom.min.js')?> " type="text/javascript"></script>
        <script src="<?php echo BASE_URL('bootstrap/js/bootstrap.min.js" type="text/javascript') ?>"></script>
