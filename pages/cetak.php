<?php
ob_start();
include "../conf/conn.php";
require_once("../plugins/dompdf/autoload.inc.php");

use Dompdf\Dompdf;
$dompdf = new Dompdf();
$id = isset($_GET['id']) ? mysqli_real_escape_string($koneksi, $_GET['id']) : '';

// Periksa apakah ID buku valid
if (!empty($id)) {
    $query = mysqli_query($koneksi, "SELECT * FROM siswa WHERE nisn='$id'");

    // Periksa apakah kueri berhasil dieksekusi
    if ($query) {
        $html = '<center><h3>Daftar Nama Siswa</h3></center><hr/><br/>';
        $html .= '<table border="1" width="100%">
        <tr><th>No</th><th>Nisn</th><th>Nis</th><th>Nama</th><th>Id_Kelas</th><th>Alamat</th><th>NO Telp</th><th>Id_SPP</th></tr>';
        $no = 1;
        while ($row = mysqli_fetch_array($query)) {
            $html .= "<tr><td>" . $no . "</td><td>" . $row['nisn'] . "</td><td>" . $row['nis'] . "</td><td>" . $row['nama'] . "</td><td>" . $row['id_kelas'] . "</td><td>" . $row['alamat'] . "</td><td>" . $row['no_telp'] . "</td><td>" . $row['id_spp'] . "</td></tr>";
            $no++;
        }

        $html .= "</table>";
        $dompdf->loadHtml($html);
        // Setting ukuran dan orientasi kertas
        $dompdf->setPaper('A4', 'portrait');
        // Rendering dari HTML Ke PDF
        $dompdf->render();
        // Melakukan output file Pdf
        $dompdf->stream('laporan_buku.pdf');
    } else {
        // Kueri tidak berhasil dieksekusi
        echo "Terjadi kesalahan dalam mengambil data Siswa.";
    }
} else {
    // ID buku tidak valid atau tidak ada
    echo "ID siswa tidak valid atau tidak ada.";
}
?>