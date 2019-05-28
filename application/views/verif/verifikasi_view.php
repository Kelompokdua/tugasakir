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
</head>
<body>
	<div class="wrapper">
		<div class="container">
			<div class="row">

				<div class="span9">
					<div class="content">

						<div class="module">
							<div class="module-head">
								<h3>Forms List Verifikasi</h3>
							</div>
							<div class="module-body">
								<div class="module-body table">
									<table border="1" class="w3-table-all" id="tablepeg">
										<thead>
											<tr><th>No</th><th>Nama</th><th>dokter</th><th>Status</th><th>Resep</th><th>Action</th></tr>
										</thead>
										
										<tbody>
											<?php
											$no = 1;
											foreach ($verif as $f){
												echo "<tr class='w3-hover-black'>
												<td>".$no."</td>
												<td>$f->nama_pasien</td>
												<td>$f->nama_dokter</td>
												<td>$f->status_pasien</td>";?>
												<td><img src="../upload/	<?php echo $f->foto_resep;?>"  alt=""></td>
												
												<td>
												<a href="<?php echo base_url('index.php/verifikasi/edit/'); echo $f->id_pelayanan; ?>"><button type="button" class="btn btn-info"> Confirm</button></a>
												
												</td> 
												</tr>
											<?php $no++; }
											?>
										</tbody>
										
									</table>
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
	<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	<script src="Hello World"></script>
	<script src="<?php echo BASE_URL('scripts/jquery-1.9.1.min.js') ?>" type="text/javascript"></script>
	<script src="<?php echo BASE_URL('scripts/jquery-ui-1.10.1.custom.min.js')?> " type="text/javascript"></script>
	<script src="<?php echo BASE_URL('bootstrap/js/bootstrap.min.js" type="text/javascript') ?>"></script>
	<script src="<?php echo BASE_URL('select2/dist/js/select2.full.js" type="text/javascript') ?>"></script>
	<script src="<?php echo BASE_URL('scripts/flot/jquery.flot.js') ?>" type="text/javascript"></script>
	<script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
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
	<script type="text/javascript">
		$(document).ready( function () {
			$('#tablepeg').DataTable();
		} );
	</script>

</body>
</html>