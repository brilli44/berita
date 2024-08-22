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
    <title>Tambah Berita</title>
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
        h1 {
            color: #; /* Warna kuning untuk judul */
            text-align: center;
            margin-bottom: 20px;
        }

        /* Formulir */
        form {
            width: 100%;
            margin: 0 auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td {
            padding: 10px;
        }

        input[type="text"],
        input[type="date"],
        textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        textarea {
            resize: vertical;
        }

        /* Tombol submit */
        input[type="submit"] {
            background-color: ; /* Warna kuning untuk tombol */
            border: none;
            color: black;
            padding: 15px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 10px 0;
            cursor: pointer;
            border-radius: 4px;
        }

        input[type="submit"]:hover {
            background-color: #FFC107; /* Warna kuning lebih terang saat hover */
        }

        /* Tautan Kembali */
        .back-link {
            display: inline-block;
            margin-top: 20px;
            color: #000;
            text-decoration: none;
            font-size: 16px;
        }

        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Tambah Berita</h1>
        <p align:center>Selamat datang admin , semoga harimu menyenangkan :)</p>
        <form action="createberita.php" method="POST">
            <table border="1">
                <tr>
                    <td>Judul Berita</td>
                    <td><input type="text" name="judul" required="required"></td>
                </tr>
                <tr>
                    <td>Isi Berita</td>
                    <td><textarea name="berita" rows="5" required="required"></textarea></td>
                </tr>
                <tr>
                    <td>Penulis</td>
                    <td><input type="text" name="penulis" required="required"></td>
                </tr>
                <tr>
                    <td>Tanggal Berita</td>
                    <td><input type="date" name="tanggal_berita" required="required"></td>
                </tr>
            </table>
            <input type="submit" name="submit" value="Tambahkan Berita">
        </form>
        <a href="index.php" class="back-link">Kembali ke Daftar Berita</a>
    </div>
</body>
</html>

