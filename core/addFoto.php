<?php
session_start();
if (!$_SESSION['signin']) {
        header("Location: index.html");
}

require_once 'functions.php';
require_once 'connect_db.php';
$addTo = $_POST['addTo'];
if ($addTo == 0) {
    header('Location: ../admin/adminFoto.php');
    $_SESSION['addPhoto'] = 'Не выбрана категория';
    die();
}

$photos = reArrayFiles($_FILES['photo']);

foreach ($photos as $photo) {
    $path = "uploads/photos/" . time() . $photo['name'];
    move_uploaded_file($photo['tmp_name'], "../" . $path);
    $request = "INSERT INTO photos VALUES (NULL, :path, :album_id)";
    try {
        $request = $pdo->prepare($request);
        $request->execute(['path' => $path, 'album_id' => $addTo]);
        $_SESSION['addPhoto'] = 'Фотографии успешно добавлены!';
        header('Location: ../admin/adminFoto.php');
    } catch (PDOException $e) {
        echo "Не удалось добавить новый альбом" . $e->getMessage();
    }
}






