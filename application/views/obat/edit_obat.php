<!DOCTYPE html>
<html lang="en">


<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit Obat</title>
	<link type="text/css" href="<?php echo BASE_URL('bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
	<link type="text/css" href="<?php echo BASE_URL('bootstrap/css/bootstrap-responsive.min.css') ?>" rel="stylesheet">
	<link type="text/css" href="<?php echo BASE_URL('css/theme.css" rel="stylesheet') ?>">
	<link type="text/css" href="<?php echo BASE_URL('images/icons/css/font-awesome.css" rel="stylesheet') ?>">
</head>
<body>
	<div class="wrapper">
		<div class="container">
			<div class="row">
				<div class="span9">
					<div class="content">
						<div class="module">
							<div class="module-head">
								<h3>Forms Edit Obat</h3>
							</div>
							<div class="module-body">
								<br />
								<?php 
								echo form_open('obat/edit/'.$this->uri->segment(3));

								?>
								<?php if (!empty(validation_errors())) { ?>
								<div class="alert-danger">
									<?php echo validation_errors(); ?>
								</div>
								<?php } ?>
								<?php if (!empty($error)) { ?>
								<div class="alert-danger">
									<?php echo $error; ?>
								</div>
								<?php } ?>
								<div class="control-group">
									<div class="controls">
										<input type="hidden" id="basicinput" name="idobat" value="<?php echo $obat[0]->id_obat ?>" class="span8">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="basicinput">Nama obat</label>
									<div class="controls">
										<input type="text" id="basicinput" name="nama" value="<?php echo $obat[0]->nama ?>" class="span8">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="basicinput">Jenis Obat</label>
									<div class="controls">
										<input type="text" id="basicinput" name="jenis" value="<?php echo $obat[0]->jenis_obat ?>" class="span8">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="basicinput">Harga Obat</label>
									<div class="controls">
										<input type="text" id="basicinput" name="harga" value="<?php echo $obat[0]->harga_obat ?>" class="span8">
									</div>
								</div>
								<div class="control-group">
									<div class="controls">
										<button type="submit" class="btn btn-info">Submit Form</button>
									</div>
								</div>
								<?php echo form_close(); ?>
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