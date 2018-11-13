<?php if(!$this->tpl_var['userhash']){ ?>
<?php $this->_compileInclude('header'); ?>
<body>
<?php $this->_compileInclude('nav'); ?>
<div class="container-fluid">
	<div class="row-fluid">
		<div class="main" id="datacontent">
<?php } ?>
			<div class="box itembox" style="margin-bottom:0px;">
				<ul class="breadcrumb">
					<li>
						<span class="icon-home"></span> <a href="index.php?exam">考场选择</a>
					</li>
					<li>
						<a href="index.php?exam-app-basics"><?php echo $this->tpl_var['data']['currentbasic']['basic']; ?></a>
					</li>
					<li>
						<a href="index.php?exam-app-history&ehtype=<?php echo $this->tpl_var['ehtype']; ?>">考试记录</a>
					</li>
					<li class="active">
						查看解析
					</li>
				</ul>
			</div>
			<div class="box itembox" style="padding-top:24px;">
				<ul class="nav nav-tabs">
					<li<?php if(!$this->tpl_var['type']){ ?> class="active"<?php } ?>>
						<a href="index.php?exam-app-favor">普通试题</a>
					</li>
					<li<?php if($this->tpl_var['type']){ ?> class="active"<?php } ?>>
						<a href="index.php?exam-app-favor&type=1">题冒题</a>
					</li>
				</ul>
				<form action="index.php?exam-app-favor" method="post" class="form-inline" style="padding-top:10px;">
					<blockquote class="questype">
						<table width="100%">
							<tr>
								<td width="10%">
									题型筛选：
								</td>
								<td width="80%">
									<select name="search[questype]" class="form-control" autocomplete="off">
			                        	<option value="0">请选择题型</option>
			                        	<?php $qid = 0;
 foreach($this->tpl_var['questype'] as $key => $quest){ 
 $qid++; ?>
			                    		<option value="<?php echo $quest['questid']; ?>"<?php if($this->tpl_var['search']['questype'] == $quest['questid']){ ?> selected<?php } ?>><?php echo $quest['questype']; ?></option>
			                    		<?php } ?>
			                        </select>
								</td>
								<td width="10%">
									<button class="btn btn-primary" type="submit">提交</button>
									<input type="hidden" value="<?php echo $this->tpl_var['type']; ?>" name="type" />
								</td>
							</tr>
						</table>
					</blockquote>
				</form>
				<?php if($this->tpl_var['type']){ ?>
					<?php $ishead = 0; ?>
					<?php $ispre = 0; ?>
					<?php $qid = 0;
 foreach($this->tpl_var['favors']['data'] as $key => $question){ 
 $qid++; ?>
						<?php if($pre != $question['questionparent']){ ?>
						<?php $ishead = 0; ?>
						<?php } ?>
						<div class="box itembox paperexamcontent">
							<?php if(!$ishead){ ?>
							<h4 class="title">
								【<?php echo $this->tpl_var['questype'][$question['questiontype']]['questype']; ?>】
							</h4>
							<div class="choice">
								<?php echo html_entity_decode($this->ev->stripSlashes($question['qrquestion'])); ?>
							</div>
							<?php } ?>
							<blockquote style="background:#FFFFFF;border-right:1px solid #CCCCCC;border-top:1px solid #CCCCCC;border-bottom:1px solid #CCCCCC;">
								<h4 class="title">
									第<?php echo ($this->tpl_var['page']-1)*20+$qid; ?>题
									<span class="pull-right">
										<a class="btn btn-danger qicon ajax" href="index.php?exam-app-favor-ajax-delfavor&favorid=<?php echo $question['favorid']; ?>"><i class="glyphicon glyphicon-remove"></i></a>
									</span>
								</h4>
								<div class="choice">
									<?php echo html_entity_decode($this->ev->stripSlashes($question['question'])); ?>
								</div>
								<?php if(!$this->tpl_var['questypes'][$question['questiontype']]['questsort']){ ?>
								<?php if($question['questionselect'] && $this->tpl_var['questype'][$question['questiontype']]['questchoice'] != 5){ ?>
								<div class="choice">
				                	<?php echo html_entity_decode($this->ev->stripSlashes($question['questionselect'])); ?>
				                </div>
				                <?php } ?>
			                    <?php } ?>
			                    <div class="selector" style="border-left:10px solid #EDEDED;position:relative;">
				                	<table class="table">
				                		<tr>
				                    		<td width="15%" style="border-top:0px;">正确答案：</td>
				                    		<td style="border-top:0px;"><?php echo html_entity_decode($this->ev->stripSlashes($question['questionanswer'])); ?></td>
				                    	</tr>
				                    	<tr>
				                    		<td>所在章：</td>
				                    		<td><?php $kid = 0;
 foreach($question['qrknowsid'] as $key => $knowsid){ 
 $kid++; ?><?php echo $this->tpl_var['globalsections'][$this->tpl_var['globalknows'][$knowsid['knowsid']]['knowssectionid']]['section']; ?>&nbsp;&nbsp;&nbsp;<?php } ?></td>
				                    	</tr>
				                    	<tr>
				                    		<td>知识点：</td>
				                    		<td><?php $kid = 0;
 foreach($question['qrknowsid'] as $key => $knowsid){ 
 $kid++; ?><?php echo $this->tpl_var['globalknows'][$knowsid['knowsid']]['knows']; ?>&nbsp;&nbsp;&nbsp;<?php } ?></td>
				                    	</tr>
				                    	<tr>
				                    		<td>答案解析：</td>
				                    		<td><?php echo html_entity_decode($this->ev->stripSlashes($question['questiondescribe'])); ?></td>
				                    	</tr>
				                	</table>
				                </div>
							</div>
						<?php $ishead++; ?>
			            <?php $pre=$question['questionparent']; ?>
					<?php } ?>
					</div>
				<?php } else { ?>
					<?php $qid = 0;
 foreach($this->tpl_var['favors']['data'] as $key => $question){ 
 $qid++; ?>
					<div class="box itembox paperexamcontent">
						<h4 class="title">
							第<?php echo ($this->tpl_var['page']-1)*20+$qid; ?>题【<?php echo $this->tpl_var['questype'][$question['questiontype']]['questype']; ?>】
							<span class="pull-right">
								<a class="btn btn-danger qicon ajax" href="index.php?exam-app-favor-ajax-delfavor&favorid=<?php echo $question['favorid']; ?>"><i class="glyphicon glyphicon-remove"></i></a>
							</span>
						</h4>
						<div class="choice">
							</a><?php echo html_entity_decode($this->ev->stripSlashes($question['question'])); ?>
						</div>
						<?php if(!$this->tpl_var['questype'][$question['questiontype']]['questsort']){ ?>
						<?php if($question['questionselect'] && $this->tpl_var['questype'][$question['questiontype']]['questchoice'] != 5){ ?>
						<div class="choice">
		                	<?php echo html_entity_decode($this->ev->stripSlashes($question['questionselect'])); ?>
		                </div>
		                <?php } ?>
		                <?php } ?>
						<div class="selector decidediv" style="border-left:10px solid #CCCCCC;position:relative;">
		                	<table class="table">
		                		<tr>
		                    		<td width="15%" style="border-top:0px;">正确答案：</td>
		                    		<td style="border-top:0px;"><?php echo html_entity_decode($this->ev->stripSlashes($question['questionanswer'])); ?></td>
		                    	</tr>
		                    	<tr>
		                    		<td>所在章：</td>
		                    		<td><?php $kid = 0;
 foreach($question['questionknowsid'] as $key => $knowsid){ 
 $kid++; ?><?php echo $this->tpl_var['globalsections'][$this->tpl_var['globalknows'][$knowsid['knowsid']]['knowssectionid']]['section']; ?>&nbsp;&nbsp;&nbsp;<?php } ?></td>
		                    	</tr>
		                    	<tr>
		                    		<td>知识点：</td>
		                    		<td><?php $kid = 0;
 foreach($question['questionknowsid'] as $key => $knowsid){ 
 $kid++; ?><?php echo $this->tpl_var['globalknows'][$knowsid['knowsid']]['knows']; ?>&nbsp;&nbsp;&nbsp;<?php } ?></td>
		                    	</tr>
		                    	<tr>
		                    		<td>答案解析：</td>
		                    		<td><?php echo html_entity_decode($this->ev->stripSlashes($question['questiondescribe'])); ?></td>
		                    	</tr>
		                	</table>
		                </div>
					</div>
					<?php } ?>
				<?php } ?>
				<ul class="pagination pagination-right"><?php echo $this->tpl_var['favors']['pages']; ?></ul>
			</div>
<?php if(!$this->tpl_var['userhash']){ ?>
		</div>
	</div>
</div>
<?php $this->_compileInclude('footer'); ?>
</body>
</html>
<?php } ?>