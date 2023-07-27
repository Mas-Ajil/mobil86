<?php
session_start(); // Memulai session untuk penggunaan session pada halaman ini
error_reporting(0); // Menonaktifkan laporan error untuk menghindari tampilan error di halaman
include('config.php'); // Memasukkan file konfigurasi untuk koneksi database

// Mengambil data dari form registrasi yang dikirimkan melalui metode POST
$fname = $_POST['fullname']; // Nama lengkap dari form
$email = $_POST['emailid']; // Alamat email dari form
$mobile = $_POST['mobileno']; // Nomor telepon dari form
$alamat = $_POST['alamat']; // Alamat dari form
$pass = $_POST['pass']; // Password dari form
$conf = $_POST['conf']; // Konfirmasi password dari form


// Memeriksa apakah konfirmasi password sama dengan password yang dimasukkan
if ($conf != $pass) {
    echo "<script>alert('Password tidak sama!');</script>"; // Menampilkan pesan alert jika konfirmasi password tidak cocok
    echo "<script type='text/javascript'> document.location = 'regist.php'; </script>"; // Mengalihkan ke halaman registrasi kembali
} else {
    // Mengecek apakah alamat email yang diinputkan sudah terdaftar dalam database
    $sqlcek = "SELECT email FROM users WHERE email='$email'";
    $querycek = mysqli_query($koneksidb, $sqlcek);
    if (mysqli_num_rows($querycek) > 0) {
        echo "<script>alert('Email sudah terdaftar, silahkan gunakan email lain!');</script>"; // Menampilkan pesan alert jika email sudah terdaftar
        echo "<script type='text/javascript'> document.location = 'regist.php'; </script>"; // Mengalihkan ke halaman registrasi kembali
    } else {
        $password = ($_POST['pass']); 
        // Menyimpan data user ke dalam database setelah melewati validasi
        $sql1 = "INSERT INTO users(nama_user,email,telp,password,alamat) VALUES('$fname','$email','$mobile','$password','$alamat')";
        $lastInsertId = mysqli_query($koneksidb, $sql1);
        if ($lastInsertId) {
            echo "<script>alert('Registrasi berhasil. Sekarang anda bisa login.');</script>"; // Menampilkan pesan alert jika registrasi berhasil
            echo "<script type='text/javascript'> document.location = '../halamanAwal.html'; </script>"; // Mengalihkan ke halaman login
        } else {
            echo "<script>alert('Ops, terjadi kesalahan. Silahkan coba lagi.');</script>"; // Menampilkan pesan alert jika terjadi kesalahan saat menyimpan data ke database
            echo "<script type='text/javascript'> document.location = 'regist.php'; </script>"; // Mengalihkan ke halaman registrasi kembali
        }
    }
}
?>
