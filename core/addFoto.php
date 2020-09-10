<?php
session_start();
if (!$_SESSION['signin']) {
        header("Location: index.html");
}

require_once 'functions.php';
require_once 'connect_db.php';  

$addTo = $_POST['addTo'];
if (!$addTo) {
    $_SESSION['addFoto'] = 'Не выбрана категория';
    header('Location: ../admin/adminFoto.php');
    die();
}

if ($_FILES['foto']['error']['0'] == 4) {
    $_SESSION['addFoto'] = 'Добавьте фото!';
    header('Location: ../admin/adminFoto.php');
    die();
}

$fotos = reArrayFiles($_FILES['foto']);

foreach ($fotos as $foto) {
    $path = "uploads/fotos/" . time() . $foto['name'];
    move_uploaded_file($foto['tmp_name'], "../" . $path);
    $request = "INSERT INTO photos VALUES (NULL, :path, :album_id)";
    try {
        $request = $pdo->prepare($request);
        $request->execute(['path' => $path, 'album_id' => $addTo]);
        $_SESSION['addFoto'] = 'Фотографии успешно добавлены!';
        header('Location: ../admin/adminFoto.php');
    } catch (PDOException $e) {
        echo "Не удалось добавить новый альбом" . $e->getMessage();
    }
}






