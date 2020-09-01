<?php
    require_once 'core/connect_db.php';
    require_once 'core/functions.php';
    $request = "SELECT * FROM photos WHERE album_id = :album_id";
     try {
        $responce = $pdo->prepare($request);
        $responce->execute(['album_id' => $_GET['id']]); 
    } catch (PDOException $e) {
        echo "Ошибка базы данных: " . $e->getMessage();
    }
    $photos = $responce->fetchAll(PDO::FETCH_ASSOC);
//    my_print($photo);
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Photos</title>
    </head>
    <body>
        <h1>PHOTOS PAGE</h1>
        
        <div class="container">
            <?php foreach($photos as $photo): ?>
                <img src="<?= $photo['path']; ?>" alt="">
            <?php endforeach; ?>
        </div>
    </body>
</html>

