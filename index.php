<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Berita - Beebeenews</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">
    <style>
        /* Aturan dasar */
        body {
            margin: 0;
            padding: 0;
            font-family: 'Roboto', sans-serif; /* Pilihan font dari Google Fonts */
            background: url('yellow.jpeg') no-repeat center center fixed; /* Ganti dengan URL gambar latar belakang Anda */
            background-size: cover;
            color: #333;
            font-size: 18px;
        }

        /* Navigasi bar */
        .navbar {
            background-color: #FFD700; /* Warna latar belakang navigasi bar */
            padding: 10px;
            position: sticky;
            top: 0;
            width: 100%;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            display: flex;
            justify-content: space-between; /* Memastikan konten di kiri dan kanan terpisah */
            align-items: center;
        }

        .navbar a {
            color: black;
            text-decoration: none;
            padding: 14px 20px;
            font-size: 18px;
            display: inline-block;
        }

        .navbar a:hover {
            background-color: #FFC107; /* Warna latar belakang saat hover */
            border-radius: 4px;
        }

        .navbar .title {
            font-size: 24px;
            font-weight: bold;
        }

        /* Kontainer utama */
        .container {
            max-width: 1000px;
            margin: 50px auto;
            padding: 20px;
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            position: relative;
        }

        /* Kotak berita */
        .news-box {
            background: rgba(255, 255, 255, 0.9); /* Warna latar belakang putih dengan transparansi */
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            position: relative;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            height: 300px;
        }

        /* Judul berita */
        .news-box h2 {
            margin: 0;
            font-size: 24px;
            text-align: center;
            flex: 1;
        }

        /* Konten berita */
        .news-box p {
            flex: 2;
            overflow: auto;
            margin-bottom: 60px; /* Menyisakan ruang untuk info penulis, tanggal, dan tombol */
        }

        /* Info penulis dan tanggal */
        .news-box .info {
            position: absolute;
            bottom: 10px;
            right: 10px;
            font-size: 14px;
            color: #555;
        }

        /* Tombol edit dan hapus */
        .news-box .actions {
            position: absolute;
            bottom: 10px;
            left: 10px;
        }

        .news-box .actions a {
            background-color: #FFD700; /* Warna kuning untuk tombol */
            color: black;
            text-decoration: none;
            padding: 8px 12px;
            margin-left: 5px;
            border-radius: 4px;
            font-size: 14px;
            display: inline-block;
            border: 1px solid #ccc;
        }

        .news-box .actions a.edit {
            background-color: #4CAF50; /* Warna hijau untuk tombol edit */
        }

        .news-box .actions a.delete {
            background-color: #F44336; /* Warna merah untuk tombol hapus */
        }

        .news-box .actions a:hover {
            opacity: 0.8;
        }

        /* Tombol tambahkan data */
        .add-button {
            display: block;
            background-color: #FFD700; /* Warna kuning untuk tombol */
            border: none;
            color: black;
            padding: 15px 20px;
            text-align: center;
            text-decoration: none;
            font-size: 18px;
            margin: 20px 0;
            cursor: pointer;
            border-radius: 4px;
            text-align: center;
        }

        .add-button:hover {
            background-color: #FFC107; /* Warna kuning lebih terang saat hover */
        }

        /* Gambar lebah */
        .bee-icon {
            width: 400px; /* Atur ukuran gambar lebah */
            position: absolute;
            bottom: 20px;
            right: 20px;
            opacity: 0.6; /* Menambahkan transparansi */
        }
    </style>
</head>
<body>
    <!-- Navigasi bar -->
    <div class="navbar">
        <div class="navbar-links">
           
            <a href="createberita.php">Tambahkan Berita</a>
           
        </div>
        <div class="title">Beebeenews</div>
    </div>
    
    <!-- Konten berita -->
    <div class="container">
        <?php
        // Include koneksi ke database
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "berita1";
        $koneksi = new mysqli($servername, $username, $password, $dbname);

        if ($koneksi->connect_error) {
            die("Koneksi gagal: " . $koneksi->connect_error);
        }

        // Mengambil data dari tabel berita_isi
        $sql = "SELECT * FROM berita_isi";
        $result = $koneksi->query($sql);

        if ($result->num_rows > 0) {
            while ($dataBerita = $result->fetch_assoc()) {
                echo "<div class='news-box'>
                    <h2>{$dataBerita['judul']}</h2>
                    <p>{$dataBerita['berita']}</p>
                    <div class='info'>
                        Penulis: {$dataBerita['penulis']}<br>
                        Tanggal: {$dataBerita['tanggal_berita']}
                    </div>
                    <div class='actions'>
                        <a href='update.php?id={$dataBerita['id']}' class='edit'>Edit</a>
                        <a href='delete.php?id={$dataBerita['id']}' class='delete'>Hapus</a>
                    </div>
                </div>";
            }
        } else {
            echo "<p>Tidak ada berita yang ditemukan.</p>";
        }

        $koneksi->close();
        ?>
        <!-- Gambar Lebah -->
        <img src="bee.png" alt="Lebah" class="bee-icon"> <!-- Ganti dengan URL gambar lebah Anda -->
    </div>

</body>
</html>
