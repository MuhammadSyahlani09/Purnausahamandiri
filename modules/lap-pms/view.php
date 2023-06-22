<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <i class="fa fa-file-text-o icon-title"></i> Laporan Pemasangan

    <a class="btn btn-primary btn-social pull-right" href="modules/lap-pms/cetak.php" target="_blank">
      <i class="fa fa-print"></i> Cetak
    </a>
  </h1>

</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-body">
          <!-- tampilan tabel brg -->
          <table id="dataTables1" class="table table-bordered table-striped table-hover">
            <!-- tampilan tabel header -->
            <thead>
              <tr>
                <th class="center">No.</th>
                <th class="center">ID Pemasangan</th>
                <th class="center">Nasabah</th>
                <th class="center">ID Teknisi</th>
                <th class="center">Nama Teknisi</th>
                <th class="center">Telepon Teknisi</th>
              </tr>
            </thead>
            <!-- tampilan tabel body -->
            <tbody>
            <?php  
            $no = 1;  
            // fungsi query untuk menampilkan data dari tabel brg
            $query = mysqli_query($mysqli, "SELECT a.*,b.*
                                            FROM is_pms as a INNER JOIN is_teknisi as b ON a.id_teknisi=b.id_teknisi ORDER BY kode_pms DESC")
                                            or die('Ada kesalahan pada query tampil Data Barang Masuk: '.mysqli_error($mysqli));

            // tampilkan data
            while ($data = mysqli_fetch_assoc($query)) {

              // menampilkan isi tabel dari database ke tabel di aplikasi
             
              echo "  <td width='30' class='center'>$no</td>
                      <td width='100' class='center'>$data[kode_pms]</td>
                      <td width='200' class='center'>$data[nasabah]</td>
                      <td width='200' class='center'>$data[id_teknisi]</td>
                      <td width='90' align='center'>$data[nama_teknisi]</td>
                      <td width='95' align='center'>$data[telepon]</td>                      
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