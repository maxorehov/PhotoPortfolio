<?php
session_start();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require 'connect_db.php';

$query = "SELECT * FROM profiles";
try {
    $response = $pdo->query($query);
    $pass = $response->fetch()['pass'];
} catch (PDOException $e) {
    echo $e->getMessage();
}

if (password_verify($_POST['pass'], $pass)) {
    $_SESSION['signin'] = true;
    header("Location: ../admin/adminMain.php");
} else {
    $_SESSION['msg'] = "Неверный пароль!";
    header("Location: ../admin/index.php");
    die();
}





