<?php
include 'konek.php';

$query = "SELECT * FROM tbl_bmi ORDER BY id DESC";
$result = mysqli_query($konek, $query);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Riwayat BMI</title>
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
    <section class="sec-bmi-admin">
        <div class="container-bmi-admin">
            <h1>Riwayat BMI</h1>
            <table border="1">
                <tr>
                    <th>No</th>
                    <th>Berat (kg)</th>
                    <th>Tinggi (cm)</th>
                    <th>BMI</th>
                    <th>Kategori</th>
                    <th>Tanggal</th>
                </tr>
                <?php $no = 1; while ($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $row['berat_badan']; ?></td>
                    <td><?php echo $row['tinggi_badan']; ?></td>
                    <td><?php echo $row['bmi']; ?></td>
                    <td><?php echo $row['kategori']; ?></td>
                    <td><?php echo $row['created_at']; ?></td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </section>
</body>
</html>

