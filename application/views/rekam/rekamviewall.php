<!doctype html>
<html lang="en">

 
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?=$judul ?></title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"/>
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
                            <h2 class="pageheader-title">Forms List Rekam Medis</h2>
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
                                <h5 class="card-header">Forms List Rekam Medis</h5>
                                <div align="center">
                                    
                                <br>
                                Tanggal :
                                <br>
                                <input type="text" id="tanggal" placeholder="tanggal Periksa" style="height: 30px;">

                                </div>
                                <div class="card-body">
                                    <table class="w3-table-all" id="tablepeg">
                                        <thead>
                                            <tr><th>No</th><th>Nama Pasien</th><th>Tanggal Periksa</th><th>Poli terakhir</th><th>Action</th></tr>
                                        </thead>
                                        
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($rekam as $f){
                                                echo "<tr class='w3-hover-black'>
                                                <td>".$no."</td>
                                                <td>$f->nama_pasien</td>
                                                <td>$f->tanggal</td>
                                                <td>$f->poli</td>
                                                ";?>
                                                <td>
                                                    <?php if($this->session->userdata('logged_in')['level'] == 'admin' ||$this->session->userdata('logged_in')['level'] == 'asisten' ): ?>
                                                <a class='btn btn-info' href='#' data-id="<?php echo $f->id_pelayanan; ?>" data-toggle='modal' data-target='#myModal'>
                                                        <i class='halflings-icon white zoom-in'>Detail</i></a>
                                                        <?php endif; ?>
                                                         <?php if($this->session->userdata('logged_in')['level'] != 'asisten' ): ?>
                                                <a href="<?php echo base_url('index.php/printer/semua/'); echo $f->id_pelayanan; ?>" target="_blank"><button type="button" class="btn btn-success">Detail Harga</button></a>
                                                <?php endif; ?>
                                                    </td> 
                                                </tr>
                                            <?php $no++; }
                                            ?>
                                        </tbody>
                                        
                                    </table>
                                    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- konten modal-->
            <div class="modal-content">
                <!-- heading modal -->
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    
                </div>
                <!-- body modal -->
                <div class="modal-body">
                    <p id="result"></p>
                </div>
                <!-- footer modal -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
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
            $('#tablepeg').DataTable( {
                "dom" : '<"search"l><"top">rt<"bottom"ip><"clear">'
            });
                        $('#tanggal').on( 'keyup', function () {

                    $('#tablepeg').DataTable()
                    .columns( 2 )
                    .search( this.value )
                    .draw();


                
} );
        });

    </script>
    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
        $(document).on("click", ".btn", function () {
 var myId = $(this).attr('data-id');
 console.log(myId);
 $.ajax({
 type: 'POST',
 url: 'http://localhost:81/rsu/index.php/rekam/sambutan_ketua',
 data: { idpelayanan: myId },
 success: function(response) { 
 $('#result').html(response);
 }
 });
});
    </script>
</body>
 
</html>