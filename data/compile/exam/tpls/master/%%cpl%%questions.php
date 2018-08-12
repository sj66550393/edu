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
							<li class="active">普通试题管理</li>
						</ol>
					</div>
				</div>
				<div class="box itembox" style="padding-top:10px;margin-bottom:0px;">
					<h4 class="title" style="padding:10px;">
						普通试题管理
						<span class="pull-right">
							<a data-toggle="dropdown" class="btn btn-primary" href="#">添加试题 <strong class="caret"></strong></a>
							<ul class="dropdown-menu">
								<li><a href="index.php?<?php echo $this->tpl_var['_app']; ?>-master-questions-addquestion&page=<?php echo $this->tpl_var['page']; ?><?php echo $this->tpl_var['u']; ?>">单题添加</a></li>
								<!--
								<li><a href="index.php?<?php echo $this->tpl_var['_app']; ?>-master-questions-bataddquestion&page=<?php echo $this->tpl_var['page']; ?><?php echo $this->tpl_var['u']; ?>">批量添加</a></li>
								-->
								<li><a href="index.php?<?php echo $this->tpl_var['_app']; ?>-master-questions-filebataddquestion&page=<?php echo $this->tpl_var['page']; ?><?php echo $this->tpl_var['u']; ?>">CSV导入</a></li>
							</ul>
						</span>
					</h4>
					<form action="index.php?exam-master-questions" method="post" class="form-inline">
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
									录入时间：
								</td>
								<td>
									<input class="form-control datetimepicker" data-date="<?php echo date('Y-m-d',TIME); ?>" data-date-format="yyyy-mm-dd" type="text" name="search[stime]" size="10" id="stime" value="<?php echo $this->tpl_var['search']['stime']; ?>"/> - <input class="form-control datetimepicker" data-date="<?php echo date('Y-m-d',TIME); ?>" data-date-format="yyyy-mm-dd" size="10" type="text" name="search[etime]" id="etime" value="<?php echo $this->tpl_var['search']['etime']; ?>"/>
								</td>
								<td>
									关键字：
								</td>
								<td>
									<input class="form-control" name="search[keyword]" size="10" type="text" value="<?php echo $this->tpl_var['search']['keyword']; ?>"/>
								</td>
							</tr>
					        <tr>
								<td>
									科目：
								</td>
								<td>
					        		<select name="search[questionsubjectid]" class="combox form-control" target="sectionselect" refUrl="?exam-master-questions-ajax-getsectionsbysubjectid&subjectid={value}">
						        		<option value="0">选择科目</option>
								  		<?php $sid = 0;
 foreach($this->tpl_var['subjects'] as $key => $subject){ 
 $sid++; ?>
								  		<option value="<?php echo $subject['subjectid']; ?>"<?php if($subject['subjectid'] == $this->tpl_var['search']['questionsubjectid']){ ?> selected<?php } ?>><?php echo $subject['subject']; ?></option>
								  		<?php } ?>
							  		</select>
					        	</td>
					        	<td>
									章节：
								</td>
								<td>
							  		<select name="search[questionsectionid]" class="combox form-control" id="sectionselect" target="knowsselect" refUrl="?exam-master-questions-ajax-getknowsbysectionid&sectionid={value}">
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
								<td>
									录入人：
								</td>
					        	<td>
					        		<input class="form-control" name="search[username]" size="10" type="text" value="<?php echo $this->tpl_var['search']['username']; ?>"/>
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
								  		<option value="<?php echo $questype['questid']; ?>"><?php echo $questype['questype']; ?></option>
								  		<?php } ?>
							  		</select>
								</td>
								<td>
									难度：
								</td>
								<td>
									<select name="search[questionlevel]" class="form-control">
								  		<option value="0">难度不限</option>
										<option value="1"<?php if($this->tpl_var['search']['questionlevel'] == 1){ ?> checked<?php } ?>>易</option>
										<option value="2"<?php if($this->tpl_var['search']['questionlevel'] == 2){ ?> checked<?php } ?>>中</option>
										<option value="3"<?php if($this->tpl_var['search']['questionlevel'] == 3){ ?> checked<?php } ?>>难</option>
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
					<form action="index.php?exam-master-questions-batdel" method="post">
						<fieldset>
							<table class="table table-hover table-bordered">
								<thead>
									<tr class="info">
					                    <th width="32"><input type="checkbox" class="checkall" target="delids"/></th>
					                    <th width="40">ID</th>
								        <th width="80">试题类型</th>
								        <th>试题内容</th>
										<th width="140">录入人/录入时间</th>
										<th width="140">删除人/删除时间</th>
								        <th width="48">难度</th>
								        <th width="100">操作</th>
					                </tr>
					            </thead>
					            <tbody>
				                    <?php $qid = 0;
 foreach($this->tpl_var['questions']['data'] as $key => $question){ 
 $qid++; ?>
							        <tr>
										<td><input type="checkbox" name="delids[<?php echo $question['questionid']; ?>]" value="1"></td>
										<td>
											<?php echo $question['questionid']; ?>
										</td>
										<td>
											<?php echo $this->tpl_var['questypes'][$question['questiontype']]['questype']; ?>
										</td>
										<td>
											<a title="查看试题" class="selfmodal" href="javascript:;" url="index.php?exam-master-questions-detail&questionid=<?php echo $question['questionid']; ?>" data-target="#modal"><?php echo $this->G->make('strings')->subString(strip_tags(html_entity_decode($question['question'])),135); ?></a>
										</td>
										<td>
                                            <?php echo $question['questionusername']; ?><br /><?php echo date('Y-m-d',$question['questioncreatetime']); ?>
										</td>
										<td>
                                            <?php if($question['questiondeler']){ ?><?php echo $question['questiondeler']; ?><br /><?php echo date('Y-m-d',$question['questiondeltime']); ?><?php } ?>
										</td>
										<td>
											<?php if($question['questionlevel']==2){ ?>中<?php } elseif($question['questionlevel']==3){ ?>难<?php } elseif($question['questionlevel']==1){ ?>易<?php } ?>
										</td>
										<td>
											<div class="btn-group">
					                    		<a class="btn" href="index.php?exam-master-questions-modifyquestion&page=<?php echo $this->tpl_var['page']; ?>&questionid=<?php echo $question['questionid']; ?><?php echo $this->tpl_var['u']; ?>" title="修改"><em class="glyphicon glyphicon-edit"></em></a>
												<a class="btn confirm" href="index.php?exam-master-questions-delquestion&questionparent=0&page=<?php echo $this->tpl_var['page']; ?>&questionid=<?php echo $question['questionid']; ?><?php echo $this->tpl_var['u']; ?>" title="删除"><em class="glyphicon glyphicon-remove"></em></a>
					                    	</div>
										</td>
							        </tr>
							        <?php } ?>
					        	</tbody>
					        </table>
					        <div class="form-group">
					            <div class="col-sm-9">
						            <label class="radio-inline">
						                <input type="radio" name="action" value="delete" checked/>删除
						            </label>
						            <?php $sid = 0;
 foreach($this->tpl_var['search'] as $key => $arg){ 
 $sid++; ?>
						            <input type="hidden" name="search[<?php echo $key; ?>]" value="<?php echo $arg; ?>"/>
						            <?php } ?>
						            <label class="radio-inline">
						            	<button class="btn btn-primary" type="submit">提交</button>
						            </label>
						            <input type="hidden" name="page" value="<?php echo $this->tpl_var['page']; ?>"/>
						        </div>
					        </div>
					        <ul class="pagination pull-right">
					            <?php echo $this->tpl_var['questions']['pages']; ?>
					        </ul>
				        </fieldset>
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