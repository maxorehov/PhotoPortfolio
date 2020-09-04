<?php
    session_start();
    require_once 'connect_db.php';
    require_once 'functions.php';
    
   
    $name = $_POST['name'];
    $descr = $_POST['descr'];




    if($name == '') {
        $_SESSION['addAlbum'] = 'Укажите название альбома!';
        header("Location: ../admin/adminAlbum.php"); 
        die();   
    }

    if($_FILES['prew']['name'] == '') {
        $_SESSION['addAlbum'] = 'Добавьте превью для альбома!';
        header("Location: ../admin/adminAlbum.php");
        die();
    }


    $path = 'uploads/' . time() . $_FILES['prew']['name'];
    move_uploaded_file($_FILES['prew']['tmp_name'], "../" . $path);
    $query = "INSERT INTO albums VALUES (NULL, :name, :description, :preview, NOW(), :path)";
    $pathToDir = '../uploads/'  . str2url($name);
    try {
        $request = $pdo->prepare($query);
        $request->execute(['name' => $name, 'description' => $descr, 'preview' => $path, 'path' => $pathToDir]);
        mkdir($pathToDir);
        $_SESSION['addAlbum'] = 'success';
        header('Location: ../admin/adminAlbum.php');
    } catch (PDOException $e) {
        echo "Не удалось добавить новый альбом" . $e->getMessage();
    }
    
    
    
    
    
    


