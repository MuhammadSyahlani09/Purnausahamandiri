<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <i class="fa fa-user icon-title"></i> Teknisi

    <a class="btn btn-primary btn-social pull-right" href="?module=form_teknisi&form=add" title="Tambah Data" data-toggle="tooltip">
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
              Data user baru berhasil disimpan.
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
                <th class="center">ID Teknisi</th>
                <th class="center">Nama Teknisi</th>
                <th class="center">Email</th>
                <th class="center">Telepon</th>
              </tr>
            </thead>
            <!-- tampilan tabel body -->
            <tbody>
            <?php  
            $no = 1;
            /// fungsi query untuk menampilkan data dari tabel user
            $query = mysqli_query($mysqli, "SELECT * FROM is_teknisi ORDER BY id_teknisi DESC")
                                            or die('Ada kesalahan pada query tampil data Teknisi: '.mysqli_error($mysqli));

            // tampilkan data
            while ($data = mysqli_fetch_assoc($query)) { 
            // menampilkan isi tabel dari database ke tabel di aplikasi
              echo "<tr>
                      <td width='50' class='center'>$no</td>
                      <td>$data[id_teknisi]</td>
                      <td>$data[nama_teknisi]</td>
                      <td>$data[email]</td>
                      <td>$data[telepon]</td>
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