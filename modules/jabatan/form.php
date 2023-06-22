<?php  
// fungsi untuk pengecekan tampilan form
// jika form add data yang dipilih
if ($_GET['form']=='add') { ?>
  <!-- tampilkan form add data -->
	<!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Input Jabatan
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a></li>
      <li><a href="?module=jabatan"> Jabatan </a></li>
      <li class="active"> Input </li>
    </ol>
  </section>

  <?php  
              // fungsi untuk membuat kode transaksi
              $query_id = mysqli_query($mysqli, "SELECT RIGHT(id_jabatan,1) as kode FROM tb_jabatan
                                                ORDER BY id_jabatan DESC LIMIT 1")
                                                or die('Ada kesalahan pada query tampil Id Jabatan : '.mysqli_error($mysqli));

              $count = mysqli_num_rows($query_id);

              if ($count <> 0) {
                  // mengambil data kode transaksi
                  $data_id = mysqli_fetch_assoc($query_id);
                  $kode    = $data_id['kode']+1;
              } else {
                  $kode = 1;
              }

              // buat kode_pms
              $buat_id        = str_pad($kode, 1, "0", STR_PAD_LEFT);
              $id_jabatan = "J-$buat_id";
              ?>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" method="POST" action="modules/jabatan/proses.php?act=insert" enctype="multipart/form-data">
            <div class="box-body">

            <div class="form-group">
                <label class="col-sm-2 control-label">ID Jabatan</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="id_jabatan" value="<?php echo $id_jabatan; ?>" readonly required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Jabatan</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="jabatan" autocomplete="off" required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Gaji Pokok</label>
                <div class="col-sm-5">
                <div class="input-group">
                    <span class="input-group-addon">Rp.</span>
                  <input type="text" class="form-control" name="gaji_pokok" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" required> 
                 </div>
              </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Uang Transportasi</label>
                <div class="col-sm-5">
                <div class="input-group">
                    <span class="input-group-addon">Rp.</span>
                  <input type="text" class="form-control" name="transport" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" required> 
                 </div>
              </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Uang Makan</label>
                <div class="col-sm-5">
                <div class="input-group">
                    <span class="input-group-addon">Rp.</span>
                  <input type="text" class="form-control" name="uang_makan" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" required> 
                 </div>
              </div>
            </div>

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                  <a href="?module=jabatan" class="btn btn-default btn-reset">Batal</a>
                </div>
              </div>
            </div><!-- /.box footer -->
          </form>
        </div><!-- /.box -->
      </div><!--/.col -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
<?php
}

// jika form edit data yang dipilih
elseif ($_GET['form']=='edit') { 
  	if (isset($_GET['id'])) {
      // fungsi query untuk menampilkan data dari tabel teknisi
      $query = mysqli_query($mysqli, "SELECT * FROM tb_jabatan WHERE id_jabatan='$_GET[id]'") 
                                      or die('Ada kesalahan pada query tampil data teknisi : '.mysqli_error($mysqli));
      $data  = mysqli_fetch_assoc($query);
  	}	
?>
	<!-- tampilkan form edit data -->
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Ubah Data Jabatan
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=beranda"><i class="fa fa-user"></i> Beranda</a></li>
      <li><a href="?module=jabatan"> Teknisi </a></li>
      <li class="active"> Ubah </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" method="POST" action="modules/jabatan/proses.php?act=update" enctype="multipart/form-data">
            <div class="box-body">

              <input type="hidden" name="id_jabatan" value="<?php echo $data['id_jabatan']; ?>">

              <div class="form-group">
                <label class="col-sm-2 control-label">Jabatan</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="jabatan" autocomplete="off" value="<?php echo $data['jabatan']; ?>" required>
                </div>
              </div>

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                  <a href="?module=jabatan" class="btn btn-default btn-reset">Batal</a>
                </div>
              </div>
            </div><!-- /.box footer -->
          </form>
        </div><!-- /.box -->
      </div><!--/.col -->
    </div>   <!-- /.row -->
  </section><!-- /.content -->
<?php
}
?>