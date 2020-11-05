<?php
    session_start();
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>TODO supply a title</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css" >
        <link rel="stylesheet" href="../assets/style.css">
        <link rel="stylesheet" href="../assets/fonts.css">
    </head>
    <body class="body-auth">
        <div class="container auth">
            <form action="../core/auth.php" method="POST">
<!--                <label for="login">Введите логин</label>
                <input id="login" class="form-control" type="text" name="login">-->
                <label for="pass">Введите пароль</label>
                <input id="pass" class="form-control" type="text" name="pass">
                <button  class="btn btn-success">Войти</button>
                <?php
                    if (isset($_SESSION['msg'])) {
                        echo "<p class='error'>{$_SESSION['msg']}</p>";
                        unset($_SESSION['msg']);
                    }
                ?>
            </form>
        </div>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/jquery-3.5.1.min.js" ></script>
    </body>
</html>
