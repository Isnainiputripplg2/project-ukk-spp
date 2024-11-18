<?php
ob_start();
include "../conf/conn.php";
require_once("../plugins/dompdf/autoload.inc.php");

use Dompdf\Dompdf;

$dompdf = new Dompdf();
//$id = $_GET['id'];
$query = mysqli_query($koneksi, "select * from siswa");

$html = '<center><h3>Daftar Data Siswa</h3></center><hr/><br/>';
$html .= '<table border="1" width="100%">
  <tr>
  <th>No</th>
  <th>Nisn</th>
  <th>Nis</th>
  <th>Nama</th>
  <th>Id Kelas</th>
  <th>Alamat</th>
  <th>No Telp</th>
  <th>Id SPP</th>
  </tr>';
$no = 1;
while ($row = mysqli_fetch_array($query)) {
  $html .= "<tr><td>" . $no . "</td><td>" . $row['nisn'] . "</td><td>" . $row['nis'] . "</td><td>" . $row['nama'] . "</td><td>" . $row['id_kelas'] . "</td><td>" . $row['alamat'] . "</td><td>" . $row['no_telp'] . "</td><td>" . $row['id_spp'] . "</td></tr>";
  $no++;
}

$html .= "</html>";
$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'potrait');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream('laporan_siswa.pdf');
