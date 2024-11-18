<?php
ob_start();
include "../../conf/conn.php";
require_once("../../plugins/dompdf/autoload.inc.php");

use Dompdf\Dompdf;
$dompdf = new Dompdf();
$id = isset($_GET['id']) ? mysqli_real_escape_string($koneksi, $_GET['id']) : '';

// Periksa apakah ID buku valid
if (!empty($id)) {
    $query = mysqli_query($koneksi, "SELECT * FROM kelas WHERE id_kelas='$id'");

    // Periksa apakah kueri berhasil dieksekusi
    if ($query) {
        $html = '<center><h3>Daftar Kelas</h3></center><hr/><br/>';
        $html .= '<table border="1" width="100%">
        <tr><th>No</th><th>Id Kelas</th><th>Nama Kelas</th><th>Kompetensi Keahlian</th></tr>';
        $no = 1;
        while ($row = mysqli_fetch_array($query)) {
            $html .= "<tr><td>" . $no . "</td><td>" . $row['id_kelas'] . "</td><td>" . $row['nama_kelas'] . "</td><td>" . $row['kompetensi_keahlian'] . "</td></tr>";
            $no++;
        }

        $html .= "</table>";
        $dompdf->loadHtml($html);
        // Setting ukuran dan orientasi kertas
        $dompdf->setPaper('A4', 'portrait');
        // Rendering dari HTML Ke PDF
        $dompdf->render();
        // Melakukan output file Pdf
        $dompdf->stream('laporan_Kelas.pdf');
    } else {
        // Kueri tidak berhasil dieksekusi
        echo "Terjadi kesalahan dalam mengambil data Kelas.";
    }
} else {
    // ID buku tidak valid atau tidak ada
    echo "ID siswa tidak valid atau tidak ada.";
}
?>