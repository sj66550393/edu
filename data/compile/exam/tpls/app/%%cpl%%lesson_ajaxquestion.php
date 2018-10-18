			<?php if($this->tpl_var['question']['questionid']){ ?>
			<h4 class="title">
				第<?php echo $this->tpl_var['number']; ?>题
				<span class="pull-right">
					<a class="btn btn-primary qicon" onclick="javascript:favorquestion('<?php echo $this->tpl_var['question']['questionid']; ?>');"><i class="glyphicon glyphicon-heart-empty"></i></a>
					<a class="btn btn-primary qicon" onclick="javascript:reporterror('<?php echo $this->tpl_var['question']['questionid']; ?>');"><i class="glyphicon glyphicon-erase"></i></a>
				</span>
			</h4>
			<div class="choice">
				</a><?php echo html_entity_decode($this->ev->stripSlashes($this->tpl_var['question']['question'])); ?>
			</div>
			<?php if(!$this->tpl_var['questype']['questsort']){ ?>
			<?php if($this->tpl_var['question']['questionselect'] && $this->tpl_var['questype']['questchoice'] != 5){ ?>
			<div class="choice">
            	<?php echo html_entity_decode($this->ev->stripSlashes($this->tpl_var['question']['questionselect'])); ?>
            </div>
            <?php } ?>
			<div class="selector">
            	<?php if($this->tpl_var['questype']['questchoice'] == 1 || $this->tpl_var['questype']['questchoice'] == 4){ ?>
                    <?php $sid = 0;
 foreach($this->tpl_var['selectorder'] as $key => $so){ 
 $sid++; ?>
                    <?php if($key == $this->tpl_var['question']['questionselectnumber']){ ?>
                    <?php break;; ?>
                    <?php } ?>
                    <label class="radio-inline"><input type="radio" name="question[<?php echo $this->tpl_var['question']['questionid']; ?>]" rel="<?php echo $this->tpl_var['question']['questionid']; ?>" value="<?php echo $so; ?>" <?php if($so == $this->tpl_var['sessionvars']['examsessionuseranswer'][$this->tpl_var['question']['questionid']]){ ?>checked<?php } ?>/><?php echo $so; ?> </label>
                    <?php } ?>
                <?php } elseif($this->tpl_var['questype']['questchoice'] == 5){ ?>
                	<input type="text" style="width:100%;height:2em;" name="question[<?php echo $this->tpl_var['question']['questionid']; ?>]" value="<?php echo $this->tpl_var['sessionvars']['examsessionuseranswer'][$this->tpl_var['question']['questionid']]; ?>" rel="<?php echo $this->tpl_var['question']['questionid']; ?>"/>
                <?php } else { ?>
                    <?php $sid = 0;
 foreach($this->tpl_var['selectorder'] as $key => $so){ 
 $sid++; ?>
                    <?php if($key >= $this->tpl_var['question']['questionselectnumber']){ ?>
                    <?php break;; ?>
                    <?php } ?>
                    <label class="checkbox-inline"><input type="checkbox" name="question[<?php echo $this->tpl_var['question']['questionid']; ?>][<?php echo $key; ?>]" rel="<?php echo $this->tpl_var['question']['questionid']; ?>" value="<?php echo $so; ?>" <?php if(in_array($so,$this->tpl_var['sessionvars']['examsessionuseranswer'][$this->tpl_var['question']['questionid']])){ ?>checked<?php } ?>/><?php echo $so; ?> </label>
                    <?php } ?>
                <?php } ?>
            </div>
			<?php } else { ?>
			<div class="selector">
				<?php $this->tpl_var['dataid'] = $this->tpl_var['question']['questionid']; ?>
				<textarea class="jckeditor" etype="simple" id="editor<?php echo $this->tpl_var['dataid']; ?>" name="question[<?php echo $this->tpl_var['dataid']; ?>]" rel="<?php echo $this->tpl_var['question']['questionid']; ?>"><?php echo html_entity_decode($this->ev->stripSlashes($this->tpl_var['sessionvars']['examsessionuseranswer'][$this->tpl_var['dataid']])); ?></textarea>
			</div>
			<?php } ?>
			<div class="choice" style="margin-top:20px;overflow:hidden;">
				<div class="btn-group hide answerbox pull-right">
            		<?php if($this->tpl_var['number'] > 1){ ?>
            		<a class="btn btn-primary ajax" target="questionpanel" href="index.php?<?php echo $this->tpl_var['_app']; ?>-app-lesson-ajax-questions&number=<?php echo intval($this->tpl_var['number'] - 1); ?>" title="上一题">上一题</a>
            		<?php } ?>
					<a class="btn btn-primary ajax" target="questionpanel" href="index.php?<?php echo $this->tpl_var['_app']; ?>-app-lesson-ajax-questions&number=<?php echo intval($this->tpl_var['number'] + 1); ?>" title="下一题">下一题</a>
            	</div>
            	<div class="btn-group pull-right">
            		<a class="btn btn-primary questionbtn" href="javascript:;" onclick="javascript:$('.questionbtn').addClass('hide');$('.answerbox').removeClass('hide');" title="查看答案">查看答案</a>
            	</div>
        	</div>
			<div class="answerbox hide" style="margin-top:1rem;">
				<table class="table table-hover table-bordered">
            		<tr class="info">
                		<td width="15%">正确答案：</td>
                		<td><?php echo html_entity_decode($this->ev->stripSlashes($this->tpl_var['question']['questionanswer'])); ?></td>
                	</tr>
                	<tr>
                		<td>答案解析：</td>
                		<td><?php echo html_entity_decode($this->ev->stripSlashes($this->tpl_var['question']['questiondescribe'])); ?></td>
                	</tr>
            	</table>
			</div>
			<div id="rightanswer_<?php echo $this->tpl_var['question']['questionid']; ?>" class="hide"><?php echo html_entity_decode($this->ev->stripSlashes($this->tpl_var['question']['questionanswer'])); ?></div>
			<?php } else { ?>
			<h4 class="title">第<?php echo $this->tpl_var['number']; ?>题<?php echo $this->tpl_var['prenumer']; ?></h4>
			<div class="choice">
				<?php echo html_entity_decode($this->ev->stripSlashes($this->tpl_var['question']['qrquestion'])); ?>
			</div>
			<?php $tmpa = array();; ?>
			<?php $did = 0;
 foreach($this->tpl_var['question']['data'] as $key => $data){ 
 $did++; ?>
			<?php $tmpa[$did] = $data;; ?>
			<?php } ?>
			<?php $did = 0;
 foreach($this->tpl_var['question']['data'] as $key => $data){ 
 $did++; ?>
            <blockquote class="paperexamcontent_<?php echo $data['questionid']; ?>" style="background:#FFFFFF;border-right:1px solid #CCCCCC;border-top:1px solid #CCCCCC;border-bottom:1px solid #CCCCCC;">
			<h4 class="title">
				第<?php echo $did; ?>题
				<span class="pull-right">
					<a class="btn btn-primary qicon" onclick="javascript:favorquestion('<?php echo $data['questionid']; ?>');"><i class="glyphicon glyphicon-heart-empty"></i></a>
					<a class="btn btn-primary qicon" onclick="javascript:reporterror('<?php echo $data['questionid']; ?>');"><i class="glyphicon glyphicon-erase"></i></a>
					<a name="question_<?php echo $data['questionid']; ?>"></a>
					<input id="time_<?php echo $data['questionid']; ?>" type="hidden" name="time[<?php echo $data['questionid']; ?>]"/>
				</span>
			</h4>
			<div class="choice">
				<a name="qrchild_<?php echo $data['questionid']; ?>"></a>
				<?php echo html_entity_decode($this->ev->stripSlashes($data['question'])); ?>
			</div>
			<?php if(!$this->tpl_var['questype']['questsort']){ ?>
			<?php if($data['questionselect'] && $this->tpl_var['questype']['questchoice'] != 5){ ?>
			<div class="choice">
            	<?php echo html_entity_decode($this->ev->stripSlashes($data['questionselect'])); ?>
            </div>
            <?php } ?>
            <div class="selector questionanswerbox">
	        	<?php if($this->tpl_var['questype']['questchoice'] == 1 || $this->tpl_var['questype']['questchoice'] == 4){ ?>
	                <?php $sid = 0;
 foreach($this->tpl_var['selectorder'] as $key => $so){ 
 $sid++; ?>
	                <?php if($key == $data['questionselectnumber']){ ?>
	                <?php break;; ?>
	                <?php } ?>
	                <label class="radio-inline"><input type="radio" name="question[<?php echo $data['questionid']; ?>]" rel="<?php echo $data['questionid']; ?>" value="<?php echo $so; ?>" <?php if($so == $this->tpl_var['sessionvars']['examsessionuseranswer'][$data['questionid']]){ ?>checked<?php } ?>/><?php echo $so; ?> </label>
	                <?php } ?>
	            <?php } elseif($this->tpl_var['questype']['questchoice'] == 5){ ?>
	            	<input type="text" class="form-control" name="question[<?php echo $data['questionid']; ?>]" value="<?php echo $this->tpl_var['sessionvars']['examsessionuseranswer'][$data['questionid']]; ?>" rel="<?php echo $data['questionid']; ?>"/>
	            <?php } else { ?>
	                <?php $sid = 0;
 foreach($this->tpl_var['selectorder'] as $key => $so){ 
 $sid++; ?>
	                <?php if($key >= $data['questionselectnumber']){ ?>
	                <?php break;; ?>
	                <?php } ?>
	                <label class="checkbox-inline"><input type="checkbox" name="question[<?php echo $data['questionid']; ?>][<?php echo $key; ?>]" rel="<?php echo $data['questionid']; ?>" value="<?php echo $so; ?>" <?php if(in_array($so,$this->tpl_var['sessionvars']['examsessionuseranswer'][$data['questionid']])){ ?>checked<?php } ?>/><?php echo $so; ?> </label>
	                <?php } ?>
	            <?php } ?>
	        </div>
			<?php } else { ?>
			<div class="selector questionanswerbox">
				<?php $this->tpl_var['dataid'] = $data['questionid']; ?>
				<textarea class="jckeditor" etype="simple" id="editor<?php echo $this->tpl_var['dataid']; ?>" name="question[<?php echo $this->tpl_var['dataid']; ?>]" rel="<?php echo $data['questionid']; ?>"><?php echo html_entity_decode($this->ev->stripSlashes($this->tpl_var['sessionvars']['examsessionuseranswer'][$this->tpl_var['dataid']])); ?></textarea>
			</div>
			<?php } ?>
			<div class="choice" style="margin-top:20px;overflow:hidden;">
				<div class="btn-group pull-right hide answerbox">
	        		<?php if($this->tpl_var['number'] > 1){ ?>
	            		<?php if($did == 1){ ?>
	            		<a class="btn btn-primary ajax" target="questionpanel" href="index.php?<?php echo $this->tpl_var['_app']; ?>-app-lesson-ajax-questions&number=<?php echo intval($this->tpl_var['number'] - $this->tpl_var['prenumber']); ?>" title="上一题">上一题</a>
	            		<?php } else { ?>
	            		<a class="btn btn-primary" href="#qrchild_<?php echo $tmpa[$did - 1]['questionid']; ?>" title="上一题">上一题</a>
	            		<?php } ?>
	            	<?php } else { ?>
	            		<?php if($did > 1){ ?>
	            		<a class="btn btn-primary" href="#qrchild_<?php echo $tmpa[$did - 1]['questionid']; ?>" title="上一题">上一题</a>
	            		<?php } ?>
	        		<?php } ?>
	        		<?php if($did < count($tmpa)){ ?>
	        		<a class="btn btn-primary" href="#qrchild_<?php echo $tmpa[$did + 1]['questionid']; ?>" title="下一题">下一题</a>
	        		<?php } else { ?>
	            		<?php if(($did + $this->tpl_var['number']) < $this->tpl_var['allnumber']){ ?>
						<a class="btn btn-primary ajax" target="questionpanel" href="index.php?<?php echo $this->tpl_var['_app']; ?>-app-lesson-ajax-questions&number=<?php echo intval($this->tpl_var['number'] + count($tmpa)); ?>" title="下一题">下一题</a>
						<?php } ?>
					<?php } ?>
	        	</div>
	        	<div class="btn-group pull-right">
	        		<a class="btn btn-primary questionbtn" href="javascript:;" onclick="javascript:$('.paperexamcontent_<?php echo $data['questionid']; ?>').find('.questionbtn').addClass('hide');$('.paperexamcontent_<?php echo $data['questionid']; ?>').find('.answerbox').removeClass('hide');" title="查看答案">查看答案</a>
	        	</div>
	    	</div>
	    	<div id="rightanswer_<?php echo $data['questionid']; ?>" class="hide"><?php echo html_entity_decode($this->ev->stripSlashes($data['questionanswer'])); ?></div>
			<div class="answerbox hide" style="margin-top:1rem;">
				<table class="table table-hover table-bordered">
            		<tr class="info">
                		<td width="15%">正确答案：</td>
                		<td><?php echo html_entity_decode($this->ev->stripSlashes($data['questionanswer'])); ?></td>
                	</tr>
                	<tr>
                		<td>答案解析：</td>
                		<td><?php echo html_entity_decode($this->ev->stripSlashes($data['questiondescribe'])); ?></td>
                	</tr>
            	</table>
			</div>
		</div>
		</blockquote>
		<?php } ?>
		<?php } ?>
		<script type="text/javascript">
			$("input:radio").click(function(){
				var _this = $(this);
				var qid = _this.attr('rel');
				_this.parents('.selector').parent().find('.questionbtn').addClass('hide');
				_this.parents('.selector').parent().find('.answerbox').removeClass('hide');
				if(_this.val() == $("#rightanswer_"+qid).html())
				{
					_this.parents('.selector').addClass('alert-success').addClass('alert').html('恭喜您回答正确！');
				}
				else
				{
					_this.parents('.selector').addClass('alert-danger').addClass('alert').html('回答错误，正确答案为：'+$("#rightanswer_"+qid).html()+'，您选择的答案是：'+_this.val());
				}
			});
		</script>