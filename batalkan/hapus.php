<?php
// Membuat koneksi ke database MySQL dengan menggunakan kredensial yang diberikan
$conn = mysqli_connect("localhost", "root", "", "jualmobil");

// Mengambil nilai 'kode_booking' dari parameter URL menggunakan variabel superglobal $_GET
$car = $_GET['kode_booking'];

// Membuat query SQL untuk menghapus sebuah data dari tabel 'booking' berdasarkan nilai 'kode_booking' yang diberikan
$delete = "DELETE FROM booking WHERE kode_booking='$car'";

// Menjalankan query delete menggunakan koneksi database yang sudah dibuat
mysqli_query($conn, $delete);

// Mengalihkan pengguna ke halaman 'batalkan.php' setelah proses penghapusan selesai
header('location: batalkan.php');
?>
