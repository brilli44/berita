<?php

if (isset($_POST['submit'])) {
    // Ambil data dari form
    $judul = $_POST['judul'];
    $berita = $_POST['berita'];
    $penulis = $_POST['penulis'];
    $tanggal_berita = $_POST['tanggal_berita'];

    $koneksi = mysqli_connect("localhost","root","","berita1");
    
    mysqli_query($koneksi,"INSERT INTO berita_isi( judul, berita, penulis, tanggal_berita) VALUES
    ('$judul', '$berita', '$penulis', '$tanggal_berita')");

    echo "<script>alert('Data anda berhasil di tambahkan! Tekan OK untuk melihat ');
    window.location = 'index.php'</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <title>Tambah Berita</title>
</head>
<body class="bg-yellow-100 bg-cover bg-fixed" style="background-image: url('yellow.jpeg');">
    <div class="container mx-auto max-w-xl mt-12 bg-white bg-opacity-90 p-8 rounded-lg shadow-lg">
        <h1 class="text-3xl font-bold text-center mb-6 text-yellow-600">Tambah Berita</h1>
        <p class="text-center mb-4">Selamat datang admin, semoga harimu menyenangkan :)</p>
        <form action="createberita.php" method="POST">
            <table class="w-full border-collapse">
                <tr>
                    <td class="p-3 text-gray-700">Judul Berita</td>
                    <td class="p-3"><input type="text" name="judul" required="required" class="w-full p-2 border border-gray-300 rounded"></td>
                </tr>
                <tr>
                    <td class="p-3 text-gray-700">Isi Berita</td>
                    <td class="p-3"><textarea name="berita" rows="5" required="required" class="w-full p-2 border border-gray-300 rounded"></textarea></td>
                </tr>
                <tr>
                    <td class="p-3 text-gray-700">Penulis</td>
                    <td class="p-3"><input type="text" name="penulis" required="required" class="w-full p-2 border border-gray-300 rounded"></td>
                </tr>
                <tr>
                    <td class="p-3 text-gray-700">Tanggal Berita</td>
                    <td class="p-3"><input type="date" name="tanggal_berita" required="required" class="w-full p-2 border border-gray-300 rounded"></td>
                </tr>
            </table>
            <input type="submit" name="submit" value="Tambahkan Berita" class="w-full bg-yellow-500 text-white p-3 mt-4 rounded cursor-pointer hover:bg-yellow-600">
        </form>
        <a href="index.php" class="block text-center text-yellow-700 mt-6 hover:underline">Kembali ke Daftar Berita</a>
    </div>
</body>
</html>