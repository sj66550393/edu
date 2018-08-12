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
							<li class="active">开通课程</li>
						</ol>
					</div>
				</div>
				<div class="box itembox" style="padding-top:10px;margin-bottom:0px;">
					<h4 class="title" style="padding:10px;">
						开通课程
					</h4>
			        <form action="index.php?exam-master-users" method="post" class="form-inline">
						<table class="table">
							<thead>
								<tr>
									<th colspan="5">搜索</th>
								</tr>
							</thead>
							<tr>
								<td>
									用户ID：
								</td>
								<td class="input">
									<input name="search[userid]" class="form-control" size="25" type="text" class="number" value="<?php echo $this->tpl_var['search']['userid']; ?>"/>
								</td>
								<td>
									用户名：
								</td>
								<td class="input">
									<input class="form-control" name="search[username]" size="25" type="text" value="<?php echo $this->tpl_var['search']['username']; ?>"/>
								</td>
								<td>
									<button class="btn btn-primary" type="submit">搜索</button>
									<input type="hidden" value="1" name="search[argsmodel]" />
								</td>
							</tr>
						</table>
					</form>
			        <table class="table table-hover table-bordered">
						<thead>
							<tr class="info">
			                    <th>ID</th>
						        <th>用户名</th>
						        <th>电子邮件</th>
						        <th>注册IP</th>
						        <th>积分点数</th>
						        <th>角色</th>
						        <th>注册时间</th>
						        <th>操作</th>
			                </tr>
			            </thead>
			            <tbody>
			            	<?php $uid = 0;
 foreach($this->tpl_var['users']['data'] as $key => $user){ 
 $uid++; ?>
			            	<tr>
			                    <td><?php echo $user['userid']; ?></td>
			                    <td><?php echo $user['username']; ?></td>
								<td><?php echo $user['useremail']; ?></td><td><?php echo $user['userregip']; ?></td>
								<td><?php echo $user['usercoin']; ?></td><td><?php echo $this->tpl_var['groups'][$user['usergroupid']]['groupname']; ?></td>
								<td><?php echo date('Y-m-d H:i:s',$user['userregtime']); ?></td>
								<td>
								  	<div class="btn-group">
			                    		<a class="btn" href="index.php?exam-master-users-basics&userid=<?php echo $user['userid']; ?><?php echo $this->tpl_var['u']; ?>" title="开通课程"><em class="glyphicon glyphicon-th-list"></em></a>
									</div>
								</td>
			                </tr>
			                <?php } ?>
			        	</tbody>
			        </table>
			        <ul class="pagination pull-right">
			            <?php echo $this->tpl_var['users']['pages']; ?>
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