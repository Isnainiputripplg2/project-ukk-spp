<?php

$koneksi = mysqli_connect("localhost", "root", "", "spp");

if ($koneksi) {
  // echo "koneksi berhasil";
} else {
  echo "Koneksi gagal: " . mysqli_connect_error();
}
