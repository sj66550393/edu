<?php if(!$this->tpl_var['userhash']){ ?>
<?php $this->_compileInclude('header'); ?>
<body>
<?php $this->_compileInclude('nav'); ?>
<div class="container-fluid">
	<div class="row-fluid">
		<div class="main">
			<div class="col-xs-2" style="padding-top:10px;margin-bottom:0px;">
				<?php $this->_compileInclude('menu'); ?>
			</div>
			<div class="col-xs-10" id="datacontent">
<?php } ?>
				<div class="box itembox" style="margin-bottom:0px;border-bottom:1px solid #CCCCCC;">
					<div class="col-xs-12">
						<ol class="breadcrumb">
							<li><a href="index.php?<?php echo $this->tpl_var['_app']; ?>-master"><?php echo $this->tpl_var['apps'][$this->tpl_var['_app']]['appname']; ?></a></li>
							<li><a href="index.php?<?php echo $this->tpl_var['_app']; ?>-master-questions">试题管理</a></li>
							<li class="active">错题反馈</li>
						</ol>
					</div>
				</div>
				<div class="box itembox" style="padding-top:10px;margin-bottom:0px;">
					<h4 class="title" style="padding:10px;">
						错题反馈
					</h4>
			        <table class="table table-hover table-bordered">
						<thead>
							<tr class="info">
			                    <th>反馈ID</th>
								<th>试题ID</th>
								<th>反馈类型</th>
								<th>反馈内容</th>
								<th>反馈人ID</th>
								<th>反馈时间</th>
								<th>处理人ID</th>
								<th>处理时间</th>
								<th>操作</th>
			                </tr>
			            </thead>
			            <tbody>
		                    <?php $fid = 0;
 foreach($this->tpl_var['feedback']['data'] as $key => $feed){ 
 $fid++; ?>
							<tr<?php if($feed['fbstatus']){ ?> class="success"<?php } else { ?> class="danger"<?php } ?>>
								<td><?php echo $feed['fbid']; ?></td>
								<td><?php echo $feed['fbquestionid']; ?>【 <a target="_blank" href="index.php?exam-master-questions-modifyquestion&questionid=<?php echo $feed['fbquestionid']; ?>">编辑</a> 】</td>
								<td><?php echo $feed['fbtype']; ?></td>
								<td><?php echo $feed['fbcontent']; ?></td>
								<td><?php echo $feed['fbuserid']; ?></td>
								<td><?php echo date('Y-m-d',$feed['fbtime']); ?></td>
								<td><?php if($feed['fbstatus']){ ?><?php echo $feed['fbdoneuserid']; ?><?php } else { ?>未处理<?php } ?></td>
								<td><?php if($feed['fbstatus']){ ?><?php echo date('Y-m-d',$feed['fbdonetime']); ?><?php } else { ?>未处理<?php } ?></td>
								<td>
									<div class="btn-group">
										<?php if(!$feed['fbstatus']){ ?>
										<a class="btn ajax" href="index.php?exam-master-feedback-donefeedback&status=1&fbid=<?php echo $feed['fbid']; ?>" title="标记为已处理"><em class="glyphicon glyphicon-ok"></em></a>
										<?php } ?>
										<a class="btn confirm" href="index.php?exam-master-feedback-del&fbid=<?php echo $feed['fbid']; ?>" title="删除"><em class="glyphicon glyphicon-remove"></em></a>
									</div>
								</td>
							</tr>
							<?php } ?>
			        	</tbody>
			        </table>
				</div>
			</div>
<?php if(!$this->tpl_var['userhash']){ ?>
		</div>
	</div>
</div>
<?php $this->_compileInclude('footer'); ?>
</body>
</html>
<?php } ?>