<?php
session_start();

// Panggil koneksi database.php untuk koneksi database
require_once "../../config/database.php";

// fungsi untuk pengecekan status login teknisi 
// jika teknisi belum login, alihkan ke halaman login dan tampilkan pesan = 1
if (empty($_SESSION['username']) && empty($_SESSION['password'])){
	echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}
// jika teknisi sudah login, maka jalankan perintah untuk insert dan update
else {
	// insert data
	if ($_GET['act']=='insert') {
		if (isset($_POST['simpan'])) {
			// ambil data hasil submit dari form
			$id_jabatan  = mysqli_real_escape_string($mysqli, trim($_POST['id_jabatan']));
			$jabatan  = mysqli_real_escape_string($mysqli, trim($_POST['jabatan']));
			$gaji_pokok      = mysqli_real_escape_string($mysqli, trim($_POST['gaji_pokok']));
            $transport      = mysqli_real_escape_string($mysqli, trim($_POST['transport']));
            $makan      = mysqli_real_escape_string($mysqli, trim($_POST['uang_makan']));
			
			// perintah query untuk menyimpan data ke tabel teknisis
            $query = mysqli_query($mysqli, "INSERT INTO tb_jabatan(id_jabatan,jabatan,gaji_pokok,transport,uang_makan)
                                            VALUES('$id_jabatan','$jabatan','$gaji_pokok','$transport','$makan')")
                                            or die('Ada kesalahan pada query insert : '.mysqli_error($mysqli));    

            // cek query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil simpan data
                header("location: ../../main.php?module=jabatan&alert=1");
            }
		}	
	}
	
	// update data
	elseif ($_GET['act']=='update') {
		if (isset($_POST['simpan'])) {
			if (isset($_POST['id_jabatan'])) {
				// ambil data hasil submit dari form
				$id_jabatan            = mysqli_real_escape_string($mysqli, trim($_POST['id_jabatan']));
				$jabatan           = mysqli_real_escape_string($mysqli, trim($_POST['jabatan']));
				$gaji_pokok      = mysqli_real_escape_string($mysqli, trim($_POST['gaji_pokok']));
            $transport      = mysqli_real_escape_string($mysqli, trim($_POST['transport']));
            $makan      = mysqli_real_escape_string($mysqli, trim($_POST['uang_makan']));

				// jika password tidak diubah dan foto tidak diubah
				if (empty($_POST['password'])) {
					// perintah query untuk mengubah data pada tabel users
                    $query = mysqli_query($mysqli, "UPDATE tb_jabatan SET jabatan 	= '$jabatan', gaji_pokok = '$gaji_pokok', transport = '$transport', uang_makan 	= '$uang_makan',
                    													WHERE id_jabatan = '$id_jabatan'")
                                                    or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));

                    // cek query
                    if ($query) {
                        // jika berhasil tampilkan pesan berhasil update data
                        header("location: ../../main.php?module=jabatan&alert=2");
                    }
				}
			}	// jika password diubah dan foto tidak diubah
		}
	}	
	elseif ($_GET['act']=='delete') {
		if (isset($_GET['id'])) {
			$id_jabatan = $_GET['id'];
	
			// perintah query untuk menghapus data pada tabel Barang
			$query = mysqli_query($mysqli, "DELETE FROM tb_jabatan WHERE id_jabatan='$id_jabatan'")
											or die('Ada kesalahan pada query delete : '.mysqli_error($mysqli));

			// cek hasil query
			if ($query) {
				// jika berhasil tampilkan pesan berhasil delete data
				header("location: ../../main.php?module=jabatan");
			}
		}
	}  	
}		
?>