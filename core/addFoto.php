<?php
require_once 'functions.php';

my_print($_POST);
my_print($_FILES['photo']);

my_print(reArrayFiles($_FILES['photo']));




