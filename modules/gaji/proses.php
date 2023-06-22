<?php
session_start();

// Panggil koneksi database.php untuk koneksi database
require_once "../../config/database.php";

// fungsi untuk pengecekan status login user 
// jika user belum login, alihkan ke halaman login dan tampilkan pesan = 1
if (empty($_SESSION['username']) && empty($_SESSION['password'])){
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}
// jika user sudah login, maka jalankan perintah untuk insert, update, dan delete
else {
    if ($_GET['act']=='insert') {
        if (isset($_POST['simpan'])) {
            // ambil data hasil submit dari form
            $kode_transaksi = mysqli_real_escape_string($mysqli, trim($_POST['kode_transaksi']));
            $kode_brg       = mysqli_real_escape_string($mysqli, trim($_POST['kode_user']));
            $total_stok      = mysqli_real_escape_string($mysqli, trim($_POST['gaji_pokok']));
            $tunjangan      = mysqli_real_escape_string($mysqli, trim($_POST['tunjangan']));
            $makan      = mysqli_real_escape_string($mysqli, trim($_POST['uang_makan']));
            // perintah query untuk menyimpan data ke tabel brg masuk
            $query = mysqli_query($mysqli, "INSERT INTO is_gaji(id_gaji,id_user,gaji_pokok,tunjangan,uang_makan) 
                                            VALUES('$kode_transaksi','$kode_brg','$total_stok','$tunjangan','$makan')")
                                            or die('Ada kesalahan pada query insert : '.mysqli_error($mysqli));    

                // cek query
            if ($query) {                       
                    // jika berhasil tampilkan pesan berhasil simpan data
                    header("location: ../../main.php?module=gaji&alert=1");
                }  
        }   
    }

    elseif ($_GET['act']=='delete') {
        if (isset($_GET['id'])) {
            $kode_gaji = $_GET['id'];
    
            // perintah query untuk menghapus data pada tabel Barang
            $query = mysqli_query($mysqli, "DELETE FROM is_gaji WHERE id_gaji='$kode_gaji'")
                                            or die('Ada kesalahan pada query delete : '.mysqli_error($mysqli));

            // cek hasil query
            if ($query) {
                // jika berhasil tampilkan pesan berhasil delete data
                header("location: ../../main.php?module=gaji");
            }
        }
    }       
}       
?>