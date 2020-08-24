<?php

include "user_judger.php";
if(isset($_GET["link"]))
    $link = $_GET["link"];
if(isset($_GET["link_small"]))
    $link_small = $_GET["link_small"];


$path = "pic/".$link;
echo $path;
unlink($path);
$path = "pic/".$link_small;
echo $path;
unlink($path);

echo "<script>window.location.href='/list';</script>";