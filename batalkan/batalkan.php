<!DOCTYPE html>
<html>
<head>
    <title>Data Pembelian</title>
    <style>
        /* Gaya CSS untuk tampilan umum */
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }

        /* Gaya untuk judul halaman */
        h1 {
            text-align: center;
            padding: 20px;
            background-color: #333;
            color: #fff;
        }

        /* Gaya untuk wadah utama konten */
        .container {
            margin: 20px auto;
            max-width: 1000px;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
        }

        /* Gaya untuk tabel data pembelian */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        /* Gaya untuk baris data yang akan muncul dengan efek fadeIn */
        tbody tr {
            opacity: 0;
            animation: fadeIn 1s ease-in-out forwards;
        }

        /* Keyframes untuk efek fadeIn */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Gaya untuk baris data dengan latar belakang berbeda untuk setiap baris genap */
        tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        /* Gaya untuk tombol hapus */
        a {
            display: inline-block;
            padding: 5px 10px;
            background-color: #ff000069;
            color: #fff;
            text-decoration: none;
            border-radius: 3px;
        }

        a:hover {
            background-color: #ff0000;
        }

        /* Gaya untuk wadah video */
        .video-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            overflow: hidden;
        }

        /* Gaya untuk video sebagai background */
        video {
            object-fit: cover;
            width: 100%;
            height: 100%;
        }
    </style>
</head>
<body>
    <!-- Wadah untuk video sebagai background -->
    <div class="video-container">
        <video autoplay loop muted>
            <!-- Ubah "86.mp4" menjadi nama file video yang sesuai -->
            <source src="865.mp4" type="video/mp4">
            <!-- Tambahkan format video lain jika diperlukan -->
        </video>
    </div>
    <!-- Judul halaman -->
    <h1>Data pembelian GT86</h1>
    <!-- Kontainer utama konten -->
    <div class="container">
        <!-- Back button -->
        <a href="../home.html">Back</a>

        <!-- Tabel untuk menampilkan data pembelian -->
        <table>
            <thead>
                <!-- Header tabel -->
                <tr>
                    <th>kode</th>
                    <th>ID Mobil</th>
                    <th>Tanggal</th>
                    <th>Jumlah</th>
                    <th>Warna</th>
                    <th>Status</th>
                    <th>Email</th>
                    <th>Opsi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    /* Koneksi ke database */
                    $conn = mysqli_connect("localhost", "root", "", "jualmobil");
                    /* Query untuk mengambil data pembelian */
                    $sql = "SELECT * FROM booking";
                    $query = mysqli_query($conn, $sql);
                    $delay = 0;

                    /* Loop untuk menampilkan data pembelian dalam tabel */
                    while($car = mysqli_fetch_array($query)){
                        echo "<tr style='animation-delay: ".($delay * 0.1)."s;'>";

                        /* Kolom data */
                        echo "<td>".$car['kode_booking']."</td>";
                        echo "<td>".$car['id_mobil']."</td>";
                        echo "<td>".$car['tgl_beli']."</td>";
                        echo "<td>".$car['jumlah']."</td>";
                        echo "<td>".$car['warna']."</td>";
                        echo "<td>".$car['status']."</td>";
                        echo "<td>".$car['email']."</td>";

                        /* Kolom untuk tombol hapus dengan parameter kode_booking */
                        echo "<td>";
                        echo "<a href='hapus.php?kode_booking=".$car['kode_booking']."'>Hapus</a>";
                        echo "</td>";

                        echo "</tr>";

                        $delay++;
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>
