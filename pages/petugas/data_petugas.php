<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      DATA PETUGAS
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> HOME</a></li>
        <li class="active">DATA PETUGAS</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
      <div class="box box-primary">
        <div class="box-header">
          <a href="index.php?page=tambah_petugas" class="btn btn-primary" role="button" title="Tambah Data"><i class="glyphicon glyphicon-plus"></i> TAMBAH</a>
          <a href="pages/petugas/report.php" class="btn btn-success" role="button" title="Print Data"><i class="glyphicon glyphicon-print"></i> PRINT</a>
          </div>
            <div class="box-body table-responsive">
              <table id="petugas" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>No</th>
                  <th>USERNAME</th>
                  <th>PASSWORD</th>
                  <th>NAMA PETUGAS</th>
                  <th>LEVEL</th>
                  <th>AKSI</th>
                </tr>
                </thead>
                <tbody>

                <?php
                include "conf/conn.php";
                $no=0;
                $query=mysqli_query($koneksi,"SELECT * FROM petugas ORDER BY id_petugas DESC")
                or die(mysqli_error($koneksi));
                while ($row=mysqli_fetch_array($query))
                {
                ?>

                <tr>
                  <td><?php echo $no=$no+1;?></td>
                  <td><?php echo $row['username'];?></td>
                  <td><?php echo $row['password'];?></td>
                  <td><?php echo $row['nama_petugas'];?></td>
                  <td><?php echo $row['level'];?></td>
                  <td>
                    <a href="index.php?page=ubah_petugas&id_petugas=<?=$row['id_petugas'];?>" class="btn btn-success" role="button" title="Ubah Data"><i class="glyphicon glyphicon-edit"></i></a>
                    <a href="javascript:void(0);" class="btn btn-danger" role="button" title="Hapus Data" onclick="hapuspetugas(<?=$row['id_petugas'];?>);"><i class="glyphicon glyphicon-trash"></i></a>
                    <a href="pages/cetak.php?id=<?=$row['id_petugas'];?>" class="btn btn-warning" role="button" title="Cetak Data"><i class="glyphicon glyphicon-print"></i></a>
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
    $('#petugas').DataTable();
  });

  function hapuspetugas(id_petugas) {
    if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
      window.location.href = "pages/petugas/hapus_petugas.php?id_petugas=" + id_petugas;
    }
  }
</script>

