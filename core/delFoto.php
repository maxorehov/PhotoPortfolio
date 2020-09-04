<?php

require_once 'functions.php';
require_once 'connect_db.php';

$request = "DELETE FROM photos WHERE id = :id";

try {
    
    foreach($_POST as $item) {
        $responce = $pdo->prepare($request);
        $responce->execute(['id' => $item]);
    }
    
} catch (Exception $ex) {

}

header("Location: ../admin/adminFoto.php");
