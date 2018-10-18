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
					  <li><a href="index.php?exam-app">考试</a></li>
					  <li><a href="index.php?exam-app-basics"><?php echo $this->tpl_var['data']['currentbasic']['basic']; ?></a></li>
					  <li class="active">成绩单</li>
					</ol>
				</div>
			</div>
			<div class="box itembox">
				<h4 class="title">成绩单</h4>
				<blockquote class="questype" style="margin-top:20px;">
					<p>您的最高分：<span class="text-warning"><?php echo $this->tpl_var['s']['score']; ?></span> 您的最好名次：<span class="text-warning"><?php echo $this->tpl_var['s']['index']; ?></span></p>
				</blockquote>
				<table class="table table-bordered table-hover">
					<tr class="info">
						<td>名次</td>
						<td>姓名</td>
                        <td>得分</td>
						<td>考试时间</td>
						<td>用时</td>
					</tr>
					<?php $sid = 0;
 foreach($this->tpl_var['scores']['data'] as $key => $score){ 
 $sid++; ?>
					<tr>
						<td><?php echo ($this->tpl_var['page'] - 1)*20 + $sid; ?></td>
						<td><?php echo $score['usertruename']; ?></td>
						<td><?php echo $score['ehscore']; ?></td>
						<td><?php echo date('Y-m-d H:i:s',$score['ehstarttime']); ?></td>
						<td><?php if($score['ehtime'] >= 60){ ?><?php if($score['ehtime']%60){ ?><?php echo intval($score['ehtime']/60)+1; ?><?php } else { ?><?php echo intval($score['ehtime']/60); ?><?php } ?>分钟<?php } else { ?><?php echo $score['ehtime']; ?>秒<?php } ?></td>
					</tr>
				<?php } ?>
				</table>
				<ul class="pagination pull-right"><?php echo $this->tpl_var['scores']['pages']; ?></ul>
			</div>
		</div>
	</div>
</div>
<?php $this->_compileInclude('footer'); ?>
</body>
</html>