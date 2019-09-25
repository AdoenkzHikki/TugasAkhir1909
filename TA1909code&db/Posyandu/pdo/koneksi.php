<?php
    $host = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $dbname = 'db_posyandu';

    try{
        $db = new PDO("mysql:host=$host; dbname=$dbname", $dbuser, $dbpass);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        return $db;
    }catch(PDOException $e){
        echo '<p class="bg-danger">'.$e->getMessage();
        exit;
    }

?>