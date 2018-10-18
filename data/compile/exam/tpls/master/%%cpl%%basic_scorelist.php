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
							<li><a href="index.php?<?php echo $this->tpl_var['_app']; ?>-master-basic">考场管理</a></li>
							<li class="active">成绩统计</li>
						</ol>
					</div>
				</div>
				<div class="box itembox" style="padding-top:10px;margin-bottom:0px;">
					<h4 class="title" style="padding:10px;">
						【<?php echo $this->tpl_var['basic']['basic']; ?>】成绩统计
						<a class="ajax pull-right btn btn-primary" href="index.php?<?php echo $this->tpl_var['_app']; ?>-master-basic-outscore&basicid=<?php echo $this->tpl_var['basicid']; ?><?php echo $this->tpl_var['u']; ?>">导出成绩</a>
					</h4>
					<form action="index.php?<?php echo $this->tpl_var['_app']; ?>-master-basic-scorelist&basicid=<?php echo $this->tpl_var['basicid']; ?>" method="post">
						<table class="table form-inline">
					        <tr>
								<td style="border-top:0px;">
									考试时间：
								</td>
								<td style="border-top:0px;">
									<input class="form-control datetimepicker" data-date="<?php echo date('Y-m-d',TIME); ?>" data-date-format="yyyy-mm-dd" type="text" name="search[stime]" size="10" id="stime" value="<?php echo $this->tpl_var['search']['stime']; ?>"/> - <input class="form-control datetimepicker" data-date="<?php echo date('Y-m-d',TIME); ?>" data-date-format="yyyy-mm-dd" size="10" type="text" name="search[etime]" id="etime" value="<?php echo $this->tpl_var['search']['etime']; ?>"/>
								</td>
								<td style="border-top:0px;">
									分数段：
								</td>
								<td style="border-top:0px;">
									<input class="form-control" name="search[sscore]" id="sscore" type="text" value="<?php echo $this->tpl_var['search']['sscore']; ?>"/> - <input class="form-control" type="text" name="search[escore]" id="escore" value="<?php echo $this->tpl_var['search']['escore']; ?>"/>
								</td>
							</tr>
					        <tr>
					        	<td>
									试卷：
								</td>
								<td>
									<select name="search[examid]" class="form-control">
								  		<option value="0">不限</option>
								  		<?php $eid = 0;
 foreach($this->tpl_var['exampaper'] as $key => $ep){ 
 $eid++; ?>
								  		<option value="<?php echo $ep['examid']; ?>"<?php if($this->tpl_var['search']['examid'] == $ep['examid']){ ?> selected<?php } ?>><?php echo $ep['exam']; ?></option>
								  		<?php } ?>
							  		</select>
								</td>
								<td>
								</td>
								<td><button class="btn btn-primary" type="submit">提交</button> <a class="btn btn-primary" href="index.php?exam-master-basic-stats&basicid=<?php echo $this->tpl_var['basicid']; ?><?php echo $this->tpl_var['u']; ?>">统计</a></td>
					        </tr>
						</table>
						<div class="input">
							<input type="hidden" value="1" name="search[argsmodel]" />
						</div>
					</form>
			        <table class="table table-hover table-bordered">
						<thead>
							<tr class="info">
			                    <th>ID</th>
			                    <?php if(!$this->tpl_var['search']){ ?>
			                    <th>名次</th>
			                    <?php } ?>
			                    <th>考生用户名</th>
			                    <?php $fid = 0;
 foreach($this->tpl_var['fields'] as $key => $field){ 
 $fid++; ?>
			                    <th><?php echo $field['fieldtitle']; ?></th>
			                    <?php } ?>
			                    <th>分数</th>
						        <th>考试名称</th>
						        <th>考试时间</th>
						        <th>考试用时</th>
			                </tr>
			            </thead>
			            <tbody>
		                    <?php $eid = 0;
 foreach($this->tpl_var['exams']['data'] as $key => $exam){ 
 $eid++; ?>
					        <tr<?php if($exam['ehneedresit']){ ?> class="text-danger"<?php } ?>>
								<td>
									<?php echo $exam['ehid']; ?>
								</td>
								<?php if(!$this->tpl_var['search']){ ?>
								<td>
									<?php echo ($this->tpl_var['page'] - 1) * 10 + $eid; ?>
								</td>
								<?php } ?>
								<td>
									<?php echo $exam['ehusername']; ?>
								</td>
								<?php $fid = 0;
 foreach($this->tpl_var['fields'] as $key => $field){ 
 $fid++; ?>
			                    <th><?php echo $exam[$field['field']]; ?></th>
			                    <?php } ?>
								<td>
									<?php echo $exam['ehscore']; ?>
								</td>
								<td>
									<?php echo $exam['ehexam']; ?>
								</td>
								<td>
									<?php echo date('Y-m-d H:i',$exam['ehstarttime']); ?>
								</td>
								<td>
									<?php if($exam['ehtime'] >= 60){ ?><?php if($exam['ehtime']%60){ ?><?php echo intval($exam['ehtime']/60)+1; ?><?php } else { ?><?php echo intval($exam['ehtime']/60); ?><?php } ?>分钟<?php } else { ?><?php echo $exam['ehtime']; ?>秒<?php } ?>
								</td>
					        </tr>
					        <?php } ?>
			        	</tbody>
			        </table>
			        <ul class="pagination pull-right">
			            <?php echo $this->tpl_var['exams']['pages']; ?>
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