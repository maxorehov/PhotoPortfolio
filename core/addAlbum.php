<?php
    session_start();
    require_once 'connect_db.php';
    

    
    $name = $_POST['name'];
    $descr = $_POST['descr'];
    
    $path = 'uploads/' . time() . $_FILES['prew']['name'];
    move_uploaded_file($_FILES['prew']['tmp_name'], "../" . $path);
    $query = "INSERT INTO albums VALUES (NULL, :name, :description, :preview, NOW())";
    
    try {
        $request = $pdo->prepare($query);
        $request->execute(['name' => $name, 'description' => $descr, 'preview' => $path]);
        $_SESSION['addAlbum'] = 'success';
        header('Location: ../admin/adminCategory.php');
    } catch (PDOException $e) {
        echo "Не удалось добавить новый альбом" . $e->getMessage();
    }
    
    
    
    
    
    
    
    


