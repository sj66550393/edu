		    	<script type="text/javascript">
		    	function selectall(obj,a,b){
		    		$(".sbox").prop('checked', $(obj).is(':checked'));
		    		$(".sbox").each(function(){
		    			selectquestions(this,a,b);
		    		});
		    	}
		    	</script>
		    	<form action="index.php?exam-master-exams-selectquestions" method="post" direct="modal-body">
					<table class="table form-inline">
						<tr>
							<td class="form-inline" colspan="2">
								录入时间：
								<input type="text" name="search[stime]" size="9"  class="form-control datetimepicker" data-date="<?php echo date('Y-m-d',TIME); ?>" data-date-format="yyyy-mm-dd" id="stime" value="<?php echo $this->tpl_var['search']['stime']; ?>"/> - <input class="form-control datetimepicker" data-date="<?php echo date('Y-m-d',TIME); ?>" data-date-format="yyyy-mm-dd" size="9" type="text" name="search[etime]" id="etime" value="<?php echo $this->tpl_var['search']['etime']; ?>"/>
							</td>
							<td>
								关键字：
								<input name="search[keyword]" class="form-control" size="8" type="text" value="<?php echo $this->tpl_var['search']['keyword']; ?>"/>
							</td>
						</tr>
						<tr>
							<td class="form-inline">
								<select name="search[questionisrows]" class="form-control">
							  		<option value="0">普通试题</option>
									<option value="1"<?php if($this->tpl_var['search']['questionisrows']){ ?> selected<?php } ?>>题帽题</option>
						  		</select>
						  	</td>
						  	<td>
								<input type="hidden" name="search[questiontype]" value="<?php echo $this->tpl_var['search']['questiontype']; ?>">
								<input type="hidden" name="search[questionsubjectid]" value="<?php echo $this->tpl_var['search']['questionsubjectid']; ?>">
				        		录入人：<input name="search[username]" class="form-control" size="5" type="text" value="<?php echo $this->tpl_var['search']['username']; ?>"/>
				        	</td>
				        	<td>
								难度：<select name="search[questionlevel]" class="combox form-control">
							  		<option value="0">难度不限</option>
									<option value="1">易</option>
									<option value="2">中</option>
									<option value="3">难</option>
						  		</select>
							</td>
				        </tr>
				        <tr>
							<td>
						  		知识点：<select name="search[questionsectionid]" class="combox form-control" id="sectionselect" target="knowsselect" refUrl="?exam-master-questions-ajax-getknowsbysectionid&sectionid={value}">
							  		<option value="">选择章节</option>
							  		<?php if($this->tpl_var['sections']){ ?>
							  		<?php $sid = 0;
 foreach($this->tpl_var['sections'] as $key => $section){ 
 $sid++; ?>
							  		<option value="<?php echo $section['sectionid']; ?>"<?php if($section['sectionid'] == $this->tpl_var['search']['questionsectionid']){ ?> selected<?php } ?>><?php echo $section['section']; ?></option>
							  		<?php } ?>
							  		<?php } ?>
						  		</select>
						  	</td>
						  	<td>
						  		<select name="search[questionknowsid]" id="knowsselect" class="form-control">
							  		<option value="">选择知识点</option>
							  		<?php if($this->tpl_var['knows']){ ?>
							  		<?php $kid = 0;
 foreach($this->tpl_var['knows'] as $key => $know){ 
 $kid++; ?>
							  		<option value="<?php echo $know['knowsid']; ?>"<?php if($know['knowsid'] == $this->tpl_var['search']['questionknowsid']){ ?> selected<?php } ?>><?php echo $know['knows']; ?></option>
							  		<?php } ?>
							  		<?php } ?>
						  		</select>
						  	</td>
						  	<td>
								<button class="btn btn-primary" type="submit">检索</button>
							</td>
						</tr>
					</table>
				</form>
				<div class="input"></div>
				<?php if($this->tpl_var['search']['questionisrows']){ ?>
				<table class="table table-hover table-bordered">
					<thead>
						<tr class="info">
					        <th><input type="checkbox" onclick="javascript:selectall(this,'iselectrowsquestions_<?php echo $this->tpl_var['search']['questiontype']; ?>','ialreadyselectnumber_<?php echo $this->tpl_var['search']['questiontype']; ?>');"/></th>
					        <th>试题内容</th>
					        <th>小题量</th>
					        <th>难度</th>
						</tr>
					</thead>
					<tbody>
						<?php $qid = 0;
 foreach($this->tpl_var['questions']['data'] as $key => $question){ 
 $qid++; ?>
				        <tr>
				          <td><input rel="<?php echo $question['qrnumber']; ?>" class="sbox" type="checkbox" name="ids[]" value="<?php echo $question['qrid']; ?>" onclick="javascript:selectquestions(this,'iselectrowsquestions_<?php echo $this->tpl_var['search']['questiontype']; ?>','ialreadyselectnumber_<?php echo $this->tpl_var['search']['questiontype']; ?>')"/></td>
				          <td>
						  	  <a href="javascript:;" <?php echo strip_tags(html_entity_decode($question['qrquestion'])); ?>><?php echo $this->G->make('strings')->subString(strip_tags(html_entity_decode($question['qrquestion'])),165); ?></a>
						  </td>
						  <td><?php echo $question['qrnumber']; ?></td>
						  <td><?php if($question['qrlevel']==2){ ?>中<?php } elseif($question['qrlevel']==3){ ?>难<?php } elseif($question['qrlevel']==1){ ?>易<?php } ?></td>
				        </tr>
				        <?php } ?>
					</tbody>
				</table>
				<div class="pagination">
	            	<ul><?php echo $this->tpl_var['questions']['pages']; ?></ul>
		        </div>
		    	<script type="text/javascript">
		    		jQuery(function($) {
						markSelectedQuestions('ids[]','iselectrowsquestions_<?php echo $this->tpl_var['search']['questiontype']; ?>');
		    		});
		    	</script>
				<?php } else { ?>
				<table class="table table-hover table-bordered">
					<thead>
						<tr class="info">
					        <th width="50"><input type="checkbox" onclick="javascript:selectall(this,'iselectquestions_<?php echo $this->tpl_var['search']['questiontype']; ?>','ialreadyselectnumber_<?php echo $this->tpl_var['search']['questiontype']; ?>');"/></th>
					        <th width="100">试题类型</th>
					        <th>试题内容</th>
					        <th width="50">难度</th>
						</tr>
					</thead>
					<tbody>
						<?php $qid = 0;
 foreach($this->tpl_var['questions']['data'] as $key => $question){ 
 $qid++; ?>
				        <tr>
				          <td><input rel="1" class="sbox" type="checkbox" name="ids[]" value="<?php echo $question['questionid']; ?>" onclick="javascript:selectquestions(this,'iselectquestions_<?php echo $this->tpl_var['search']['questiontype']; ?>','ialreadyselectnumber_<?php echo $this->tpl_var['search']['questiontype']; ?>')"/></td>
				          <td><?php echo $this->tpl_var['questypes'][$question['questiontype']]['questype']; ?></td>
				          <td>
						  	  <a href="javascript:;" title="<?php echo strip_tags(html_entity_decode($question['question'])); ?>"><?php echo $this->G->make('strings')->subString(strip_tags(html_entity_decode($question['question'])),90); ?></a>
						  </td>
						  <td><?php if($question['questionlevel']==2){ ?>中<?php } elseif($question['questionlevel']==3){ ?>难<?php } elseif($question['questionlevel']==1){ ?>易<?php } ?></td>
				        </tr>
				        <?php } ?>
					</tbody>
				</table>
				<ul class="pagination">
	            	<?php echo $this->tpl_var['questions']['pages']; ?>
		        </ul>
		    	<script type="text/javascript">
		    		jQuery(function($) {
						markSelectedQuestions('ids[]','iselectquestions_<?php echo $this->tpl_var['search']['questiontype']; ?>');
		    		});
		    	</script>
				<?php } ?>
