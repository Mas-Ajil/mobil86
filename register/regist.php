<!DOCTYPE HTML>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
  <title>Portal Registrasi</title>

  <!-- Styles -->
  <style>
    /* Pengaturan tampilan umum untuk halaman */
    body {
      font-family: Arial, sans-serif; /* Font teks untuk halaman */
      margin: 0;
      padding: 0;
      overflow: hidden; /* Mencegah tampilan luar kotak dari video latar belakang */
      background-color: #f2f2f2; /* Warna latar belakang halaman */
    }

    /* Video latar belakang */
    #video-bg {
      position: fixed; /* Memastikan video tetap berada di posisi tetap */
      right: 0;
      bottom: 0;
      min-width: 100%;
      min-height: 100%;
      width: auto;
      height: auto;
      z-index: -1; /* Menempatkan video di belakang semua konten */
    }

    /* Kotak form registrasi */
    .container {
      position: relative; /* Mengatur posisi relatif untuk menentukan animasi masuk */
      z-index: 1; /* Menempatkan kotak di atas video latar belakang */
      max-width: 400px; /* Lebar maksimum kotak form */
      margin: auto; /* Pusatkan kotak secara horizontal */
      padding: 15px;
      background-color: rgba(255, 255, 255, 0.5); /* Memberikan latar belakang transparan untuk konten */
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Bayangan pada kotak */
      border-radius: 10px; /* Melengkungkan sudut-sudut kotak */
      animation: slideIn 1s ease; /* Animasi masuknya form dengan durasi 1 detik dan fungsi easing */
    }

    /* Animasi untuk masuknya form */
    @keyframes slideIn {
      0% {
        opacity: 0; /* Transparansi dimulai dari nol */
        transform: translateY(-20px); /* Mulai muncul dari posisi terangkat sedikit ke atas */
      }
      100% {
        opacity: 1; /* Transparansi mencapai maksimum sehingga kotak terlihat sepenuhnya */
        transform: translateY(0); /* Posisi kembali normal */
      }
    }

    /* Pengaturan tampilan form */
    form {
      display: flex; /* Mengatur tampilan elemen dalam bentuk baris */
      flex-direction: column; /* Mengatur tata letak elemen dalam kolom */
    }

    /* Pengaturan tampilan input, textarea, dan file */
    form input[type="text"],
    form input[type="number"],
    form input[type="email"],
    form input[type="password"],
    form input[type="file"],
    form textarea {
      margin-bottom: 10px; /* Ruang antara elemen-elemen input */
      padding: 10px; /* Ruang di dalam elemen input */
      border: 1px solid #ccc; /* Garis tepi elemen input */
      border-radius: 4px; /* Melengkungkan sudut-sudut elemen input */
    }

    /* Pengaturan tampilan checkbox */
    form input[type="checkbox"] {
      margin-right: 5px; /* Ruang antara checkbox dan label */
    }

    /* Pengaturan tampilan label */
    form label {
      font-size: 14px; /* Ukuran teks pada label */
    }

    /* Pengaturan tampilan tombol submit */
    form input[type="submit"] {
      padding: 10px; /* Ruang di dalam tombol submit */
      background-color: #007bff; /* Warna latar belakang tombol */
      color: #fff; /* Warna teks pada tombol */
      border: none; /* Hilangkan garis tepi tombol */
      border-radius: 4px; /* Melengkungkan sudut-sudut tombol */
      cursor: pointer; /* Ubah kursor saat diarahkan ke tombol */
    }

    form input[type="submit"]:hover {
      background-color: #0056b3; /* Warna latar belakang tombol saat diarahkan */
    }

    /* Pengaturan tampilan link */
    a {
      color: #007bff; /* Warna teks pada link */
      text-decoration: none; /* Hilangkan garis bawah pada link */
    }

    a:hover {
      text-decoration: underline; /* Tampilkan garis bawah pada link saat diarahkan */
    }

    /* Pengaturan tampilan judul form */
    h6 {
      font-size: 24px; /* Ukuran teks judul form */
      margin-bottom: 20px; /* Ruang di bawah judul */
      text-align: center; /* Pusatkan judul secara horizontal */
    }

   
  </style>

</head>

<body>
  <!-- Video Background -->
  <video autoplay loop muted playsinline id="video-bg">
    <source src="86.mp4" type="video/mp4">
    <!-- Jika video dalam format lain, tambahkan source sesuai format tersebut -->
  </video>

  <!-- Konten Form Registrasi -->
  <div class="container">
    <h6 align="center">Registrasi User</h6>
    <div class="user_profile_info">
      <div class="col-md-12 col-sm-10">
        <form method="post" name="theform" action="registact.php" id="theform" onSubmit="return checkLetter(this);" enctype="multipart/form-data">
          <input type="text" name="fullname" placeholder="Nama Lengkap" required>
          <input type="number" name="mobileno" placeholder="Nomer Telepon" minlength="10" maxlength="15" required>
          <input type="email" name="emailid" id="emailid" onBlur="checkAvailability()" placeholder="Alamat Email" required>
          <span id="user-availability-status" style="font-size: 12px;"></span>
          <input type="text" name="alamat" placeholder="Alamat" required>
          <input type="password" name="pass" placeholder="Password" required>
          <input type="password" name="conf" placeholder="Konfirmasi Password" required>
          <input type="checkbox" id="terms_agree" required checked>
          <label for="terms_agree" align='center'>Saya Setuju dengan <a href="#">Syarat dan Ketentuan yang berlaku</a></label>
          <input type="submit" value="Sign Up">
        </form>
      </div>
    </div>
  </div>

  <!-- Scripts -->
  <!-- ... (kode scripts dan styles yang lain) ... -->
</body>

</html>
