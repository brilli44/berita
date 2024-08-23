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
    <!-- Tailwind CSS CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-yellow-100 text-gray-900 font-sans antialiased">
    <div class="max-w-3xl mx-auto mt-12 p-6 bg-white bg-opacity-90 rounded-lg shadow-lg">
        <h2 class="text-3xl font-bold text-yellow-500 text-center mb-6">UBAH DATA BERITA</h2>
        <form action="update.php?id=<?php echo $id; ?>" method="POST">
            <table class="w-full border-collapse mb-6">
                <?php
                // Mengambil dan menampilkan data berita
                if ($dataBerita = mysqli_fetch_array($perintah)) {
                ?>
                <tr>
                    <td class="px-4 py-2 font-semibold">Judul Berita</td>
                    <td class="px-4 py-2">
                        <input type="text" name="judul" required="required" value="<?php echo htmlspecialchars($dataBerita['judul']); ?>" class="w-full border border-gray-300 p-2 rounded-md">
                    </td>
                </tr>
                <tr>
                    <td class="px-4 py-2 font-semibold">Berita</td>
                    <td class="px-4 py-2">
                        <textarea name="berita" required="required" class="w-full border border-gray-300 p-2 rounded-md"><?php echo htmlspecialchars($dataBerita['berita']); ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td class="px-4 py-2 font-semibold">Penulis Berita</td>
                    <td class="px-4 py-2">
                        <input type="text" name="penulis" required="required" value="<?php echo htmlspecialchars($dataBerita['penulis']); ?>" class="w-full border border-gray-300 p-2 rounded-md">
                    </td>
                </tr>
                <tr>
                    <td class="px-4 py-2 font-semibold">Tanggal Rilis</td>
                    <td class="px-4 py-2">
                        <input type="date" name="tanggal_berita" required="required" value="<?php echo htmlspecialchars($dataBerita['tanggal_berita']); ?>" class="w-full border border-gray-300 p-2 rounded-md">
                    </td>
                </tr>
                <?php
                } else {
                    echo "<tr><td colspan='2' class='px-4 py-2 text-center'>Data tidak ditemukan</td></tr>";
                }
                ?>
            </table>
            <input type="submit" name="submit" value="Simpan" class="bg-yellow-500 text-black py-3 px-6 rounded-md cursor-pointer hover:bg-yellow-400">
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
