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
							<li class="active">章节管理</li>
						</ol>
					</div>
				</div>
				<div class="box itembox" style="padding-top:10px;margin-bottom:0px;">
					<h4 class="title" style="padding:10px;">
						章节管理
						<a class="btn btn-primary pull-right" href="index.php?exam-master-basic-addsection&subjectid=<?php echo $this->tpl_var['subjectid']; ?>">添加章节</a>
					</h4>                                 
					<h4><?php echo $this->tpl_var['subjects'][$this->tpl_var['subjectid']]['subject']; ?></h4>
			        <table class="table table-hover table-bordered">
						<thead>
							<tr class="info">
			                    <th>章节ID</th>
								<th>章节名称</th>
								<th>操作</th>
			                </tr>
			            </thead>
			            <tbody>
		                    <?php $sid = 0;
 foreach($this->tpl_var['sections']['data'] as $key => $section){ 
 $sid++; ?>
							<tr>
								<td><?php echo $section['sectionid']; ?></td>
								<td><?php echo $section['section']; ?></td>
								<td>
									<div class="btn-group">
										<a class="btn ajax" href="index.php?exam-master-basic-output&sectionid=<?php echo $section['sectionid']; ?>&page=<?php echo $this->tpl_var['page']; ?><?php echo $this->tpl_var['u']; ?>" title="导出题库"><em class="glyphicon glyphicon-download-alt"></em></a>
										<a class="btn" href="index.php?exam-master-basic-point&sectionid=<?php echo $section['sectionid']; ?>&page=1&basicid=<?php echo $basic['basicid']; ?><?php echo $this->tpl_var['u']; ?>" title="章节列表"><em class="glyphicon glyphicon-th-list"></em></a>
										<a class="btn" href="index.php?exam-master-basic-modifysection&sectionid=<?php echo $section['sectionid']; ?>&page=<?php echo $this->tpl_var['page']; ?><?php echo $this->tpl_var['u']; ?>" title="修改章节信息"><em class="glyphicon glyphicon-edit"></em></a>
										<a class="btn confirm" href="index.php?exam-master-basic-delsection&sectionid=<?php echo $section['sectionid']; ?>&page=<?php echo $this->tpl_var['page']; ?><?php echo $this->tpl_var['u']; ?>" title="删除章节"><em class="glyphicon glyphicon-remove"></em></a>
									</div>
								</td>
							</tr>
							<?php } ?>
			        	</tbody>
			        </table>
			        <ul class="pagination pull-right">
			            <?php echo $this->tpl_var['sections']['pages']; ?>
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