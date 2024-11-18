<?php
include "../../conf/conn.php";
if($_POST)
{
$nama_kelas = $_POST['nama_kelas'];
$kompetensi_keahlian = $_POST['kompetensi_keahlian'];
$query = ("INSERT INTO kelas(id_kelas,nama_kelas,kompetensi_keahlian) VALUES ('','".$nama_kelas."','".$kompetensi_keahlian."')");
if(!mysqli_query($koneksi, "$query")){
die(mysqli_error($koneksi));
}else{
echo '<script>alert("Data Berhasil Ditambahkan !!!");
window.location.href="../../index.php?page=data_kelas"</script>';
}
}
?>