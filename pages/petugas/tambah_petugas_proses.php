<?php
include "../../conf/conn.php";
if($_POST)
{

$username      = $_POST['username'];
$password      = $_POST['password'];
$nama_petugas  = $_POST['nama_petugas'];
$level         = $_POST['level'];
$query = ("INSERT INTO petugas(id_petugas,username,password,nama_petugas,level) VALUES ('','".$username."','".$password."','".$nama_petugas."','".$level."')");
if(!mysqli_query($koneksi, "$query")){
die(mysqli_error($koneksi));
}else{
echo '<script>alert("Data Berhasil Ditambahkan !!!");
window.location.href="../../index.php?page=data_petugas"</script>';
}
}
?>