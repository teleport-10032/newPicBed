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
    <link rel="shortcut icon" href="../favicon.ico"/>
</head>
<?php
session_start();
if(isset($_SESSION["user"]))
    echo "<script>window.location.href='/';</script>";

?>
<body>
    <div class="container">
        <div class="row clearfix">
            <div class="col-md-12 column">
                <form class="form-horizontal" role="form" action="fun.php" method="post">
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-2 control-label">account</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputEmail3" name="account"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" id="inputPassword3" name="passwd"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-success">Sign in</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>