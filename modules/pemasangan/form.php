
<?php  
// fungsi untuk pengecekan tampilan form
// jika form add data yang dipilih
if ($_GET['form']=='add') { ?> 
  <!-- tampilan form add data -->
	<!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <i class="fa fa-edit icon-title"></i> Input Pemasangan
    </h1>
    <ol class="breadcrumb">
      <li><a href="?module=beranda"><i class="fa fa-home"></i> Beranda </a></li>
      <li><a href="?module=pemasangan"> Pemasangan </a></li>
      <li class="active"> Tambah </li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <!-- form start -->
          <form role="form" class="form-horizontal" action="modules/pemasangan/proses.php?act=insert" method="POST" name="formPms">
            <div class="box-body">
              <?php  
              // fungsi untuk membuat kode transaksi
              $query_id = mysqli_query($mysqli, "SELECT RIGHT(kode_pms,3) as kode FROM is_pms
                                                ORDER BY kode_pms DESC LIMIT 1")
                                                or die('Ada kesalahan pada query tampil kode_pms : '.mysqli_error($mysqli));

              $count = mysqli_num_rows($query_id);

              if ($count <> 0) {
                  // mengambil data kode transaksi
                  $data_id = mysqli_fetch_assoc($query_id);
                  $kode    = $data_id['kode']+1;
              } else {
                  $kode = 1;
              }

              // buat kode_pms
              $tahun          = date("Y");
              $buat_id        = str_pad($kode, 3, "0", STR_PAD_LEFT);
              $kode_pms = "PMS-$tahun-$buat_id";
              ?>

              <div class="form-group">
                <label class="col-sm-2 control-label">Kode Pemasangan</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="kode_pms" value="<?php echo $kode_pms; ?>" readonly required>
                </div>
              </div>

              <div class="form-group">
                <label class="col-sm-2 control-label">Tanggal</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="tgl_pms" autocomplete="off" value="<?php echo date("d-m-Y"); ?>" required>
                </div>
              </div>

              <hr>

              <div class="form-group">
                <label class="col-sm-2 control-label">Teknisi</label>
                <div class="col-sm-5">
                  <select class="chosen-select" name="id_teknisi" data-placeholder="-- Pilih Teknisi --" onchange="tampil_teknisi(this)" autocomplete="off" required>
                    <option value=""></option>
                    <?php
                      $query_teknisi = mysqli_query($mysqli, "SELECT id_teknisi, nama_teknisi FROM is_teknisi ORDER BY nama_teknisi ASC")
                                                            or die('Ada kesalahan pada query tampil brg: '.mysqli_error($mysqli));
                      while ($data_teknisi = mysqli_fetch_assoc($query_teknisi)) {
                        echo"<option value=\"$data_teknisi[id_teknisi]\"> $data_teknisi[id_teknisi] | $data_teknisi[nama_teknisi] </option>";
                      }
                    ?>
                  </select>
                </div>
              </div>
              
              <div class="form-group">
                <label class="col-sm-2 control-label">Nama Nasabah</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="nasabah" autocomplete="off" required>
                </div>
              </div>

            </div><!-- /.box body -->

            <div class="box-footer">
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <input type="submit" class="btn btn-primary btn-submit" name="simpan" value="Simpan">
                  <a href="?module=pms" class="btn btn-default btn-reset">Batal</a>
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