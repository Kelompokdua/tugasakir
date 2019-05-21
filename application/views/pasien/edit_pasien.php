<!DOCTYPE html>
<html lang="en">


<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Halaman Edit Pasien</title>
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
								<h3>Forms Edit Pasien</h3>
							</div>
							<div class="module-body">
								<br />
								<?php 
								echo form_open('pasien/edit/'.$this->uri->segment(3));

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
										<input type="hidden" id="basicinput" name="idpasien" value="<?php echo $pasien[0]->id_pasien ?>" class="span8">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="basicinput">Nama pasien</label>
									<div class="controls">
										<input type="text" id="basicinput" name="nama" value="<?php echo $pasien[0]->nama_pasien ?>" class="span8">
									</div>
								</div>
									<div class="control-group">
									<label class="control-label" for="basicinput">Jenis Kelamin</label>
									<div class="controls">
										<input type="radio" id="basicinput" name="jeniskelamin"  value="L"<?php if ($pasien[0]->jenis_kelamin == 'L') {
														echo "checked";
													}?>>Laki Laki <br>
										<input type="radio" id="basicinput" name="jeniskelamin" value="P"<?php if ($pasien[0]->jenis_kelamin == 'P') {
														echo "checked";
													}?>>Perempuan<br>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="basicinput">Alamat</label>
									<div class="controls">
										<input type="text" id="basicinput" name="alamat" value="<?php echo $pasien[0]->alamat ?>"  class="span8">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="basicinput">Tanggal Lahir</label>
									<div class="controls">
										<input type="date" id="basicinput" name="tgllahir" value="<?php echo $pasien[0]->tgl_lahir ?>"   class="span8">
									</div>
								</div>
									<div class="control-group">
									<label class="control-label" for="basicinput">Telp</label>
									<div class="controls">
										<input type="number" id="basicinput" name="telp" value="<?php echo $pasien[0]->telp ?>"  class="span8">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="basicinput">Status</label>
									<select class="form-control" name="status">
												
													<option value="Menikah" <?php if ($pasien[0]->status == 'Menikah') {
														echo "selected";
													}?>>Menikah</option>
													<option value="Belum Menikah" <?php if ($pasien[0]->status == 'Belum Menikah') {
														echo "selected";
													}?>>Belum Menikah</option>
												
											</select>
								</div>
								<div class="control-group">
											<label class="control-label">Status Pasien</label>
											<select class="form-control" name="status_pasien" id ="colorselector">
												
													<option value="BPJS" <?php if ($pasien[0]->status_pasien == 'BPJS') {
														echo "selected";
													}?>>BPJS</option>
													<option value="JPPK" <?php if ($pasien[0]->status_pasien == 'JPPK') {
														echo "selected";
													}?>>JPPK</option>
													<option value="UMUM" <?php if ($pasien[0]->status_pasien == 'UMUM') {
														echo "selected";
													}?>>UMUM</option>
												
											</select>
										</div>
								<div id="JPPK" class="colors" style="display:none">
										<div class="control-group">
									<label class="control-label" for="basicinput">divisi</label>
									<div class="controls">
										<input type="text" id="basicinput" name="divisi" value="<?php echo $pasien[0]->divisi ?>"  class="span8">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="basicinput">Departemen</label>
									<div class="controls">
										<input type="text" id="basicinput" name="departemen" value="<?php echo $pasien[0]->departemen ?>"  class="span8">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="basicinput">Sub Departemen</label>
									<div class="controls">
										<input type="text" id="basicinput" name="sub_departemen" value="<?php echo $pasien[0]->sub_departemen ?>"  class="span8">
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