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
							<li><a href="index.php?<?php echo $this->tpl_var['_app']; ?>-master-questions&page=<?php echo $this->tpl_var['page']; ?><?php echo $this->tpl_var['u']; ?>">普通试题管理</a></li>
							<li class="active">修改普通试题</li>
						</ol>
					</div>
				</div>
				<div class="box itembox" style="padding-top:10px;margin-bottom:0px;">
					<h4 class="title" style="padding:10px;">
						修改普通试题
						<a class="btn btn-primary pull-right" href="index.php?<?php echo $this->tpl_var['_app']; ?>-master-questions&page=<?php echo $this->tpl_var['page']; ?><?php echo $this->tpl_var['u']; ?>">普通试题管理</a>
					</h4>
					<form action="index.php?exam-master-questions-modifyquestion" method="post" class="form-horizontal">
						<fieldset>
						<div class="form-group">
							<label class="control-label col-sm-2">知识点：</label>
						  	<div class="col-sm-9">
						  		<textarea class="form-control" rows="4" needle="needle" min="1" msg="您最少需要选定一个知识点" name="args[questionknowsid]" id="questionknowsid" readonly><?php $kid = 0;
 foreach($this->tpl_var['question']['questionknowsid'] as $key => $know){ 
 $kid++; ?><?php echo $know['knowsid']; ?>:<?php echo $know['knows']; ?><?php echo "
"; ?><?php } ?></textarea>
							</div>
						</div>
						<div class="form-group">
					  		<label class="control-label col-sm-2"></label>
					  		<div class="col-sm-9 form-inline">
						  		<select class="combox form-control" target="isectionselect" refUrl="?exam-master-questions-ajax-getsectionsbysubjectid&subjectid={value}">
					        		<option value="0">选择科目</option>
							  		<?php $sid = 0;
 foreach($this->tpl_var['subjects'] as $key => $subject){ 
 $sid++; ?>
							  		<option value="<?php echo $subject['subjectid']; ?>"><?php echo $subject['subject']; ?></option>
							  		<?php } ?>
						  		</select>
						  		<select class="combox form-control" id="isectionselect" target="iknowsselect" refUrl="?exam-master-questions-ajax-getknowsbysectionid&sectionid={value}">
						  			<option value="0">选择章节</option>
						  		</select>
						  		<select class="combox form-control" id="iknowsselect">
						  		<option value="0">选择知识点</option>
						  		</select>
							</div>
						</div>
						<div class="form-group">
					  		<label class="control-label col-sm-2"></label>
					  		<div class="col-sm-9">
					  			<input type="button" class="btn btn-primary" value="选定" onclick="javascript:setKnowsList('questionknowsid','iknowsselect','+');"/>
					  			<input type="button" class="btn btn-danger" value="清除" onclick="javascript:setKnowsList('questionknowsid','iknowsselect','-');"/>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2">题型：</label>
						  	<div class="col-sm-3">
							  	<select needle="needle" msg="您必须为要添加的试题选择一种题型" name="args[questiontype]" class="combox form-control" onchange="javascript:setAnswerHtml($(this).find('option:selected').attr('rel'),'answerbox');">
							  		<?php $qid = 0;
 foreach($this->tpl_var['questypes'] as $key => $questype){ 
 $qid++; ?>
							  		<option rel="<?php if($questype['questsort']){ ?>0<?php } else { ?><?php echo $questype['questchoice']; ?><?php } ?>" value="<?php echo $questype['questid']; ?>"<?php if($questype['questid'] == $this->tpl_var['question']['questiontype']){ ?> selected<?php } ?>><?php echo $questype['questype']; ?></option>
							  		<?php } ?>
							  	</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2">题干：</label>
						  	<div class="col-sm-10">
							  	<textarea class="ckeditor" name="args[question]" id="question"><?php echo html_entity_decode($this->ev->stripSlashes($this->tpl_var['question']['question'])); ?></textarea>
							  	<span class="help-block">需要填空处请以()表示。</span>
							</div>
						</div>
						<div class="form-group" id="selecttext"<?php if($this->tpl_var['questypes'][$this->tpl_var['question']['questiontype']]['questsort'] || $this->tpl_var['questypes'][$this->tpl_var['question']['questiontype']]['questchoice'] == 5){ ?> style="display:none;"<?php } ?>>
							<label class="control-label col-sm-2">备选项：</label>
						  	<div class="col-sm-10">
							  	<textarea class="ckeditor" name="args[questionselect]" id="questionselect"><?php echo html_entity_decode($this->ev->stripSlashes($this->tpl_var['question']['questionselect'])); ?></textarea>
							  	<span class="help-block">无选择项的请不要填写，如填空题、问答题等主观题。</span>
							</div>
						</div>
						<div class="form-group" id="selectnumber"<?php if($this->tpl_var['questypes'][$this->tpl_var['question']['questiontype']]['questsort'] || $this->tpl_var['questypes'][$this->tpl_var['question']['questiontype']]['questchoice'] == 5){ ?> style="display:none;"<?php } ?>>
							<label for="questionselectnumber" class="control-label col-sm-2">备选项数量：</label>
						  	<div class="col-sm-3">
							  	<select class="form-control" name="args[questionselectnumber]" id="questionselectnumber">
							  		<option value="0"<?php if($this->tpl_var['question']['questionselectnumber'] == 0){ ?> selected<?php } ?>>0</option>
							  		<option value="2"<?php if($this->tpl_var['question']['questionselectnumber'] == 2){ ?> selected<?php } ?>>2</option>
							  		<option value="3"<?php if($this->tpl_var['question']['questionselectnumber'] == 3){ ?> selected<?php } ?>>3</option>
							  		<option value="4"<?php if($this->tpl_var['question']['questionselectnumber'] == 4){ ?> selected<?php } ?>>4</option>
							  		<option value="5"<?php if($this->tpl_var['question']['questionselectnumber'] == 5){ ?> selected<?php } ?>>5</option>
							  		<option value="6"<?php if($this->tpl_var['question']['questionselectnumber'] == 6){ ?> selected<?php } ?>>6</option>
							  		<option value="7"<?php if($this->tpl_var['question']['questionselectnumber'] == 7){ ?> selected<?php } ?>>7</option>
							  		<option value="8"<?php if($this->tpl_var['question']['questionselectnumber'] == 8){ ?> selected<?php } ?>>8</option>
							  	</select>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2">参考答案：</label>
							<div class="col-sm-9">
								<div id="answerbox_1" class="answerbox"<?php if($this->tpl_var['questypes'][$this->tpl_var['question']['questiontype']]['questchoice'] != 1 || $this->tpl_var['questypes'][$this->tpl_var['question']['questiontype']]['questsort']){ ?> style="display:none;"<?php } ?>>
								  	<label class="radio-inline"><input type="radio" name="targs[questionanswer1]" value="A"<?php if($this->tpl_var['question']['questionanswer'] == 'A'){ ?> checked<?php } ?>>A</label>
								  	<label class="radio-inline"><input type="radio" name="targs[questionanswer1]" value="B"<?php if($this->tpl_var['question']['questionanswer'] == 'B'){ ?> checked<?php } ?>>B</label>
								  	<label class="radio-inline"><input type="radio" name="targs[questionanswer1]" value="C"<?php if($this->tpl_var['question']['questionanswer'] == 'C'){ ?> checked<?php } ?>>C</label>
								  	<label class="radio-inline"><input type="radio" name="targs[questionanswer1]" value="D"<?php if($this->tpl_var['question']['questionanswer'] == 'D'){ ?> checked<?php } ?>>D</label>
								  	<label class="radio-inline"><input type="radio" name="targs[questionanswer1]" value="E"<?php if($this->tpl_var['question']['questionanswer'] == 'E'){ ?> checked<?php } ?>>E</label>
									<label class="radio-inline"><input type="radio" name="targs[questionanswer1]" value="F"<?php if($this->tpl_var['question']['questionanswer'] == 'F'){ ?> checked<?php } ?>>F</label>
								  	<label class="radio-inline"><input type="radio" name="targs[questionanswer1]" value="G"<?php if($this->tpl_var['question']['questionanswer'] == 'G'){ ?> checked<?php } ?>>G</label>
									<label class="radio-inline"><input type="radio" name="targs[questionanswer1]" value="H"<?php if($this->tpl_var['question']['questionanswer'] == 'H'){ ?> checked<?php } ?>>H</label>
								</div>
								<div id="answerbox_2" class="answerbox"<?php if($this->tpl_var['questypes'][$this->tpl_var['question']['questiontype']]['questchoice'] != 2 || $this->tpl_var['questypes'][$this->tpl_var['question']['questiontype']]['questsort']){ ?> style="display:none;"<?php } ?>>
								  	<label class="checkbox-inline"><input type="checkbox" name="targs[questionanswer2][]" value="A"<?php if(strpos($this->tpl_var['question']['questionanswer'],'A') !== false){ ?> checked<?php } ?>>A</label>
								  	<label class="checkbox-inline"><input type="checkbox" name="targs[questionanswer2][]" value="B"<?php if(strpos($this->tpl_var['question']['questionanswer'],'B') !== false){ ?> checked<?php } ?>>B</label>
								  	<label class="checkbox-inline"><input type="checkbox" name="targs[questionanswer2][]" value="C"<?php if(strpos($this->tpl_var['question']['questionanswer'],'C') !== false){ ?> checked<?php } ?>>C</label>
								  	<label class="checkbox-inline"><input type="checkbox" name="targs[questionanswer2][]" value="D"<?php if(strpos($this->tpl_var['question']['questionanswer'],'D') !== false){ ?> checked<?php } ?>>D</label>
								  	<label class="checkbox-inline"><input type="checkbox" name="targs[questionanswer2][]" value="E"<?php if(strpos($this->tpl_var['question']['questionanswer'],'E') !== false){ ?> checked<?php } ?>>E</label>
									<label class="checkbox-inline"><input type="checkbox" name="targs[questionanswer2][]" value="F"<?php if(strpos($this->tpl_var['question']['questionanswer'],'F') !== false){ ?> checked<?php } ?>>F</label>
								  	<label class="checkbox-inline"><input type="checkbox" name="targs[questionanswer2][]" value="G"<?php if(strpos($this->tpl_var['question']['questionanswer'],'G') !== false){ ?> checked<?php } ?>>G</label>
								  	<label class="checkbox-inline"><input type="checkbox" name="targs[questionanswer2][]" value="H"<?php if(strpos($this->tpl_var['question']['questionanswer'],'H') !== false){ ?> checked<?php } ?>>H</label>
								</div>
								<div id="answerbox_3" class="answerbox"<?php if($this->tpl_var['questypes'][$this->tpl_var['question']['questiontype']]['questchoice'] != 3 || $this->tpl_var['questypes'][$this->tpl_var['question']['questiontype']]['questsort']){ ?> style="display:none;"<?php } ?>>
								  	<label class="checkbox-inline"><input type="checkbox" name="targs[questionanswer3][]" value="A"<?php if(strpos($this->tpl_var['question']['questionanswer'],'A') !== false){ ?> checked<?php } ?>>A</label>
								  	<label class="checkbox-inline"><input type="checkbox" name="targs[questionanswer3][]" value="B"<?php if(strpos($this->tpl_var['question']['questionanswer'],'B') !== false){ ?> checked<?php } ?>>B</label>
								  	<label class="checkbox-inline"><input type="checkbox" name="targs[questionanswer3][]" value="C"<?php if(strpos($this->tpl_var['question']['questionanswer'],'C') !== false){ ?> checked<?php } ?>>C</label>
								  	<label class="checkbox-inline"><input type="checkbox" name="targs[questionanswer3][]" value="D"<?php if(strpos($this->tpl_var['question']['questionanswer'],'D') !== false){ ?> checked<?php } ?>>D</label>
								  	<label class="checkbox-inline"><input type="checkbox" name="targs[questionanswer3][]" value="E"<?php if(strpos($this->tpl_var['question']['questionanswer'],'E') !== false){ ?> checked<?php } ?>>E</label>
									<label class="checkbox-inline"><input type="checkbox" name="targs[questionanswer3][]" value="F"<?php if(strpos($this->tpl_var['question']['questionanswer'],'F') !== false){ ?> checked<?php } ?>>F</label>
								  	<label class="checkbox-inline"><input type="checkbox" name="targs[questionanswer3][]" value="G"<?php if(strpos($this->tpl_var['question']['questionanswer'],'G') !== false){ ?> checked<?php } ?>>G</label>
								  	<label class="checkbox-inline"><input type="checkbox" name="targs[questionanswer3][]" value="H"<?php if(strpos($this->tpl_var['question']['questionanswer'],'H') !== false){ ?> checked<?php } ?>>H</label>
								</div>
								<div id="answerbox_4" class="answerbox"<?php if($this->tpl_var['questypes'][$this->tpl_var['question']['questiontype']]['questchoice'] != 4 || $this->tpl_var['questypes'][$this->tpl_var['question']['questiontype']]['questsort']){ ?> style="display:none;"<?php } ?>>
								  	<label class="radio-inline"><input type="radio" name="targs[questionanswer4]" value="A"<?php if($this->tpl_var['question']['questionanswer'] == 'A'){ ?> checked<?php } ?>>对</label>
								  	<label class="radio-inline"><input type="radio" name="targs[questionanswer4]" value="B"<?php if($this->tpl_var['question']['questionanswer'] == 'B'){ ?> checked<?php } ?>>错</label>
								</div>
								<div id="answerbox_5" class="answerbox"<?php if($this->tpl_var['questypes'][$this->tpl_var['question']['questiontype']]['questchoice'] != 5){ ?> style="display:none;"<?php } ?>>
								  	<input type="text" name="targs[questionanswer5]" value="<?php echo html_entity_decode($this->ev->stripSlashes($this->tpl_var['question']['questionanswer'])); ?>" />
								</div>
								<div id="answerbox_0"<?php if(!$this->tpl_var['questypes'][$this->tpl_var['question']['questiontype']]['questsort']){ ?> style="display:none;"<?php } ?> class="answerbox">
							  		<textarea cols="72" rows="7" class="ckeditor" id="questionanswer0" name="targs[questionanswer0]"><?php echo html_entity_decode($this->ev->stripSlashes($this->tpl_var['question']['questionanswer'])); ?></textarea>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2">习题解析：</label>
						  	<div class="col-sm-10">
						  		<textarea class="ckeditor" name="args[questiondescribe]" id="questiondescribe"><?php echo html_entity_decode($this->ev->stripSlashes($this->tpl_var['question']['questiondescribe'])); ?></textarea>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2">难度：</label>
						  	<div class="col-sm-3">
							  	<select class="form-control" name="args[questionlevel]" needle="needle" msg="您必须为要添加的试题设置一个难度">
							  		<option value="1"<?php if($this->tpl_var['question']['questionlevel']==1){ ?> selected<?php } ?>>易</option>
							  		<option value="2"<?php if($this->tpl_var['question']['questionlevel']==2){ ?> selected<?php } ?>>中</option>
							  		<option value="3"<?php if($this->tpl_var['question']['questionlevel']==3){ ?> selected<?php } ?>>难</option>
							  	</select>
							</div>
						</div>
						<div class="form-group">
						  	<label class="control-label col-sm-2"></label>
						  	<div class="col-sm-9">
							  	<button class="btn btn-primary" type="submit">提交</button>
							  	<input type="hidden" name="page" value="<?php echo $this->tpl_var['page']; ?>"/>
							  	<input type="hidden" name="args[questionparent]" value="<?php echo $this->tpl_var['questionparent']; ?>"/>
							  	<input type="hidden" name="questionid" value="<?php echo $this->tpl_var['question']['questionid']; ?>"/>
							  	<input type="hidden" name="modifyquestion" value="1"/>
							  	<?php $aid = 0;
 foreach($this->tpl_var['search'] as $key => $arg){ 
 $aid++; ?>
								<input type="hidden" name="search[<?php echo $key; ?>]" value="<?php echo $arg; ?>"/>
								<?php } ?>
							</div>
						</div>
						</fieldset>
					</form>
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