<?php
session_start();

// Panggil koneksi database.php untuk koneksi database
require_once "../../config/database.php";

if(isset($_POST['dataidbrg'])) {
	$kode_brg = $_POST['dataidbrg'];

  // fungsi query untuk menampilkan data dari tabel brg
  $query = mysqli_query($mysqli, "SELECT kode_brg,nama_brg,satuan,stok FROM is_brg WHERE kode_brg='$kode_brg'")
                                  or die('Ada kesalahan pada query tampil data brg: '.mysqli_error($mysqli));

  // tampilkan data
  $data = mysqli_fetch_assoc($query);

  $stok   = $data['stok'];
  $satuan = $data['satuan'];

	if($stok != '') {
		echo "<div class='form-group'>
                <label class='col-sm-2 control-label'>Stok</label>
                <div class='col-sm-5'>
                  <div class='input-group'>
                    <input type='text' class='form-control' id='stok' name='stok' value='$stok' readonly>
                    <span class='input-group-addon'>$satuan</span>
                  </div>
                </div>
              </div>";
	} else {
		echo "<div class='form-group'>
                <label class='col-sm-2 control-label'>Stok</label>
                <div class='col-sm-5'>
                  <div class='input-group'>
                    <input type='text' class='form-control' id='stok' name='stok' value='Stok brg tidak ditemukan' readonly>
                    <span class='input-group-addon'>Satuan stok tidak ditemukan</span>
                  </div>
                </div>
              </div>";
	}		
}
?> 