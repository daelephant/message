<?php
header("Content-type:text/html;charset=utf-8");
//获取数据
$conn = @mysql_connect('localhost','root','root');
mysql_query("use mes");
mysql_query("set names utf8");