<?php
//引入数据库连接
include("db.php");
$username= $_POST['username'];
$pwd= md5($_POST['pwd']);//有一个md5加密
//$remember =isset( $_POST['remember_me'])?$_POST['remember_me']:'';//获取是否记住密码
$sql = "select * from user WHERE `username`='{$username}' AND `password`='{$pwd}'";
//var_dump($sql);die;
$res = $mysqli->query($sql);
if(!$res->num_rows>0)//判断有没有数据返回
{
	setcookie("username","$username");
    echo "<script>alert('登录成功！！！'); window.location.href='food/01.html'</script>";
}else{
    echo "<script>alert('登录失败！！！');  window.location.href='login.html'</script>";
}