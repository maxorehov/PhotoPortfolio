<?php
    require_once 'core/connect_db.php';
    $query = "SELECT * FROM content";
    try {
        $responce = $pdo->query($query);
        $content = $responce->fetch()['content'];
    } catch (PDOException $e) {
        echo "Ошибка обращения к базе данных: " . $e->getMessage();
    }

    $query = "SELECT * FROM albums";
    try {
        $responce = $pdo->query($query);
        $responce = $responce->fetchAll(PDO::FETCH_ASSOC); 
    } catch (PDOException $e) {
        echo "Ошибка базы данных: " . $e->getMessage();
    }
    
?>
<!DOCTYPE html>
<html lang="en">
    <head>
    	<meta charset="UTF-8">
    	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    	<title>Document</title>
    	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" >
        <link rel="stylesheet" href="assets/style.css">
        <link rel="stylesheet" href="assets/media.css">
    	<link rel="stylesheet" href="assets/fonts.css">
    </head>
    <body>
        <main class="main">
            <div class="container">
                <div>
                    <h1 class="logo">FOTOROMB</h1>
                </div>
                <!-- <nav class="menu">
                   <ul class="nav nav-menu">
                        <li class="nav-item">
                            <a class="nav-link active" href="index.php">Main</a>
                        </li>
                        <li id="first" class="nav-item">
                            <a class="nav-link" href="portfolio.php">Portfolio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contacts</a>
                        </li>
                    </ul>
                </nav> -->
                    <article>
                        <p class="about">
                            <?= htmlspecialchars($content, ENT_QUOTES); ?>
                        </p>
                    </article>
                    <div class="goto-portfolio">
                        Портфолио
                        <i class="icon-down"></i>
                    </div>
            </div> 
        </main>
        <div class="container portfolio-container">
<!--             <div class="goto-start">
                Наверх
                <i class="icon-up"></i>
            </div> -->
            <h2 class="album-title">мои альбомы</h2>
            <div class="portfolio">
                    <?php foreach($responce as $value):?>
                        <div class="album">
                            
                            <a href="photos.php?id=<?= $value['id']; ?>">
                                <img class="preview" src="<?= $value['prewiev'];?>" alt="">
                                <span class="overlay">
                                    <h2><?= htmlspecialchars($value['name'], ENT_QUOTES) ?></h2>
                                </span>
                            </a>
                        </div>
                    <?php endforeach;?>
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
    <script src="assets/js/index.js"></script>
    </body>
</html>

