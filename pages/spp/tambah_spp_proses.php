<?php
include "../../conf/conn.php";
if($_POST)
{
$nama_kelas = $_POST['tahun'];
$kompetensi_keahlian = $_POST['nominal'];
$query = ("INSERT INTO spp(id_spp,tahun,nominal) VALUES ('','".$nama_kelas."','".$kompetensi_keahlian."')");
if(!mysqli_query($koneksi, "$query")){
die(mysqli_error($koneksi));
}else{
echo '<script>alert("Data Berhasil Ditambahkan !!!");
window.location.href="../../index.php?page=data_spp"</script>';
}
}
?>