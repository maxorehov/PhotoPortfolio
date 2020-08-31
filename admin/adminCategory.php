<?php
    session_start();
    require_once '../core/connect_db.php';
    if (!$_SESSION['signin']) {
        header("Location: index.html");
    }
    
    $request = "SELECT * FROM albums";
    try {
        $albums = $pdo->query($request);
    } catch (PDOException $e) {
        echo "Не удалось удалить альбом, ошибка БД: " . $e->getMessage();
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
        <h2>На этой странице вы можете добавить альбом</h2>
        <form action="../core/addAlbum.php" method="POST" enctype="multipart/form-data">
            <label for="name">Название категории:</label>
            <input id="name" type="text" name="name">
            <label for="descr">Описание категории</label>
            <textarea name="descr" id="descr" cols="30" rows="10"></textarea>
            <label for="prew">Выберите фото для превью:</label>
            <input type="file" id="prew" name="prew">
            <button>Создать</button>
            <?php
                if ($_SESSION['addAlbum']) {
                    echo "<p>" . $_SESSION['addAlbum'] . "</p>";
                }
                unset($_SESSION['addAlbum']);
            ?>
        </form>
        <div class="del"> 
            <form action="../core/delCategory.php" method="POST"> 
                <select name="del_album" id="">
                    <option value="0">Выберите альбом</option>
                    <?php foreach($albums as $album): ?>
                    <option value="<?= $album['id']; ?>"><?= $album['name']; ?></option>
                    <?php endforeach; ?>
                </select>
                <button>Удалить</button>
            <?php
                if ($_SESSION['delAlbum']) {
                    echo "<p>" . $_SESSION['delAlbum'] . "</p>";
                }
                unset($_SESSION['delAlbum']);
            ?>
            </form>
        </div>
    </div>
    

</body>
</html>