<?php
include "../../conf/conn.php";
$id_petugas = $_GET['id_petugas'];
$query = ("DELETE FROM petugas WHERE id_petugas ='$id_petugas'");
if(!mysqli_query($koneksi, "$query")){
die(mysqli_error($koneksi));
}else{
echo '<script>alert("Data Berhasil Dihapus !!!");
window.location.href="../../index.php?page=data_petugas"</script>';
}
?>