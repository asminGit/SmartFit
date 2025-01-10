<?php

include 'konek.php';

$query = "SELECT id, username, password FROM users";
$result = mysqli_query($konek, $query);

?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Users</title>
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

    <section class="sec-data-admin">
        <div>
            <h1>LIST DATA CLIENT</h1>
        </div>

        <table border="1">
            <tr style="background-color:rgb(29, 253, 134)">
                <td>Id</td>
                <td>Username</td>
                <td>Password</td>
            </tr>
            <?php

            if(mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['username'] . "</td>";
                    echo "<td>" . $row['password'] . "</td>";
                    echo "</tr>";
                }
            }else{
                echo"<tr><td>tidak ada data</td></tr>";
            }

            ?>

        </table>
    </section>
</body>
</html>