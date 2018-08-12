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
							<li class="active">考场管理</li>
						</ol>
					</div>
				</div>
				<div class="box itembox" style="padding-top:10px;margin-bottom:0px;">
					<h4 class="title" style="padding:10px;">
						考场管理
						<a class="btn btn-primary pull-right" href="index.php?exam-master-basic-add">添加考场</a>
					</h4>
					<form action="index.php?exam-master-basic" method="post">
						<table class="table" class="form-inline">
							<thead>
				                <tr>
							        <th colspan="2">搜索</th>
							        <th></th>
							        <th></th>
							        <th></th>
							        <th></th>
				                </tr>
				            </thead>
							<tr>
								<td>
									考场ID：
								</td>
								<td>
									<input name="search[basicid]" class="form-control" type="text" class="number" value="<?php echo $this->tpl_var['search']['basicid']; ?>"/>
								</td>
								<td>
									关键字：
								</td>
								<td>
									<input class="form-control" name="search[keyword]" type="text" value="<?php echo $this->tpl_var['search']['keyword']; ?>"/>
								</td>
								<td>
									地区：
								</td>
					        	<td>
					        		<select name="search[basicareaid]" class="form-control">
						        		<option value="0">选择地区</option>
								  		<?php $aid = 0;
 foreach($this->tpl_var['areas'] as $key => $area){ 
 $aid++; ?>
								  		<option value="<?php echo $area['areaid']; ?>"<?php if($area['areaid'] == $this->tpl_var['search']['basicareaid']){ ?> selected<?php } ?>><?php echo $area['area']; ?></option>
								  		<?php } ?>
							  		</select>
					        	</td>
					        	<td></td>
					        </tr>
					        <tr>
					        	<td>
									API标识：
								</td>
								<td>
									<input class="form-control" name="search[basicapi]" type="text" value="<?php echo $this->tpl_var['search']['basicapi']; ?>"/>
								</td>
								<td>
									科目：
								</td>
								<td>
					        		<select name="search[basicsubjectid]" class="form-control">
						        		<option value="0">选择科目</option>
								  		<?php $sid = 0;
 foreach($this->tpl_var['subjects'] as $key => $subject){ 
 $sid++; ?>
								  		<option value="<?php echo $subject['subjectid']; ?>"<?php if($subject['subjectid'] == $this->tpl_var['search']['basicsubjectid']){ ?> selected<?php } ?>><?php echo $subject['subject']; ?></option>
								  		<?php } ?>
							  		</select>
					        	</td>
					        	<td>
									状态：
								</td>
					        	<td>
					        		<select name="search[basicclosed]" class="form-control">
						        		<option value="0">不限</option>
						        		<option value="1"<?php if(1 == $this->tpl_var['search']['basicclosed']){ ?> selected<?php } ?>>仅关闭</option>
						        		<option value="-1"<?php if(-1 == $this->tpl_var['search']['basicclosed']){ ?> selected<?php } ?>>仅开启</option>
							  		</select>
					        	</td>
								<td>
									<button class="btn btn-primary" type="submit">提交</button>
								</td>

							</tr>
						</table>
						<div class="input">
							<input type="hidden" value="1" name="search[argsmodel]" />
						</div>
					</form>
			        <form action="index.php?exam-master-basic-batdelbasic" method="post">
				        <table class="table table-hover table-bordered">
							<thead>
								<tr class="info">
				                    <th><input type="checkbox" class="checkall"/></th>
				                    <th>考场ID</th>
							        <th>考场名称</th>
							        <th>考场地区</th>
							        <th>考试科目</th>
							        <th>开通人数</th>
							        <th>状态</th>
							        <th>操作</th>
				                </tr>
				            </thead>
				            <tbody>
				                <?php $bid = 0;
 foreach($this->tpl_var['basics']['data'] as $key => $basic){ 
 $bid++; ?>
						        <tr>
									<td>
										<input type="checkbox" name="delids[<?php echo $basic['basicid']; ?>]" value="1"/>
									</td>
									<td>
										<?php echo $basic['basicid']; ?>
									</td>
									<td>
										<?php echo $basic['basic']; ?>
									</td>
									<td>
										<?php echo $this->tpl_var['areas'][$basic['basicareaid']]['area']; ?>
									</td>
									<td>
										<?php echo $this->tpl_var['subjects'][$basic['basicsubjectid']]['subject']; ?>
									</td>
									<td>
										<span class="autoloaditem" autoload="index.php?exam-master-basic-getbasicmembernumber&basicid=<?php echo $basic['basicid']; ?>"></span>
									</td>
									<td>
										<?php if($basic['basicclosed']){ ?>关闭<?php } else { ?>开启<?php } ?>
									</td>
									<td>
										<div class="btn-group">
											<a class="btn" href="index.php?exam-master-basic-members&page=<?php echo $this->tpl_var['page']; ?>&basicid=<?php echo $basic['basicid']; ?><?php echo $this->tpl_var['u']; ?>" title="人员管理"><em class="glyphicon glyphicon-user"></em></a>
					                    	<a class="btn" href="index.php?exam-master-basic-scorelist&page=<?php echo $this->tpl_var['page']; ?>&basicid=<?php echo $basic['basicid']; ?><?php echo $this->tpl_var['u']; ?>" title="成绩管理"><em class="glyphicon glyphicon-duplicate"></em></a>
					                    	<a class="btn" href="index.php?exam-master-basic-offpaper&page=<?php echo $this->tpl_var['page']; ?>&basicid=<?php echo $basic['basicid']; ?><?php echo $this->tpl_var['u']; ?>" title="考试调度"><em class="glyphicon glyphglyphicon glyphicon-wrench"></em></a>
											<a class="btn" href="index.php?exam-master-basic-setexamrange&page=<?php echo $this->tpl_var['page']; ?>&basicid=<?php echo $basic['basicid']; ?><?php echo $this->tpl_var['u']; ?>" title="考试范围"><em class="glyphicon glyphglyphicon glyphicon-cog"></em></a>
											<a class="btn" href="index.php?exam-master-basic-modifybasic&page=<?php echo $this->tpl_var['page']; ?>&basicid=<?php echo $basic['basicid']; ?><?php echo $this->tpl_var['u']; ?>" title="修改"><em class="glyphicon glyphglyphicon glyphicon-edit"></em></a>
											<a class="btn confirm" href="index.php?exam-master-basic-delbasic&basicid=<?php echo $basic['basicid']; ?>&page=<?php echo $this->tpl_var['page']; ?><?php echo $this->tpl_var['u']; ?>" title="删除"><em class="glyphicon glyphglyphicon glyphicon-remove"></em></a>
										</div>
									</td>
						        </tr>
						        <?php } ?>
				        	</tbody>
				        </table>
				        <div class="form-group">
				            <div class="col-sm-9">
				            	<button class="btn btn-primary" type="submit">删除</button>
				            </div>
						</div>
					</form>
			        <ul class="pagination pull-right">
						<?php echo $this->tpl_var['basics']['pages']; ?>
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