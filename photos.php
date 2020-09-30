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
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Photos</title>
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" >
    	<link rel="stylesheet" href="assets/style.css">
        <link rel="stylesheet" href="assets/media.css">
        <link rel="stylesheet" href="assets/fonts.css">
        <link rel="stylesheet" href="assets/fancybox/dist/jquery.fancybox.min.css">
    </head>
    <body>
        <div class="container">
            <h1 class="title">PHOTOS PAGE</h1>
            <button class="btn btn-dark back" onclick="window.history.back()">Назад</button>
        </div>
  
        
        <div class="container foto-container">
            <div class="grid">
            <?php foreach($photos as $photo): ?>
                <div class="grid-item">
                    <a href="<?= $photo['path']; ?>" data-fancybox="gallery" data-caption="">
    	                <img src="<?= $photo['path']; ?>" alt="" />
                    </a>
                </div>
                <?php endforeach; ?>
            </div>
                
            
        </div>
        <script src="assets/jquery-3.5.1.min.js" ></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/masonry.min.js"></script>
        <script src="assets/js/main.js"></script>
        <script src="assets/fancybox/dist/jquery.fancybox.min.js"></script>
    </body>
</html>

