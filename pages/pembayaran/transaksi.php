<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
<h1>
PEMBAYARAN SPP
</h1>
<ol class="breadcrumb">
<li><a href="index.php"><i class="fa fa-dashboard"></i> HOME</a></li>
<li class="active">PEMBAYARAN SPP</li>
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
<form role="form" method="post"
action="pages/pembayaran/proses_bayar.php">
<div class="box-body">
<div class="form-group">
    <label>Id Petugas</label>
    <input type="number" name="id_petugas" class="form-control" placeholder="Id Petugas" readonly>
</div>
<div class="form-group">
<label>NISN</label>
<input type="text" name="nisn" id="id" class="form-control 
pencarian" placeholder="NISN Siswa" required>
</div>
<div class="form-group">
    <label>Tanggal Bayar</label>
    <input type="date" name="tgl_bayar" class="form-control" placeholder="Tanggal Bayar" required>
</div>
<div class="input-group mb-3">
              <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect01">Bulan Bayar</label>
              </div>
              <select class="form-control" name= "bulan_dibayar" id="inputGroupSelect01">
                <option selected>--pilih bulan--</option>
                <option value="januari">Januari</option>
                <option value="februari">Februari</option>
                <option value="maret">Maret</option>
                <option value="januari">April</option>
                <option value="februari">Mei</option>
                <option value="maret">Juni</option>
                <option value="januari">Juli</option>
                <option value="februari">Agustus</option>
                <option value="maret">September</option>
                <option value="januari">oktober</option>
                <option value="februari">november</option>
                <option value="maret">desember</option>
              </select>
            </div>

            <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <label class="input-group-text" for="inputGroupSelect01">Tahun Bayar</label>
                </div>
                <select class="form-control" name="tahun_dibayar" id="inputGroupSelect01">
                  <option selected>--pilih tahun--</option>
                  <option value="2021">2021</option>
                  <option value="2022">2022</option>
                  <option value="2023">2023</option>
                </select>
              </div>
        
<div class="form-group">
<label>Nama Siswa</label>
<input type="text" id="nama" name="nama" class="form-control"
placeholder="Nama Siswa" readonly>
</div>
<div class="form-group">
<label>ID SPP</label>
<input type="number" id="harga" name="id_spp" class="formcontrol" placeholder="Id SPP" readonly>
</div>
<div class="form-group">
<label>Jumlah</label>
<input type="number" name="jumlah_bayar" class="form-control" placeholder="Jumlah Bayar" required>
</div>
</div>
<!-- /.box-body -->
<div class="box-footer">
<button type="submit" class="btn btn-primary" title="Simpan 
Data"> <i class="glyphicon glyphicon-floppy-disk"></i> BAYAR</button>
</div>
</form>
</div>
<div class="modal fade" id="myModal" role="dialog">
<div class="modal-dialog">
<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" datadismiss="modal">&times;</button>
<h4 class="modal-title">DATA SISWA</h4>
</div>
<div class="modal-body">
<table id="produk" class="table table-bordered">
<thead>
<tr>
<th>NISN</th>
<th>NAMA SISWA</th>
<th>ID SPP</th>
</tr>
</thead>
<tbody>
<?php
include "conf/conn.php";
$no=0;
$query=mysqli_query($koneksi,
"SELECT * FROM siswa ORDER BY nisn DESC");
while ($row=mysqli_fetch_array($query))
{
?>
<tr class="pilih" data-id="<?php echo $row['nisn'];?>" data-barang="<?php echo $row['nama'];?>" data-harga="<?php echo
$row['id_spp'];?>">
<td><?php echo $row['nisn']; //echo $no=$no+1;?></td>
<td><?php echo $row['nama'];?></td>
<td><?php echo $row['id_spp'];?></td>
</tr>
<?php } ?>
</tbody>
</table>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>
<!-- /.box -->
</div>
</div>
</section>
<!-- /.content -->
<!-- /.content-wrapper -->
<script type="text/javascript">
$(document).ready(function(){
$(".pencarian").focusin(function() {
$("#myModal").modal('show'); // ini fungsi untuk menampilkan modal
});
$('#produk').DataTable(); 
});
$(document).on('click', '.pilih', function (e) {
document.getElementById("id").value = $(this).attr('data-id');
document.getElementById("nama").value = $(this).attr('data-barang');
document.getElementById("harga").value = $(this).attr('data-harga');
$('#myModal').modal('hide');
});
</script>
