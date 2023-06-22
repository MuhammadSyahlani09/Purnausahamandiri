<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <i class="fa fa-file-text-o icon-title"></i> Laporan Data Gaji Keseluruhan

    <a class="btn btn-primary btn-social pull-right" href="modules/lap-gaji/cetak.php" target="_blank">
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
                <th class="center">Kode Gajih</th>
                <th class="center">Kode Pegawai</th>
                <th class="center">Nama Pegawai</th>
                <th class="center">Gajih Pokok</th>
                <th class="center">Tunjangan</th>
                <th class="center">Uang Makan</th>
              </tr>
            </thead>
            <!-- tampilan tabel body -->
            <tbody>
            <?php  
            $no = 1;
            $jml_gapok = 0;
            $jml_tunjangan = 0;
            $jml_uang_makan = 0;
            // fungsi query untuk menampilkan data dari tabel brg
            $query = mysqli_query($mysqli, "SELECT a.id_gaji,a.gaji_pokok,a.tunjangan,a.uang_makan,a.id_user,b.id_user,b.nama_user,b.status
            FROM is_gaji as a INNER JOIN is_users as b ON a.id_user=b.id_user ORDER BY id_gaji DESC")
            or die('Ada kesalahan pada query tampil Data gajih: '.mysqli_error($mysqli));

            // tampilkan data
            while ($data = mysqli_fetch_assoc($query)) {
              $gaji = format_rupiah($data['gaji_pokok']);
              $tunjangan = format_rupiah($data['tunjangan']);
              $uang_makan = format_rupiah($data['uang_makan']);

              // menampilkan isi tabel dari database ke tabel di aplikasi
              echo "<tr>
              <td width='30' class='center'>$no</td>
              <td width='300' class='center'>$data[id_gaji]</td>
              <td width='300' class='center'>$data[id_user]</td>
              <td width='300' class='center'>$data[nama_user]</td>
              <td width='300' class='center'>Rp. $gaji</td>
              <td width='200' class='center'>Rp. $tunjangan</td>
              <td width='200' class='center'>Rp. $uang_makan</td>
                    </tr>";
              $no++;
              $jml_gapok += $data["gaji_pokok"];
              $jml_tunjangan += $data["tunjangan"];
              $jml_uang_makan += $data["uang_makan"];
            }
            ?>
            </tbody>
            <tfoot>
            <tr>
            <th class="text-right" colspan="4">Total</th>
            <th class="text-center"><?php echo 'Rp. ' . number_format($jml_gapok, 0, ',', '.') . ',-' ?></th>
            <th class="text-center"><?php echo 'Rp. ' . number_format($jml_tunjangan, 0, ',', '.') . ',-' ?></th>
            <th class="text-center"><?php echo 'Rp. ' . number_format($jml_uang_makan, 0, ',', '.') . ',-' ?></th>
            </tr>
            </tfoot>
          </table>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!--/.col -->
  </div>   <!-- /.row -->
</section><!-- /.content