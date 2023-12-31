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

// ambil data hasil submit dari form
$tgl1     = $_GET['tgl_awal'];
$explode  = explode('-',$tgl1);
$tgl_awal = $explode[2]."-".$explode[1]."-".$explode[0];

$tgl2      = $_GET['tgl_akhir'];
$explode   = explode('-',$tgl2);
$tgl_akhir = $explode[2]."-".$explode[1]."-".$explode[0];

if (isset($_GET['tgl_awal'])) {
    $no    = 1;
    // fungsi query untuk menampilkan data dari tabel brg keluar
    $query = mysqli_query($mysqli, "SELECT a.kode_transaksi,a.tanggal_keluar,a.kode_brg,a.jumlah_keluar,b.kode_brg,b.nama_brg,b.satuan
                                    FROM is_brg_keluar as a INNER JOIN is_brg as b ON a.kode_brg=b.kode_brg
                                    WHERE a.tanggal_keluar BETWEEN '$tgl_awal' AND '$tgl_akhir'
                                    ORDER BY a.kode_transaksi ASC") 
                                    or die('Ada kesalahan pada query tampil Transaksi : '.mysqli_error($mysqli));
    $count  = mysqli_num_rows($query);
}
?>
<html xmlns="http://www.w3.org/1999/xhtml"> <!-- Bagian halaman HTML yang akan konvert -->
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>PT. Purna Usaha Mandiri</title>
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
            LAPORAN BARANG KELUAR
        </div>
    <?php  
    if ($tgl_awal==$tgl_akhir) { ?>
        <div id="title-tanggal">
            Tanggal <?php echo tgl_eng_to_ind($tgl1); ?>
        </div>
    <?php
    } else { ?>
        <div id="title-tanggal">
            Tanggal <?php echo tgl_eng_to_ind($tgl1); ?> s.d. <?php echo tgl_eng_to_ind($tgl2); ?>
        </div>
    <?php
    }
    ?>
        
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
                        <th height="20" align="center" valign="middle">JUMLAH KELUAR</th>
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
            $tanggal       = $data['tanggal_keluar'];
            $exp           = explode('-',$tanggal);
            $tanggal_keluar = $exp[2]."-".$exp[1]."-".$exp[0];

            // menampilkan isi tabel dari database ke tabel di aplikasi
            echo "  <tr>
                        <td width='40' height='13' align='center' valign='middle'>$no</td>
                        <td width='120' height='13' align='center' valign='middle'>$data[kode_transaksi]</td>
                        <td width='80' height='13' align='center' valign='middle'>$tanggal_keluar</td>
                        <td width='80' height='13' align='center' valign='middle'>$data[kode_brg]</td>
                        <td style='padding-left:5px;' width='155' height='13' valign='middle'>$data[nama_brg]</td>
                        <td style='padding-right:10px;' width='100' height='13' align='right' valign='middle'>$data[jumlah_keluar]</td>
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

        <!-- Script Untuk Print Laporan -->
        <script>
		window.print();
	    </script>

    </body>
</html><!-- Akhir halaman HTML yang akan di konvert -->