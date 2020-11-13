<?php
    require_once 'core/connect_db.php';
    require_once 'core/functions.php';
    
    $request = "SELECT * FROM photos WHERE album_id = :album_id";
    $index = intval($_GET['id']);
     try {
        $responce = $pdo->prepare($request);
        $responce->execute(['album_id' => $index]); 
    } catch (PDOException $e) {
        echo "Ошибка базы данных: " . $e->getMessage();
    }
    $photos = $responce->fetchAll(PDO::FETCH_ASSOC);
    
    $query = "SELECT * FROM comments WHERE album_id = $index AND public_id = 1";
    try {
        $responce = $pdo->query($query);
    } catch (PDOException $e) {
        echo "Ошибка базы данных: " . $e->getMessage();
    }
    $comments = $responce->fetchAll(PDO::FETCH_ASSOC);
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
        <div class="container">
            <h3>Комментарии к альбому</h3>
            <div class="comments">
                <?php if (!empty($comments)): ?>
                <?php foreach($comments as $comment): ?>
                <div class="comment_album">
                    <p class="name"><?= $comment['name'];?>:</p>
                    <p><?= $comment['text'];?></p>
                </div>
                <?php endforeach; ?>
                <?php else : ?>
                    <h3>пока нету ниодного комментария</h3>
                <?php endif; ?>
            </div>
            <div class="addComment">
                <h3>Вы можете оставить свой комментарий</h3>
                <form id="comment_form">
                    <p>Введите имя</p>
                    <input type="text" name="name" value="">
                    <p>Добавьте комментарий</p>
                    <textarea name="comment" id="" cols="30" rows="10"></textarea>
                    <input type="hidden" name="album_id" value="<?= $index; ?>">
                    <input class="btn btn-primary" type="submit" value="Отправить" id="add_comment" />
                </form>
                <div class="msg"></div>
            </div>
        </div>
        <footer class="footer">
            <div class="container">
                <ul class="social">
                    <li><a class="facebook" href="#"></a></li>
                    <li><a class="instagram" href="#"></a></li>
                    <li><a class="vk" href="#"></a></li>
                </ul>
             <div class="cliarfix"></div>
            </div>

        </footer>
        <script src="assets/jquery-3.5.1.min.js" ></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/masonry.min.js"></script>
        <script src="assets/js/main.js"></script>
        <script src="assets/fancybox/dist/jquery.fancybox.min.js"></script>
    </body>
</html>

