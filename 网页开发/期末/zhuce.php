<?php
include("db.php");
//接受前端传过来的消息；

$name = $_POST['username'];
$pwd  = $_POST['pwd'];
$phone = $_POST['phone'];
$emali = $_POST['emali'];

//echo  "用户名字：".$name."<br/>密码：".$pwd."<br/>手机号：".$phone."<br/>邮箱：".$emali;
//验证用户名字必须要字母开头
//汉字：/([\x{4e00}-\x{9fa5}]+)/u
if (!preg_match('/^[A-Za-z0-9\x{4e00}-\x{9fa5}]{2,10}$/u',
    $name))
{
    echo "<script>alert('用户名只能数字字母汉字'); window.location.href='register.html'</script>";
}

//屏蔽特殊字

if (preg_match('/(cxk|jsp|admin)+/',
    $name))
{
    echo "<script>alert('用户名包含敏感字符'); window.location.href='register.html'</script>";
}
//验证密码
if (!preg_match('/^[A-Za-z0-9]{6,12}$/',
    $pwd))
{
    echo "<script>alert('必须6-12位字母或者数字'); window.location.href='register.html'</script>";
}
//验证手机号
if (!preg_match('/(13|14|15|18|17)[0-9]{9}/',
    $phone))
{
    echo "<script>alert('请输入合法手机号'); window.location.href='register.html'</script>";
}

//验证邮箱
if (!preg_match('/\w[-\w.+]*@([A-Za-z0-9][-A-Za-z0-9]+\.)+[A-Za-z]{2,14}/',
    $emali))
{
    echo "<script>alert('请输入正确邮箱号'); window.location.href='register.html'</script>";
}
//存数据库

/*
$sql="INSERT INTO table_name ( field1, field2,...fieldN )
                       VALUES
                       ( value1, value2,...valueN ); "
*/
$time=time();
$pwd=md5($pwd);
$sql= "insert into USER ('username','password','email','phone','time') VALUES ('$name','$pwd','$emali','$phone','$time')";
//echo $sql;exit();
$res=$mysqli->query($sql);
if(!$res){
    setcookie("username",$name,time()+1000);
    echo "<script>alert('注册成功'); window.location.href='food/01.html'</script>";
}else{
    echo "<script>alert('注册失败'); window.location.href='register.html'</script>";
}

