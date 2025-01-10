<?php

include "konek.php";

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $email = $_POST['email'];
    $saran = $_POST['saran'];

    $query = "INSERT INTO tbl_saran (email, saran) VALUES
                                    ('$email', '$saran')";
    if(mysqli_query($konek, $query)){
        echo "<script>alert('TERIMAKASI TELAH MEMBERIKAN KAMU SARAN'); window.location.href = 'beranda.php';</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak</title>
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

    <section class="sec-kontak-user">
        <div class="container-kontak">
            <div class="card-kontak">
                <h1>KONTAK KAMI</h1>
                <p>Email: kelompok6@gmail.com</p>
                <p>No Hp: 082291703365</p>
                <p>Facebook: SmartFit</p>
                <p>instagram: smart_fit</p>
            </div>
            <form action="" method="POST">
                <div class="input-saran">
                    <h1>Berikan Saran</h1>
                    <input type="email" placeholder="Email" name="email" required>
                    <textarea name="saran" id="" placeholder="Masukan saran" required></textarea>
                    <button>Kirim saran</button>
                </div>
            </form>
        </div>
    </section>
</body>
</html>