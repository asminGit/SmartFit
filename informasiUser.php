<?php
include 'konek.php';

$sql = "SELECT * FROM tbl_berita ORDER BY created_at DESC";
$result = mysqli_query($konek, $sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informasi</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav>
        <div class="logo">
            <h1>SmartFit</h1>
        </div>

        <div class="navigasi">
            <a href="beranda.php">About</a>
            <a href="informasiUser.php">Informasi</a>
            <a href="konsultasiUser.php">Konsultasi</a>
            <a href="kontak.php">Kontak</a>
        </div>

        <div>
            <a href="login.php"><div class="logout">Logout</div></a>
        </div>
    </nav>

    <section class="sec-informasi-user">
    <h1>Berita Terkini</h1>
        <div class="container-informasi-user">
            <?php if (mysqli_num_rows($result) > 0): ?>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <div class="box-berita">
                        <h2><?php echo htmlspecialchars($row['judul']); ?></h2> <br>
                        <p><?php echo nl2br(htmlspecialchars($row['konten'])); ?></p>
                    </div>

                <?php endwhile; ?>
            <?php else: ?>
                <p>Tidak ada berita tersedia.</p>
            <?php endif; ?>

            <?php mysqli_close($konek); ?>
        </div>
    </section>
</body>
</html>