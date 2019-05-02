<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	        <title><?=$judul ?></title>
	<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"/>
	<link type="text/css" href="<?php echo BASE_URL('bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
	<link type="text/css" href="<?php echo BASE_URL('bootstrap/css/bootstrap-responsive.min.css') ?>" rel="stylesheet">
	<link type="text/css" href="<?php echo BASE_URL('css/theme.css" rel="stylesheet') ?>">
	<link type="text/css" href="<?php echo BASE_URL('images/icons/css/font-awesome.css" rel="stylesheet') ?>">
	<link type="text/css" href="<?php echo BASE_URL('select2/dist/css/select2.css" rel="stylesheet') ?>">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<style type="text/css" media="screen">
	
	.module{
		width: 950px;
	}
</style>
</head>
<body>
	<div class="wrapper">
		<div class="container">
			<div class="row">

				<div class="span9">
					<div class="content">

						<div class="module">
							<div class="module-head">
								<h3>Forms List Pasien</h3>
							</div>
							<div class="module-body">
								<div align="right">
									<a href="<?php echo base_url('index.php/pasien/insert/');?>"><button type="button" class="btn btn-success">Tambah pasien</button></a> 
								
								</div>
								<div id="">
									
								<br>
								Keyword :
								<br>
								<input type="text" id="nama" placeholder="nama pasien" style="height: 30px;">
								<input type="text" id="tanggal" placeholder="tanggal lahir" style="height: 30px;">

								</div>
								<div class="module-body table">
									<table border="1" class="w3-table-all" id="tablepeg">
										<thead>
											<tr><th>No RM</th><th>Nama pasien</th><th>Tanggal Lahir</th><th>Detail</th><th>Action</th></tr>
										</thead>
										
										<tbody>
											<?php
											$no = 1;
											foreach ($pasien as $f){
												echo "<tr class='w3-hover-black'>
												<td>".$no."</td>
												<td>$f->nama_pasien</td>
												<td>$f->tgl_lahir</td>

												";?>
												<td>
													<a class='btn btn-info' href='#' data-id="<?php echo $f->id_pasien; ?>" data-toggle='modal' data-target='#myModal'>
														<i class='halflings-icon white zoom-in'>View</i>
													</td>
												<td>
												<a href="<?php echo base_url('index.php/pasien/edit/'); echo $f->id_pasien; ?>"><button type="button" class="btn btn-warning"> Edit</button></a><br> <br>
												<a href="<?php echo base_url('index.php/pasien/hapus/'); echo $f->id_pasien; ?>" class="btn btn-danger"> Hapus</a></td> 
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
					<h4 class="modal-title">Detail Pasien</h4>
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

						
					</div><!--/.content-->
				</div><!--/.span9-->
			</div>
		</div><!--/.container-->
	</div><!--/.wrapper-->


	<div class="footer">
	</div>

	<!-- jQuery -->
	<script src="//code.jquery.com/jquery.js"></script>
	<!-- Bootstrap JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<script src="<?php echo BASE_URL('scripts/jquery-1.9.1.min.js') ?>" type="text/javascript"></script>
	<script src="<?php echo BASE_URL('scripts/jquery-ui-1.10.1.custom.min.js')?> " type="text/javascript"></script>
	<script src="<?php echo BASE_URL('bootstrap/js/bootstrap.min.js" type="text/javascript') ?>"></script>
	<script src="<?php echo BASE_URL('select2/dist/js/select2.full.js" type="text/javascript') ?>"></script>
	<script src="<?php echo BASE_URL('scripts/flot/jquery.flot.js') ?>" type="text/javascript"></script>
	<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript">
		$(document).ready( function () {
			$('#tablepeg').DataTable( {
				"dom" : '<"search"l><"top">rt<"bottom"ip><"clear">'
			});


			$('#nama').on( 'keyup', function () {

					$('#tablepeg').DataTable()
        			.columns( 1 )
        			.search( this.value )
        			.draw();


    			
} );
			$('#tanggal').on( 'keyup', function () {

					$('#tablepeg').DataTable()
        			.columns( 2 )
        			.search( this.value )
        			.draw();


    			
} );
		});

	</script>
	<script type="text/javascript">
		$(document).on("click", ".btn", function () {
 var myId = $(this).attr('data-id');
 console.log(myId);
 $.ajax({
 type: 'POST',
 url: 'http://localhost:81/TA/index.php/pasien/sambutan_ketua',
 data: { idpasien: myId },
 success: function(response) { 
 $('#result').html(response);
 }
 });
});
	</script>

</body>
</html>