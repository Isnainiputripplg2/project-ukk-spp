<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      DATA SISWA
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> HOME</a></li>
        <li class="active">DATA SISWA</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header">
          <a href="index.php?page=tambah_siswa" class="btn btn-primary" role="button" title="Tambah Data"><i class="glyphicon glyphicon-plus"></i> TAMBAH</a>
          <a href="pages/siswa/report.php" class="btn btn-success" role="button" title="Print Data"><i class="glyphicon glyphicon-print"></i> PRINT</a>
          </div>
            <div class="box-body table-responsive">
              <table id="siswa" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>NISN</th>
                  <th>NIS</th>
                  <th>NAMA</th>
                  <th>ID KELAS</th>
                  <th>ALAMAT</th>
                  <th>NO TELP</th>
                  <th>ID SPP</th>
                  <th>AKSI</th>
                </tr>
                </thead>
                <tbody>

                <?php
                include "conf/conn.php";
                $no=0;
                $query=mysqli_query($koneksi,"SELECT * FROM siswa ORDER BY nisn DESC")
                or die(mysqli_error($koneksi));
                while ($row=mysqli_fetch_array($query))
                {
                ?>

                <tr>
                  <td><?php echo $no=$no+1;?></td>
                  <td><?php echo $row['nisn'];?></td>
                  <td><?php echo $row['nis'];?></td>
                  <td><?php echo $row['nama'];?></td>
                  <td><?php echo $row['id_kelas'];?></td>
                  <td><?php echo $row['alamat'];?></td>
                  <td><?php echo $row['no_telp'];?></td>
                  <td><?php echo $row['id_spp'];?></td>
                  <td>
                    <a href="index.php?page=ubah_siswa&id=<?=$row['nisn'];?>" class="btn btn-success" role="button" title="Ubah Data"><i class="glyphicon glyphicon-edit"></i></a>
                    <a href="javascript:void(0);" class="btn btn-danger" role="button" title="Hapus Data" onclick="hapusSiswa(<?=$row['nisn'];?>);"><i class="glyphicon glyphicon-trash"></i></a>
                    <a href="pages/siswa/cetak.php?id=<?=$row['nisn'];?>" class="btn btn-warning" role="button" title="Cetak Data"><i class="glyphicon glyphicon-print"></i></a>
                  </td>
                </tr>
                <?php } ?>

                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
<!-- /.content-wrapper -->

<!-- Javascript Datatable -->
<script type="text/javascript">
  $(document).ready(function(){
    $('#siswa').DataTable();
  });

  function hapusMahasiswa(id) {
    if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
      window.location.href = "pages/siswa/hapus_siswa.php?id=" + id;
    }
  }
</script>

