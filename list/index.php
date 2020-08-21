<trueDOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>图床测试</title>
        <!-- 新 Bootstrap 核心 CSS 文件 -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
        <script src="../js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="../css/demo.css"/>
        <script src="../js/clipboard.min.js"></script>
    </head>
    <body>
    <div class="container">

        <div style="height: 10px"></div>
        <a href="/">
            <button class="btn btn-success" >Back</button>
        </a>
        <div style="height: 10px"></div>
        <div class="row clearfix">
            <div class="col-md-12 column">
                <table class="table table-condensed table-striped">
                    <thead>
                    <tr>
                        <th>
                            标志符
                        </th>
                        <th>
                            缩略图
                        </th>
                        <th>
                            外链
                        </th>
                        <th>
                            操作
                        </th>
                    </tr>
                    </thead>
                <?php
                include '../user_judger.php';
                $dir = iconv("UTF-8", "GBK", "../pic");
                $handler = opendir($dir);
                while (($filename = readdir($handler)) !== false)
                {
                    if ($filename !== "." && $filename !== "..")
                    {
                            $files[] = $filename ;
                    }

                }
                closedir($handler);
                foreach ($files as  $value)
                {
                    $frist = substr( $value, 0, 1 );
                    $end = substr($value,15,1);
                    if($frist != '.' && $end == '.')
                    {
//                        echo $value."<br>";
                        $link = "http://picbed.k423.tech/pic/".$value;

                        //取出文件名和扩展名
                        $bz = substr($value , 0 ,15);
                        $len = strlen($value);
                        $kzm = substr($value,16,$len-16);
                        $new_name = $bz."_small".".".$kzm;
                        echo "<tbody>
                        <tr>
                            <td>
                                $bz
                            </td>
                            <td>
                                <img src='../pic/$new_name' style='width:40px;height: 25px'>
                            </td>
                            <td>
                                <span  onclick='copyContent(this);' title='Copy'>
                                    $link
     
                               </span>
                            </td>
                            <td>
                            <a href='../delete.php?link=$value'>
                              <button type='button' class='btn btn-danger'>删除</button>
                            </a>
                            </td>
                        </tr>
                        ";
                    }
                }
                ?>
                    </tbody>

                </table>
                <hr>
                <h1>点击链接以复制</h1>
                <br>
                <span>当前剪贴板的内容如下：</span>
                <input id="copy_content" type="text" class="form-control" readonly/>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function copyContent(ElementObj){
            //获取点击的值
            var clickContent = ElementObj.innerText;
            //获取要赋值的input的元素
            var inputElement =  document.getElementById("copy_content");
            //给input框赋值
            inputElement.value = clickContent;
            //选中input框的内容
            inputElement.select();
            // 执行浏览器复制命令
            document.execCommand("Copy");
            //提示已复制
            alter('已复制');
        }
    </script>
    </body>
    </html>