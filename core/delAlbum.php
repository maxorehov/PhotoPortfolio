<?php
    session_start();
    require_once 'connect_db.php';
    require_once 'functions.php';

    if (!$_SESSION['signin']) {
        header("Location: index.html");
    }

    $name = $_POST['del_album'];
    
    if (!$name) {
        $_SESSION['delAlbum'] = 'Выберите альбом для удаления';
        header('Location: ../admin/adminAlbum.php');
    } else {
        
        //Delete prewiev
        try {
            $request = "SELECT * FROM albums WHERE name = :name";
            $data = $pdo->prepare($request);
            $data->execute([':name' => $name]);
            $del = $data->fetch(PDO::FETCH_ASSOC);
            unlink('../' . $del['prewiev']);  
            $album_id = $del['id'];
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        //Delete fotos
        try {
            $request = "SELECT * FROM photos WHERE album_id = :id";
            $data = $pdo->prepare($request);
            $data->execute([':id' => $album_id]);
            $del = $data->fetchAll(PDO::FETCH_ASSOC);
            foreach ($del as $file) {
                unlink('../' . $file['path']);
            }
            my_print($del);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        //Delete fotos from database
        try {
            $request = "DELETE FROM photos WHERE album_id = :id";
            $responce = $pdo->prepare($request);
            $responce->execute([':id' => $album_id]);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        
        //Delete field in database
        try {
            $request = "DELETE FROM albums WHERE name = :name";
            $data = $pdo->prepare($request);
            $data->execute([':name' => $name]);
            $_SESSION['delAlbum'] = 'success';
            header('Location: ../admin/adminAlbum.php');
        } catch (PDOException $e) {
            echo "Ошибка удаления: " . $e->getMessage();
        }
    }

    

