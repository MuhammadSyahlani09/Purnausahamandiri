<?php  
// fungsi untuk pengecekan tampilan form
// jika form add data yang dipilih
if ($_GET['form']=='add') { ?> 
  <!-- tampilan form add data -->
	<!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Input Data Gaji
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a></li>
      <li><a href="?module=brg_masuk"> Data Gaji </a></li>
      <li class="active"> Tambah </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/gaji/proses.php?act=insert" method="POST" name="formGaji">
            <div class="box-body">
              <?php  
              // fungsi untuk membuat kode transaksi
              $query_id = mysqli_query($mysqli, "SELECT RIGHT(id_gaji,2) as kode FROM is_gaji
                                                ORDER BY id_gaji DESC LIMIT 1")
                                                or die('Ada kesalahan pada query tampil kode_transaksi : '.mysqli_error($mysqli));

              $count = mysqli_num_rows($query_id);

              if ($count <> 0) {
                  // mengambil data kode transaksi
                  $data_id = mysqli_fetch_assoc($query_id);
                  $kode    = $data_id['kode']+1;
              } else {
                  $kode = 1;
              }

              // buat kode_transaksi
              $buat_id        = str_pad($kode, 2, "0", STR_PAD_LEFT);
              $kode_transaksi = "G$buat_id";
              ?>

              <div class="form-group">
                <label class="col-sm-2 control-label">Kode Gajih</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="kode_transaksi" value="<?php echo $kode_transaksi; ?>" readonly required>
                </div>
              </div>

              <hr>

              <div class="form-group">
                <label class="col-sm-2 control-label">Kode Pegawai</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="kode_user" data-placeholder="-- Pilih Pegawai --" autocomplete="off" required>
                    <option value=""></option>
                    <?php
                      $query_user = mysqli_query($mysqli, "SELECT id_user, nama_user FROM is_users ORDER BY nama_user ASC")
                                                            or die('Ada kesalahan pada query tampil user: '.mysqli_error($mysqli));
                      while ($data_user = mysqli_fetch_assoc($query_user)) {
                        echo"<option value=\"$data_user[id_user]\"> $data_user[id_user] | $data_user[nama_user] </option>";
                      }
                    ?>
                  </select>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Gajih Pokok</label>
                <div class="col-sm-5">
                <div class="input-group">
                    <span class="input-group-addon">Rp.</span>
                  <input type="text" class="form-control" name="gaji_pokok" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" required> 
                 </div>
              </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Tunjangan</label>
                <div class="col-sm-5">
                <div class="input-group">
                    <span class="input-group-addon">Rp.</span>
                  <input type="text" class="form-control" name="tunjangan" autocomplete="off" onKeyPress="return goodchars(event,'0123456789',this)" required> 
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

            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                  <a href="?module=gaji" class="btn btn-default btn-reset">Batal</a>
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
