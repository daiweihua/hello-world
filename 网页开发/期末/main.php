<?php
	//判断用户名是否存在
	if(!isset($_COOKIE['username']))
	{
		echo "<script>alert('请先登录！！！'); window.location.href='login.html'</script>";
	}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>成功页面</title>
</head>

<body>
<h2 style="color: red">欢迎！管理员：<?php echo $_COOKIE['username']; ?>的登录</h2>
您登录时间：<?php echo date("Y-m-d H:i:s"); ?>
<img src="img/3.jpg" alt="">
<br />
<a href="exit.php">注销登录</a>
</body>
</html>
