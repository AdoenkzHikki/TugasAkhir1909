<?php

    error_reporting(0);

    if($_GET['page']=="dashboard"){
        include 'dashboard.php';
    }else if($_GET['page']=="tentang"){
        include 'tentang.php';
    }else if($_GET['page']=="tambah-tentang"){
        include 'tentang.php';
    }else if($_GET['page']=="ubah-tentang"){
        include 'tentang.php';
    }else if($_GET['page']=="kategori-informasi"){
        include 'kategori-informasi.php';
    }else if($_GET['page']=="tambah-kategori-informasi"){
        include 'kategori-informasi.php';
    }else if($_GET['page']=="ubah-kategori-informasi"){
        include 'kategori-informasi.php';
    }else if($_GET['page']=="informasi"){
        include 'informasi.php';
    }else if($_GET['page']=="tambah-informasi"){
        include 'informasi.php';
    }else if($_GET['page']=="ubah-informasi"){
        include 'informasi.php';
    }else if($_GET['page']=="layanan"){
        include 'layanan.php';
    }else if($_GET['page']=="tambah-layanan"){
        include 'layanan.php';
    }else if($_GET['page']=="ubah-layanan"){
        include 'layanan.php';
    }else if($_GET['page']=="user"){
        include 'user.php';
    }else if($_GET['page']=="tambah-user"){
        include 'user.php';
    }else if($_GET['page']=="ubah-user"){
        include 'user.php';
    }else{
        include 'dashboard.php';
    }

?>