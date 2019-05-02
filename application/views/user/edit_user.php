<!DOCTYPE html>
<html lang="en">


<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	 <title>Edit Pengguna</title>
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
								<h3>Forms Edit Pengguna</h3>
							</div>
							<div class="module-body">

									

									<br />

									<?php 
 						echo form_open('user/edit/'.$this->uri->segment(3));

 					?>
 						<?php if (!empty(validation_errors())) { ?>
 						<div class="alert-danger">
 							<?php echo validation_errors(); ?>
 						</div>
 						<?php } ?>
 										<div class="control-group">
											<div class="controls">
												<input type="hidden" id="basicinput" name="login" value="<?php echo $user[0]->id_login ?>" class="span8">
											</div>
										</div>
										<div class="control-group">
											<label class="control-label">Asisten dokter</label>
											<select class="form-control" name="dokter">
												<option value="0">(Petugas)</option>
												<?php foreach ($dokter as $key) { ?>
												<option value="<?php echo $key->id_dokter?>" <?php if($user[0]->id_dokter == $key->id_dokter) { echo "selected";}?>><?php echo $key->nama_dokter ?></option>
												<?php } ?>
											</select>
										</div>
										<div class="control-group">
											<label class="control-label" for="basicinput">Nama </label>
											<div class="controls">
												<input type="text" id="basicinput" name="nama" value="<?php echo $user[0]->nama_pengguna ?>" class="span8">
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="basicinput">Username </label>
											<div class="controls">
												<input type="text" id="basicinput" name="username" value="<?php echo $user[0]->username ?>" class="span8">
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="basicinput">Password </label>
											<div class="controls">
												<input type="password" id="basicinput" name="password" placeholder="isi password.." class="span8">
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="basicinput">Konfirmasi password</label>
											<div class="controls">
												<input type="password" id="basicinput" name="passwordulang" placeholder="isi konfirmasi password.."  class="span8">
											</div>
										</div>
										<div class="control-group">
											<label class="control-label">Level</label>
											<select class="form-control select2" name="level">
												
													<option value="admin" <?php if ($user[0]->level == 'admin') {
														echo "selected";
													}?>>Admin</option>
													<option value="asisten" <?php if ($user[0]->level == 'asisten') {
														echo "selected";
													}?>>Asisten</option>
													<option value="petugas" <?php if ($user[0]->level == 'petugas') {
														echo "selected";
													}?>>Petugas</option>
													<option value="kasir" <?php if ($user[0]->level == 'kasir') {
														echo "selected";
													}?>>Kasir</option>
													<option value="farmasi" <?php if ($user[0]->level == 'farmasi') {
														echo "selected";
													}?>>Farmasi</option>
												
											</select>
										</div>
										<br>
										<br>
								

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