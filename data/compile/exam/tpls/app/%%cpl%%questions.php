<?php if(!$this->tpl_var['userhash']){ ?>
<?php $this->_compileInclude('header'); ?>
<body>
<?php $this->_compileInclude('nav'); ?>
<style>
.list-group-item.active a{
color:#FFFFFF;
text-decoration:none;}
</style>
<div class="container-fluid">
	<div class="row-fluid">
		<div class="main">
			<div class="col-xs-2" style="padding-top:10px;margin-bottom:0px;">
				<div class="panel panel-primary">
					<div id="panel-element-212076" class="panel-collapse<?php if($this->tpl_var['method'] == 'questions' || $this->tpl_var['method'] == 'rowsquestions' || $this->tpl_var['method'] == 'feedback'){ ?> in<?php } ?> collapse" role="tabpanel">
			     		<ul class="list-group">
							<li class="list-group-item active"><a href="index.php?<?php echo $this->tpl_var['_app']; ?>-app-questions">普通试题管理</a></li>
							<li class="list-group-item"><a href="index.php?<?php echo $this->tpl_var['_app']; ?>-app-questions-questionrows">题帽题管理</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="col-xs-10" id="datacontent">
<?php } ?>
				<div class="box itembox" style="padding-top:10px;margin-bottom:0px;">
					<h4 class="title" style="padding:10px;">
						普通试题
					</h4>
					<form action="index.php?exam-app-questions" method="post" class="form-inline">
						<table class="table">
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
									试题ID：
								</td>
								<td>
									<input name="search[questionid]" class="form-control" size="10" type="text" class="number" value="<?php echo $this->tpl_var['search']['questionid']; ?>"/>
								</td>
								<td>
									关键字：
								</td>
								<td>
									<input class="form-control" name="search[keyword]" size="10" type="text" value="<?php echo $this->tpl_var['search']['keyword']; ?>"/>
								</td>
								<td>
									试题类型：
								</td>
								<td>
									<select name="search[questiontype]" class="form-control">
								  		<option value="0">类型不限</option>
								  		<?php $qid = 0;
 foreach($this->tpl_var['questypes'] as $key => $questype){ 
 $qid++; ?>
								  		<option value="<?php echo $questype['questid']; ?>"<?php if($this->tpl_var['search']['questiontype'] == $questype['questid']){ ?> selected<?php } ?>><?php echo $questype['questype']; ?></option>
								  		<?php } ?>
							  		</select>
								</td>
							</tr>
					        <tr>
								<td>
									难度：
								</td>
								<td>
									<select name="search[questionlevel]" class="form-control">
								  		<option value="0">难度不限</option>
										<option value="1"<?php if($this->tpl_var['search']['questionlevel'] == 1){ ?> selected<?php } ?>>易</option>
										<option value="2"<?php if($this->tpl_var['search']['questionlevel'] == 2){ ?> selected<?php } ?>>中</option>
										<option value="3"<?php if($this->tpl_var['search']['questionlevel'] == 3){ ?> selected<?php } ?>>难</option>
							  		</select>
								</td>
					        	<td>
									章节：
								</td>
								<td>
							  		<select name="search[questionsectionid]" class="combox form-control" id="sectionselect" target="knowsselect" refUrl="index.php?exam-app-questions-getknowsbysectionid&sectionid={value}">
							  		<option value="0">选择章节</option>
							  		<?php if($this->tpl_var['sections']){ ?>
							  		<?php $sid = 0;
 foreach($this->tpl_var['sections'] as $key => $section){ 
 $sid++; ?>
							  		<option value="<?php echo $section['sectionid']; ?>"<?php if($section['sectionid'] == $this->tpl_var['search']['questionsectionid']){ ?> selected<?php } ?>><?php echo $section['section']; ?></option>
							  		<?php } ?>
							  		<?php } ?>
							  		</select>
					        	</td>
					        	<td>
									知识点：
								</td>
								<td>
							  		<select name="search[questionknowsid]" id="knowsselect" class="form-control">
								  		<option value="">选择知识点</option>
								  		<?php if($this->tpl_var['knows']){ ?>
								  		<?php $kid = 0;
 foreach($this->tpl_var['knows'] as $key => $know){ 
 $kid++; ?>
								  		<option value="<?php echo $know['knowsid']; ?>"<?php if($know['knowsid'] == $this->tpl_var['search']['questionknowsid']){ ?> selected<?php } ?>><?php echo $know['knows']; ?></option>
								  		<?php } ?>
								  		<?php } ?>
							  		</select>
					        	</td>
							</tr>
							<tr>
								<td colspan="2">
									<button class="btn btn-primary" type="submit">搜索</button>
									<input type="hidden" value="1" name="search[argsmodel]" />
								</td>
								<td colspan="4"></td>
							</tr>
						</table>
					</form>
					<table class="table table-hover table-bordered">
						<thead>
							<tr class="info">
			                    <th width="80">试题类型</th>
						        <th>试题内容</th>
						        <th width="48">难度</th>
			                </tr>
			            </thead>
			            <tbody>
		                    <?php $qid = 0;
 foreach($this->tpl_var['questions']['data'] as $key => $question){ 
 $qid++; ?>
					        <tr>
								<td>
									<?php echo $this->tpl_var['questypes'][$question['questiontype']]['questype']; ?>
								</td>
								<td>
									<a title="查看试题" class="selfmodal" href="javascript:;" url="index.php?exam-app-questions-detail&questionid=<?php echo $question['questionid']; ?>" data-target="#modal"><?php echo $this->G->make('strings')->subString(strip_tags(html_entity_decode($question['question'])),135); ?></a>
								</td>
								<td>
									<?php if($question['questionlevel']==2){ ?>中<?php } elseif($question['questionlevel']==3){ ?>难<?php } elseif($question['questionlevel']==1){ ?>易<?php } ?>
								</td>
					        </tr>
					        <?php } ?>
			        	</tbody>
			        </table>
			        <ul class="pagination pull-right">
			            <?php echo $this->tpl_var['questions']['pages']; ?>
			        </ul>
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
					试题详情
				</h4>
			</div>
			<div class="modal-body"></div>
			<div class="modal-footer">
				 <button aria-hidden="true" class="btn btn-primary" data-dismiss="modal">关闭</button>
			</div>
		</div>
	</div>
</div>
<?php $this->_compileInclude('footer'); ?>
</body>
</html>
<?php } ?>