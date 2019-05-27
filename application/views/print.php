<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Print semua</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
		<div class="container">
		<br>
		<br>
		<table>
			<center><img src="<?php echo base_url('/assets/images/iki.jpg') ?>">
			<h3>Rumah Sakit Umum Cakra Husada</h3></center><br>
			<?php
			echo"<tr><td width='70%'>";
			echo "<font size='5'>Nama pasien ";
			echo"</font>";
			echo "</td><td width='5%'>";
			echo "<font size='5'>";
			echo ":";
			echo "</font>";
			echo"</td><td>";
			echo "<font size='5'>";
			echo $pelayanan->nama_pasien;
			echo "</font>";
			echo "</td></tr>";
			echo "<tr><td><font size='5'>Tanggal ";
			echo "</td><td>";
			echo "<font size='5'>";
			echo ":";
			echo "</font>";
			echo "</td><td>";
			echo "<font size='5'>";
			echo $pelayanan->tanggal;
			echo "</font></td></tr>";
			
			?>
		</table>
		<h3>Pembayaran</h3>
		<br>
		<table>
				<tbody>
					<tr>	
					<?php
					foreach ($obat as $row) {	
						echo "<tr><td width ='30%'>";
						echo "</td><td width ='57%'>";
						echo "<font size='5'>";
						echo $row->nama;
						echo "</font>";
						echo "</td><td>";
						echo "<font size='5'>";
						echo ":";
						echo "</font>";
						echo "</td><td>";
						echo "<font size='5'>";
						echo $row->harga_obat;
						echo "</font>";
						echo "</td></tr>";
					}
					echo "<tr>";
					echo "<td></td>";
					echo "<td>";
					echo "<font size='5'>";
					echo "PELAYANAN";
					echo "</font>";
					echo "</td><td><font size='5'>:</font>";
					echo "</td><td>";
					echo "<font size='5'>";
					echo $pelayanan->harga_dokter;
					echo "</font>";
					echo "</td>";
					echo "<tr><td>";
					echo "</td><td>";
					echo "</td><td>";
					echo "</td><td>----------------- +";
					echo "</td></tr>";
					echo "</tr>";
					echo "<tr><td>";
					echo "</td><td>";
					echo "</td><td>";
					echo "</td><td>";
					echo "<font size='5'>";
					echo $pelayanan->total_harga_semua;
					echo "</font>";
					echo "</td></tr>";

					?>
					</tr>
				</tbody>
			</table>
			</div>

		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	</body>
</html>