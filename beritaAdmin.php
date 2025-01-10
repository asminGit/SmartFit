<?php
include 'konek.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $judul = $_POST['judul'];
    $konten = $_POST['konten'];

    $sql = "INSERT INTO tbl_berita (judul, konten) VALUES ('$judul', '$konten')";

    if (mysqli_query($konek, $sql)) {
        echo "<script>alert('Berita berhasil ditambahkan'); window.location.href = 'admin.php';</script>";
    } else {
        echo "<p>Error: " . mysqli_error($konek) . "</p>";
    }
}
mysqli_close($konek);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Input Berita</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<nav>
        <div class="logo">
            <a href="admin.php"><h1>SmartFit Admin</h1></a>
        </div>
        <div>
            <a href="login.php"><div class="logout">Logout</div></a>
        </div>
    </nav>

    <header class="nav-admin">
        <a href="dataAdmin.php">
            <div class="box-nav-admin">Data User</div>
        </a>

        <a href="kalkulatorAdmin.php">
            <div class="box-nav-admin">Data BMI</div>
        </a>

        <a href="">
            <div class="box-nav-admin">Pengajuan</div>
        </a>

        <a href="">
            <div class="box-nav-admin">Tambah Berita</div>
        </a>

        <a href="konsultasiAdmin.php">
            <div class="box-nav-admin">Konsultasi</div>
        </a>

        <a href="pengaturanAdmin.php">
            <div class="box-nav-admin">Pengaturan Admin</div>
        </a>

        <a href="editBerita.php">
            <div class="box-nav-admin">Edit Berita</div>
        </a>
    </header>

    <section class="sec-berita">
        <div class="container-berita">
            <h1>Tambahkan Berita</h1>
            <form method="POST" action="">
                <label for="title">Judul Berita:</label><br>
                <input type="text" id="title" name="judul" required><br><br>

                <label for="content">Isi Berita:</label><br>
                <textarea id="content" name="konten" rows="5" cols="50" required></textarea><br><br>

                <button type="submit">Simpan</button>
            </form>
        </div>
    </section>

</body>
</html>