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
							<li class="active">地区设置</li>
						</ol>
					</div>
				</div>
				<div class="box itembox" style="padding-top:10px;margin-bottom:0px;">
					<h4 class="title" style="padding:10px;">
						地区设置
						<a class="btn btn-primary pull-right" href="index.php?exam-master-basic-addarea&page=<?php echo $this->tpl_var['page']; ?><?php echo $this->tpl_var['u']; ?>">添加地区</a>
					</h4>
			        <table class="table table-hover table-bordered">
						<thead>
							<tr class="info">
			                    <th>地区ID</th>
			                    <th>区号</th>
								<th>地区名称</th>
								<th>默认</th>
								<th>操作</th>
			                </tr>
			            </thead>
			            <tbody>
		                    <?php $aid = 0;
 foreach($this->tpl_var['areas']['data'] as $key => $area){ 
 $aid++; ?>
							<tr>
								<td><?php echo $area['areaid']; ?></td>
								<td><?php echo $area['areacode']; ?></td>
								<td><?php echo $area['area']; ?></td>
								<td><?php if($area['arealevel']){ ?><em class="glyphicon glyphicon-ok"></em><?php } else { ?><em class="glyphicon glyphicon-remove"></em><?php } ?></td>
								<td>
									<div class="btn-group">
			                    		<a class="btn" href="index.php?exam-master-basic&search[basicareaid]=<?php echo $area['areaid']; ?>&page=<?php echo $this->tpl_var['page']; ?><?php echo $this->tpl_var['u']; ?>" title="考场"><em class="glyphicon glyphicon-th-list"></em></a>
			                    		<a class="btn" href="index.php?exam-master-basic-modifyarea&areaid=<?php echo $area['areaid']; ?>&page=<?php echo $this->tpl_var['page']; ?><?php echo $this->tpl_var['u']; ?>" title="修改"><em class="glyphicon glyphicon-edit"></em></a>
										<a class="btn ajax" href="index.php?exam-master-basic-delarea&areaid=<?php echo $area['areaid']; ?>&page=<?php echo $this->tpl_var['page']; ?><?php echo $this->tpl_var['u']; ?>" title="删除"><em class="glyphicon glyphicon-remove"></em></a>
			                    	</div>
								</td>
							</tr>
							<?php } ?>
			        	</tbody>
			        </table>
			        <ul class="pagination pull-right">
						<?php echo $this->tpl_var['areas']['pages']; ?>
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