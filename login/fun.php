<?php
session_start();
if(isset($_POST["account"]))
    $account = $_POST["account"];
if(isset($_POST["passwd"]))
    $passwd = $_POST["passwd"];

$tmp = $account;
//echo $account."<br>".$passwd;
if($account="teleport" && $passwd="teleport")
    $_SESSION['user'] = $tmp;

echo "<script>window.location.href='/';</script>";

