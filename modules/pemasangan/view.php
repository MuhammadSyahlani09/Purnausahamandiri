<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <i class="fa fa-sign-out icon-title"></i> Data Pemasangan

    <a class="btn btn-primary btn-social pull-right" href="?module=form_pms&form=add" title="Tambah Data" data-toggle="tooltip">
      <i class="fa fa-plus"></i> Tambah
    </a>
  </h1>

</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">

    <?php  
    // fungsi untuk menampilkan pesan
    // jika alert = "" (kosong)
    // tampilkan pesan "" (kosong)
    if (empty($_GET['alert'])) {
      echo "";
    } 
    // jika alert = 1
    // tampilkan pesan Sukses "Data brg Masuk berhasil disimpan"
    elseif ($_GET['alert'] == 1) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Sukses!</h4>
              Data Pemasangan berhasil disimpan.
            </div>";
    }
    ?>

      <div class="box box-primary">
        <div class="box-body">
          <!-- tampilan tabel brg -->
          <table id="dataTables1" class="table table-bordered table-striped table-hover">
             <!-- tampilan tabel header -->
            <thead>
              <tr>
                <th class="center">No.</th>
                <th class="center">Kode Pemasangan</th>
                <th class="center">Nasabah</th>
                <th class="center">Tanggal Pemasangan</th>
                <th></th>
              </tr>
            </thead>
            <!-- tampilan tabel body -->
            <tbody>
            <?php  
            $no = 1;
            // fungsi query untuk menampilkan data dari tabel brg
            $query = mysqli_query($mysqli, "SELECT a.kode_pms,a.id_teknisi,a.nasabah,a.tgl_pms FROM is_pms as a INNER JOIN is_teknisi as b ON a.id_teknisi=b.id_teknisi ORDER BY kode_pms DESC")
                                            or die('Ada kesalahan pada query tampil Data Pemasangan: '.mysqli_error($mysqli));

            // tampilkan data
            while ($data = mysqli_fetch_assoc($query)) { 
              $tanggal         = $data['tgl_pms'];
              $exp             = explode('-',$tanggal);
              $tgl_pms   = $exp[2]."-".$exp[1]."-".$exp[0];

              // menampilkan isi tabel dari database ke tabel di aplikasi
              echo "<tr>
                      <td width='30' class='center'>$no</td>
                      <td width='100' class='center'>$data[kode_pms]</td>
                      <td width='180' class='center'>$data[nasabah]</td>
                      <td width='80' class='center'>$tgl_pms</td>
                      <td class='center' width='80'>
                        <div>                         
                          "?>
                          <a data-toggle="tooltip" data-placement="top" title="Hapus" class="btn btn-danger btn-sm" href="modules/pemasangan/proses.php?act=delete&id=<?php echo $data['kode_pms'];?>" onclick="return confirm('Anda yakin ingin menghapus data Pemasangan <?php echo $data['kode_pms']; ?> ?');">
                              <i style="color:#fff" class="glyphicon glyphicon-trash"></i>
                          </a>
            <?php
              echo "    </div>
                      </td>
                    </tr>";
              $no++;
            }
            ?>
            </tbody>
          </table>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!--/.col -->
  </div>   <!-- /.row -->
</section><!-- /.content