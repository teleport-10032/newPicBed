<?php

include "user_judger.php";
if(isset($_GET["link"]))
    $link = $_GET["link"];


$path = "pic/".$link;

echo $path;
unlink($path);

echo "<script>window.location.href='list';</script>";