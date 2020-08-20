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
    </head>
    <body>
    <div class="container">
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
                    if($frist != '.')
                    {
//                        echo $value."<br>";
                        $link = "http://picbed.k423.tech/pic/".$value;
                        $bz = substr($value , 0 ,15);
                        echo "<input type='hidden' id='linkk' value='$link'>";
                        echo "
                                 <tbody>
                    <tr>
                        <td>
                            $bz
                        </td>
                        <td>
                            <img src='../pic/$value' style='width:40px;height: 25px'>
                        </td>
                        <td>
                            $link
                        </td>
                        <td>
                            <button type='button' class='btn btn-primary' onclick='copyUrl()'>复制外链</button>   
                            <button type='button' class='btn btn-danger' id='con'>删除</button>
                        </td>
                    </tr>
                        ";
                    }

//                    echo $value, PHP_EOL;
                }
                ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </body>
    </html>