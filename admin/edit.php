<?php
require_once("../public/config.php");

$id = $_GET['id'];

$sql = "select * from mes_info where id='{$id}'";
$res = mysql_query($sql);
$row = mysql_fetch_assoc($res);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>管理</title>
	<link rel="stylesheet" href="../bs/css/bootstrap.min.css">
	<script src="../bs/js/jquery.min.js"></script>
	<script src="../bs/js/bootstrap.min.js"></script>
	<script src="../bs/js/holder.min.js"></script>
</head>
<body>
	<div class="container">
		<nav class="navbar navbar-inverse" >
		  <div class="navbar-header">
		    <a class="navbar-brand"  href="index.html">管理</a>
		  </div>
		</nav>
		<div class="row">
		  <div class="col-md-3">
		  	<div class="list-group">
			  <a href="#" class="list-group-item active">
			    管理列表
			  </a>
			  <a href="list.html" class="list-group-item">留言管理</a>
			</div>
		  </div>
		  <div class="col-md-9">
				<form role="form" action="update.php" method="post">
				  	<input type="hidden" name="id" value="<?php echo $row['id'] ?>">
					  <div class="form-group">
					    <label>留言主题</label>
					    <input type="text" class="form-control" name="title" value="<?php echo $row['title'] ?>">
					  </div>
					  <div class="form-group">
					    <label>留言内容</label>
					   <textarea class="form-control" rows="10" name="content"><?php echo $row['content'] ?></textarea>
					  </div>
					  <input type="submit" class="btn btn-default" value="保存">
				</form>
		  </div>
		</div>
	</div>
</body>
</html>


