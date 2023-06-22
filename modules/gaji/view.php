<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    <i class="fa fa-sign-in icon-title"></i> Data Gaji

    <a class="btn btn-primary btn-social pull-right" href="?module=form_gaji&form=add" title="Tambah Data" data-toggle="tooltip">
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
              Data brg Masuk berhasil disimpan.
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
                <th class="center">Kode Gajih</th>
                <th class="center">Kode Pegawai</th>
                <th class="center">Nama Pegawai</th>   
                <th></th>             
              </tr>
            </thead>
            <!-- tampilan tabel body -->
            <tbody>
            <?php  
            $no = 1;
            $jml_gapok = 0;
            $jml_tunjangan = 0;
            $jml_uang_makan = 0;
            // fungsi query untuk menampilkan data dari tabel
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
                      <td width='100' class='center'>$data[id_gaji]</td>
                      <td width='80' class='center'>$data[id_user]</td>
                      <td width='100' class='center'>$data[nama_user]</td>
                      <td class='center' width='80'>
                        <div>                         
                          "?>
                          <a data-toggle="tooltip" data-placement="top" title="Hapus" class="btn btn-danger btn-sm" href="modules/gaji/proses.php?act=delete&id=<?php echo $data['id_gaji'];?>" onclick="return confirm('Anda yakin ingin menghapus data Gajih <?php echo $data['id_gaji']; ?> ?');">
                              <i style="color:#fff" class="glyphicon glyphicon-trash"></i>
                          </a>
            <?php
              echo "    </div>
                      </td>
                    </tr>";
              $no++;
              $jml_gapok += $data["gaji_pokok"];
              $jml_tunjangan += $data["tunjangan"];
              $jml_uang_makan += $data["uang_makan"];
            }
            ?>
            </tbody>
            
          </table>
        </div><!-- /.box-body -->
      </div><!-- /.box -->
    </div><!--/.col -->
  </div>   <!-- /.row -->
</section><!-- /.content