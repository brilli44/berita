<?php
$id = $_GET['id'];
$koneksi = mysqli_connect("localhost","root","","berita1");

mysqli_query($koneksi, "DELETE FROM berita_isi where id =$id");
echo "<script>alert('Apakah anda yakin?'); window.location = 'index.php'</script>";
?>