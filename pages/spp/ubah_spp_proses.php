<?php
include "../../conf/conn.php";
if($_POST)
{
$id = $_POST['id'];
$nama_kelas = $_POST['tahun'];
$kompetensi_Keahlian = $_POST['nominal'];
$query = ("UPDATE spp SET tahun='$nama_kelas',nominal='$kompetensi_keahlian' WHERE id_spp ='$id'");
if(!mysqli_query($koneksi, "$query")){
die(mysqli_error($koneksi));
}else{
echo '<script>alert("Data Berhasil Diubah !!!");
window.location.href="../../index.php?page=data_spp"</script>';
}
}
?>