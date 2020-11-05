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
        echo "Ошибка БД: " . $e->getMessage();
    }
    
    
?>
<!DOCTYPE html>
<html lang = "en">
<head>
	<meta charset = "UTF-8">
	<meta name = "viewport" content = "width=device-width, initial-scale=1.0">
	<title>Foto</title>
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
                        <span class="counter">10</span>
                    </div>
                </li>
            </ul>
        </nav>

    </aside>
    <div class="admin-content">
        <h2>На этой странице вы можете добавить или удалить фотографии</h2>
        <div class="add-foto">
            <form action="../core/addFoto.php" enctype="multipart/form-data" method="POST">
                <label for="albums">Выберите альбом для добавления фото:</label>
                <select name="addTo" id="albums" class="form-control">
                    <option value="0">Выберите альбом</option>
                    <?php foreach($albums as $album): ?>
                        <option value="<?= $album['id']; ?>" name="<?= $album['name']; ?>"><?= $album['name']; ?></option>
                    <?php endforeach; ?>
                </select>
                <p class="foto">
                    <input type="file" name="foto[]" />
                    <input class="add" type="button" value="+">
                    <input class="remove" type="button" value="-">
                </p>
                <div class="mass">
                    
                </div>
                <button class="btn btn-primary">Загрузить</button>
                
                    <?php
                        if (isset($_SESSION['addFoto'])) {
                            echo "<p class='info'>" . $_SESSION['addFoto'] . "</p>";
                        }
                        unset($_SESSION['addFoto']);
                    ?>
                
            </form>
        </div>
        
        <div class="del-fotos">
            <h3>Выберите фото для удаления</h3>
            <form method="POST">
                <label for="delFotos">Выберите альбом из которого следует удалить фотографии:</label>
                <select name="needDel" id="delFotos" class="form-control">
                    <option value="0">Выберите альбом</option>
                    <?php foreach($albums as $album): ?>
                    <option value="<?= $album['id']; ?>"><?= $album['name']; ?></option>
                    <?php endforeach; ?>
                </select>
            </form>
            <form action="../core/delFoto.php" method="POST">
                
                
                
                    <?php
                        if (isset($_SESSION['delFoto'])) {
                            echo "<p class='info'>" . $_SESSION['delFoto'] . "</p>";
                        }
                        unset($_SESSION['delFoto']);
                    ?>
                
                <div id="ans">
                    
                </div>

                
                <button class="btn btn-danger">Удалить</button>
            </form>

        </div>
        
    </div>
    
    <script src="../assets/jquery-3.5.1.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/admin.js"></script>
</body>
</html>
