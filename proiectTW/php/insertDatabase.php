<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['image'], $_POST['filename'])) { //https://stackoverflow.com/questions/48048797/base64canvas-to-blob-blob-to-php

    $image = $_POST['image'];
    $filename = $_POST['filename'];

    /* edit to suit own environment */
    $savepath = 'C:/xampp/htdocs/TW2021/proiectTW/assets/';

    $target = $savepath . $filename;
    $result = file_put_contents($target, base64_decode($image));


    header('HTTP/1.1 200 OK', true, 200);
    header('Content-Type: text/plain');
    exit($result ? sprintf($target) : sprintf('Unable to save %s', $filename));
}
?>
