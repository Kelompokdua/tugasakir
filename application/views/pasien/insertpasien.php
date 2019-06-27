<!doctype html>
<html lang="en">

 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Insert Pasien</title>
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
                            <h2 class="pageheader-title">Form Pasien </h2>
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
                                <h5 class="card-header">Form Insert Pasien</h5>
                                <div class="card-body">
                                    <?php 
                                echo form_open('pasien/insert');
                                ?>
                                <?php if (!empty(validation_errors())) { ?>
                                <div class="alert-danger">
                                    <?php echo validation_errors(); ?>
                                </div>
                                <?php } ?>
                                <div class="control-group">
                                    <label class="control-label" for="basicinput">Nama Pasien</label>
                                    <div class="controls">
                                        <input type="text" id="basicinput" name="nama"  class="form-control">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="basicinput">Jenis Kelamin</label><br>
                                    <label class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" name="jeniskelamin" checked="" class="custom-control-input" value="L"><span class="custom-control-label">Laki Laki</span>
                                    </label>
                                    <label class="custom-control custom-radio custom-control-inline">
                                       <input type="radio" name="jeniskelamin" checked="" class="custom-control-input" value="P"><span class="custom-control-label">Perempuan</span>
                                    </label>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="basicinput">Alamat</label>
                                    <div class="controls">
                                        <input type="text" id="basicinput" name="alamat"  class="form-control">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="basicinput">Tanggal Lahir</label>
                                    <div class="controls">
                                        <input type="date" id="basicinput" name="tgllahir"  class="form-control">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="basicinput">No Telp</label>
                                    <div class="controls">
                                        <input type="number" id="basicinput" name="telp"  class="form-control">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="basicinput">Status</label>
                                    <select class="form-control" name="status">
                                                    
                                                    <option value="Menikah">Menikah</option>
                                                    <option value="Belum Menikah">Belum Menikah</option>
                                                
                                            </select>
                                </div>
                                
                                <div class="control-group">
                                            <label class="control-label">Status Pasien</label>
                                            <select class="form-control" name="status_pasien" id ="colorselector">
                                                
                                                    <option value="BPJS">BPJS</option>
                                                    <option value="JPPK">JPPK</option>
                                                    <option value="UMUM">UMUM</option>
                                                
                                            </select>
                                        </div>
                                <div id="JPPK" class="colors" style="display:none">
                                        <div class="control-group">
                                    <label class="control-label" for="basicinput">Divisi</label>
                                    <div class="controls">
                                        <input type="text" id="basicinput" name="divisi"  class="form-control">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="basicinput">Departemen</label>
                                    <div class="controls">
                                        <input type="text" id="basicinput" name="departemen"  class="form-control">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="basicinput">Sub Departemen</label>
                                    <div class="controls">
                                        <input type="text" id="basicinput" name="sub_departemen" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <br><br>
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
         $(function() {
        $('#colorselector').change(function(){
            $('.colors').hide();
            $('#' + $(this).val()).show();
        });
    });
    </script>
</body>
 
</html>