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
							<li class="active">已删题冒题</li>
						</ol>
					</div>
				</div>
				<div class="box itembox" style="padding-top:10px;margin-bottom:0px;">
					<h4 class="title" style="padding:10px;">
						已删题冒题
						<a class="btn btn-primary pull-right" href="index.php?exam-master-recyle">回收站</a>
					</h4>
			        <table class="table table-hover table-bordered">
						<thead>
							<tr class="info">
			                    <th>ID</th>
						        <th>试题类型</th>
						        <th>试题内容</th>
						        <th>录入人</th>
						        <th>录入时间</th>
						        <th>难度</th>
						        <th>操作</th>
			                </tr>
			            </thead>
			            <tbody>
		                    <?php $qid = 0;
 foreach($this->tpl_var['questions']['data'] as $key => $question){ 
 $qid++; ?>
					        <tr>
								<td>
									<?php echo $question['qrid']; ?>
								</td>
								<td>
									<?php echo $this->tpl_var['questypes'][$question['qrtype']]['questype']; ?>
								</td>
								<td>
									<a title="查看试题" class="selfmodal" href="javascript:;" url="index.php?exam-master-rowsquestions-detail&questionid=<?php echo $question['qrid']; ?>&<?php echo TIME; ?>" data-target="#modal"><?php echo $this->G->make('strings')->subString(strip_tags(html_entity_decode($this->ev->stripSlashes( $question['qrquestion']))),120); ?></a>
								</td>
								<td>
									<?php echo $question['qrusername']; ?>
								</td>
								<td>
									<?php echo date('Y-m-d',$question['qrtime']); ?>
								</td>
								<td>
									<?php if($question['qrlevel']==2){ ?>中<?php } elseif($question['qrlevel']==3){ ?>难<?php } elseif($question['qrlevel']==1){ ?>易<?php } ?>
								</td>
								<td>
									<div class="btn-group">
			                    		<a class="btn ajax" href="index.php?exam-master-rowsquestions-backquestion&page=<?php echo $this->tpl_var['page']; ?>&questionid=<?php echo $question['qrid']; ?><?php echo $this->tpl_var['u']; ?>" title="恢复本题将会恢复本题下所有已删除子题"><em class="glyphicon glyphicon-edit"></em></a>
										<a class="btn ajax" href="index.php?exam-master-recyle-finaldelrowsquestion&page=<?php echo $this->tpl_var['page']; ?>&questionid=<?php echo $question['qrid']; ?><?php echo $this->tpl_var['u']; ?>" title="彻底删除"><em class="glyphicon glyphicon-remove"></em></a>
			                    	</div>
			                    </td>
					        </tr>
					        <?php } ?>
			        	</tbody>
			        </table>
			        <ul class="pagination pull-right">
						<?php echo $this->tpl_var['questions']['pages']; ?>
					</ul>
				</div>
			</div>
<?php if(!$this->tpl_var['userhash']){ ?>
		</div>
	</div>
</div>
<div id="modal" class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button aria-hidden="true" class="close" type="button" data-dismiss="modal">×</button>
				<h4 id="myModalLabel">
					试题详情
				</h4>
			</div>
			<div class="modal-body"></div>
			<div class="modal-footer">
				 <button aria-hidden="true" class="btn btn-primary" data-dismiss="modal">关闭</button>
			</div>
		</div>
	</div>
</div>
<?php $this->_compileInclude('footer'); ?>
</body>
</html>
<?php } ?>