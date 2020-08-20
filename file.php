<?php
	$fileName = $_FILES['file']['name'];
	$type = $_FILES['file']['type'];
	$size = $_FILES['file']['size'];
	$fileAlias = $_FILES["file"]["tmp_name"];

    if ((($_FILES["file"]["type"] == "image/png")
            || ($_FILES["file"]["type"] == "image/jpeg")
            || ($_FILES["file"]["type"] == "image/pjpeg"))
        && ($_FILES["file"]["size"] <= 5242880))
    {
        //生成当前时间戳+5长度的标志符
        function picname($len)
        {
            $chars='ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz';
            $string = time();
            for(;$len >= 1;$len --)
            {
                $pos = rand() % strlen($chars);
                $pos2 = rand() % strlen($string);
                $string = substr_replace($string,substr($chars,$pos,1),$pos2,0);
            }
            return $string;
        }

        $name =  picname(5);
        if(($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] == "imagejpg"))
            $extension = "jpg";
        else if($_FILES["file"]["type"] == "image/png")
            $extension = "png";
		move_uploaded_file($fileAlias, "pic/" . $name . ".$extension");

    }
    else
    {
        echo "<script>alert('文件格式不对或超过5MB')</script>";
    }
?>