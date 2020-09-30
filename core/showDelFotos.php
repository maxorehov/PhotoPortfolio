<?php

require_once 'connect_db.php';
require_once 'functions.php';

$request = "SELECT * FROM photos WHERE album_id = :album_id";

try {
    $responce = $pdo->prepare($request);
    $responce->execute(['album_id' => $_GET['id']]);
    $fotos = $responce->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Произошла ошибка обращения к базе данных: " . $e->getMessage();
}

foreach ($fotos as $foto) {
    echo "<div class='del-prew'><input type='checkbox' class='custom-check' name='{$foto["id"]}' value='{$foto["id"]}'>"
    . "<img src='../{$foto["path"]}' width='200px' height='200px'></div>";
}