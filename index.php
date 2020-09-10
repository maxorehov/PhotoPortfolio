<?php
    require_once 'core/connect_db.php';
    $query = "SELECT * FROM content";
    try {
        $responce = $pdo->query($query);
        $content = $responce->fetch()['content'];
    } catch (PDOException $e) {
        echo "Ошибка обращения к базе данных: " . $e->getMessage();
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
    	<link rel="stylesheet" href="assets/fonts.css">
    </head>
    <body>
        <main class="main">
            <div class="container">
                <div class="logo">
                    <h1>FOTOROMB</h1>
                </div>
                <nav class="menu">
                   <ul class="nav nav-menu">
                        <li class="nav-item">
                            <a class="nav-link active" href="index.php">Main</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="portfolio.php">Portfolio</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Contacts</a>
                        </li>
                    </ul>
                </nav>
                    <article>
                        <p class="about">
                            <?= $content; ?>
                        </p>
                    </article>
            </div>
 
        </main>


	<!-- <script src="assets/bootstrap/js/bootstrap.min.js"></script> -->
	<!-- <script src="assets/jquery-3.5.1.min.js" ></script> -->
    </body>
</html>