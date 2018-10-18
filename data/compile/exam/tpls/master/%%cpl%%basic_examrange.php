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
							<li class="active">考试范围</li>
						</ol>
					</div>
				</div>
				<div class="box itembox" style="padding-top:10px;margin-bottom:0px;">
					<h4 class="title" style="padding:10px;">
						考试范围
						<a class="btn btn-primary pull-right" href="index.php?exam-master-basic&page=<?php echo $this->tpl_var['page']; ?><?php echo $this->tpl_var['u']; ?>">考场管理</a>
					</h4>
			        <form action="?exam-master-basic-setexamrange" method="post" class="form-horizontal">
						<table class="table">
							<thead>
							<tr>
								<th colspan="8"><?php echo $this->tpl_var['basic']['basic']; ?></th>
							</tr>
							</thead>
							<tr>
								<td>
									考场ID：
								</td>
								<td>
									<?php echo $this->tpl_var['basic']['basicid']; ?>
								</td>
								<td>
									科目：
								</td>
								<td>
									<?php echo $this->tpl_var['subjects'][$this->tpl_var['basic']['basicsubjectid']]['subject']; ?>
								</td>
								<td>
									地区：
								</td>
					        	<td>
					        		<?php echo $this->tpl_var['areas'][$this->tpl_var['basic']['basicareaid']]['area']; ?>
					        	</td>
					        	<td>
									API标识：
								</td>
								<td>
									<?php echo $this->tpl_var['basic']['basicapi']; ?>
								</td>
							</tr>
						</table>
						<div class="form-group">
							<label class="control-label col-sm-3">章节选择：<input type="checkbox" onclick="javascript:$('.section:checkbox').prop('checked',$(this).is(':checked'));"> </label>
						</div>
						<?php $sid = 0;
 foreach($this->tpl_var['sections'] as $key => $section){ 
 $sid++; ?>
						<div class="form-group">
							<label class="control-label col-sm-3">
						        <input type="checkbox" onclick="javascript:$('.sec_<?php echo $section['sectionid']; ?>:checkbox').prop('checked',$(this).is(':checked'));"> <?php echo $section['section']; ?>
						    </label>
						    <div class="col-sm-9" style="text-indent:10px;">
						    	<?php $kid = 0;
 foreach($this->tpl_var['knows'][$section['sectionid']] as $key => $know){ 
 $kid++; ?>
						    	<label class="checkbox-inline"><input type="checkbox" value="<?php echo $know['knowsid']; ?>" name="args[basicknows][<?php echo $section['sectionid']; ?>][<?php echo $know['knowsid']; ?>]" class="section sec_<?php echo $section['sectionid']; ?>" <?php if($this->tpl_var['basic']['basicknows'][$section['sectionid']][$know['knowsid']] == $know['knowsid']){ ?>checked<?php } ?>/><?php echo $know['knows']; ?></label>
						    	<?php } ?>
						    </div>
						</div>
						<?php } ?>
						<div class="form-group">
							<label for="basicexam_auto" class="control-label col-sm-3">考试范围设置：</label>
							<div class="col-sm-9">
								<label class="radio-inline">
						          	<input type="radio" class="input-text" name="args[basicexam][rulemodel]" value="0"<?php if($this->tpl_var['basic']['basicexam']['rulemodel'] == 0){ ?> checked<?php } ?>/> 对题量配比生效（上述指定范围抽题）
					          	</label>
					          	<label class="radio-inline">
					          		<input type="radio" class="input-text" name="args[basicexam][rulemodel]" value="1"<?php if($this->tpl_var['basic']['basicexam']['rulemodel'] == 1){ ?> checked<?php } ?>/> 对题量配比无效（允许跨科目抽题）
					          	</label>
							</div>
						</div>
						<div class="form-group">
							<label for="basicexam_auto" class="control-label col-sm-3">考场模式：</label>
							<div class="col-sm-9">
								<label class="radio-inline">
						          	<input type="radio" class="input-text" name="args[basicexam][model]" value="0"<?php if($this->tpl_var['basic']['basicexam']['model'] == 0){ ?> checked<?php } ?>/> 全功能模式（练习和正式考试均开放）
					          	</label>
					          	<label class="radio-inline">
					          		<input type="radio" class="input-text" name="args[basicexam][model]" value="1"<?php if($this->tpl_var['basic']['basicexam']['model'] == 1){ ?> checked<?php } ?>/> 练习模式（仅练习功能开放）
					          	</label>
					          	<label class="radio-inline">
					          		<input type="radio" class="input-text" name="args[basicexam][model]" value="2"<?php if($this->tpl_var['basic']['basicexam']['model'] == 2){ ?> checked<?php } ?>/> 考试模式（仅正式考试开放）
					          	</label>
							</div>
						</div>
						<div class="form-group">
							<label for="basicexam_auto" class="control-label col-sm-3">正式考试试题排序：</label>
							<div class="col-sm-9">
								<label class="radio-inline">
						          	<input type="radio" class="input-text" name="args[basicexam][changesequence]" value="0"<?php if($this->tpl_var['basic']['basicexam']['changesequence'] == 0){ ?> checked<?php } ?>/> 不打乱试题排序
					          	</label>
					          	<label class="radio-inline">
					          		<input type="radio" class="input-text" name="args[basicexam][changesequence]" value="1"<?php if($this->tpl_var['basic']['basicexam']['changesequence'] == 1){ ?> checked<?php } ?>/> 打乱试题排序
					          	</label>
							</div>
						</div>
						<div class="form-group">
							<label for="basicexam_auto" class="control-label col-sm-3">绑定模拟考试试卷：</label>
							<div class="col-sm-9 form-inline">
								<input size="50" class="form-control" type="text" id="basicexam_auto" name="args[basicexam][auto]" needle="needle" msg="您必须填写至少一个试卷" value="<?php echo $this->tpl_var['basic']['basicexam']['auto']; ?>" /> <a class="selfmodal btn btn-primary" href="javascript:;" data-target="#modal" url="index.php?exam-master-exams-selectexams&search[subjectid]=<?php echo $this->tpl_var['basic']['basicsubjectid']; ?>&exams={basicexam_auto}&useframe=1&target=basicexam_auto" valuefrom="basicexam_auto">选卷</a>
								<span class="help-block">请在试卷管理处查看试卷ID，将数字ID填写在这里，多个请用英文逗号（,）隔开。留空或填0时将无法进行该项考试。</span>
							</div>
						</div>
						<div class="form-group">
							<label for="basicexam_autotemplate" class="control-label col-sm-3">模拟考试模板：</label>
							<div class="col-sm-3">
								<select class="form-control" id="basicexam_autotemplate" name="args[basicexam][autotemplate]">
									<?php $tid = 0;
 foreach($this->tpl_var['tpls']['ep'] as $key => $tpl){ 
 $tid++; ?>
					            	<option value="<?php echo $tpl; ?>"<?php if($this->tpl_var['basic']['basicexam']['autotemplate'] == $tpl){ ?> selected<?php } ?>><?php echo $tpl; ?></option>
					            	<?php } ?>
				            	</select>
							</div>
						</div>
						<div class="form-group">
							<label for="basicexam_self" class="control-label col-sm-3">绑定正式考试试卷：</label>
							<div class="col-sm-9 form-inline">
								<input size="50" class="form-control" type="text" id="basicexam_self" name="args[basicexam][self]" needle="needle" msg="您必须填写至少一个试卷" value="<?php echo $this->tpl_var['basic']['basicexam']['self']; ?>" /> <a class="selfmodal btn btn-primary" href="javascript:;" data-target="#modal" url="index.php?exam-master-exams-selectexams&search[subjectid]=<?php echo $this->tpl_var['basic']['basicsubjectid']; ?>&exams={basicexam_self}&useframe=1&target=basicexam_self" valuefrom="basicexam_self">选卷</a>
								<span class="help-block">请在试卷管理处查看试卷ID，将数字ID填写在这里，多个请用英文逗号（,）隔开。留空或填0时将无法进行该项考试。</span>
							</div>
						</div>
						<div class="form-group">
							<label for="basicexam_selftemplate" class="control-label col-sm-3">正式考试试卷模板：</label>
							<div class="col-sm-3">
								<select class="form-control" id="basicexam_selftemplate" name="args[basicexam][selftemplate]">
					            	<?php $tid = 0;
 foreach($this->tpl_var['tpls']['pp'] as $key => $tpl){ 
 $tid++; ?>
					            	<option value="<?php echo $tpl; ?>"<?php if($this->tpl_var['basic']['basicexam']['selftemplate'] == $tpl){ ?> selected<?php } ?>><?php echo $tpl; ?></option>
					            	<?php } ?>
					            </select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-3">正式考试开启时间：</label>
							<div class="col-sm-9 form-inline">
								<input class="form-control" name="args[basicexam][opentime][start]" type="text" value="<?php if($this->tpl_var['basic']['basicexam']['opentime']['start']){ ?><?php echo date('Y-m-d H:i:s',$this->tpl_var['basic']['basicexam']['opentime']['start']); ?><?php } else { ?>0<?php } ?>" needle="needle" msg="您必须输入一个开启时间起点" /> - <input class="form-control" name="args[basicexam][opentime][end]" type="text" value="<?php if($this->tpl_var['basic']['basicexam']['opentime']['end']){ ?><?php echo date('Y-m-d H:i:s',$this->tpl_var['basic']['basicexam']['opentime']['end']); ?><?php } else { ?>0<?php } ?>" needle="needle" msg="您必须输入一个开启时间终点" />
								<span class="help-block">开始结束时间均需填写，格式为2014-05-01 08:00:00，不限制开启时间请任意一项填写0。如果设置的结束时间减去5分钟比考生交卷时间要早，则系统按照结束时间减去5分钟收卷。</span>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-3">正式考试抽卷规则：</label>
							<div class="col-sm-9">
								<label class="radio-inline">
					          		<input type="radio" class="input-text" name="args[basicexam][selectrule]" value="1"<?php if($this->tpl_var['basic']['basicexam']['selectrule']){ ?> checked<?php } ?>/> 系统随机抽卷
					          	</label>
					          	<label class="radio-inline">
					          		<input type="radio" class="input-text" name="args[basicexam][selectrule]" value="0"<?php if(!$this->tpl_var['basic']['basicexam']['selectrule']){ ?> checked<?php } ?>/> 用户手动选卷
					          	</label>
								<span class="help-block">系统随机抽卷时，用户无法看到试卷列表，系统会随机挑选试卷供用户考试。手选试卷时，系统列出试卷列表供用户选择进行考试。</span>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-3">正式考试限考次数：</label>
							<div class="col-sm-9 form-inline">
								<input class="form-control" name="args[basicexam][examnumber]" type="text" value="<?php if($this->tpl_var['basic']['basicexam']['examnumber']){ ?><?php echo $this->tpl_var['basic']['basicexam']['examnumber']; ?><?php } else { ?>0<?php } ?>" needle="needle" msg="您必须输入考试次数" />
								<span class="help-block">不限制次数请填写0，当您选择抽卷规则为系统随机抽卷时，限考次数为所有试卷限考次数，当您选择抽卷规则为用户自选时，限考次数为每套试卷限考次数。即如果设置限考次数为x，当随机抽卷时，用户一共可以考试x次；手选试卷时，用户每套试卷可考试x次。</span>
							</div>
						</div>
						<div class="form-group">
							<label for="basicexam_auto" class="control-label col-sm-3">交卷后：</label>
							<div class="col-sm-9">
								<label class="radio-inline">
						          		<input type="radio" class="input-text" name="args[basicexam][notviewscore]" value="0"<?php if($this->tpl_var['basic']['basicexam']['notviewscore'] == 0){ ?> checked<?php } ?>/> 直接显示分数
					          	</label>
					          	<label class="radio-inline">
					          		<input type="radio" class="input-text" name="args[basicexam][notviewscore]" value="1"<?php if($this->tpl_var['basic']['basicexam']['notviewscore'] == 1){ ?> checked<?php } ?>/> 暂不显示分数
					          	</label>
							</div>
						</div>
						<div class="form-group">
							<label for="basicexam_auto" class="control-label col-sm-3">可开通的用户组：</label>
							<div class="col-sm-9 form-inline">
								<input size="50" class="form-control" type="text" id="basicexam_allowgroup" name="args[basicexam][allowgroup]" value="<?php echo $this->tpl_var['basic']['basicexam']['allowgroup']; ?>" /> <a class="selfmodal btn btn-primary" href="javascript:;" data-target="#modal" url="index.php?exam-master-basic-selectgroups&groups={basicexam_allowgroup}&useframe=1&target=basicexam_allowgroup" valuefrom="basicexam_allowgroup">选组</a>
								<span class="help-block">不填写或者填写0为不限制。</span>
							</div>
						</div>
						<div class="submit">
							<label for="basicexam_auto" class="control-label col-sm-3"></label>
							<div class="col-sm-9">
								<button class="btn btn-primary" type="submit">提交</button>
								<input type="hidden" name="page" value="<?php echo $this->tpl_var['page']; ?>"/>
								<input type="hidden" name="setexamrange" value="1"/>
								<input type="hidden" name="basicid" value="<?php echo $this->tpl_var['basic']['basicid']; ?>"/>
								<?php $aid = 0;
 foreach($this->tpl_var['search'] as $key => $arg){ 
 $aid++; ?>
								<input type="hidden" name="search[<?php echo $key; ?>]" value="<?php echo $arg; ?>"/>
								<?php } ?>
							</div>
						</div>
					</form>
				</div>
			</div>
<?php if(!$this->tpl_var['userhash']){ ?>
		</div>
	</div>
</div>
<div id="modal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button aria-hidden="true" class="close" type="button" data-dismiss="modal">×</button>
				<h4 id="myModalLabel">
					可选择列表
				</h4>
			</div>
			<div class="modal-body" id="modal-body">asdasdasdasdsa</div>
			<div class="modal-footer">
				 <button aria-hidden="true" class="btn btn-primary" data-dismiss="modal">完成</button>
			</div>
		</div>
	</div>
</div>
<?php $this->_compileInclude('footer'); ?>
</body>
</html>
<?php } ?>