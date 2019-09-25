<?php
    session_start();
    unset($_SESSION['userid']);
    unset($_SESSION['lev']);

    header('location:../index.php');


?>
