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
							<li><a href="index.php?<?php echo $this->tpl_var['_app']; ?>-master-basic-questype">题型管理</a></li>
							<li class="active">修改题型</li>
						</ol>
					</div>
				</div>
				<div class="box itembox" style="padding-top:10px;margin-bottom:0px;">
					<h4 class="title" style="padding:10px;">
						修改题型
						<a class="btn btn-primary pull-right" href="index.php?exam-master-basic-questype&page=<?php echo $this->tpl_var['page']; ?><?php echo $this->tpl_var['u']; ?>">题型管理</a>
					</h4>
			        <form action="index.php?exam-master-basic-modifyquestype" method="post" class="form-horizontal">
						<fieldset>
						<div class="form-group">
							<label for="questype" class="control-label col-sm-2">题型名称：</label>
							<div class="col-sm-4">
								<input class="form-control" name="args[questype]" id="questype" type="text" size="30" value="<?php echo $this->tpl_var['quest']['questype']; ?>" class="required" alt="请输入题型名称" />
							</div>
						</div>
						<div class="form-group">
							<label for="questsort" class="control-label col-sm-2">题型分类：</label>
							<div class="col-sm-4">
								<select class="form-control combox" id="questsort" name="args[questsort]" onchange="javascript:if($(this).val() == '1')$('#choicebox').hide();else $('#choicebox').show();">
									<option value="1"<?php if($this->tpl_var['quest']['questsort']){ ?> selected<?php } ?>>主观题</option>
		  							<option value="0"<?php if(!$this->tpl_var['quest']['questsort']){ ?> selected<?php } ?>>客观题</option>
								</select>
							</div>
						</div>
						<div id="choicebox" class="form-group"<?php if($this->tpl_var['quest']['questsort']){ ?> style="display:none;"<?php } ?>>
							<label for="questchoice" class="control-label col-sm-2">选项分类：</label>
							<div class="col-sm-6">
								<select class="form-control combox" name="args[questchoice]" id="questchoice">
									<option value="1"<?php if($this->tpl_var['quest']['questchoice']==1){ ?> selected<?php } ?>>单选</option>
			  						<option value="2"<?php if($this->tpl_var['quest']['questchoice']==2){ ?> selected<?php } ?>>多选</option>
			  						<option value="3"<?php if($this->tpl_var['quest']['questchoice']==3){ ?> selected<?php } ?>>不定项选</option>
			  						<option value="4"<?php if($this->tpl_var['quest']['questchoice']==4){ ?> selected<?php } ?>>判断</option>
			  						<option value="5"<?php if($this->tpl_var['quest']['questchoice']==5){ ?> selected<?php } ?>>定值填空题</option>
								</select>
								<span class="help-block">不定项选按照选对答案数给分，判断题将自动生成判断选项。</span>
							</div>
						</div>
						<div class="form-group">
						  	<label for="questchoice" class="control-label col-sm-2"></label>
						  	<div class="col-sm-9">
							  	<button class="btn btn-primary" type="submit">提交</button>
							  	<input type="hidden" name="page" value="<?php echo $this->tpl_var['page']; ?>"/>
							  	<input type="hidden" name="questid" value="<?php echo $this->tpl_var['quest']['questid']; ?>"/>
								<input type="hidden" name="modifyquestype" value="1"/>
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