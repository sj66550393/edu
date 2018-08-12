<?php $this->_compileInclude('header'); ?>
<body>
<?php $this->_compileInclude('nav'); ?>
<div class="container-fluid">
	<div class="row-fluid">
		<div class="main">
			<div class="box itembox" style="margin-bottom:0px;">
				<div class="col-xs-12">
					<ol class="breadcrumb">
						<li><a href="index.php">首页</a></li>
						<li><a href="index.php?course">课程</a></li>
						<li class="active">搜索</li>
					</ol>
				</div>
			</div>
			<?php $cid = 0;
 foreach($this->tpl_var['contents']['data'] as $key => $content){ 
 $cid++; ?>
			<div class="box itembox" style="padding-top:20px;">
				<div class="col-xs-3">
					<a href="index.php?course-app-course&csid=<?php echo $content['csid']; ?>" class="thumbnail pull-left">
						<img src="<?php echo $content['csthumb']; ?>" alt="" width="100%">
					</a>
				</div>
				<div class="col-xs-9">
					<a href="index.php?course-app-course&csid=<?php echo $content['csid']; ?>"><h4 class="title"><?php echo $content['cstitle']; ?></h4></a>
					<p><?php echo html_entity_decode($this->ev->stripSlashes($content['csdescribe'])); ?></p>
					<hr/>
					<p>
						<span class="pull-right">
							<a href=""><span class="glyphicon glyphicon-time"></span> <span><?php echo date('Y-m-d H:i:s',$content['cstime']); ?></span></a>&nbsp;&nbsp;
							<a href=""><span class="glyphicon glyphicon-heart"></span> <span>1026</span></a>
						</span>
					</p>
				</div>
			</div>
			<?php } ?>
			<ul class="pagination pagination-right"><?php echo $this->tpl_var['categorys']['pages']; ?></ul>
		</div>
	</div>
</div>
<?php $this->_compileInclude('footer'); ?>
</body>
</html>