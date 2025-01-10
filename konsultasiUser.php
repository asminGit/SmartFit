<?php

include 'konek.php';

if($_SERVER['REQUEST_METHOD'] === 'POST') {

    $nama = $_POST['nama'];
    $nohp= $_POST['nohp'];
    $gmail= $_POST['gmail'];
    $pesan = $_POST['pesan'];

    $query = "INSERT INTO data_konsultasi (nama, nohp, gmail, pesan) VALUES
                                    ('$nama', '$nohp', '$gmail', '$pesan')";
    if(mysqli_query($konek, $query)){
        echo "<script>alert('PESAN KONSULTASI ANDA TELAH DIKIRIM'); window.location.href = 'beranda.php';</script>";
    }
    
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>konsultasi</title>
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

    <section class="sec1-konsultasi-user">
        <div><h1>KONSULTASIKAN <br> PROGRES DAN <br> PERKEMBANGANMU</h1>
            <a href="kalkulator.php"><div class="nav-bmi">KALKULATOR BMI</div></a>
        </div>
        <div><img src="Coaches-pana.png" alt=""></div>
    </section>

    <section class="sec2-konsultasi-user">
        <form action="" method="POST">
            <div class="card-konsultasi">
                <h1>KONSULTASI</h1>
                <input type="text" name="nama" placeholder="nama" required>
                <input type="number" name="nohp" placeholder="no hp" required>
                <input type="gmail" name="gmail" placeholder="gmail" required>
                <textarea name="pesan" id="" placeholder="pesan" required></textarea>
                <button type="submit">KIRIM</button>
            </div>
        </form>
    </section>
</body>
</html>