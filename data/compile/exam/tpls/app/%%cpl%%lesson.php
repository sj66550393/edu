<?php $this->_compileInclude('header'); ?>
<body>
<?php $this->_compileInclude('nav'); ?>
<div class="container-fluid">
	<div class="row-fluid">
		<div class="main">
			<div class="box itembox" style="margin-bottom:0px;">
				<div class="col-xs-12">
					<ol class="breadcrumb">
					  <li><a href="index.php">首页</a></li>
					  <li><a href="index.php?exam-app">考试</a></li>
					  <li><a href="index.php?exam-app-basics"><?php echo $this->tpl_var['data']['currentbasic']['basic']; ?></a></li>
					  <li class="active">课后练习</li>
					</ol>
				</div>
			</div>
			<div class="box itembox">
				<h4 class="title">课后练习</h4>
				<?php if($this->tpl_var['record']){ ?>
				<p>系统检测到您上次做到《<?php echo $this->tpl_var['knows'][$this->tpl_var['record']['exerknowsid']]['knows']; ?>》的<?php echo $this->tpl_var['questype'][$this->tpl_var['record']['exerqutype']]['questype']; ?>第<?php echo $this->tpl_var['record']['exernumber']; ?>题，点此<a class="ajax" href="index.php?exam-app-lesson-ajax-setlesson&questype=<?php echo $this->tpl_var['record']['exerqutype']; ?>&knowsid=<?php echo $this->tpl_var['record']['exerknowsid']; ?>&number=<?php echo $this->tpl_var['record']['exernumber']; ?>">继续练习</a></p>
				<?php } ?>
				<?php $sid = 0;
 foreach($this->tpl_var['sections'] as $key => $section){ 
 $sid++; ?>
				<table class="table table-hover table-bordered">
					<tr class="info"><td colspan="6"><?php echo $section['section']; ?></td></tr>
					<tr>
						<?php $kid = 0;
 foreach($this->tpl_var['basic']['basicknows'][$section['sectionid']] as $key => $know){ 
 $kid++; ?>
				    	<td><a href="index.php?route=exam-app-lesson-lessonnumber&knowsid=<?php echo $know; ?>" target="lessonknows" class="ajax" onclick="javascript:$('#submodal').modal('show');"><?php echo $this->tpl_var['knows'][$know]['knows']; ?></a></td>
				    	<?php if($kid % 6 == 0){ ?></tr><tr><?php } ?>
				    	<?php } ?>
				    	<?php if(($kid % 6 != 0) && ($kid/6 >= 1)){ ?>
				    	<?php $mod = 6 - $kid % 6;; ?>
				    	<td colspan="<?php echo $mod; ?>"></td>
				    	<?php } ?>
					</tr>
				</table>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
<div class="modal fade" id="submodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">题型</h4>
			</div>
			<div class="modal-body">
				<div id="lessonknows"></div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">再看看其他的</button>
			</div>
		</div>
	</div>
</div>
<?php $this->_compileInclude('footer'); ?>
</body>
</html>