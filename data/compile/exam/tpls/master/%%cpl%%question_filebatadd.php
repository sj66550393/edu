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
							<li class="active">CSV添加普通试题</li>
						</ol>
					</div>
				</div>
				<div class="box itembox" style="padding-top:10px;margin-bottom:0px;">
					<h4 class="title" style="padding:10px;">
						CSV添加普通试题
						<a class="btn btn-primary pull-right" href="index.php?<?php echo $this->tpl_var['_app']; ?>-master-questions&page=<?php echo $this->tpl_var['page']; ?><?php echo $this->tpl_var['u']; ?>">普通试题管理</a>
					</h4>
					<form action="index.php?exam-master-questions-filebataddquestion" method="post" class="form-horizontal">
						<div class="form-group">
							<label for="username" class="control-label col-sm-2">示范格式</label>
							<div class="col-sm-9">
								<img src="app/exam/styles/image/demo.png" />
							</div>
						</div>
						<div class="form-group">
							<label for="knowsid" class="control-label col-sm-2">知识点ID</label>
							<div class="col-sm-3">
								<input class="form-control" type="text" name="knowsid" id="knowsid" value="0"/>
								<span class="help-block">如果您的知识点ID和CSV文件中的知识点ID不同，请在此填写您希望加入的知识点ID，否则请填写0</span>
							</div>
						</div>
						<div class="form-group">
							<label for="lesson_video" class="control-label col-sm-2">待导入文件</label>
							<div class="col-sm-9">
								<script type="text/template" id="pe-template-uploadfile">
						    		<div class="qq-uploader-selector" qq-drop-area-text="可将图片拖拽至此处上传" style="clear:both;">
						            	<ul class="qq-upload-list-selector list-unstyled pull-left" aria-live="polite" aria-relevant="additions removals" style="clear:both;">
							                <li class="text-center">
												<input size="45" class="form-control qq-edit-filename-selector" type="text" name="uploadfile" tabindex="0" value="">
							                </li>
							            </ul>
							            <ul class="qq-upload-list-selector list-unstyled pull-left" aria-live="polite" aria-relevant="additions removals" style="clear:both;">
							                <li class="text-center">
							                    <input size="45" class="form-control qq-edit-filename-selector" type="text" name="uploadfile" tabindex="0" value="">
							                </li>
							            </ul>
						            	<div class="qq-upload-button-selector col-xs-3">
											<button class="btn btn-primary">上传文件<span class="process"></span></button>
						                </div>
						            </div>
						        </script>
						        <div class="fineuploader" attr-type="files" attr-template="pe-template-uploadfile" attr-ftype="csv"></div>
								<span class="help-block">注意：导入文件必须为csv文件，可用excel另存为csv，为保证程序正常导入，每个CSV文件请不要超过2M，否则可能导入失败</span>
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-2"></label>
							<div class="col-sm-9">
								<button class="btn btn-primary" type="submit">提交</button>
								<input type="hidden" name="page" value="<?php echo $this->tpl_var['page']; ?>"/>
								<input type="hidden" name="type" value="1"/>
								<input type="hidden" name="insertquestion" value="1"/>
								<?php $aid = 0;
 foreach($this->tpl_var['search'] as $key => $arg){ 
 $aid++; ?>
								<input type="hidden" name="search[<?php echo $key; ?>]" value="<?php echo $arg; ?>"/>
								<?php } ?>
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