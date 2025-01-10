<?php

    include 'konek.php';
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $beratBadan = floatval($_POST['beratBadan']);
    $tinggitBadan = floatval($_POST['tinggiBadan']);

    if($tinggitBadan>0){
        $tinggiMeter = $tinggitBadan / 100;
        $bmi = $beratBadan / ($tinggiMeter * $tinggiMeter);

        if($bmi < 18.5){
            $kategori = "kekurangan berat badan";

        }elseif($bmi >= 18.5 && $bmi <24.9){
            $kategori = "normal";
        }elseif($bmi >= 25 && $bmi <29.9){
            $kategori = "kelebihan berat badan";
        }else{
            $kategori = "obsesitas";
        }

        $query = "INSERT INTO tbl_bmi (berat_badan, tinggi_badan, bmi, kategori, created_at) VALUES
        ('$beratBadan', '$tinggitBadan', '$bmi', '$kategori')";
        mysqli_query($konek, $query);

    }else{
        $bmi = null;
        $kategori = "tinggi tidak valid badan";
    }
}

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kalkulator</title>
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
    <form action="" method="POST">
        <section class="sec-kalkulator-user">
                <div class="container-kalkulator">
                    <div><h1>KALKULATOR BMI</h1></div>
                    <div class="card-kalkulator">
                        <input type="number" step="0.1" placeholder="Berat Badan" name="beratBadan" required>
                        <input type="number" step="0.1" placeholder="Tiniggi badan" name="tinggiBadan" required>
                        <button type="submit">Timbang</button>
                        <?php if (isset($bmi)): ?>
                        <h2>Hasil:</h2>
                        <p>BMI Anda: <?= number_format($bmi, 2) ?></p>
                        <p>Kategori: <?= htmlspecialchars($kategori) ?></p>
                        <?php endif; ?>
                    </div>
                </div>
        </section>
    </form>
</body>
</html>