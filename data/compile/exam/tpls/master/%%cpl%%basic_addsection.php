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
							<li><a href="index.php?<?php echo $this->tpl_var['_app']; ?>-master-basic-subject">科目管理</a></li>
							<li><a href="index.php?<?php echo $this->tpl_var['_app']; ?>-master-basic-section&subjectid=<?php echo $this->tpl_var['subjectid']; ?>&page=<?php echo $this->tpl_var['page']; ?>">科目管理</a></li>
							<li class="active">添加章节</li>
						</ol>
					</div>
				</div>
				<div class="box itembox" style="padding-top:10px;margin-bottom:0px;">
					<h4 class="title" style="padding:10px;">
						添加章节
						<a class="btn btn-primary pull-right" href="index.php?exam-master-basic-section&subjectid=<?php echo $this->tpl_var['subjectid']; ?>&page=<?php echo $this->tpl_var['page']; ?>">章节管理</a>
					</h4>
					<form action="index.php?exam-master-basic-addsection" method="post" class="form-horizontal">
		    			<fieldset>
		    			<h4><?php echo $this->tpl_var['subjects'][$this->tpl_var['subjectid']]['subject']; ?></h4><hr />
						<div class="form-group">
							<label for="section" class="control-label col-sm-2">章节名称：</label>
							<div class="col-sm-9">
								<input class="form-control" id="section" name="args[section]" type="text" size="30" value="" needle="needle" msg="请输入章节名称" />
							</div>
						</div>
						<div class="form-group">
						  	<label class="control-label col-sm-2"></label>
						  	<div class="col-sm-9">
								<button class="btn btn-primary" type="submit">提交</button>
								<input type="hidden" name="insertsection" value="1"/>
								<input type="hidden" name="page" value="<?php echo $this->tpl_var['page']; ?>"/>
								<input type="hidden" name="args[sectionsubjectid]" value="<?php echo $this->tpl_var['subjectid']; ?>"/>
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