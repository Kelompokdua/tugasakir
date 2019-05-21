<!DOCTYPE html>
<html lang="en">


<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Insert Pelayanan</title>
	<link type="text/css" href="<?php echo BASE_URL('bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
	<link type="text/css" href="<?php echo BASE_URL('bootstrap/css/bootstrap-responsive.min.css') ?>" rel="stylesheet">
	<link type="text/css" href="<?php echo BASE_URL('css/theme.css" rel="stylesheet') ?>">	
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
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
								<h3>Forms Insert Pelayanan</h3>
							</div>
							<div class="module-body">
								<br />

								<?php 
								echo form_open('registrasi/edit/'.$this->uri->segment(3));
								?>
								<?php if (!empty(validation_errors())) { ?>
								<div class="alert-danger">
									<?php echo validation_errors(); ?>
								</div>
								<?php } ?>
								<div class="control-group">
									<div class="controls">
										<input type="hidden" id="basicinput" name="idpasien" value="<?php echo $regis[0]->id_pasien ?>" class="span8">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="basicinput">Nama</label>
									<div class="controls">
										<input type="text" id="basicinput" name="nama" value="<?php echo $regis[0]->nama_pasien ?>" class="span8">
									</div>
								</div>
								
								<div class="control-group">
									<label class="control-label" for="basicinput">Anamnesa</label>
									<div class="controls">
										<input type="text" id="basicinput" name="anamnesa"  class="span8">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label" for="basicinput">Diagnose</label>
									<div class="controls">
										<input type="text" id="basicinput" name="diagnose"  class="span8">
									</div>
								</div>
								<div class="control-group">
											<label class="control-label">Therapi</label>
											<select class="form-control select2" multiple="multiple" name="tt[]">
												<option value="">-Silakan Pilih-</option>
												<?php foreach ($obat as $row): ?>
													<option value="<?=$row->id_obat?>"><?=$row->nama?></option>
												<?php endforeach; ?>
											</select>
										</div>
								<div class="col-md-6">
                <div id="my_camera"></div>
                <br/>
                <input type=button value="Ambil Gambar" onClick="take_snapshot()">
                <input type="hidden" name="image" class="image-tag">
            </div>
            <br>
            <div class="col-md-3">
                <div id="results">Your captured image will appear here...</div>
            </div>	<br><br>
								<div class="control-group">
									<div class="controls">
										<button type="submit" class="btn btn-info">Submit Form</button>
									</div>
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
<script language="JavaScript">
    Webcam.set({
        width: 320,
        height: 250,
        image_format: 'jpeg',
        jpeg_quality: 90,
         flip_horiz: true
    });
  
    Webcam.attach( '#my_camera' );
  
    function take_snapshot() {
        Webcam.snap( function(data_uri) {
            $(".image-tag").val(data_uri);
            $('div#results').html('<img src="'+data_uri+'"/>');
        } );
    }
</script>
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