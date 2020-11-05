<?php
session_start();
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require_once 'functions.php';
require_once 'connect_db.php';

$comment_id = $_POST['comment_id'];

if (isset($_POST['confirm'])) {
    try {
        $query = "UPDATE comments SET public_id = 1 WHERE id = $comment_id";
        $request = $pdo->query($query);
        $_SESSION['update'] = "Коментарий опубликован";
        header("Location: ../admin/adminComments.php");
        die();
    } catch (PDOException $e) {
        echo "Ошибка БД: " . $e->getMessage();
    }
} else {
    try {
        $query = "DELETE from comments WHERE id = $comment_id";
        $request = $pdo->query($query);
        $_SESSION['delete'] = "Комментарий удалён";
        header("Location: ../admin/adminComments.php");
        die();
    } catch (PDOException $e) {
        echo "Ошибка БД: " . $e->getMessage();
    }
}