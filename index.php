<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Berita - Beebeenews</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap">
    <!-- Tailwind CSS CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-yellow-100 text-gray-800 font-roboto">
    <!-- Navigasi bar -->
    <div class="navbar bg-yellow-500 sticky top-0 w-full shadow-md z-50 flex justify-between items-center p-3">
        <div class="navbar-links">
            <a href="createberita.php" class="text-black text-lg px-4 py-2 hover:bg-yellow-600 rounded">Tambahkan Berita</a>
        </div>
        <div class="title text-2xl font-bold text-black">Beebeenews</div>
    </div>
    
    <!-- Konten berita -->
    <div class="container mx-auto mt-12 p-4 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 relative">
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
                echo "<div class='news-box bg-white bg-opacity-90 p-6 rounded-lg shadow-lg flex flex-col h-80 relative'>
                    <h2 class='text-xl font-semibold text-center mb-4'>{$dataBerita['judul']}</h2>
                    <p class='flex-1 overflow-auto mb-16'>{$dataBerita['berita']}</p>
                    <div class='info absolute bottom-2 right-2 text-sm text-gray-600'>
                        Penulis: {$dataBerita['penulis']}<br>
                        Tanggal: {$dataBerita['tanggal_berita']}
                    </div>
                    <div class='actions absolute bottom-2 left-2'>
                        <a href='update.php?id={$dataBerita['id']}' class='bg-green-500 text-white px-3 py-1 mr-2 rounded hover:bg-green-600'>Edit</a>
                        <a href='delete.php?id={$dataBerita['id']}' class='bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600'>Hapus</a>
                    </div>
                </div>";
            }
        } else {
            echo "<p class='col-span-full text-center'>Tidak ada berita yang ditemukan.</p>";
        }

        $koneksi->close();
        ?>
        <!-- Gambar Lebah -->
        <!-- <img src="bee.png" alt="Lebah" class="bee-icon absolute bottom-5 right-5 w-1/2 opacity-60"> Ganti dengan URL gambar lebah Anda -->
    </div>
</body>
</html>
