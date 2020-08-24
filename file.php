<?php
class Image{

    private $src;
    private $imageinfo;
    private $image;
    public  $percent = 0.1;
    public function __construct($src){

        $this->src = $src;

    }
    public function openImage(){

        list($width, $height, $type, $attr) = getimagesize($this->src);
        $this->imageinfo = array(

            'width'=>$width,
            'height'=>$height,
            'type'=>image_type_to_extension($type,false),
            'attr'=>$attr
        );
        $fun = "imagecreatefrom".$this->imageinfo['type'];
        $this->image = $fun($this->src);
    }
    public function thumpImage(){

        $new_width = $this->imageinfo['width'] * $this->percent;
        $new_height = $this->imageinfo['height'] * $this->percent;
        $image_thump = imagecreatetruecolor($new_width,$new_height);
        //将原图复制带图片载体上面，并且按照一定比例压缩,极大的保持了清晰度
        imagecopyresampled($image_thump,$this->image,0,0,0,0,$new_width,$new_height,$this->imageinfo['width'],$this->imageinfo['height']);
        imagedestroy($this->image);
        $this->image = 	$image_thump;
    }
    public function showImage(){

        header('Content-Type: image/'.$this->imageinfo['type']);
        $funcs = "image".$this->imageinfo['type'];
        $funcs($this->image);

    }
    public function saveImage($name){

        $funcs = "image".$this->imageinfo['type'];
        $funcs($this->image,$name.'.'.$this->imageinfo['type']);

    }
    public function __destruct(){

        imagedestroy($this->image);
    }

}
?>

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
            $extension = "jpeg";
        else if($_FILES["file"]["type"] == "image/png")
            $extension = "png";

        $path = "pic/" . $name . ".$extension";
        $s_path = "pic/" . $name . "_small";
		move_uploaded_file($fileAlias, $path);
        $src = $path;
        $image = new Image($src);
        $image->percent = 0.1;
        $image->openImage();
        $image->thumpImage();
        $image->showImage();
        $image->saveImage($s_path);


    }
    else
    {
        echo "<script>alert('文件格式不对或超过5MB')</script>";
    }
?>