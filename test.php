

<?php

$src = "001.png";
$image = new Image($src);
$image->percent = 0.1;
$image->openImage();
$image->thumpImage();
$image->showImage();
$image->saveImage("11");


?>
