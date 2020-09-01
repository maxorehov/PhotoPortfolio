<?php

require_once 'connect_db.php';
require_once 'functions.php';

$request = "SELECT * FROM photos WHERE album_id = :album_id";

try {
    $responce = $pdo->prepare($request);
    $responce->execute(['album_id' => $_GET['id']]);
    $photos = $responce->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Произошла ошибка обращения к базе данных: " . $e->getMessage();
}

foreach ($photos as $photo) {
    echo "<input type='checkbox' name='{$photo["id"]}' value='{$photo["id"]}'>"
    . "<img src='../{$photo["path"]}'>";
}