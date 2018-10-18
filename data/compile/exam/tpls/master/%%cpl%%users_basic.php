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
							<li><a href="index.php?<?php echo $this->tpl_var['_app']; ?>-master-users">开通课程</a></li>
							<li class="active">课程选择</li>
						</ol>
					</div>
				</div>
				<div class="box itembox" style="padding-top:10px;margin-bottom:0px;">
					<h4 class="title" style="padding:10px;">
						课程选择
						<a class="btn btn-primary pull-right" href="index.php?<?php echo $this->tpl_var['_app']; ?>-master-users">开通课程</a>
					</h4>
			        <form action="index.php?exam-master-users-basics&userid=<?php echo $this->tpl_var['userid']; ?>" method="post" class="form-inline">
						<table class="table">
							<thead>
								<tr>
									<th colspan="6">搜索</th>
								</tr>
							</thead>
							<tr>
								<td>
									考场ID：
								</td>
								<td>
									<input class="form-control" name="search[basicid]" class="inline" type="text" class="number" value="<?php echo $this->tpl_var['search']['basicid']; ?>"/>
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
					        		<select class="form-control" name="search[basicareaid]">
					        		<option value="0">选择地区</option>
							  		<?php $aid = 0;
 foreach($this->tpl_var['areas'] as $key => $area){ 
 $aid++; ?>
							  		<option value="<?php echo $area['areaid']; ?>"<?php if($area['areaid'] == $this->tpl_var['search']['basicareaid']){ ?> selected<?php } ?>><?php echo $area['area']; ?></option>
							  		<?php } ?>
							  		</select>
					        	</td>
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
					        		<select class="form-control" name="search[basicsubjectid]">
					        		<option value="0">选择科目</option>
							  		<?php $sid = 0;
 foreach($this->tpl_var['subjects'] as $key => $subject){ 
 $sid++; ?>
							  		<option value="<?php echo $subject['subjectid']; ?>"<?php if($subject['subjectid'] == $this->tpl_var['search']['basicsubjectid']){ ?> selected<?php } ?>><?php echo $subject['subject']; ?></option>
							  		<?php } ?>
							  		</select>
					        	</td>
								<td>
									<button class="btn btn-primary" type="submit">搜索</button>
									<input type="hidden" value="1" name="search[argsmodel]" />
								</td>
								<td></td>
							</tr>
						</table>
					</form>
			        <table class="table table-hover table-bordered">
						<thead>
							<tr class="info">
			                    <th>考场ID</th>
						        <th>考场名称</th>
						        <th>考场地区</th>
						        <th>考试科目</th>
						        <th>到期时间</th>
						        <th>操作</th>
			                </tr>
			            </thead>
			            <tbody>
		                    <?php $bid = 0;
 foreach($this->tpl_var['basics']['data'] as $key => $basic){ 
 $bid++; ?>
					        <tr>
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
									<?php if($this->tpl_var['openbasics'][$basic['basicid']]){ ?><?php echo date('Y-m-d',$this->tpl_var['openbasics'][$basic['basicid']]['obendtime']); ?><?php } else { ?>未开启<?php } ?>
								</td>
								<td>
									<?php if($this->tpl_var['openbasics'][$basic['basicid']]){ ?><a class="ajax btn" title="关闭考场" href="index.php?exam-master-users-closebasics&userid=<?php echo $this->tpl_var['userid']; ?>&basicid=<?php echo $basic['basicid']; ?>"><em class="glyphicon glyphicon-minus-sign"></em></a><?php } else { ?><a class="ajax btn" href="index.php?exam-master-users-openbasics&userid=<?php echo $this->tpl_var['userid']; ?>&basicid=<?php echo $basic['basicid']; ?>" title="开启考场"><em class="glyphicon glyphicon-plus-sign"></em></a><?php } ?>
								</td>
					        </tr>
					        <?php } ?>
			        	</tbody>
			        </table>
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