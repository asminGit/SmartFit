<?php

include 'konek.php';

$msg = "";

if($_SERVER['REQUEST_METHOD'] =='POST'){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users where username='$username' AND password= '$password'";
    $result = mysqli_query($konek, $query);

    if(mysqli_num_rows($result) > 0){
        echo "<script>alert('LOGIN BERHASIL'); window.location.href = 'beranda.php';</script>";
    }else{
        // echo "username dan password salah";
        $msg = "username dan password salah";
    }
}

// if(isset($_POST['login'])){
//     $username = $_POST['username'];
//     $password = $_POST['password'];

//     if($username == 'admin' && $password == 'admin'){
//         echo "<script>alert('LOGIN BERHASIL'); window.location.href = 'admin.php';</script>";
//     }
// }

if($_SERVER['REQUEST_METHOD'] =='POST'){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = "SELECT * FROM admin where username='$username' AND password= '$password'";
    $result = mysqli_query($konek, $query);

    if(mysqli_num_rows($result) > 0){
        echo "<script>alert('LOGIN ADMIN BERHASIL'); window.location.href = 'admin.php';</script>";
    }else{
        // echo "username dan password salah";
        $msg = "username dan password salah";
    }
}



?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <section class="sec-register">
        <form action="" method="post">
            <div class="card-register">
                <h1>LOGIN</h1>
                <input type="text" placeholder="username" name="username" required>
                <input type="password" placeholder="password" name="password" required>
                <button type="submit" name="login">LOGIN</button>
                <a href="register.php">Register</a>
                <div class="msg"><p><?= $msg ?></p></div>
            </div>
        </form>
    </section>
</body>
</html>