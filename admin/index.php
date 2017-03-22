<?php
//连接数据库
$conn = @mysql_connect('localhost','root','root');
//选择数据库
mysql_query("use mes");
//设置编码
mysql_query("set names utf8");
//获取当前页
$page = isset($_GET['page']) ? $_GET['page'] : 1;
//设置每页显示数目：
$pagesize = 2;

//获取总记录数
$res = mysql_query("select * from mes_info");
$total = mysql_num_rows($res);

//计算最大页
$pagemax = ceil($total/$pagesize);
//计算偏移量
$offset = ($page-1)*$pagesize;
//获取数据
$sql = "select * from mes_info";
$res = mysql_query($sql);
$rows = array();
while ($row = mysql_fetch_assoc($res)) {
	$rows[] = $row;
}
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
		    <a class="navbar-brand"  href="index.php">管理</a>
		  </div>
		</nav>
		<div class="row">
		  <div class="col-md-3">
		  	<div class="list-group">
			  <a href="#" class="list-group-item active">
			    管理列表
			  </a>
			  <a href="#" class="list-group-item">留言管理</a>
			</div>
		  </div>
		  <div class="col-md-9">
			
			<div class="panel panel-warning">
				<div class="panel-heading">
					留言管理
				</div>
			    <div class="panel-body">
			   		<table class="table table-bordered">
					  <tr>
					  	<th>序号</th>
					  	<th>标题</th>
					  	<th>留言时间</th>
					  	<th>操作</th>
					  </tr>
					  <?php foreach($rows as $key=>$value){ ?>
					  <tr>
					  	<td><?php echo $value['id']; ?></td>
					  	<td><?php echo $value['title']; ?></td>
					  	<td><?php echo $value['addtime']; ?></td>
					  	<td><a href="edit.php?id=<?php echo $value['id']; ?>">修改</a>
							<a href="delete.php?id=<?php echo $value['id']; ?>" onclick="return confirm('确定要删除吗？');" >删除</a>
					  	</td>
					  </tr>
					  <?php }; ?>
					</table>
			    </div>
			    <div class="panel-footer">
					<ul class="pager">
					  	<li class="previous"><a href="index.php?page=1">&larr; 首页</a></li>
			  <li><a href="index.php?page=<?php echo $page<=1 ? $page : $page-1;?>">上一页</a></li>
			  <li><a href="index.php?page=<?php echo $page>=$pagemax ? $pagemax : $page+1; ?>">下一页</a></li>
			  <li class="next"><a href="index.php?page=<?php echo $pagemax;?>">末页 &rarr;</a></li>
					</ul>
			    </div>
			</div>
		  </div>
		</div>
	</div>
</body>
</html>

