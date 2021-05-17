<?php
//
## 链接数据
$mysqli=new mysqli("localhost","root","123456","user");
if($mysqli->connect_errno){
    die("连接失败".$mysqli->connect_errno);
}
// 设置查询出来的结果的编码格式
$mysqli->query('SET NAMES UTF8');


