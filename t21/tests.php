<?php
set_time_limit(199);
require_once(__DIR__ . "/inc/functions.inc.php");

$images = getAllImages();
$handle = opendir("./assets/img/challenges/55");
while ($de = readdir($handle)) {
    echo "$de<br />";
    $ext = end(explode(".", $de));
    compressImage("./assets/img/challenges/55/$de", "./assets/img/challenges/55/$de.compressed.$ext", 8);
}
