<?php
    session_start();
    require_once 'connect_db.php';

    if (!$_SESSION['signin']) {
        header("Location: index.html");
    }
    
    if ($_POST['del_album'] == 0) {
        $_SESSION['delAlbum'] = 'Выберите альбом для удаления';
        header('Location: ../admin/adminCategory.php');
    } else {
        try {
            $request = "DELETE FROM albums WHERE id = :id";
            $data = $pdo->prepare($request);
    //        $data->bindParam(':id', $_POST['del_album']);
    //        $data->execute();
            $data->execute([':id' => $_POST['del_album']]);
            $_SESSION['delAlbum'] = 'success';
            header('Location: ../admin/adminCategory.php');
        } catch (PDOException $e) {
            echo "Ошибка удаления: " . $e->getMessage();
        }
    }

    

