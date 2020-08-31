<?php
    session_start();
    if (!$_SESSION['signin']) {
        header("Location: index.html");
    }
?>
<!DOCTYPE html>
<html lang = "en">
<head>
	<meta charset = "UTF-8">
	<meta name = "viewport" content = "width=device-width, initial-scale=1.0">
	<title><?= "Success!"; ?></title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css" >
    <link rel="stylesheet" href="../assets/style.css">
    <link rel="stylesheet" href="../assets/fonts.css">
</head>
<body>
    <aside>
        <a href="adminMain.php">Главная страница</a>
        <a href="adminCategory.php">Добавить альбом</a>
        <a href="adminFoto.php">Добавить фото</a>
    </aside>
    <div class="admin-content">
        <h2>На этой странице вы можете отредактировать содержимое главной страницы</h2>
        <form action="../core/changeText.php" class="form-change" method="POST">
            <label for="main-text">Введите текст</label>
            <textarea class="form-control" name="content" id="main-text" cols="80" rows="10"></textarea>
            <button type="submit" class="btn btn-primary btn-change">Изменить</button>
            <?php
                if ($_SESSION['content']) {
                    echo "<p>{$_SESSION['content']}</p>";
                }
                unset($_SESSION['content']);
            ?>
        </form>
    </div>
    

</body>
</html>