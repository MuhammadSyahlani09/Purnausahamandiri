<?php 
// fungsi pengecekan level untuk menampilkan menu sesuai dengan hak akses
// jika hak akses = Super Admin, tampilkan menu
if ($_SESSION['hak_akses']=='Super Admin') { ?>
	<!-- sidebar menu start -->
    <ul class="sidebar-menu">
        <li class="header">MAIN MENU</li>

	<?php 
	// fungsi untuk pengecekan menu aktif
	// jika menu beranda dipilih, menu beranda aktif
	if ($_GET["module"]=="beranda") { ?>
		<li class="active">
			<a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a>
	  	</li>
      <ul class="sidebar-menu">
        <li class="header">DATA MASTER</li>
	<?php
	}
	// jika tidak, menu home tidak aktif
	else { ?>
		<li>
			<a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a>
	  	</li>

      <ul class="sidebar-menu">
        <li class="header">DATA MASTER</li>
	<?php
	}

  // jika menu data brg dipilih, menu data brg aktif
  if ($_GET["module"]=="brg" || $_GET["module"]=="form_brg") { ?>
    <li class="active">
      <a href="?module=brg"><i class="fa fa-folder"></i> Data Barang </a>
      </li>
  <?php
  }
  // jika tidak, menu data brg tidak aktif
  else { ?>
    <li>
      <a href="?module=brg"><i class="fa fa-folder"></i> Data Barang </a>
      </li>
  <?php
  }

  // jika menu data brg masuk dipilih, menu data brg masuk aktif
  if ($_GET["module"]=="brg_masuk" || $_GET["module"]=="form_brg_masuk") { ?>
    <li class="active">
      <a href="?module=brg_masuk"><i class="fa fa-arrow-circle-down"></i> Data Barang Masuk </a>
      </li>
  <?php
  }
  // jika tidak, menu data brg masuk tidak aktif
  else { ?>
    <li>
      <a href="?module=brg_masuk"><i class="fa fa-arrow-circle-down"></i> Data Barang Masuk </a>
      </li>
  <?php
  }

  // jika menu data brg keluar dipilih, menu data brg keluar aktif
  if ($_GET["module"]=="brg_keluar" || $_GET["module"]=="form_brg_keluar") { ?>
    <li class="active">
      <a href="?module=brg_keluar"><i class="fa fa-arrow-circle-up"></i> Data Barang Keluar </a>
      </li>
  <?php
  }
  // jika tidak, menu data brg keluar tidak aktif
  else { ?>
    <li>
      <a href="?module=brg_keluar"><i class="fa fa-arrow-circle-up"></i> Data Barang Keluar </a>
      </li>
  <?php
  }

  //
  if ($_GET["module"]=="gaji" || $_GET["module"]=="form_gaji") { ?>
    <li class="active">
      <a href="?module=gaji"><i class="fa fa-money"></i> Data Gaji </a>
      </li>
  <?php
  }
  // jika tidak, menu data brg keluar tidak aktif
  else { ?>
    <li>
      <a href="?module=gaji"><i class="fa fa-money"></i> Data Gaji </a>
      </li>
  <?php
  }

  if ($_GET["module"]=="jabatan" || $_GET["module"]=="form_jabatan") { ?>
    <li class="active">
      <a href="?module=jabatan"><i class="fa fa-tags"></i> Data Jabatan </a>
      </li>
  <?php
  }
  // jika tidak, menu data brg keluar tidak aktif
  else { ?>
    <li>
      <a href="?module=jabatan"><i class="fa fa-tags"></i> Data Jabatan </a>
      </li>
  <?php
  }

    //
    if ($_GET["module"]=="pms" || $_GET["module"]=="form_pms") { ?>
      <li class="active">
        <a href="?module=pms"><i class="fa fa-signing"></i> Data Pemasangan </a>
        </li>
    <?php
    }
    // jika tidak, menu data brg keluar tidak aktif
    else { ?>
      <li>
        <a href="?module=pms"><i class="fa fa-signing"></i> Data Pemasangan </a>
        </li>
    <?php
    }

    if ($_GET["module"]=="teknisi" || $_GET["module"]=="form_teknisi") { ?>
      <li class="active">
        <a href="?module=teknisi"><i class="fa fa-users"></i> Data Teknisi</a>
        </li>
        <ul class="sidebar-menu">
        <li class="header">LAPORAN</li>
    <?php
    }
    // jika tidak, menu user tidak aktif
    else { ?>
      <li>
        <a href="?module=teknisi"><i class="fa fa-users"></i> Data Teknisi</a>
        </li>

        <ul class="sidebar-menu">
        <li class="header">LAPORAN</li>
    <?php
    }

	// jika menu Laporan Stok Barang dipilih, menu Laporan Stok Barang aktif
	if ($_GET["module"]=="lap_stok") { ?>
		<li class="active treeview">
          	<a href="javascript:void(0);">
            	<i class="fa fa-file-text"></i> <span>Laporan</span> <i class="fa fa-angle-left pull-right"></i>
          	</a>
      		<ul class="treeview-menu">
        		<li class="active"><a href="?module=lap_stok"><i class="fa fa-circle-o"></i> Stok Barang </a></li>
        		<li><a href="?module=lap_brg_masuk"><i class="fa fa-circle-o"></i> Barang Masuk </a></li>
            <li><a href="?module=lap_brg_keluar"><i class="fa fa-circle-o"></i> Barang Keluar </a></li>
            <li><a href="?module=lap_gaji"><i class="fa fa-circle-o"></i> Gaji </a></li>
            <li><a href="?module=lap_pms"><i class="fa fa-circle-o"></i> Pemasangan </a></li>
      		</ul>
    	</li>
      <ul class="sidebar-menu">
        <li class="header">USER</li>
    <?php
	}
	// jika menu Laporan brg Masuk dipilih, menu Laporan brg Masuk aktif
	elseif ($_GET["module"]=="lap_brg_masuk") { ?>
		<li class="active treeview">
          	<a href="javascript:void(0);">
            	<i class="fa fa-file-text"></i> <span>Laporan</span> <i class="fa fa-angle-left pull-right"></i>
          	</a>
      		<ul class="treeview-menu">
        		<li><a href="?module=lap_stok"><i class="fa fa-circle-o"></i> Stok Barang </a></li>
        		<li class="active"><a href="?module=lap_brg_masuk"><i class="fa fa-circle-o"></i> Barang Masuk </a></li>
            <li><a href="?module=lap_brg_keluar"><i class="fa fa-circle-o"></i> Barang Keluar </a></li>
            <li><a href="?module=lap_gaji"><i class="fa fa-circle-o"></i> Gaji </a></li>
            <li><a href="?module=lap_pms"><i class="fa fa-circle-o"></i> Pemasangan </a></li>
      		</ul>
    	</li>
      <ul class="sidebar-menu">
        <li class="header">USER</li>
    <?php
  }
  // jika menu Laporan brg Keluar dipilih, menu Laporan brg Keluar aktif
	elseif ($_GET["module"]=="lap_brg_keluar") { ?>
		<li class="active treeview">
          	<a href="javascript:void(0);">
            	<i class="fa fa-file-text"></i> <span>Laporan</span> <i class="fa fa-angle-left pull-right"></i>
          	</a>
      		<ul class="treeview-menu">
        		<li><a href="?module=lap_stok"><i class="fa fa-circle-o"></i> Stok Barang </a></li>
            <li><a href="?module=lap_brg_masuk"><i class="fa fa-circle-o"></i> Barang Masuk </a></li>
            <li class="active"><a href="?module=lap_brg_keluar"><i class="fa fa-circle-o"></i> Barang Keluar </a></li>
            <li><a href="?module=lap_gaji"><i class="fa fa-circle-o"></i> Gaji </a></li>
            <li><a href="?module=lap_pms"><i class="fa fa-circle-o"></i> Pemasangan </a></li>
      		</ul>
    	</li>
      <ul class="sidebar-menu">
        <li class="header">USER</li>
    <?php
	}

  elseif ($_GET["module"]=="lap_gaji") { ?>
		<li class="active treeview">
          	<a href="javascript:void(0);">
            	<i class="fa fa-file-text"></i> <span>Laporan</span> <i class="fa fa-angle-left pull-right"></i>
          	</a>
      		<ul class="treeview-menu">
        		<li><a href="?module=lap_stok"><i class="fa fa-circle-o"></i> Stok Barang </a></li>
            <li><a href="?module=lap_brg_masuk"><i class="fa fa-circle-o"></i> Barang Masuk </a></li>
            <li><a href="?module=lap_brg_keluar"><i class="fa fa-circle-o"></i> Barang Keluar </a></li>
            <li class="active"><a href="?module=lap_gaji"><i class="fa fa-circle-o"></i> Gaji </a></li>
            <li><a href="?module=lap_pms"><i class="fa fa-circle-o"></i> Pemasangan </a></li>
      		</ul>
    	</li>
      <ul class="sidebar-menu">
        <li class="header">USER</li>
    <?php
	}

  elseif ($_GET["module"]=="lap_user") { ?>
		<li class="active treeview">
          	<a href="javascript:void(0);">
            	<i class="fa fa-file-text"></i> <span>Laporan</span> <i class="fa fa-angle-left pull-right"></i>
          	</a>
      		<ul class="treeview-menu">
        		<li><a href="?module=lap_stok"><i class="fa fa-circle-o"></i> Stok Barang </a></li>
            <li><a href="?module=lap_brg_masuk"><i class="fa fa-circle-o"></i> Barang Masuk </a></li>
            <li><a href="?module=lap_brg_keluar"><i class="fa fa-circle-o"></i> Barang Keluar </a></li>
            <li><a href="?module=lap_gaji"><i class="fa fa-circle-o"></i> Gaji </a></li>
            <li><a href="?module=lap_pms"><i class="fa fa-circle-o"></i> Pemasangan </a></li>
      		</ul>
    	</li>
      <ul class="sidebar-menu">
        <li class="header">USER</li>
    <?php
	}

  elseif ($_GET["module"]=="lap_pms") { ?>
		<li class="active treeview">
          	<a href="javascript:void(0);">
            	<i class="fa fa-file-text"></i> <span>Laporan</span> <i class="fa fa-angle-left pull-right"></i>
          	</a>
      		<ul class="treeview-menu">
        		<li><a href="?module=lap_stok"><i class="fa fa-circle-o"></i> Stok Barang </a></li>
            <li><a href="?module=lap_brg_masuk"><i class="fa fa-circle-o"></i> Barang Masuk </a></li>
            <li><a href="?module=lap_brg_keluar"><i class="fa fa-circle-o"></i> Barang Keluar </a></li>
            <li><a href="?module=lap_gaji"><i class="fa fa-circle-o"></i> Gaji </a></li>
            <li class="active"><a href="?module=lap_pms"><i class="fa fa-circle-o"></i> Pemasangan </a></li>
      		</ul>
    	</li>
      <ul class="sidebar-menu">
        <li class="header">USER</li>
    <?php
	}
	// jika menu Laporan tidak dipilih, menu Laporan tidak aktif
	else { ?>
		<li class="treeview">
          	<a href="javascript:void(0);">
            	<i class="fa fa-file-text"></i> <span>Laporan</span> <i class="fa fa-angle-left pull-right"></i>
          	</a>
      		<ul class="treeview-menu">
        		<li><a href="?module=lap_stok"><i class="fa fa-circle-o"></i> Stok Barang </a></li>
        		<li><a href="?module=lap_brg_masuk"><i class="fa fa-circle-o"></i> Barang Masuk </a></li>
            <li><a href="?module=lap_brg_keluar"><i class="fa fa-circle-o"></i> Barang Keluar </a></li>
            <li><a href="?module=lap_gaji"><i class="fa fa-circle-o"></i> Gaji </a></li>
            <li><a href="?module=lap_pms"><i class="fa fa-circle-o"></i> Pemasangan </a></li>
      		</ul>
    	</li>
      <ul class="sidebar-menu">
        <li class="header">USER</li>
    <?php
	}

	// jika menu user dipilih, menu user aktif
	if ($_GET["module"]=="user" || $_GET["module"]=="form_user") { ?>
		<li class="active">
			<a href="?module=user"><i class="fa fa-user"></i> Manajemen User</a>
	  	</li>
	<?php
	}
	// jika tidak, menu user tidak aktif
	else { ?>
		<li>
			<a href="?module=user"><i class="fa fa-user"></i> Manajemen User</a>
	  	</li>
	<?php
	}

	// jika menu ubah password dipilih, menu ubah password aktif
	if ($_GET["module"]=="password") { ?>
		<li class="active">
			<a href="?module=password"><i class="fa fa-lock"></i> Ubah Password</a>
		</li>
	<?php
	}
	// jika tidak, menu ubah password tidak aktif
	else { ?>
		<li>
			<a href="?module=password"><i class="fa fa-lock"></i> Ubah Password</a>
		</li>
	<?php
	}
	?>
	</ul>
	<!--sidebar menu end-->
<?php
}
// jika hak akses = Manajer, tampilkan menu
elseif ($_SESSION['hak_akses']=='Manajer') { ?>
	<!-- sidebar menu start -->
    <ul class="sidebar-menu">
        <li class="header">MAIN MENU</li>

	<?php 
	// fungsi untuk pengecekan menu aktif
	// jika menu beranda dipilih, menu beranda aktif
	if ($_GET["module"]=="beranda") { ?>
		<li class="active">
			<a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a>
	  	</li>
	<?php
	}
	// jika tidak, menu beranda tidak aktif
	else { ?>
		<li>
			<a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a>
	  	</li>
	<?php
	}

	// jika menu Laporan Stok brg dipilih, menu Laporan Stok brg aktif
  if ($_GET["module"]=="lap_stok") { ?>
    <li class="active treeview">
            <a href="javascript:void(0);">
              <i class="fa fa-file-text"></i> <span>Laporan</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
          <ul class="treeview-menu">
            <li class="active"><a href="?module=lap_stok"><i class="fa fa-circle-o"></i> Stok brg </a></li>
            <li><a href="?module=lap_brg_masuk"><i class="fa fa-circle-o"></i> brg Masuk </a></li>
          </ul>
      </li>
    <?php
  }
  // jika menu Laporan brg Masuk dipilih, menu Laporan brg Masuk aktif
  elseif ($_GET["module"]=="lap_brg_masuk") { ?>
    <li class="active treeview">
            <a href="javascript:void(0);">
              <i class="fa fa-file-text"></i> <span>Laporan</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
          <ul class="treeview-menu">
            <li><a href="?module=lap_stok"><i class="fa fa-circle-o"></i> Stok brg </a></li>
            <li class="active"><a href="?module=lap_brg_masuk"><i class="fa fa-circle-o"></i> brg Masuk </a></li>
          </ul>
      </li>
    <?php
  }
  // jika menu Laporan tidak dipilih, menu Laporan tidak aktif
  else { ?>
    <li class="treeview">
            <a href="javascript:void(0);">
              <i class="fa fa-file-text"></i> <span>Laporan</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
          <ul class="treeview-menu">
            <li><a href="?module=lap_stok"><i class="fa fa-circle-o"></i> Stok brg </a></li>
            <li><a href="?module=lap_brg_masuk"><i class="fa fa-circle-o"></i> brg Masuk </a></li>
          </ul>
      </li>
    <?php
  }

	// jika menu ubah password dipilih, menu ubah password aktif
	if ($_GET["module"]=="password") { ?>
		<li class="active">
			<a href="?module=password"><i class="fa fa-lock"></i> Ubah Password</a>
		</li>
	<?php
	}
	// jika tidak, menu ubah password tidak aktif
	else { ?>
		<li>
			<a href="?module=password"><i class="fa fa-lock"></i> Ubah Password</a>
		</li>
	<?php
	}
	?>
	</ul>
	<!--sidebar menu end-->
<?php
}
// jika hak akses = Gudang, tampilkan menu
if ($_SESSION['hak_akses']=='Gudang') { ?>
	<!-- sidebar menu start -->
    <ul class="sidebar-menu">
        <li class="header">MAIN MENU</li>

	<?php 
	// fungsi untuk pengecekan menu aktif
	// jika menu beranda dipilih, menu beranda aktif
  if ($_GET["module"]=="beranda") { ?>
    <li class="active">
      <a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a>
      </li>
  <?php
  }
  // jika tidak, menu home tidak aktif
  else { ?>
    <li>
      <a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a>
      </li>
  <?php
  }

  // jika menu data brg dipilih, menu data brg aktif
  if ($_GET["module"]=="brg" || $_GET["module"]=="form_brg") { ?>
    <li class="active">
      <a href="?module=brg"><i class="fa fa-folder"></i> Data brg </a>
      </li>
  <?php
  }
  // jika tidak, menu data brg tidak aktif
  else { ?>
    <li>
      <a href="?module=brg"><i class="fa fa-folder"></i> Data brg </a>
      </li>
  <?php
  }

  // jika menu data brg masuk dipilih, menu data brg masuk aktif
  if ($_GET["module"]=="brg_masuk" || $_GET["module"]=="form_brg_masuk") { ?>
    <li class="active">
      <a href="?module=brg_masuk"><i class="fa fa-clone"></i> Data brg Masuk </a>
      </li>
  <?php
  }
  // jika tidak, menu data brg masuk tidak aktif
  else { ?>
    <li>
      <a href="?module=brg_masuk"><i class="fa fa-clone"></i> Data brg Masuk </a>
      </li>
  <?php
  }

  // jika menu Laporan Stok brg dipilih, menu Laporan Stok brg aktif
  if ($_GET["module"]=="lap_stok") { ?>
    <li class="active treeview">
            <a href="javascript:void(0);">
              <i class="fa fa-file-text"></i> <span>Laporan</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
          <ul class="treeview-menu">
            <li class="active"><a href="?module=lap_stok"><i class="fa fa-circle-o"></i> Stok brg </a></li>
            <li><a href="?module=lap_brg_masuk"><i class="fa fa-circle-o"></i> brg Masuk </a></li>
          </ul>
      </li>
    <?php
  }
  // jika menu Laporan brg Masuk dipilih, menu Laporan brg Masuk aktif
  elseif ($_GET["module"]=="lap_brg_masuk") { ?>
    <li class="active treeview">
            <a href="javascript:void(0);">
              <i class="fa fa-file-text"></i> <span>Laporan</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
          <ul class="treeview-menu">
            <li><a href="?module=lap_stok"><i class="fa fa-circle-o"></i> Stok brg </a></li>
            <li class="active"><a href="?module=lap_brg_masuk"><i class="fa fa-circle-o"></i> brg Masuk </a></li>
          </ul>
      </li>
    <?php
  }
  // jika menu Laporan tidak dipilih, menu Laporan tidak aktif
  else { ?>
    <li class="treeview">
            <a href="javascript:void(0);">
              <i class="fa fa-file-text"></i> <span>Laporan</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
          <ul class="treeview-menu">
            <li><a href="?module=lap_stok"><i class="fa fa-circle-o"></i> Stok brg </a></li>
            <li><a href="?module=lap_brg_masuk"><i class="fa fa-circle-o"></i> brg Masuk </a></li>
          </ul>
      </li>
    <?php
  }

	// jika menu ubah password dipilih, menu ubah password aktif
	if ($_GET["module"]=="password") { ?>
		<li class="active">
			<a href="?module=password"><i class="fa fa-lock"></i> Ubah Password</a>
		</li>
	<?php
	}
	// jika tidak, menu ubah password tidak aktif
	else { ?>
		<li>
			<a href="?module=password"><i class="fa fa-lock"></i> Ubah Password</a>
		</li>
	<?php
	}
	?>
	</ul>
	<!--sidebar menu end-->
<?php
}
?>