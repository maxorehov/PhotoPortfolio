<?php
    session_start();
    if (!$_SESSION['signin']) {
        header("Location: index.html");
    }
    require_once 'connect_db.php';

    $content = $_POST['content'];

    $query = "UPDATE content SET content = :content";

    try {
        $request = $pdo->prepare($query);
        $request->execute([':content' => $content]);
        $_SESSION['content'] = "Данные успешно обновлены";
        header("Location: ../admin/adminMain.php");

    } catch (PDOException $e) {
        $_SESSION['content'] = "Произошла ошибка при обновлении данных";
        $_SESSION['content_erro'] = $e->getMessage();
        header("Location: ../admin/adminMain.php");
    }