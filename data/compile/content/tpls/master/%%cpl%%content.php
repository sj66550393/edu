<?php if(!$this->tpl_var['userhash']){ ?>
<?php $this->_compileInclude('header'); ?>
<body>
<?php $this->_compileInclude('nav'); ?>
<div class="container-fluid">
	<div class="row-fluid">
		<div class="main">
			<div class="col-xs-2" style="margin-bottom:0px;padding:0px;padding-top:10px;">
				<div id="catsmenu" style="margin-top: 0px;"></div>
			</div>
			<div class="col-xs-10" id="datacontent">
<?php } ?>
				<div class="box itembox" style="margin-bottom:0px;border-bottom:1px solid #CCCCCC;">
					<div class="col-xs-12">
						<ol class="breadcrumb">
							<li><a href="index.php?<?php echo $this->tpl_var['_app']; ?>-master"><?php echo $this->tpl_var['apps'][$this->tpl_var['_app']]['appname']; ?></a></li>
							<?php if($this->tpl_var['catid']){ ?>
							<li><a href="index.php?<?php echo $this->tpl_var['_app']; ?>-master-contents">内容管理</a></li>
							<li class="active"><?php echo $this->tpl_var['categories'][$this->tpl_var['catid']]['catname']; ?></li>
							<?php } else { ?>
							<li class="active">内容管理</li>
							<?php } ?>
						</ol>
					</div>
				</div>
				<div class="box itembox" style="padding-top:10px;margin-bottom:0px;overflow:visible">
					<h4 class="title" style="padding:10px;">
                        <?php if($this->tpl_var['catid']){ ?><?php echo $this->tpl_var['categories'][$this->tpl_var['catid']]['catname']; ?><?php } else { ?>所有内容<?php } ?>
						<span class="pull-right">
							<a class="btn btn-primary" href="index.php?content-master-contents-addpage">添加内容</a>
						</span>
					</h4>
					<form action="index.php?content-master-contents" method="post" class="form-inline">
						<table class="table">
					        <tr>
								<td style="border-top: 0px;">
									内容ID：
								</td>
								<td style="border-top: 0px;">
									<input name="search[contentid]" class="form-control" size="15" type="text" class="number" value="<?php echo $this->tpl_var['search']['contentid']; ?>"/>
								</td>
								<td style="border-top: 0px;">
									录入时间：
								</td>
								<td style="border-top: 0px;">
									<input class="form-control datetimepicker" data-date="<?php echo date('Y-m-d',TIME); ?>" data-date-format="yyyy-mm-dd" type="text" name="search[stime]" size="10" id="stime" value="<?php echo $this->tpl_var['search']['stime']; ?>"/> - <input class="form-control datetimepicker" data-date="<?php echo date('Y-m-d',TIME); ?>" data-date-format="yyyy-mm-dd" size="10" type="text" name="search[etime]" id="etime" value="<?php echo $this->tpl_var['search']['etime']; ?>"/>
								</td>
								<td style="border-top: 0px;">
									关键字：
								</td>
								<td style="border-top: 0px;">
									<input class="form-control" name="search[keyword]" size="15" type="text" value="<?php echo $this->tpl_var['search']['keyword']; ?>"/>
								</td>
							</tr>
					        <tr>
								<td>
									录入人：
								</td>
					        	<td>
					        		<input class="form-control" name="search[username]" size="15" type="text" value="<?php echo $this->tpl_var['search']['username']; ?>"/>
					        	</td>
					        	<td>
									内容模型：
								</td>
								<td>
									<select name="search[contentmoduleid]" class="form-control">
								  		<option value="0">不限</option>
								  		<?php $mid = 0;
 foreach($this->tpl_var['modules'] as $key => $module){ 
 $mid++; ?>
								  		<option value="<?php echo $module['moduleid']; ?>"<?php if($this->tpl_var['search']['contentmoduleid'] == $module['moduleid']){ ?> selected<?php } ?>><?php echo $module['modulename']; ?></option>
								  		<?php } ?>
							  		</select>
								</td>
								<td>
									<button class="btn btn-primary" type="submit">提交</button>
								</td>
								<td></td>
					        </tr>
					        <tr>
								<td>
									分类：
								</td>
								<td colspan="5">
							  		<select msg="您必须选择一个分类" class="autocombox form-control" name="search[contentcatid]" refUrl="index.php?content-master-category-ajax-getchildcategory&catid={value}">
						            	<option value="">选择一级分类</option>
						            	<?php $cid = 0;
 foreach($this->tpl_var['parentcat'] as $key => $cat){ 
 $cid++; ?>
						            	<option value="<?php echo $cat['catid']; ?>"><?php echo $cat['catname']; ?></option>
						            	<?php } ?>
						            </select>
					        	</td>
							</tr>
						</table>
						<div class="input">
							<input type="hidden" value="1" name="search[argsmodel]" />
						</div>
					</form>
					<form action="index.php?content-master-contents-lite" method="post">
						<fieldset>
							<table class="table table-hover table-bordered">
								<thead>
									<tr class="info">
					                    <th width="36"><input type="checkbox" class="checkall" target="delids"/></th>
					                    <th width="60">权重</th>
					                    <th width="40">ID</th>
					                    <th width="90">缩略图</th>
								        <th>标题</th>
								        <th width="80">分类</th>
								        <th width="80">发布时间</th>
								        <th width="100">操作</th>
					                </tr>
					            </thead>
					            <tbody>
					            	<?php $cid = 0;
 foreach($this->tpl_var['contents']['data'] as $key => $content){ 
 $cid++; ?>
					            	<tr>
					                    <td><input type="checkbox" name="delids[<?php echo $content['contentid']; ?>]" value="1"></td>
					                    <td><input class="form-control" type="text" name="ids[<?php echo $content['contentid']; ?>]" value="<?php echo $content['contentsequence']; ?>" style="width:32px;padding:2px 5px;"/></td>
					                    <td><?php echo $content['contentid']; ?></td>
					                    <td class="picture"><img src="<?php if($content['contentthumb']){ ?><?php echo $content['contentthumb']; ?><?php } else { ?>app/core/styles/images/noupload.gif<?php } ?>" alt="" style="width:48px;"/></td>
					                    <td>
					                        <?php echo $content['contenttitle']; ?>
					                    </td>
					                    <td>
					                    	<a href="?content-master-contents&catid=<?php echo $content['contentcatid']; ?>" target=""><?php echo $this->tpl_var['categories'][$content['contentcatid']]['catname']; ?></a>
					                    </td>
					                    <td>
					                    	<?php echo date('y-m-d',$content['contentinputtime']); ?>
					                    </td>
					                    <td class="actions">
					                    	<div class="btn-group">
					                    		<a class="btn" href="index.php?content-master-contents-edit&catid=<?php echo $content['contentcatid']; ?>&contentid=<?php echo $content['contentid']; ?>&page=<?php echo $this->tpl_var['page']; ?><?php echo $this->tpl_var['u']; ?>" title="修改"><em class="glyphicon glyphicon-edit"></em></a>
												<a class="btn confirm" href="index.php?content-master-contents-del&catid=<?php echo $content['cncatid']; ?>&contentid=<?php echo $content['contentid']; ?>&page=<?php echo $this->tpl_var['page']; ?><?php echo $this->tpl_var['u']; ?>" title="删除"><em class="glyphicon glyphicon-remove"></em></a>
					                    	</div>
					                    </td>
					                </tr>
					                <?php } ?>
					        	</tbody>
					        </table>
					        <div class="control-group">
					            <div class="controls">
						            <label class="radio-inline">
						                <input type="radio" name="action" value="modify" checked/>排序
						            </label>
						            <label class="radio-inline">
						                <input type="radio" name="action" value="moveposition" />推荐
						            </label>
						            <label class="radio-inline">
						                <input type="radio" name="action" value="copycategory"/>复制
						            </label>
						            <label class="radio-inline">
						                <input type="radio" name="action" value="movecategory" />移动
						            </label>
						            <label class="radio-inline">
						                <input type="radio" name="action" value="delete" />删除
						            </label>
						            <?php $sid = 0;
 foreach($this->tpl_var['search'] as $key => $arg){ 
 $sid++; ?>
						            <input type="hidden"-name="search[<?php echo $key; ?>]" value="<?php echo $arg; ?>"/>
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
								<?php echo $this->tpl_var['contents']['pages']; ?>
							</ul>
						</fieldset>
					</form>
				</div>
			</div>
<?php if(!$this->tpl_var['userhash']){ ?>
		</div>
	</div>
</div>
<script src="index.php?content-master-contents-catsmenu&catid=<?php echo $this->tpl_var['catid']; ?>"></script>
<script>
    $('#catsmenu').treeview({
        levels: <?php echo $this->tpl_var['catlevel']; ?>,
        expandIcon: 'glyphicon glyphicon-chevron-right',
        collapseIcon: 'glyphicon glyphicon-chevron-down',
        selectedColor: "#000000",
        selectedBackColor: "#FFFFFF",
        enableLinks: true,
        data: treeData
    });
</script>
<?php $this->_compileInclude('footer'); ?>
</body>
</html>
<?php } ?>