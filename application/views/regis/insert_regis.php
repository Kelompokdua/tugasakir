<!DOCTYPE html>
<html lang="en">


<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Insert Rawat jalan</title>
	<link type="text/css" href="<?php echo BASE_URL('bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
	<link type="text/css" href="<?php echo BASE_URL('bootstrap/css/bootstrap-responsive.min.css') ?>" rel="stylesheet">
	<link type="text/css" href="<?php echo BASE_URL('css/theme.css" rel="stylesheet') ?>">	
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
								<h3>Forms Insert Rawat jalan</h3>
							</div>
							<div class="module-body">
								<br />

								<?php 
								echo form_open('registrasi/insert');
								?>
								<?php if (!empty(validation_errors())) { ?>
								<div class="alert-danger">
									<?php echo validation_errors(); ?>
								</div>
								<?php } ?>
								
										<div class="control-group">
											<label class="control-label">Pasien</label>
											<select class="form-control select2" name="idpasien">		<option value="">-Pilih-</option>
												<?php foreach ($pasien as $rowpasien): ?>

													<option value="<?=$rowpasien->id_pasien?>"><?=$rowpasien->nama_pasien?></option>
												<?php endforeach; ?>
											</select>
										</div>
										<div class="control-group">
											<label class="control-label">Poli</label>
											<select class="form-control " name="idpoli">		<option value="">-Pilih-</option>
												<?php foreach ($poli as $rowpoli): ?>

													<option value="<?=$rowpoli->id_poli?>. <?=$rowpoli->nama?>"><?=$rowpoli->nama?></option>
												<?php endforeach; ?>
											</select>
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
				
			});
		})
	</script>
</body>