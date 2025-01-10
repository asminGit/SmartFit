<?php
include 'konek.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $old_password = $_POST['old_password'];
    $new_username = $_POST['new_username'];
    $new_password = $_POST['new_password'];

    // Verifikasi password lama
    $query_check = "SELECT * FROM admin WHERE password='$old_password'";
    $result_check = mysqli_query($konek, $query_check);

    if (mysqli_num_rows($result_check) > 0) {
        // Jika password lama benar, update username dan password
        $query_update = "UPDATE admin SET username='$new_username', password='$new_password'";
        $result_update = mysqli_query($konek, $query_update);

        if ($result_update) {
            echo "<script>alert('Username dan Password berhasil diupdate!'); window.location.href = 'login.php';</script>";
        } else {
            echo "<script>alert('Gagal mengupdate data: " . mysqli_error($konek) . "');</script>";
        }
    } else {
        echo "<script>alert('Password lama salah.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
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

        <a href="saranAdmin.php">
            <div class="box-nav-admin">Pengajuan</div>
        </a>

        <a href="beritaAdmin.php">
            <div class="box-nav-admin">Tambah berita</div>
        </a>

        <a href="konsultasiAdmin.php">
            <div class="box-nav-admin">Konsultasi</div>
        </a>

        <a href="pengaturanAdmin.php">
            <div class="box-nav-admin">Pengaturan Admin</div>
        </a>

        <a href="editBerita.php">
            <div class="box-nav-admin">Edit berita</div>
        </a>
    </header>
    <section class="sec-pengaturan">
        <div class="container-pengaturan">
            <h1>Edit Username dan Password</h1>
            <form method="POST">
                <div class="card-input-pengaturan">
                    <label>Password Lama:</label>
                    <input type="password" name="old_password" placeholder="" required>

                    <label>Username Baru:</label>
                    <input type="text" name="new_username" required>

                    <label>Password Baru:</label>
                    <input type="password" name="new_password" required>

                    <button type="submit">Update</button>

                </div>

            </form>

        </div>
    </section>

</body>
</html>
