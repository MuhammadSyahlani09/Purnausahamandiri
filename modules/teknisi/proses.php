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
			$id_teknisi  = mysqli_real_escape_string($mysqli, trim($_POST['id_teknisi']));
			$nama_teknisi  = mysqli_real_escape_string($mysqli, trim($_POST['nama_teknisi']));
			$email = mysqli_real_escape_string($mysqli, trim($_POST['email']));
			$telepon = mysqli_real_escape_string($mysqli, trim($_POST['telepon']));

			// perintah query untuk menyimpan data ke tabel teknisis
            $query = mysqli_query($mysqli, "INSERT INTO is_teknisi(id_teknisi,nama_teknisi,email,telepon)
                                            VALUES('$id_teknisi','$nama_teknisi','$email','$telepon')")
                                            or die('Ada kesalahan pada query insert : '.mysqli_error($mysqli));    

            // cek query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil simpan data
                header("location: ../../main.php?module=teknisi&alert=1");
            }
		}	
	}
	
	// update data
	elseif ($_GET['act']=='update') {
		if (isset($_POST['simpan'])) {
			if (isset($_POST['id_teknisi'])) {
				// ambil data hasil submit dari form
				$id_teknisi            = mysqli_real_escape_string($mysqli, trim($_POST['id_teknisi']));
				$nama_teknisi           = mysqli_real_escape_string($mysqli, trim($_POST['username']));
				$email          = mysqli_real_escape_string($mysqli, trim($_POST['email']));
				$telepon          = mysqli_real_escape_string($mysqli, trim($_POST['telepon']));

				// jika password tidak diubah dan foto tidak diubah
				if (empty($_POST['password'])) {
					// perintah query untuk mengubah data pada tabel users
                    $query = mysqli_query($mysqli, "UPDATE is_teknisi SET nama_teknisi 	= '$nama_teknisi',
                    													email 	= '$email',
                    													telepon     = '$telepon',
                                                                  WHERE id_teknisi 	= '$id_teknisi'")
                                                    or die('Ada kesalahan pada query update : '.mysqli_error($mysqli));

                    // cek query
                    if ($query) {
                        // jika berhasil tampilkan pesan berhasil update data
                        header("location: ../../main.php?module=teknisi&alert=2");
                    }
				}
			}	// jika password diubah dan foto tidak diubah
		}
	}		
}		
?>