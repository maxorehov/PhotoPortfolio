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
	<title>Album</title>
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css" >
    <link rel="stylesheet" href="../assets/style.css">
    <link rel="stylesheet" href="../assets/fonts.css">
</head>
<body>
    <aside class="left">

        <div class="btn_mnu">
            <div class="btn_row"></div>
            <div class="btn_row"></div>
            <div class="btn_row"></div>
        </div>
        <div class="aside-nav">
           <a href="adminMain.php">Главная страница</a>
           <a href="adminAlbum.php">Добавить альбом</a>
           <a href="adminFoto.php">Добавить фото</a> 
        </div>

    </aside>
    <div class="admin-content">
        <h2>На этой странице вы можете добавить или удалить альбом</h2>
        <div class="add-album form-group">
            <h3>Заполните форму для добавления нового альбома</h3>
            <form action="../core/addAlbum.php" method="POST" enctype="multipart/form-data">
                <label for="name">Название альбома:</label>
                <input id="name" class="form-control" type="text" name="name">
                <label for="descr">Описание альбома</label>
                <textarea name="descr" class="form-control" id="descr" cols="30" rows="5"></textarea>
                <label for="prew">Выберите фото для превью:</label>
                <input id="file" type="file"  id="prew" name="prew">
                <button class="btn btn-primary">Создать</button>
                <?php
                    if ($_SESSION['addAlbum']) {
                        echo "<p class='info'>" . $_SESSION['addAlbum'] . "</p>";
                    }
                    unset($_SESSION['addAlbum']);
                ?>
            </form>
        </div>

        <div class="del-album"> 
            <h3>Выберите альбом для удаления</h3>
            <form action="../core/delAlbum.php" method="POST"> 
                <select name="del_album" class="form-control del-select">
                    <option value="0">Выберите альбом</option>
                    <?php foreach($albums as $album): ?>
                    <option value="<?= $album['name']; ?>"><?= $album['name']; ?></option>
                    <?php endforeach; ?>
                </select>
                <button class="btn btn-danger">Удалить</button>
            <?php
                if ($_SESSION['delAlbum']) {
                    echo "<p class='info'>" . $_SESSION['delAlbum'] . "</p>";
                }
                unset($_SESSION['delAlbum']);
            ?>
            </form>
        </div>
    </div>
    <script src="../assets/jquery-3.5.1.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/admin.js"></script>

</body>
</html>