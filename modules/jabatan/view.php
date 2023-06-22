<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <i class="fa fa-user icon-title"></i> Teknisi

    <a class="btn btn-primary btn-social pull-right" href="?module=form_jabatan&form=add" title="Tambah Data" data-toggle="tooltip">
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
    // tampilkan pesan Sukses "Data user baru berhasil disimpan"
    elseif ($_GET['alert'] == 1) {
      echo "<div class='alert alert-success alert-dismissable'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4>  <i class='icon fa fa-check-circle'></i> Sukses!</h4>
              Data Jabatan baru berhasil disimpan.
            </div>";
    }
    ?>

      <div class="box box-primary">
        <div class="box-body">
          <!-- tampilan tabel user -->
          <table id="dataTables1" class="table table-bordered table-striped table-hover">
            <!-- tampilan tabel header -->
            <thead>
              <tr>
                <th class="center">No.</th>
                <th class="center">Jabatan</th>
                <th class="center">Gaji Pokok</th>
                <th class="center">Uang Transportasi</th>
                <th class="center">Uang Makan</th>
              </tr>
            </thead>
            <!-- tampilan tabel body -->
            <tbody>
            <?php  
            $no = 1;
            /// fungsi query untuk menampilkan data dari tabel user
            $query = mysqli_query($mysqli, "SELECT * FROM tb_jabatan ORDER BY id_jabatan DESC")
                                            or die('Ada kesalahan pada query tampil data Teknisi: '.mysqli_error($mysqli));

            // tampilkan data
            while ($data = mysqli_fetch_assoc($query)) {
              $gaji_pokok = format_rupiah($data['gaji_pokok']);
              $transport = format_rupiah($data['transport']);
              $uang_makan = format_rupiah($data['uang_makan']);
            // menampilkan isi tabel dari database ke tabel di aplikasi
              echo "<tr>
                      <td width='100' class='center'>$no</td>
                      <td width='230' class='center'>$data[jabatan]</td>
                      <td width='300' class='center'>Rp. $gaji_pokok</td>
              <td width='200' class='center'>Rp. $transport</td>
              <td width='200' class='center'>Rp. $uang_makan</td>
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