<?php
include 'konek.php';

// Hapus berita
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $sql = "DELETE FROM tbl_berita WHERE id = $id";
    if (mysqli_query($konek, $sql)) {
        echo "<p>Berita berhasil dihapus!</p>";
    } else {
        echo "<p>Error: " . mysqli_error($konek) . "</p>";
    }
}

// Update berita
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $id = $_POST['id'];
    $judul = $_POST['judul'];
    $konten = $_POST['konten'];

    $sql = "UPDATE tbl_berita SET judul = '$judul', konten = '$konten' WHERE id = $id";

    if (mysqli_query($konek, $sql)) {
        echo "<p>Berita berhasil diperbarui!</p>";
    } else {
        echo "<p>Error: " . mysqli_error($konek) . "</p>";
    }
}

$sql = "SELECT * FROM tbl_berita ORDER BY created_at DESC";
$result = mysqli_query($konek, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Kelola Berita</title>
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

        <a href="beritaAdmin.php">
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
    <section class="sec-edit-berita">
        <h1>Edit Berita</h1>
        <div class="container-edit-berita">
            <?php if (mysqli_num_rows($result) > 0): ?>
            <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <form method="POST" action="" class="form-berita">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <label for="judul">Judul:</label><br>
                    <input type="text" id="judul" name="judul" value="<?php echo htmlspecialchars($row['judul']); ?>" required><br><br>

                    <label for="konten">Isi:</label><br>
                    <textarea id="konten" name="konten" rows="5" cols="50" required><?php echo htmlspecialchars($row['konten']); ?></textarea><br><br>

                    <button type="submit">Update</button>
                    <a  href="?delete=<?php echo $row['id']; ?>">Hapus</a>
                </form>
                <hr>
            <?php endwhile; ?>
            <?php else: ?>
                <p>Tidak ada berita tersedia.</p>
            <?php endif; ?>
            <?php mysqli_close($konek); ?>
        </div>
    </section>
</body>
</html>