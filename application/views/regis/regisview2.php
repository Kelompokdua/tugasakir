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

                                   <table class="w3-table-all" id="tablepeg">
                                        <thead>
                                            <tr><th>Nama pasien</th><th>poli yg dituju</th><th>tanggal</th><th>Action</th></tr>
                                        </thead>
                                        
                                        <tbody>
                                            <?php
                                            foreach ($regis as $f){
                                                echo "<tr class='w3-hover-black'>
                                                <td>$f->nama_pasien</td>
                                                <td>$f->nama</td>
                                                <td>$f->tanggal</td>
                                                ";?>
                                                <td>
                                                <a href="<?php echo base_url('index.php/registrasi/edit/'); echo $f->id_pasien; ?>"><button type="button" class="btn btn-info">Confirm</button></a><br> <br>
                                                
                                            </td> 
                                                </tr>
                                            <?php }
                                            ?>
                                        </tbody>
                                        
                                    </table>
                                
    <script src="<?php echo base_url()?>assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="<?php echo base_url()?>assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="<?php echo base_url()?>assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <script src="<?php echo base_url()?>assets/vendor/parsley/parsley.js"></script>
    <script src="<?php echo base_url()?>assets/libs/js/main-js.js"></script>
    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript">
        $(document).ready( function () {
            refreshTable();
        } );

         function refreshTable(){
        $('#tablepeg').load('registrasi/index2', function(){
           setTimeout(refreshTable, 100000);
        });
    }
    </script>
</body>
 
</html>