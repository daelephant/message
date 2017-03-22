<?php
header("Content-type:text/html;charset=utf-8");
$title = $_POST['title'];
$content = $_POST['content'];
$addtime = date("Y-m-d H:i:s");
// echo $addtime;exit;
//验证：
if($title == '' || $content == '') {
	echo "<script>alert('标题和内容不为空!');
	window.location.href='add.php';
	</script>";
	exit;

}
//insert database
$conn = @mysql_connect('localhost','root','root');
mysql_select_db("mes");
mysql_query("set names utf8");

//ready
$sql = "insert into mes_info values('','{$title}','{$content}','{$addtime}')";

$res = mysql_query($sql);

if (!$res) {
	echo "<script>
      alert('失败');
      window.location.href='add.php';
	</script>";
}else{
	echo "<script>
      alert('success!');
      window.location.href='index.php';
	</script>";
}


?>