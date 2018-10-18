<?php $this->_compileInclude('header'); ?>
<body>
<?php $this->_compileInclude('nav'); ?>
<div class="container-fluid" id="datacontent">
	<div class="row-fluid">
		<div class="main">
			<div class="box itembox" style="margin-bottom:0px;">
				<div class="col-xs-12">
					<ol class="breadcrumb">
					  <li><a href="index.php">首页</a></li>
					  <li><a href="index.php?exam-app">考试</a></li>
					  <li><a href="index.php?exam-app-basics"><?php echo $this->tpl_var['data']['currentbasic']['basic']; ?></a></li>
					  <li class="active">主观题评分</li>
					</ol>
				</div>
			</div>
		</div>
		<div class="main box">
			<form id="form1" name="form1" class="col-xs-12" action="index.php?exam-app-exam-makescore">
				<div class="box itembox">
					<h4 class="title">主观题评分</h4>
					<div class="alert alert-info">
						<ul class="list-unstyled">
		                	<li><b>阅卷规则</b></li>
	                    	<li>1、客观题系统将自动核对学员答案。</li>
	                    	<li>2、主观题请参照系统给出的答案自行核对，并给出分数。</li>
	                    	<li>3、自行评分完毕后请单击“自行判卷无误，提交”按钮，将即刻为您生成本次测验的成绩单。</li>
		                </ul>
		                <p>以下题为主观题请参照正确答案后自行给出分数</p>
	                </div>
	            </div>
				<?php $oid = 0; ?>
				<?php $qid = 0;
 foreach($this->tpl_var['questype'] as $key => $quest){ 
 $qid++; ?>
				<?php if($quest['questsort']){ ?>
				<?php if($this->tpl_var['sessionvars']['examsessionquestion']['questions'][$quest['questid']] || $this->tpl_var['sessionvars']['examsessionquestion']['questionrows'][$quest['questid']]){ ?>
				<?php $oid++; ?>
				<div class="box itembox">
					<blockquote class="questype"><?php echo $this->tpl_var['ols'][$oid]; ?>、<?php echo $quest['questype']; ?><?php echo $this->tpl_var['sessionvars']['examsessionsetting']['examsetting']['questype'][$quest]['describe']; ?></blockquote>
				</div>
				<?php $tid = 0; ?>
                <?php $qnid = 0;
 foreach($this->tpl_var['sessionvars']['examsessionquestion']['questions'][$quest['questid']] as $key => $question){ 
 $qnid++; ?>
                <?php $tid++; ?>
	            <div class="box itembox paperexamcontent">
					<h4 class="title">
						第<?php echo $tid; ?>题
						<span class="pull-right">
							<a class="btn btn-primary qicon"><i class="glyphicon glyphicon-heart-empty"></i></a>
							<a name="question_<?php echo $question['questionid']; ?>">
							<input id="time_<?php echo $question['questionid']; ?>" type="hidden" name="time[<?php echo $question['questionid']; ?>]"/>
						</span>
					</h4>
					<div class="choice">
						</a><?php echo html_entity_decode($this->ev->stripSlashes($question['question'])); ?>
					</div>
					<?php if(!$this->tpl_var['questype'][$quest]['questsort']){ ?>
					<?php if($question['questionselect'] && $this->tpl_var['questype'][$quest]['questchoice'] != 5){ ?>
					<div class="choice">
	                	<?php echo html_entity_decode($this->ev->stripSlashes($question['questionselect'])); ?>
	                </div>
	                <?php } ?>
	                <?php } ?>
					<div class="selector decidediv" style="border-left:10px solid #CCCCCC;position:relative;">
	                	<ul class="list-unstyled">
	                    	<li>正确答案：</li>
	                        <li><?php echo html_entity_decode($this->ev->stripSlashes($question['questionanswer'])); ?></li>
	                    	<li>您的答案：</li>
	                        <li><?php if(is_array($this->tpl_var['sessionvars']['examsessionuseranswer'][$question['questionid']])){ ?><?php echo implode('',$this->tpl_var['sessionvars']['examsessionuseranswer'][$question['questionid']]); ?><?php } else { ?><?php echo html_entity_decode($this->ev->stripSlashes($this->tpl_var['sessionvars']['examsessionuseranswer'][$question['questionid']])); ?><?php } ?></li>
	                    </ul>
	                </div>
	                <div class="choice" style="line-height:2.5em;">
                  		【请根据参考答案给出分值】
                  		<input type="text" class="col-xs-1" name="score[<?php echo $question['questionid']; ?>]" value="" maxvalue="<?php echo $this->tpl_var['sessionvars']['examsessionsetting']['examsetting']['questype'][$quest['questid']]['score']; ?>">
                  		<span class="text-error">提示：本题共<?php echo $this->tpl_var['sessionvars']['examsessionsetting']['examsetting']['questype'][$quest['questid']]['score']; ?>分，可输入0.5的倍数。</span>
                  	</div>
				</div>
				<?php } ?>
				<?php $qrid = 0;
 foreach($this->tpl_var['sessionvars']['examsessionquestion']['questionrows'][$quest['questid']] as $key => $questionrow){ 
 $qrid++; ?>
                <?php $tid++; ?>
                <div class="box itembox paperexamcontent">
					<h4 class="title">第<?php echo $tid; ?>题</h4>
					<div class="choice">
						<?php echo html_entity_decode($this->ev->stripSlashes($questionrow['qrquestion'])); ?>
					</div>
					<?php $did = 0;
 foreach($questionrow['data'] as $key => $data){ 
 $did++; ?>
	                <?php $qcid++; ?>
	                <blockquote style="background:#FFFFFF;border-right:1px solid #CCCCCC;border-top:1px solid #CCCCCC;border-bottom:1px solid #CCCCCC;">
						<h4 class="title">
							第<?php echo $did; ?>题
							<span class="pull-right">
								<a class="btn btn-primary qicon"><i class="glyphicon glyphicon-heart-empty"></i></a>
								<a name="question_<?php echo $data['questionid']; ?>"></a>
								<input id="time_<?php echo $data['questionid']; ?>" type="hidden" name="time[<?php echo $data['questionid']; ?>]"/>
							</span>
						</h4>
						<div class="choice">
							<?php echo html_entity_decode($this->ev->stripSlashes($data['question'])); ?>
						</div>
						<div class="selector decidediv" style="border-left:10px solid #EDEDED;position:relative;">
		                	<ul class="list-unstyled">
		                    	<li class="text-error">正确答案：</li>
		                        <li class="text-success"><?php echo html_entity_decode($this->ev->stripSlashes($data['questionanswer'])); ?></li>
		                    	<li class="text-info">您的答案：</li>
		                        <li class="text-success"><?php if(is_array($this->tpl_var['sessionvars']['examsessionuseranswer'][$data['questionid']])){ ?><?php echo implode('',$this->tpl_var['sessionvars']['examsessionuseranswer'][$data['questionid']]); ?><?php } else { ?><?php echo html_entity_decode($this->ev->stripSlashes($this->tpl_var['sessionvars']['examsessionuseranswer'][$data['questionid']])); ?><?php } ?></li>
		                    </ul>
		                </div>
		                <div class="choice" style="line-height:2.5em;">
	                  		【请根据参考答案给出分值】
	                  		<input type="text" class="col-xs-1" name="score[<?php echo $data['questionid']; ?>]" value="" maxvalue="<?php echo $this->tpl_var['sessionvars']['examsessionsetting']['examsetting']['questype'][$quest['questid']]['score']; ?>">
	                  		<span class="text-error">提示：本题共<?php echo $this->tpl_var['sessionvars']['examsessionsetting']['examsetting']['questype'][$quest['questid']]['score']; ?>分，可输入0.5的倍数。</span>
	                  	</div>
					</blockquote>
					<?php } ?>
				</div>
				<?php } ?>
				<?php } ?>
				<?php } ?>
				<?php } ?>
				<h3 class="text-center">
					 <button type="submit" class="btn btn-primary">自行判分完毕，提交分数</button>
					 <input type="hidden" name="makescore" value="1"/>
				</h3>
			</form>
		</div>
	</div>
</div>
<?php $this->_compileInclude('footer'); ?>
</body>
</html>