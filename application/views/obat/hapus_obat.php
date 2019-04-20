<!DOCTYPE html>
<html lang="en">


<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Hapus obat</title>
	<link type="text/css" href="<?php echo BASE_URL('bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
	<link type="text/css" href="<?php echo BASE_URL('bootstrap/css/bootstrap-responsive.min.css') ?>" rel="stylesheet">
	<link type="text/css" href="<?php echo BASE_URL('css/theme.css" rel="stylesheet') ?>">
	<link type="text/css" href="<?php echo BASE_URL('images/icons/css/font-awesome.css" rel="stylesheet') ?>">
	<link type="text/css" href="<?php echo BASE_URL('select2/dist/css/select2.css" rel="stylesheet') ?>">
</head>
<body>
	<div class="wrapper">
		<div class="container">
			<div class="row">
				<div class="span9">
					<div class="content">

						<div class="module">
							<div class="module-head">
								<h3></h3>
							</div>
							<div class="module-body">
								<br />
								<div>
									<center>
										<font size="5">Apakah Anda yakin ingin menghapus OBAT INI ?</font>
									</center>
								</div>
								<br>
								<br>
								<br>
									<div>
										<center>
											<font size="3" color="black">Nama obat</font><br><br>
											<font size="5"><?php echo $obat[0]->nama; ?></font><br><br>
										<font size="3" color="black">Jenis Obat</font><br><br>
											<font size="5"><?php echo $obat[0]->jenis_obat; ?></font><br><br>
											<font size="3" color="black">Harga Obat</font><br><br>
											<font size="5"><?php echo $obat[0]->harga_obat; ?></font>
										</center>
									</div>
									<br>
									<br>
									<div>


										
										<?php echo form_open('obat/hapus/'.$this->uri->segment(3)); ?>
										<div class="control-group">
											<div class="controls">
												<input type="hidden" id="basicinput" name="idobat" value="<?php echo $this->uri->segment(3); ?>" class="span8">
											</div>
										</div>
										<div class="control-group">
											<div class="controls">
												<center><button type="submit" class="btn btn-info">Konfirmasi Penghapusan</button></center>

											</div>
										</div>
										<?php echo form_close(); ?>


										
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

		<script src="<?php echo BASE_URL('scripts/jquery-1.9.1.min.js') ?>" type="text/javascript"></script>
		<script src="<?php echo BASE_URL('scripts/jquery-ui-1.10.1.custom.min.js')?> " type="text/javascript"></script>
		<script src="<?php echo BASE_URL('bootstrap/js/bootstrap.min.js" type="text/javascript') ?>"></script>
		<script src="<?php echo BASE_URL('select2/dist/js/select2.full.js" type="text/javascript') ?>"></script>
		<script src="<?php echo BASE_URL('scripts/flot/jquery.flot.js') ?>" type="text/javascript"></script>
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