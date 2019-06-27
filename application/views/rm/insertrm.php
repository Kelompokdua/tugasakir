<!doctype html>
<html lang="en">

 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Insert Pelayanan</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>assets/datatables.min.css"/>
    <link rel="stylesheet" href="<?php echo base_url()?>assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="<?php echo base_url()?>assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/libs/css/style.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/w3.css">
     <link type="text/css" href="<?php echo BASE_URL('select2/dist/css/select2.css" rel="stylesheet') ?>">
     <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>

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
                            <h2 class="pageheader-title">Form Pelayanan </h2>
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
                                <h5 class="card-header">Forms Insert Pelayanan</h5>
                                <div class="card-body">
                                   <?php 
                                echo form_open_multipart('registrasi/edit/'.$this->uri->segment(3));
                                ?>
                                <?php if (!empty(validation_errors())) { ?>
                                <div class="alert-danger">
                                    <?php echo validation_errors(); ?>
                                </div>
                                <?php } ?>
                                <div class="control-group">
                                    <div class="controls">
                                        <input type="hidden" id="basicinput" name="idpasien" value="<?php echo $regis[0]->id_pasien ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="basicinput">Nama</label>
                                    <div class="controls">
                                        <input type="text" id="basicinput" name="nama" value="<?php echo $regis[0]->nama_pasien ?>" class="form-control">
                                    </div>
                                </div>
                                
                                <div class="control-group">
                                    <label class="control-label" for="basicinput">Anamnesa</label>
                                    <div class="controls">
                                        <input type="text" id="basicinput" name="anamnesa"  class="form-control">
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label class="control-label" for="basicinput">Diagnose</label>
                                    <div class="controls">
                                        <input type="text" id="basicinput" name="diagnose"  class="form-control">
                                    </div>
                                </div>
                                <div class="control-group">
                                            <label class="control-label">Therapi</label>
                                            <select class="form-control select2" multiple="multiple" name="tt[]">
                                                <option value="">-Silakan Pilih-</option>
                                                <?php foreach ($obat as $row): ?>
                                                    <option value="<?=$row->id_obat?>"><?=$row->nama?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <br><br>
                                        
                                       <div class="control-group">
                                    <label>Hasil Lab</label>
                                    <div class="controls">
                                        <input type="file" name="userfile" size="30"/>
                                    </div>
                                </div>
                                        <br><br>
                                <div class="col-md-6">
                <div id="my_camera"></div>
                <br/>
                <input type=button value="Ambil Gambar" onClick="take_snapshot()">
                <input type="hidden" name="image" class="image-tag">
            </div>
            <br>
            <div class="col-md-3">
                <div id="results">Your captured image will appear here...</div>
            </div>  <br><br>
                                <div class="control-group">
                                    <div class="controls">
                                        <button type="submit" class="btn btn-info">Submit Form</button>
                                    </div>
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
     <script language="JavaScript">
    Webcam.set({
        width: 320,
        height: 250,
        image_format: 'jpeg',
        jpeg_quality: 90,
         flip_horiz: true
    });
  
    Webcam.attach( '#my_camera' );
  
    function take_snapshot() {
        Webcam.snap( function(data_uri) {
            $(".image-tag").val(data_uri);
            $('div#results').html('<img src="'+data_uri+'"/>');
        } );
    }
</script>
    <script src="<?php echo base_url()?>assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="<?php echo base_url()?>assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <script src="<?php echo base_url()?>assets/vendor/parsley/parsley.js"></script>
    <script src="<?php echo base_url()?>assets/libs/js/main-js.js"></script>
    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo BASE_URL('select2/dist/js/select2.full.js" type="text/javascript') ?>"></script>
    <script type="text/javascript">
        $(function() {
            $('.select2').select2()
            $('.select2').change(function() {
                $('#keterangan').text('');
                $.each($(this).val(),function(index, el) {
                    $('#keterangan').append(el+'\n');
                });
            });
        })
    </script>
</body>
 
</html>