<!DOCTYPE html>
<html>
<head>
	<title>Lihat Info Database</title>
	<link rel="stylesheet" type="text/css" href="css/sidebar.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>
<body>
	<div id="container">
		<ul class="nav nav-pills nav-stacked sidebar">
			 <li role="presentation"><a href="index.php">Tambah Database</a></li>
			 <li role="presentation"><a href="lihatisi.php">Lihat Isi Database</a></li>
			 <li role="presentation"><a href="lihatinfo.php">Lihat Info Database</a></li>
			 <li role="presentation" class="active"><a href="hapus.php">Hapus Tabel</a></li>
			 <li role="presentation" class="disabled"><a href="cari.php">Cari Database</a></li>
			 <li role="presentation" class="disabled"><a href="update.php">Update Database</a></li>
		</ul>
		<div id="content">
			<form class="form-horizontal" method="post">
				<div class="form-group">
				    <label for="inputEmail3" class="col-sm-3 control-label">Pilih Tabel</label>
				    
				    <!-- Input Buku -->
				    <div class="col-sm-9">
					    <select name="data" class="form-control" required>
							<option value="">--Pilih Tabel yang Ada--</option>
							<?php
								require_once("config.php");
								$query = mysqli_query($conn, "show tables");
								while ($row = mysqli_fetch_row($query)){
									echo "<option value=$row[0]> $row[0]</option>";
								}
							?>
						</select>
					</div>
				</div>

				<div class="form-group">
				    <div class="col-sm-offset-3 col-sm-9">
				      <button type="submit" class="btn btn-success" name="hapus">Hapus</button>
					</div>
  				</div>
			</form>

			<?php
				if (isset($_POST['hapus'])){
					$data = $_POST['data'];
					$sql = "drop table $data";

					$query = mysqli_query($conn, $sql);

	                if($query) {
	                    ?> <script>alert("Tabel berhasil dihapus"); </script> <?php
	                }else {
	                    ?> <script>alert("Tabel gagal dihapus"); </script> <?php
	                }		
				}
			?>

		</div>
	</div>
</body>
</html>