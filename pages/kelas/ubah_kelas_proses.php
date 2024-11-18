<?php
include "../../conf/conn.php";
if($_POST)
{
$id = $_POST['id'];
$nama_kelas = $_POST['nama_kelas'];
$kompetensi_Keahlian = $_POST['kompetensi_keahlian'];
$query = ("UPDATE mahasiswa SET nama_kelas='$nama_kelas',kompetensi_keahlian='$kompetensi_keahlian' WHERE id_kelas ='$id'");
if(!mysqli_query($koneksi, "$query")){
die(mysqli_error($koneksi));
}else{
echo '<script>alert("Data Berhasil Diubah !!!");
window.location.href="../../index.php?page=data_kelas"</script>';
}
}
?>