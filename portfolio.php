<?php
    require_once 'core/connect_db.php';
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
	<link rel="stylesheet" href="assets/fonts.css">

</head>
<body>
	<main class="portfolio">
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

            <div class="portfolio-row">
                    <?php foreach($responce as $value):?>
                        <p class="album-name"><?= $value['name'] ?></p>
                        <a href="photos.php?id=<?= $value['id']; ?>">
                            <img class="preview" src="<?= $value['prewiev'];?>" alt="">
                        </a>
                    <?php endforeach;?>
            </div>    
		</div>	
		</div>
       
	</main>

	<script src="assets/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/jquery-3.5.1.min.js" ></script>
</body>
</html>