<?php

include 'konek.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "INSERT INTO users (username, password) VALUES
    ('$username', '$password')";

    if(mysqli_query($konek, $query)){
        echo "<script>alert('REGISTRASI BERHASIL'); window.location.href = 'login.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section class="sec-register">
        <form action="" method="POST">
            <div class="card-register">
                <h1>REGISTER</h1>
                <input type="text" placeholder="username" name="username" required>
                <input type="password" placeholder="password" name="password" required>
                <button type="submit">REGISTER</button>
                <a href="login.php">Login</a>
            </div>
        </form>
    </section>
</body>
</html>