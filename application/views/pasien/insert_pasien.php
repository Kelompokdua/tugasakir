<!DOCTYPE html>
<html lang="en">


<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Insert Pasien</title>
	<link type="text/css" href="<?php echo BASE_URL('bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
	<link type="text/css" href="<?php echo BASE_URL('bootstrap/css/bootstrap-responsive.min.css') ?>" rel="stylesheet">
	<link type="text/css" href="<?php echo BASE_URL('css/theme.css" rel="stylesheet') ?>">	
</head>
<body>
	<div class="wrapper">
		<div class="container">
			<div class="row">

				<div class="span9">
					<div class="content">

						<div class="module">
							<div class="module-head">
								<h3>Forms Insert pasien</h3>
							</div>
							<div class="module-body">
								<br />

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
										<input type="text" id="basicinput" name="nama"  class="span8">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="basicinput">Jenis Kelamin</label>
									<div class="controls">
										<input type="radio" id="basicinput" name="jeniskelamin"  value="L">Laki Laki <br>
										<input type="radio" id="basicinput" name="jeniskelamin" value="P">Perempuan<br>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="basicinput">Alamat</label>
									<div class="controls">
										<input type="text" id="basicinput" name="alamat"  class="span8">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="basicinput">Tanggal Lahir</label>
									<div class="controls">
										<input type="date" id="basicinput" name="tgllahir"  class="span8">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="basicinput">No Telp</label>
									<div class="controls">
										<input type="number" id="basicinput" name="telp"  class="span8">
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
									<label class="control-label" for="basicinput">divisi</label>
									<div class="controls">
										<input type="text" id="basicinput" name="divisi"  class="span8">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="basicinput">Departemen</label>
									<div class="controls">
										<input type="text" id="basicinput" name="departemen"  class="span8">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="basicinput">Sub Departemen</label>
									<div class="controls">
										<input type="text" id="basicinput" name="sub_departemen"  class="span8">
									</div>
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
        $('#colorselector').change(function(){
            $('.colors').hide();
            $('#' + $(this).val()).show();
        });
    });
	</script>
</body>
</html>