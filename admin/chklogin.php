<?php
header("Content-type:text/html;charset=utf-8");
 //接受表单
$username = $_POST['username'];
$password = $_POST['password'];
//check
if ($username == ''|| $password == '') {
	echo "<script>
      alert('user和pw不为空');
      window.location.href='login.php';

	</script>";
	exit;
}

//连接数据库

$conn = @mysql_connect('localhost','root','root');
//选择数据库
mysql_query("use mes");
//设置编码
mysql_query("set names utf8");

//准备sql语句--通过用户名取当前用户的所有信息
$sql = "select * from admin where user_name='{$username}' and pass_word='{$password}'";
//select * from admin where user_name='admin' and pass_word='admin';
$res = mysql_query($sql);
$row = mysql_num_rows($res);
if (!$row) {
	echo "<script>alert('用户名或密码错误!');
	window.location.href='login.php';</script>";
	exit;
}else{
	echo "<script>alert('登录成功!');
	window.location.href='index.php';</script>";
}
