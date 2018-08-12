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
							<li><a href="index.php?<?php echo $this->tpl_var['_app']; ?>-master-basic">科目管理</a></li>
							<li><a href="index.php?<?php echo $this->tpl_var['_app']; ?>-master-basic-section&subjectid=<?php echo $this->tpl_var['section']['sectionsubjectid']; ?>&page=<?php echo $this->tpl_var['page']; ?><?php echo $this->tpl_var['u']; ?>">章节管理</a></li>
							<li><a href="index.php?exam-master-basic-point&sectionid=<?php echo $this->tpl_var['knows']['knowssectionid']; ?>&page=<?php echo $this->tpl_var['page']; ?><?php echo $this->tpl_var['u']; ?>">知识点管理</a></li>
							<li class="active">修改知识点</li>
						</ol>
					</div>
				</div>
				<div class="box itembox" style="padding-top:10px;margin-bottom:0px;">
					<h4 class="title" style="padding:10px;">
						修改知识点
						<a class="btn btn-primary pull-right" href="index.php?exam-master-basic-point&sectionid=<?php echo $this->tpl_var['knows']['knowssectionid']; ?>&page=<?php echo $this->tpl_var['page']; ?><?php echo $this->tpl_var['u']; ?>">知识点管理</a>
					</h4>
		        	<form action="index.php?exam-master-basic-modifypoint" method="post" class="form-horizontal">
						<div class="form-group">
							<label class="control-label col-sm-2" for="knows">知识点名称：</label>
							<div class="col-sm-9">
								<input class="form-control" id="knows" name="args[knows]" type="text" size="30" value="<?php echo $this->tpl_var['knows']['knows']; ?>" needle="needle" alt="请输入知识点名称"/>
							</div>
						</div>
                                                 <div class="form-group">
							<label for="knows" class="control-label col-sm-2">知识点类型：</label>
							<div class="col-sm-9">
                                                            <select class="combox form-control"  id = "knowstypeid" name="args[knowstypeid]">                                                 
                                                                    <?php $kid = 0;
 foreach($this->tpl_var['knowstype'] as $key => $knowstype1){ 
 $kid++; ?>
							  		<option value="<?php echo $knowstype1['knowstypeid']; ?>" <?php if($this->tpl_var['knows']['knowstypeid'] == $knowstype1['knowstypeid']){ ?>selected = "selected" <?php } ?>><?php echo $knowstype1['knowstype']; ?></option>
							  		<?php } ?>
						  		</select>							
                                                        </div>
						</div>       
                                                        
                             
						<div class="form-group">
						  	<label class="control-label col-sm-2"></label>
						  	<div class="col-sm-9">
							  	<button class="btn btn-primary" type="submit">提交</button>
								<input type="hidden" name="knowsid" value="<?php echo $this->tpl_var['knows']['knowsid']; ?>"/>
								<input type="hidden" name="page" value="<?php echo $this->tpl_var['page']; ?>"/>
								<input type="hidden" name="modifypoint" value="1"/>
							</div>
						</div>
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