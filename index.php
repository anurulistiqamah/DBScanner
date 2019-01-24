<!DOCTYPE html>
<html>
<head>
	<title>Tambah Database</title>
	<link rel="stylesheet" type="text/css" href="css/sidebar.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>
<body>
	<div id="container">
		<ul class="nav nav-pills nav-stacked sidebar">
			 <li role="presentation" class="active"><a href="index.php">Tambah Database</a></li>
			 <li role="presentation"><a href="lihatisi.php">Lihat Isi Database</a></li>
			 <li role="presentation"><a href="lihatinfo.php">Lihat Info Database</a></li>
			 <li role="presentation"><a href="hapus.php">Hapus Tabel</a></li>
			 <li role="presentation" class="disabled"><a href="cari.php">Cari Database</a></li>
			 <li role="presentation" class="disabled"><a href="update.php">Update Database</a></li>
		</ul>
		<div id="content">
			<form class="form-horizontal" method="post" enctype="multipart/form-data">

				<!-- NIM Section -->
				<div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">Nama</label>
				    <div class="col-sm-10">
				      <input type="text" class="form-control" id="inputEmail3" placeholder="Nama Database" name="name" required/>
				    </div>
				</div>
			
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label">Tipe Data</label>

					<div class="col-sm-3">
				      <input type="text" class="form-control" id="inputEmail3" placeholder="Nama Data" name="data_name" required/>
				    </div>

				    <div class="col-sm-3">
				      <select name="data_type" class="form-control" required>
							<option value="INT">INT</option>
							<option value="VARCHAR">VARCHAR</option>
							<option value="DATE">DATE</option>
							<option value="LONGBLOB">LONGBLOB</option>
						</select>
				    </div>

				    <div class="col-sm-2">
				      <input type="number" class="form-control" id="inputEmail3" placeholder="Panjang Tipe Data" name="length" required/>
				    </div>

				    <div class="col-sm-1">
				      <input type="checkbox" class="form-control" id="inputEmail3" name="auto_increment"/>
				    </div>

				    <div class="col-sm-1">
				      <input type="checkbox" class="form-control" id="inputEmail3" name="not_null"/>
				    </div>
				</div>

				<!-- Tipe data kedua -->
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label"></label>

					<div class="col-sm-3">
				      <input type="text" class="form-control" id="inputEmail3" placeholder="Nama Data" name="data_name2" />
				    </div>

				    <div class="col-sm-3">
				      <select name="data_type2" class="form-control" >
							<option value="INT">INT</option>
							<option value="VARCHAR">VARCHAR</option>
							<option value="DATE">DATE</option>
							<option value="LONGBLOB">LONGBLOB</option>
						</select>
				    </div>

				    <div class="col-sm-3">
				      <input type="number" class="form-control" id="inputEmail3" placeholder="Panjang Tipe Data" name="length2" />
				    </div>

				    <div class="col-sm-1">
				      <input type="checkbox" class="form-control" id="inputEmail3" name="not_null2" />
				    </div>
				</div>

				<!-- Tipe data ketiga -->
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label"></label>

					<div class="col-sm-3">
				      <input type="text" class="form-control" id="inputEmail3" placeholder="Nama Data" name="data_name3" />
				    </div>

				    <div class="col-sm-3">
				      <select name="data_type3" class="form-control" >
							<option value="INT">INT</option>
							<option value="VARCHAR">VARCHAR</option>
							<option value="DATE">DATE</option>
							<option value="LONGBLOB">LONGBLOB</option>
						</select>
				    </div>

				    <div class="col-sm-3">
				      <input type="number" class="form-control" id="inputEmail3" placeholder="Panjang Tipe Data" name="length3" />
				    </div>

				    <div class="col-sm-1">
				      <input type="checkbox" class="form-control" id="inputEmail3" name="not_null3" />
				    </div>
				</div>

				<!-- Tipe data keempat -->
				<div class="form-group">
					<label for="inputEmail3" class="col-sm-2 control-label"></label>

					<div class="col-sm-3">
				      <input type="text" class="form-control" id="inputEmail3" placeholder="Nama Data" name="data_name4" />
				    </div>

				    <div class="col-sm-3">
				      <select name="data_type4" class="form-control" >
							<option value="INT">INT</option>
							<option value="VARCHAR">VARCHAR</option>
<!-- 							<option value="DATE" class="disabled">DATE</option>
							<option value="LONGBLOB" class="disabled">LONGBLOB</option> -->
						</select>
				    </div>

				    <div class="col-sm-3">
				      <input type="number" class="form-control" id="inputEmail3" placeholder="Panjang Tipe Data" name="length4" />
				    </div>

				    <div class="col-sm-1">
				      <input type="checkbox" class="form-control" id="inputEmail3" name="not_null4" />
				    </div>
				</div>

				<div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				      <button type="submit" class="btn btn-success" name="tambah">Tambah</button>
					</div>
  				</div>

			</form>

			<?php 
				include("config.php");

				if (isset($_POST['tambah'])){
					$nama = $_POST['name'];
					$data_name = $_POST['data_name'];
					$data_type = $_POST['data_type'];
					$length = $_POST['length'];	

					$auto_increment = $_POST['auto_increment'];
					$not_null = $_POST['not_null'];

					if ($auto_increment == "on") $auto_increment = "AUTO_INCREMENT PRIMARY KEY";
					else $not_null = " ";
					if ($not_null == "on") $not_null = "NOT NULL"; 
					else $not_null = " ";

					// echo "$auto_increment dan $not_null";

					$sql = "CREATE TABLE $nama (
						$data_name $data_type($length) $auto_increment $not_null
						)";
					$query = mysqli_query($conn,$sql);
					
					//insert 2 column
					if (isset($_POST['data_name2'])){
						$data_name = $_POST['data_name2'];
						$data_type = $_POST['data_type2'];
						$length = $_POST['length2'];
						if (isset($_POST['not_null2'])) $not_null = $_POST['not_null2'];

						if ($not_null == "on") $not_null = "NOT NULL"; 
						else $not_null = " ";

						$sql = "ALTER TABLE $nama ADD COLUMN $data_name $data_type($length)";
						$query = mysqli_query($conn,$sql);
					}

					//insert 3 column
					if (isset($_POST['data_name3'])){
						$data_name = $_POST['data_name3'];
						$data_type = $_POST['data_type3'];
						$length = $_POST['length3'];
						if (isset($_POST['not_null3'])) $not_null = $_POST['not_null3'];

						if ($not_null == "on") $not_null = "NOT NULL"; 
						else $not_null = " ";

						$sql = "ALTER TABLE $nama ADD COLUMN $data_name $data_type($length)";
						$query = mysqli_query($conn,$sql);
					}

					//insert 4 column
					if (isset($_POST['data_name2'])){
						$data_name = $_POST['data_name4'];
						$data_type = $_POST['data_type4'];
						$length = $_POST['length4'];
						if (isset($_POST['not_null4'])) $not_null = $_POST['not_null4'];

						if ($not_null == "on") $not_null = "NOT NULL"; 
						else $not_null = " ";

						$sql = "ALTER TABLE $nama ADD COLUMN $data_name $data_type($length)";
						$query = mysqli_query($conn,$sql);
					}

	                if($query) {
	                    ?> <script>alert("Data berhasil ditambah"); </script> <?php
	                }else {
	                    ?> <script>alert("Data gagal ditambah"); </script> <?php
	                }				
				}
			?>

		</div>
	</div>
</body>
</html>