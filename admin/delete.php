<?php
require_once("../public/config.php");
$id = $_GET['id'];

$sql = "delete from mes_info where id='{$id}'";

$res = mysql_query($sql);

if (!$res) {
	echo "<script>
      alert('失败');
      window.location.href='index.php';
	</script>";
}else{
	echo "<script>
      alert('success!');
      window.location.href='index.php';
	</script>";
}