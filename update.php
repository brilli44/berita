<?php
$id = $_GET['id'];

// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "berita1");

// Cek koneksi
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Query untuk mengambil data berita berdasarkan ID
$perintah = mysqli_query($koneksi, "SELECT * FROM berita_isi WHERE id = $id");

// Cek jika query gagal
if (!$perintah) {
    die("Query gagal: " . mysqli_error($koneksi));
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Data Berita</title>
    <style>
        /* Aturan dasar */
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: url('yellow.jpeg') no-repeat center center fixed; /* Ganti dengan URL gambar latar belakang Anda */
            background-size: cover;
            color: #333;
            font-size: 18px;
        }

        /* Kontainer utama */
        .container {
            max-width: 800px;
            margin: 50px auto;
            background: rgba(255, 255, 255, 0.9); /* Warna latar belakang putih dengan transparansi */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        /* Judul */
        h2 {
            color: ; /* Warna kuning untuk judul */
            text-align: center;
            margin-bottom: 20px;
            font-size: 30px; /* Ukuran font untuk judul */
        }

        /* Tabel berita */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            padding: 15px;
            border: 1px solid #ccc;
            text-align: left;
        }

        th {
            background-color: #FFD700; /* Warna kuning untuk header tabel */
            color: black;
        }

        td {
            background-color: #fff; /* Warna putih untuk data tabel */
        }

        /* Tombol simpan */
        input[type="submit"] {
            background-color: #FFD700; /* Warna kuning untuk tombol */
            border: none;
            color: black;
            padding: 15px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 18px;
            margin: 10px 0;
            cursor: pointer;
            border-radius: 4px;
        }

        input[type="submit"]:hover {
            background-color: #FFC107; /* Warna kuning lebih terang saat hover */
        }

        /* Area teks */
        textarea {
            width: 100%;
            height: 100px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>UBAH DATA BERITA</h2>
        <form action="update.php?id=<?php echo $id; ?>" method="POST">
            <table>
                <?php
                // Mengambil dan menampilkan data berita
                if ($dataBerita = mysqli_fetch_array($perintah)) {
                ?>
                <tr>
                    <td>Judul Berita</td>
                    <td><input type="text" name="judul" required="required" value="<?php echo htmlspecialchars($dataBerita['judul']); ?>"></td>
                </tr>
                <tr>
                    <td>Berita</td>
                    <td><textarea name="berita" required="required"><?php echo htmlspecialchars($dataBerita['berita']); ?></textarea></td>
                </tr>
                <tr>
                    <td>Penulis Berita</td>
                    <td><input type="text" name="penulis" required="required" value="<?php echo htmlspecialchars($dataBerita['penulis']); ?>"></td>
                </tr>
                <tr>
                    <td>Tanggal Rilis</td>
                    <td><input type="date" name="tanggal_berita" required="required" value="<?php echo htmlspecialchars($dataBerita['tanggal_berita']); ?>"></td>
                </tr>
                <?php
                } else {
                    echo "<tr><td colspan='2'>Data tidak ditemukan</td></tr>";
                }
                ?>
            </table>
            <input type="submit" name="submit" value="Simpan">
        </form>
    </div>
</body>
</html>

<?php
if (isset($_POST['submit'])) {
    $judul = $_POST['judul'];
    $berita = $_POST['berita'];
    $penulis = $_POST['penulis'];
    $tanggal_berita = $_POST['tanggal_berita'];

    // Query untuk memperbarui data berita
    $sql = "UPDATE berita_isi SET judul='$judul', berita='$berita', penulis='$penulis', tanggal_berita='$tanggal_berita' WHERE id=$id";

    if (mysqli_query($koneksi, $sql)) {
        header('Location: index.php');
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
    }
}

// Menutup koneksi
mysqli_close($koneksi);
?>
