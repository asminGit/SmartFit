<?php
    $host = 'localhost';
    $user = 'root';
    $password = '';
    $dbname = 'tubes1';

    $konek = new mysqli($host, $user, $password, $dbname);

    if($konek){
        // echo "koneksi berhasil";
    }
    

?>