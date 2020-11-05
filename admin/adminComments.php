<?php
    session_start();
    require_once '../core/connect_db.php';
    require_once '../core/functions.php';
    if (!$_SESSION['signin']) {
        header("Location: index.html");
    }
    
    $query = "SELECT * FROM comments WHERE public_id = 0";
    try {
        $response = $pdo->query($query);
        $comments = $response->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Ошибка БД: " . $e->getMessage();
    }

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
        <h2>На этой странице вы можете подтвердить или отменить вывод комментария</h2>
        <div class="container">
            
                <?php foreach($comments as $comment): ?>
                    <div class="comment">
                        <form action="../core/comments.php" method="POST">
                            <div><?= $comment['name']; ?></div>
                            <textarea name="text" value="<?= $comment['text']; ?>" disabled><?= $comment['text']; ?></textarea>
                            <input name="comment_id" type="hidden" value="<?= $comment['id']; ?>">
                            <input name="confirm" type="submit" value="подтвердить">
                            <input name="delete" type="submit" value="удалить">
                            <!--<button>confirm</button>-->
                        </form>
                    </div>

                <?php endforeach; ?>
           
        </div>

    </div>
    

    <script src="../assets/jquery-3.5.1.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="../assets/js/admin.js"></script>

</body>
</html>