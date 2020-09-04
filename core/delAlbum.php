<?php
    session_start();
    require_once 'connect_db.php';
    require_once 'functions.php';

    if (!$_SESSION['signin']) {
        header("Location: index.html");
    }

    $name = $_POST['del_album'];
    $dir = '../uploads/' . str2url($name);

    if (!$name) {
        $_SESSION['delAlbum'] = 'Выберите альбом для удаления';
        header('Location: ../admin/adminAlbum.php');
    } else {
        try {
            $request = "DELETE FROM albums WHERE name = :name";
            $data = $pdo->prepare($request);
            $data->execute([':name' => $name]);
            delDir($dir);
            $_SESSION['delAlbum'] = 'success';
            header('Location: ../admin/adminAlbum.php');
        } catch (PDOException $e) {
            echo "Ошибка удаления: " . $e->getMessage();
        }
    }

    

