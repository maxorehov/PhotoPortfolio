<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'functions.php';
require_once 'connect_db.php';

//my_print($_POST);



$request = "DELETE FROM photos WHERE id = :id";

try {
    
    foreach($_POST as $item) {
        $responce = $pdo->prepare($request);
        $responce->execute(['id' => $item]);
    }
    
} catch (Exception $ex) {

}

header("Location: ../admin/adminFoto.php");
