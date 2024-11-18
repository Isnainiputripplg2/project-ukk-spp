<?php
include "../../conf/conn.php";
if($_POST)
{
$id_petugas     = $_POST['id_petugas'];
$username       = $_POST['username'];
$password       = $_POST['password'];
$nama_petugas   = $_POST['nama_petugas'];
$level          = $_POST['level'];
$query = ("UPDATE petugas SET username='$username',password='$password',nama_petugas='$nama_petugas',level='$level' WHERE id_petugas ='$id_petugas'");
if(!mysqli_query($koneksi, "$query")){
die(mysqli_error($koneksi));
}else{
echo '<script>alert("Data Berhasil Diubah !!!");
window.location.href="../../index.php?page=data_petugas"</script>';
}
}
?>