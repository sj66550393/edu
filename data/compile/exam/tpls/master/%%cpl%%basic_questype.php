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
							<li class="active">题型管理</li>
						</ol>
					</div>
				</div>
				<div class="box itembox" style="padding-top:10px;margin-bottom:0px;">
					<h4 class="title" style="padding:10px;">
						题型管理
						<a class="btn btn-primary pull-right" href="index.php?exam-master-basic-addquestype&page=<?php echo $this->tpl_var['page']; ?><?php echo $this->tpl_var['u']; ?>">添加题型</a>
					</h4>
			        <table class="table table-hover table-bordered">
						<thead>
							<tr class="info">
			                    <th>题型ID</th>
								<th>题型</th>
								<th>题型分类</th>
								<th>操作</th>
			                </tr>
			            </thead>
			            <tbody>
		                    <?php $qid = 0;
 foreach($this->tpl_var['questypes'] as $key => $questype){ 
 $qid++; ?>
							<tr>
								<td><?php echo $questype['questid']; ?></td>
								<td><?php echo $questype['questype']; ?></td>
								<td><?php if($questype['questsort']){ ?>主观题<?php } else { ?>客观题<?php } ?></td>
								<td>
					          		<div class="btn-group">
										<a class="btn" href="index.php?exam-master-basic-modifyquestype&questid=<?php echo $questype['questid']; ?>&page=<?php echo $this->tpl_var['page']; ?><?php echo $this->tpl_var['u']; ?>" title="修改"><em class="glyphicon glyphicon-edit"></em></a>
										<a class="btn ajax" href="index.php?exam-master-basic-delquestype&questid=<?php echo $questype['questid']; ?>&page=<?php echo $this->tpl_var['page']; ?><?php echo $this->tpl_var['u']; ?>" title="删除"><em class="glyphicon glyphicon-remove"></em></a>
									</div>
					          	</td>
							</tr>
							<?php } ?>
			        	</tbody>
			        </table>
			        <ul class="pagination pull-right">
		        		<?php echo $this->tpl_var['questypes']['pages']; ?>
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