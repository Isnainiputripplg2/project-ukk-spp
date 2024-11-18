<?php
ob_start();
include "../../conf/conn.php";
require_once("../../plugins/dompdf/autoload.inc.php");

use Dompdf\Dompdf;

$dompdf = new Dompdf();
//$id = $_GET['id'];
$query = mysqli_query($koneksi, "select * from kelas");

$html = '<center><h3>Daftar Data Kelas</h3></center><hr/><br/>';
$html .= '<table border="1" width="100%">
  <tr>
  <th>No</th>
  <th>Id Kelas</th>
  <th>Kelas</th>
  <th>Kompetensi Keahlian</th>
  </tr>';
$no = 1;
while ($row = mysqli_fetch_array($query)) {
  $html .= "<tr><td>" . $no . "</td><td>" . $row['id_kelas'] . "</td><td>" . $row['kelas'] . "</td><td>" . $row['kompetensi_keahlian'] . "</td></tr>";
  $no++;
}

$html .= "</html>";
$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'potrait');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream('laporan_kelas.pdf');
