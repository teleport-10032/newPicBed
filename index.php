<trueDOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>图床测试</title> 
	<link rel="shortcut icon" href="favicon.ico"/>
	<!-- 新 Bootstrap 核心 CSS 文件 -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
	<script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="css/demo.css"/>

</head>
<body>
	<div class="container">
		<div class="row clearfix">
			<div class="col-md-12 column">
				<div class="page-header">
					<h1>
						简易自建图床 <small>Beta</small>
					</h1>
                    <ul>
                        <li>
                            <?php
                            include 'user_judger.php';
                            if(isset($_SESSION["user"]))
                            {

                                echo "以".$_SESSION["user"]."身份登录,";
                                echo "<a href='list'>查看图片列表</a>,";
                                echo "<a href='login/login_out.php'>登出</a>";
                            }
                            ?>
                        </li>
                    </ul>
				</div>
			</div>
		</div>
		<div class="up_load_file">
		</div>
		<script src="js/jquery-3.5.1.min.js"></script>
		<script src="js/uploadfile.js"></script>
		<script>
			$('.up_load_file').uploadfile({
				url : 'file.php',
				width : 1024,
				height : 300,
				canDrag : true,
                canMultiple : true,
                success: function (fileName) {
                    // alert(fileName + '上传成功');
                },
                error: function (fileName) {
                    // alert(fileName + '上传失败');
                },
                complete : function () {
                    // alert('所有文件上传完毕');
                    window.location.href = "list";
                }
			});
		</script>

	</div>
</body>
</html>