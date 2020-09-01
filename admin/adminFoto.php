<?php
    require_once '../core/connect_db.php';
    require_once '../core/functions.php';
    session_start();
    if (!$_SESSION['signin']) {
        header("Location: index.html");
    }
    $request = "SELECT * FROM albums";
    try {
        $albums = $pdo->query($request);
        $albums = $albums->fetchAll();
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
        <h2>На этой странице вы можете добавить фотографии в альбом</h2>
        <form action="../core/addFoto.php" enctype="multipart/form-data" method="POST">
            <label for="albums">Выберите альбом для добавления фото:</label>
            <select name="addTo" id="albums">
                <option value="0">Выберите альбом</option>
                <?php foreach($albums as $album): ?>
                <option value="<?= $album['id']; ?>"><?= $album['name']; ?></option>
                <?php endforeach; ?>
            </select>
            <p class="photo">
                <input type="file" name="photo[]" />
                <input class="add" type="button" value="+">
                <input class="remove" type="button" value="-">
            </p>
            <button>Загрузить</button>
            <?php
                if ($_SESSION['addPhoto']) {
                    echo "<p>" . $_SESSION['addPhoto'] . "</p>";
                }
                unset($_SESSION['addPhoto']);
            ?>
        </form>
        <hr>
        <h2>Выберите фото для удаления</h2>
        <form method="POST">
            <label for="delFotos">Выберите альбом из которого следует удалить фотографии:</label>
            <select name="needDel" id="delFotos">
                <option value="0">Выберите альбом</option>
                <?php foreach($albums as $album): ?>
                <option value="<?= $album['id']; ?>"><?= $album['name']; ?></option>
                <?php endforeach; ?>
            </select>
        </form>
        <form action="../core/delFoto.php" id="ans" method="POST">
            
            <button>Удалить</button>
        </form>
    </div>
    
    <script src="../assets/jquery-3.5.1.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/main.js"></script>
</body>
</html>
