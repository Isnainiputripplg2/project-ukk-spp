<?php
$query = mysqli_query($koneksi, "SELECT * FROM kelas WHERE id_kelas='".$_GET['id']."'")
or die(mysqli_error($koneksi));
$row = mysqli_fetch_array($query);
?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      UBAH KELAS
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> HOME</a></li>
        <li class="active">UBAH KELAS</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-12">
          <!-- general form elements -->
          <div class="box box-primary">
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" action="pages/kelas/ubah_kelas_proses.php">
              <div class="box-body">
                <input type="hidden" name="id" value="<?php echo $row['id_kelas']; ?>">
                <div class="form-group">
                  <label>Nama Kelas</label>
                  <input type="text" name="nama_kelas" class="form-control" placeholder="Nama Kelas" value="<?php echo $row['nama_kelas']; ?>" required>
                </div>
                <div class="form-group">
                  <label>Kompetensi Keahlian</label>
                  <input type="text" name="kompetensi_keahlian" class="form-control" placeholder="Kompetensi Keahlian" value="<?php echo $row['kompetensi_keahlian']; ?>" required>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-primary" title="Simpan Data"> <i class="glyphicon glyphicon-floppy-disk"></i> Simpan</button>
              </div>
            </form>
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
<!-- /.content-wrapper -->