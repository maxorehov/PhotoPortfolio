<?php
    session_start();
    if (!$_SESSION['signin']) {
        header("Location: index.html");
    }
    require_once '../core/connect_db.php';
    $query = "SELECT * FROM comments WHERE public_id = 0";
    $response = $pdo->query($query);
    $comments = $response->fetchAll(PDO::FETCH_ASSOC);
    $counter = 0;
    foreach($comments as $comment) {
        $counter++;
    }
?>
<!DOCTYPE html>
<html lang = "en">
<head>
	<meta charset = "UTF-8">
	<meta name = "viewport" content = "width=device-width, initial-scale=1.0">
	<title>Main</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css" >
    <link rel="stylesheet" href="../assets/style.css">
    <link rel="stylesheet" href="../assets/fonts.css">
    <link rel="stylesheet" href="../assets/linea/styles.css">
</head>
<body>
    <aside class="left">

        <div class="btn_mnu">
            <div class="btn_row"></div>
            <div class="btn_row"></div>
            <div class="btn_row"></div>
        </div>

<!--         <div class="aside-nav">
           <a href="adminMain.php">Главная страница</a>
           <a href="adminAlbum.php">Добавить альбом</a>
           <a href="adminFoto.php">Добавить фото</a> 
        </div> -->

        <nav class="aside-nav">
            <ul>
                <li>
                    <a href="adminMain.php">Главная страница</a>
                </li>
                <li>
                    <a href="adminAlbum.php">Добавить альбом</a>
                </li>
                <li>
                    <a href="adminFoto.php">Добавить фото</a> 
                </li>
                <li>
                    <a href="adminComments.php">Комментрарии</a>
                    <div class="wrap_counter">
                        <span class="counter"><?= $counter;?></span>
                    </div>
                </li>
            </ul>
        </nav>

    </aside>
    <div class="admin-content">
        <h2>На этой странице вы можете отредактировать содержимое главной страницы</h2>
        <div class="change-content">
            <form action="../core/changeText.php" class="form-change" method="POST">
                <label for="main-text">Введите текст</label>
                <textarea class="form-control" name="content" id="main-text" cols="80" rows="10"></textarea>
                <button type="submit" class="btn btn-primary btn-change">Изменить</button>
                <?php
                    if (isset($_SESSION['content'])) {
                        echo "<p class='info'>{$_SESSION['content']}</p>";
                    }
                    unset($_SESSION['content']);
                ?>
            </form>
        </div>

    </div>
    

    <script src="../assets/jquery-3.5.1.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/admin.js"></script>

</body>
</html>