<?php
ob_start();
include "../../conf/conn.php";
require_once("../../plugins/dompdf/autoload.inc.php");

use Dompdf\Dompdf;
$dompdf = new Dompdf();
$id = isset($_GET['id']) ? mysqli_real_escape_string($koneksi, $_GET['id']) : '';

// Periksa apakah ID buku valid
if (!empty($id)) {
    $query = mysqli_query($koneksi, "SELECT * FROM pembayaran WHERE id_pembayaran='$id'");

    // Periksa apakah kueri berhasil dieksekusi
    if ($query) {
        $html = '<center><h3>Data Pembayaran SPP</h3></center><hr/><br/>';
        $html .= '<table border="1" width="100%">
        <tr><th>No</th><th>Id Pembayaran</th><th>Id Petugas</th><th>Nisn</th><th>Tgl Bayar</th><th>Bulan Bayar</th><th>Tahun Bayar</th><th>Id SPP</th><th>Jumlah Bayar</th></tr>';
        $no = 1;
        while ($row = mysqli_fetch_array($query)) {
            $html .= "<tr><td>" . $no . "</td><td>" . $row['id_pembayaran'] . "</td><td>" . $row['id_petugas'] . "</td><td>" . $row['nisn'] . "</td><td>" . $row['tgl_bayar'] . "</td><td>" . $row['bulan_dibayar'] . "</td><td>" . $row['tahun_bayar'] . "</td><td>" . $row['nama'] . "</td><td>" . $row['id_spp'] . "</td><td>" . $row['jumlah_bayar'] . "</td></tr>";
            $no++;
        }

        $html .= "</table>";
        $dompdf->loadHtml($html);
        // Setting ukuran dan orientasi kertas
        $dompdf->setPaper('A4', 'portrait');
        // Rendering dari HTML Ke PDF
        $dompdf->render();
        // Melakukan output file Pdf
        $dompdf->stream('laporan_Pembayaran SPP.pdf');
    } else {
        // Kueri tidak berhasil dieksekusi
        echo "Terjadi kesalahan dalam mengambil data Pembayaran.";
    }
} else {
    // ID buku tidak valid atau tidak ada
    echo "ID Pembayaran tidak valid atau tidak ada.";
}
?>