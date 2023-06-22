<html> <!-- Bagian halaman HTML yang akan print -->
<?php
session_start();
ob_start();
// Panggil koneksi database.php untuk koneksi database
require_once "../../config/database.php";
// panggil fungsi untuk format tanggal
include "../../config/fungsi_tanggal.php";
// panggil fungsi untuk format rupiah
include "../../config/fungsi_rupiah.php";

$hari_ini = date("d-m-Y");

$no = 1;
// fungsi query untuk menampilkan data dari tabel brg
$query = mysqli_query($mysqli, "SELECT a.kode_transaksi,a.tanggal_masuk,a.kode_brg,a.jumlah_masuk,b.kode_brg,b.nama_brg,b.satuan
FROM is_brg_masuk as a INNER JOIN is_brg as b ON a.kode_brg=b.kode_brg
WHERE a.tanggal_masuk ORDER BY a.kode_transaksi ASC")
                                or die('Ada kesalahan pada query tampil Data brg: '.mysqli_error($mysqli));
$count  = mysqli_num_rows($query);
?>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>PT. Purna Usaha Mandiri (Barang Masuk)</title>
        <link rel="stylesheet" type="text/css" href="../../assets/css/laporan.css" />
        <style>
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  padding: 8px;
  text-align: left;
  border-bottom: 1px solid #ddd;
}

.company-info {
			font-size: 14px;
			line-height: 0.2;
			text-align: center;
			margin: 10;
			padding: 20px;
}
.logo-text {
			font-size: 14px;
			font-weight: bold;
			margin: 0;
}

.logo-info {
			display: flex;
			align-items: center;
}

#logo {
			width: 70px;
			height: 70px;
			margin-right: 0px;
            align-items: center;
		}

tr:hover {background-color:#f5f5f5;}
</style>
    </head>
    <body>
    <div class="logo">
    <img src="logo1.png" alt="PT Logo" id="logo">
    </div>
    <div class="company-info">
			
			<h2>PT. PURNA USAHA MANDIRI</h2>
			<p>Jl. Dharma Bakti VB, Pemurus Luar,70238</p>
			<p>+6281521900956</p>
			<p>Purnausahamandiri@gmail.com</p>
		</div>
        <div id="title">            
            LAPORAN BARANG MASUK
        </div>
        
        <hr><br>

        <div id="isi">
            <table width="100%" border="0.3" cellpadding="0" cellspacing="0">
                <thead style="background:#e8ecee">
                    <tr class="tr-title">
                    <th height="20" align="center" valign="middle">NO.</th>
                        <th height="20" align="center" valign="middle">KODE TRANSAKSI</th>
                        <th height="20" align="center" valign="middle">TANGGAL</th>
                        <th height="20" align="center" valign="middle">KODE brg</th>
                        <th height="20" align="center" valign="middle">NAMA brg</th>
                        <th height="20" align="center" valign="middle">JUMLAH MASUK</th>
                        <th height="20" align="center" valign="middle">SATUAN</th>
                    </tr>
                </thead>
                <tbody>
                <?php
    // jika data ada
    if($count == 0) {
        echo "  <tr>
                    <td width='40' height='13' align='center' valign='middle'></td>
                    <td width='120' height='13' align='center' valign='middle'></td>
                    <td width='80' height='13' align='center' valign='middle'></td>
                    <td width='80' height='13' align='center' valign='middle'></td>
                    <td style='padding-left:5px;' width='155' height='13' valign='middle'></td>
                    <td style='padding-right:10px;' width='100' height='13' align='right' valign='middle'></td>
                    <td width='80' height='13' align='center' valign='middle'></td>
                </tr>";
    }
    // jika data tidak ada
    else {
        // tampilkan data
        while ($data = mysqli_fetch_assoc($query)) {
            $tanggal       = $data['tanggal_masuk'];
            $exp           = explode('-',$tanggal);
            $tanggal_masuk = $exp[2]."-".$exp[1]."-".$exp[0];

            // menampilkan isi tabel dari database ke tabel di aplikasi
            echo "  <tr>
                        <td width='40' height='13' align='center' valign='middle'>$no</td>
                        <td width='120' height='13' align='center' valign='middle'>$data[kode_transaksi]</td>
                        <td width='80' height='13' align='center' valign='middle'>$tanggal_masuk</td>
                        <td width='80' height='13' align='center' valign='middle'>$data[kode_brg]</td>
                        <td style='padding-left:5px;' width='155' height='13' valign='middle'>$data[nama_brg]</td>
                        <td style='padding-right:10px;' width='100' height='13' align='right' valign='middle'>$data[jumlah_masuk]</td>
                        <td width='80' height='13' align='center' valign='middle'>$data[satuan]</td>
                    </tr>";
            $no++;
        }
    }
?>	
                </tbody>
            </table>

            <div id="footer-tanggal">
                Banjarmasin, <?php echo tgl_eng_to_ind("$hari_ini"); ?>
            </div> 
            <div id="footer-jabatan">
                Pimpinan
            </div>
            
            <div id="footer-nama">
                Hj.Sulastri
            </div>
        </div>
        
        <script>
		window.print();
	    </script>

    </body>
</html><!-- Akhir halaman HTML yang akan di print -->