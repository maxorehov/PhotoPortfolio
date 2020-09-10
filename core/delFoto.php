<?php
session_start();
require_once 'functions.php';
require_once 'connect_db.php';

$request_to_del = "SELECT * FROM photos WHERE id = :id";
$del_files = [];

foreach ($_POST as $file) {
    try{
        $responce = $pdo->prepare($request_to_del);
        $responce->execute(['id' => $file]);
        array_push($del_files, $responce->fetch(PDO::FETCH_ASSOC));
    } catch (PDOException $e) {
        echo "Warning" . $e->getMessage();
    }

}

foreach ($del_files as $del) {
    unlink("../" . $del['path']);
}

$request = "DELETE FROM photos WHERE id = :id";

try {
    
    foreach($_POST as $item) {
        $responce = $pdo->prepare($request);
        $responce->execute(['id' => $item]);
    }
    
} catch (Exception $ex) {

}
$_SESSION['delFoto'] = 'Фотографии успешно удалены';
header("Location: ../admin/adminFoto.php");
