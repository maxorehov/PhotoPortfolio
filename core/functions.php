<?php

function my_print($data) 
{
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}

function reArrayFiles($arr) {

    $photo_ary = array();
    $photo_count = count($arr['name']);
    $photo_keys = array_keys($arr);

    for ($i = 0; $i < $photo_count; $i++) {
        foreach ($photo_keys as $key) {
            $photo_ary[$i][$key] = $arr[$key][$i];
        }
    }

    return $photo_ary;
}
