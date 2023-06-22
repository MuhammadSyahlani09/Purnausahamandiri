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
            $kode_pms = mysqli_real_escape_string($mysqli, trim($_POST['kode_pms']));
            $id_teknisi = mysqli_real_escape_string($mysqli, trim($_POST['id_teknisi']));
            $nasabah  = mysqli_real_escape_string($mysqli, trim($_POST['nasabah']));
            $tanggal         = mysqli_real_escape_string($mysqli, trim($_POST['tgl_pms']));
            $exp             = explode('-',$tanggal);
            $tgl_pms  = $exp[2]."-".$exp[1]."-".$exp[0];
            
            

            // perintah query untuk menyimpan data ke tabel brg masuk
            $query = mysqli_query($mysqli, "INSERT INTO is_pms(kode_pms,id_teknisi,nasabah,tgl_pms) 
                                            VALUES('$kode_pms','$id_teknisi','$nasabah','$tgl_pms')")
                                            or die('Ada kesalahan pada query insert : '.mysqli_error($mysqli));    

           
                // cek query
                if ($query) {                       
                    // jika berhasil tampilkan pesan berhasil simpan data
                    header("location: ../../main.php?module=pms&alert=1");
                }
            }   
        } 
        elseif ($_GET['act']=='delete') {
            if (isset($_GET['id'])) {
                $kode_pms = $_GET['id'];
        
                // perintah query untuk menghapus data pada tabel Barang
                $query = mysqli_query($mysqli, "DELETE FROM is_pms WHERE kode_pms='$kode_pms'")
                                                or die('Ada kesalahan pada query delete : '.mysqli_error($mysqli));
    
                // cek hasil query
                if ($query) {
                    // jika berhasil tampilkan pesan berhasil delete data
                    header("location: ../../main.php?module=pms");
                }
            }
        }        
    }    
?>