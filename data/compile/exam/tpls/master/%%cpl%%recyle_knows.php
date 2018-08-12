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
							<li><a href="index.php?exam-master-recyle">回收站</a></li>
							<li class="active">已删知识点</li>
						</ol>
					</div>
				</div>
				<div class="box itembox" style="padding-top:10px;margin-bottom:0px;">
					<h4 class="title" style="padding:10px;">
						已删知识点
						<a class="btn btn-primary pull-right" href="index.php?exam-master-recyle">回收站</a>
					</h4>
			        <table class="table table-hover table-bordered">
						<thead>
							<tr class="info">
			                    <th>知识点ID</th>
								<th>知识点名称</th>
								<th width="100">操作</th>
			                </tr>
			            </thead>
			            <tbody>
		                    <?php $kid = 0;
 foreach($this->tpl_var['knows']['data'] as $key => $know){ 
 $kid++; ?>
							<tr>
								<td><?php echo $know['knowsid']; ?></td>
								<td><?php echo $know['knows']; ?></td>
								<td>
									<div class="btn-group">
			                    		<a class="btn ajax" href="index.php?exam-master-recyle-backknows&page=<?php echo $this->tpl_var['page']; ?>&knowsid=<?php echo $know['knowsid']; ?><?php echo $this->tpl_var['u']; ?>" title="修改"><em class="glyphicon glyphicon-edit"></em></a>
										<a class="btn ajax" href="index.php?exam-master-recyle-delknows&page=<?php echo $this->tpl_var['page']; ?>&knowsid=<?php echo $know['knowsid']; ?><?php echo $this->tpl_var['u']; ?>" title="删除"><em class="glyphicon glyphicon-remove"></em></a>
			                    	</div>
			                    </td>
							</tr>
							<?php } ?>
			        	</tbody>
			        </table>
			        <div class="form-group hide">
			            <div class="col-sm-9">
				            <label class="radio-inline">
				                <input type="radio" name="action" value="reback" checked/>恢复
				            </label>
				            <label class="radio-inline">
				                <input type="radio" name="action" value="delete" />删除
				            </label>
				            <?php $sid = 0;
 foreach($this->tpl_var['search'] as $key => $arg){ 
 $sid++; ?>
				            <input type="hidden" name="search[<?php echo $key; ?>]" value="<?php echo $arg; ?>"/>
				            <?php } ?>
				            <label class="radio-inline">
				            	<button class="btn btn-primary" type="submit">提交</button>
				            </label>
				            <input type="hidden" name="modifycontentsequence" value="1"/>
				            <input type="hidden" name="catid" value="<?php echo $this->tpl_var['catid']; ?>"/>
				            <input type="hidden" name="page" value="<?php echo $this->tpl_var['page']; ?>"/>
				        </div>
			        </div>
					<ul class="pagination pull-right">
						<?php echo $this->tpl_var['knows']['pages']; ?>
					</ul>
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