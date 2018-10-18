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
							<li><a href="index.php?<?php echo $this->tpl_var['_app']; ?>-master-basic&page=<?php echo $this->tpl_var['page']; ?><?php echo $this->tpl_var['u']; ?>">考场管理</a></li>
							<li class="active">考试调度</li>
						</ol>
					</div>
				</div>
				<div class="box itembox" style="padding-top:10px;margin-bottom:0px;">
					<h4 class="title" style="padding:10px;">
						考试调度
						<a class="btn btn-primary pull-right" href="index.php?exam-master-basic&page=<?php echo $this->tpl_var['page']; ?><?php echo $this->tpl_var['u']; ?>">考场管理</a>
					</h4>
			        <table class="table table-hover table-bordered">
						<thead>
							<tr class="info">
			                    <th>SessionId</th>
								<th>用户名</th>
								<th>真实姓名</th>
								<th>试卷名</th>
								<th>开考时间</th>
								<th>操作</th>
			                </tr>
			            </thead>
			            <tbody>
		                    <?php $uid = 0;
 foreach($this->tpl_var['sessionusers']['data'] as $key => $user){ 
 $uid++; ?>
							<tr>
								<td><?php echo $user['examsessionid']; ?></td>
								<td><?php echo $user['username']; ?></td>
								<td><?php echo $user['usertruename']; ?></td>
								<td><?php echo $user['examsessionsetting']['exam']; ?></td>
								<td><?php echo date('m-d H:i',$user['examsessionstarttime']); ?></td>
								<td>
									<div class="btn-group">
										<a class="btn confirm" msg="确定要强行收卷？" href="index.php?exam-master-basic-savepaper&examsessionid=<?php echo $user['examsessionid']; ?>" title="强行收卷"><em class="glyphicon glyphicon-remove"></em></a>
									</div>
								</td>
							</tr>
							<?php } ?>
			        	</tbody>
			        </table>
			        <ul class="pagination pull-right">
			            <?php echo $this->tpl_var['sessionusers']['pages']; ?>
			        </ul>
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