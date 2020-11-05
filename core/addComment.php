<?php
require_once "connect_db.php";

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$name = $_POST['name'];
$comment = $_POST['comment'];
$album_id = $_POST['albumId'];
$public_id = 0;

if (empty($name)) die("Укажите имя чтобы ваш комментарий было удобно отображать");

if (empty($comment)) die("Вы забыли добавить текст комментария");

$query = "INSERT INTO comments VALUES ( NULL, :name, :comment, :album_id, :public_id )";
try {
    $request = $pdo->prepare($query);
    $request->execute(['name' => $name, 'comment' => $comment, 'album_id' => $album_id, 'public_id' => $public_id]);
    die("Комментрарий отправлен на модерацию");
} catch (PDOException $e) {
        echo "Не удалось добавить комментарий" . $e->getMessage();
}





