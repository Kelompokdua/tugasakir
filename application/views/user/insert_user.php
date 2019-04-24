<!DOCTYPE html>
<html lang="en">


<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Insert Pengguna</title>
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
								<h3>Forms Insert Pengguna</h3>
							</div>
							<div class="module-body">
								<br />

								<?php 
								echo form_open('user/insert');
								?>
								<?php if (!empty(validation_errors())) { ?>
								<div class="alert-danger">
									<?php echo validation_errors(); ?>
								</div>
								<?php } ?>
								<div class="control-group">
									<label class="control-label" for="basicinput">Nama Pengguna</label>
									<div class="controls">
										<input type="text" id="basicinput" name="nama"  class="span8">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="basicinput">Username</label>
									<div class="controls">
										<input type="text" id="basicinput" name="username"  class="span8">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="basicinput">password</label>
									<div class="controls">
										<input type="password" id="basicinput" name="password"  class="span8">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="basicinput">Konfirmasi password</label>
									<div class="controls">
										<input type="password" id="basicinput" name="passwordulang"  class="span8">
									</div>
								</div>
								<div class="control-group">
											<label class="control-label">Level</label>
											<select class="form-control select2" name="level">
												
													<option value="admin">admin</option>
													<option value="asisten">asisten</option>
													<option value="petugas">petugas</option>
													<option value="kasir">kasir</option>
													<option value="farmasi">farmasi</option>
												
											</select>
										</div>
										<div class="control-group">
											<label class="control-label">Dokter</label>
											<select class="form-control select2" name="dokter">		<option value="0">-Tidak Punya-</option>
												<?php foreach ($dokter as $rowDokter): ?>

													<option value="<?=$rowDokter->id_dokter?>. <?=$rowDokter->nama_dokter?>"><?=$rowDokter->nama_dokter?></option>
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
</body>