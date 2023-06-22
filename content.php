<?php
/* panggil file database.php untuk koneksi ke database */
require_once "config/database.php";
/* panggil file fungsi tambahan */
require_once "config/fungsi_tanggal.php";
require_once "config/fungsi_rupiah.php";

// fungsi untuk pengecekan status login user 
// jika user belum login, alihkan ke halaman login dan tampilkan message = 1
if (empty($_SESSION['username']) && empty($_SESSION['password'])){
	echo "<meta http-equiv='refresh' content='0; url=index.php?alert=1'>";
}
// jika user sudah login, maka jalankan perintah untuk pemanggilan file halaman konten
else {
	// jika halaman konten yang dipilih beranda, panggil file view beranda
	if ($_GET['module'] == 'beranda') {
		include "modules/beranda/view.php";
	}

	// jika halaman konten yang dipilih brg, panggil file view brg
	elseif ($_GET['module'] == 'brg') {
		include "modules/brg/view.php";
	}

	// jika halaman konten yang dipilih form brg, panggil file form brg
	elseif ($_GET['module'] == 'form_brg') {
		include "modules/brg/form.php";
	}
	// -----------------------------------------------------------------------------

	// jika halaman konten yang dipilih brg masuk, panggil file view brg masuk
	elseif ($_GET['module'] == 'brg_masuk') {
		include "modules/brg-masuk/view.php";
	}

	// jika halaman konten yang dipilih form brg masuk, panggil file form brg masuk
	elseif ($_GET['module'] == 'form_brg_masuk') {
		include "modules/brg-masuk/form.php";
	}

	elseif ($_GET['module'] == 'form_pms') {
		include "modules/pemasangan/form.php";
	}
	// -----------------------------------------------------------------------------

	// jika halaman konten yang dipilih brg keluar, panggil file view brg keluar
	elseif ($_GET['module'] == 'brg_keluar') {
		include "modules/brg-keluar/view.php";
	}

	// jika halaman konten yang dipilih form brg keluar, panggil file form brg keluar
	elseif ($_GET['module'] == 'form_brg_keluar') {
		include "modules/brg-keluar/form.php";
	}
	// -----------------------------------------------------------------------------

	// jika halaman konten yang dipilih laporan stok, panggil file view laporan stok
	elseif ($_GET['module'] == 'lap_stok') {
		include "modules/lap-stok/view.php";
	}
	// -----------------------------------------------------------------------------

	// jika halaman konten yang dipilih laporan brg masuk, panggil file view laporan brg masuk
	elseif ($_GET['module'] == 'lap_brg_masuk') {
		include "modules/lap-brg-masuk/view.php";
	}
	// -----------------------------------------------------------------------------

	// jika halaman konten yang dipilih laporan brg keluar, panggil file view laporan brg keluar
	elseif ($_GET['module'] == 'lap_brg_keluar') {
		include "modules/lap-brg-keluar/view.php";
	}
	// -----------------------------------------------------------------------------

	// jika halaman konten yang dipilih user, panggil file view user
	elseif ($_GET['module'] == 'user') {
		include "modules/user/view.php";
	}

	// jika halaman konten yang dipilih form user, panggil file form user
	elseif ($_GET['module'] == 'form_user') {
		include "modules/user/form.php";
	}

	elseif ($_GET['module'] == 'form_teknisi') {
		include "modules/teknisi/form.php";
	}
	// -----------------------------------------------------------------------------

	// jika halaman konten yang dipilih profil, panggil file view profil
	elseif ($_GET['module'] == 'profil') {
		include "modules/profil/view.php";
	}

	// jika halaman konten yang dipilih form profil, panggil file form profil
	elseif ($_GET['module'] == 'form_profil') {
		include "modules/profil/form.php";
	}
	// -----------------------------------------------------------------------------
	
	// jika halaman konten yang dipilih password, panggil file view password
	elseif ($_GET['module'] == 'password') {
		include "modules/password/view.php";
	}

	elseif ($_GET['module'] == 'gaji'){
		include "modules/gaji/view.php";
	}

	elseif ($_GET['module'] == 'form_gaji') {
		include "modules/gaji/form.php";
	}

	elseif ($_GET['module'] == 'form_jabatan') {
		include "modules/jabatan/form.php";
	}

	elseif ($_GET['module'] == 'lap_gaji') {
		include "modules/lap-gaji/view.php";
	}

	elseif ($_GET['module'] == 'lap_user') {
		include "modules/lap-user/view.php";
	}

	elseif ($_GET['module'] == 'lap_pms') {
		include "modules/lap-pms/view.php";
	}

	elseif ($_GET['module'] == 'pms') {
		include "modules/pemasangan/view.php";
	}

	elseif ($_GET['module'] == 'teknisi') {
		include "modules/teknisi/view.php";
	}

	elseif ($_GET['module'] == 'jabatan') {
		include "modules/jabatan/view.php";
	}
}
?>