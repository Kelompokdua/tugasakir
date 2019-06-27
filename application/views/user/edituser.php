<!doctype html>
<html lang="en">

 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Edit user</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/datatables.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url()?>assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="<?php echo base_url()?>assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/libs/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/w3.css">

</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">
                <!-- ============================================================== -->
                <!-- pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Form user </h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link"><?php echo $this->session->userdata('logged_in')['level'] ?></a></li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end pageheader -->
                <!-- ============================================================== -->
             
                    <div class="row">
                        <!-- ============================================================== -->
                        <!-- validation form -->
                        <!-- ============================================================== -->
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Form Edit user</h5>
                                <div class="card-body">
                                   <?php 
                        echo form_open('user/edit/'.$this->uri->segment(3));

                    ?>
                        <?php if (!empty(validation_errors())) { ?>
                        <div class="alert-danger">
                            <?php echo validation_errors(); ?>
                        </div>
                        <?php } ?>
                                        <div class="control-group">
                                            <div class="controls">
                                                <input type="hidden" id="basicinput" name="login" value="<?php echo $user[0]->id_login ?>" class="span8">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Asisten dokter</label>
                                            <select class="form-control" name="dokter">
                                                <option value="0">(Petugas)</option>
                                                <?php foreach ($dokter as $key) { ?>
                                                <option value="<?php echo $key->id_dokter?>" <?php if($user[0]->id_dokter == $key->id_dokter) { echo "selected";}?>><?php echo $key->nama_dokter ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="basicinput">Nama </label>
                                            <div class="controls">
                                                <input type="text" id="basicinput" name="nama" value="<?php echo $user[0]->nama_pengguna ?>" class="form-control">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="basicinput">Username </label>
                                            <div class="controls">
                                                <input type="text" id="basicinput" name="username" value="<?php echo $user[0]->username ?>" class="form-control">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="basicinput">Password </label>
                                            <div class="controls">
                                                <input type="password" id="basicinput" name="password" placeholder="isi password.." class="form-control">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label" for="basicinput">Konfirmasi password</label>
                                            <div class="controls">
                                                <input type="password" id="basicinput" name="passwordulang" placeholder="isi konfirmasi password.."  class="form-control">
                                            </div>
                                        </div>
                                        <div class="control-group">
                                            <label class="control-label">Level</label>
                                            <select class="form-control select2" name="level">
                                                
                                                    <option value="admin" <?php if ($user[0]->level == 'admin') {
                                                        echo "selected";
                                                    }?>>Admin</option>
                                                    <option value="asisten" <?php if ($user[0]->level == 'asisten') {
                                                        echo "selected";
                                                    }?>>Asisten</option>
                                                    <option value="petugas" <?php if ($user[0]->level == 'petugas') {
                                                        echo "selected";
                                                    }?>>Petugas</option>
                                                    <option value="kasir" <?php if ($user[0]->level == 'kasir') {
                                                        echo "selected";
                                                    }?>>Kasir</option>
                                                    <option value="farmasi" <?php if ($user[0]->level == 'farmasi') {
                                                        echo "selected";
                                                    }?>>Farmasi</option>
                                                
                                            </select>
                                        </div>
                                        <br>
                                        <br>
                                

                                        <div class="control-group">
                                            <div class="controls">
                                                <button type="submit" class="btn btn-info">Submit Form</button>
                                            </div>
                                        </div>
                                    <?php echo form_close(); ?>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end validation form -->
                        <!-- ============================================================== -->
                    </div>
                    <br><br><br><br><br><br><br><br><br>
            </div>
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <div class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            Copyright © 2018 Concept. All rights reserved. Dashboard by <a href="https://colorlib.com/wp/">Colorlib</a>.
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                            <div class="text-md-right footer-links d-none d-sm-block">
                                <a href="javascript: void(0);">About</a>
                                <a href="javascript: void(0);">Support</a>
                                <a href="javascript: void(0);">Contact Us</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="<?php echo base_url()?>assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="<?php echo base_url()?>assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <script src="<?php echo base_url()?>assets/vendor/parsley/parsley.js"></script>
    <script src="<?php echo base_url()?>assets/libs/js/main-js.js"></script>
    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
   <script type="text/javascript">
        $(document).ready( function () {
            $('#tablepeg').DataTable();
        } );
    </script>
</body>
 
</html>