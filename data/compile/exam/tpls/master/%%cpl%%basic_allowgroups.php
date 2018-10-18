	        <script type="text/javascript">
	    	function selectexams(o,d){
	    		d = $('#'+d);
	    		s = d.val();
	    		if(s == '')s= ',';
	    		else
	    		s = ','+s+',';
	    		if($(o).is(':checked')){
					if(s.indexOf(','+$(o).val()+',') < 0){
						s = s+$(o).val()+',';
						s = s.substring(1,s.length-1);
					}
				}
				else{
					if(s.indexOf(','+$(o).val()+',') >= 0){
						var t = eval('/,'+$(o).val()+',/');
						s = s.replace(t,',');
						s = s.substring(1,s.length-1);
					}
				}
				if(s == ',' || s == ',,')s = '';
				d.val(s);
	    	}

	    	function markSelectedExams(n,o)
	    	{
	    		$("[name='"+n+"']").each(function(){if((','+$('#'+o).val()+',').indexOf(','+$(this).val()+',') >= 0)$(this).attr('checked',true);});
	    	}

	    	function selectall(obj,a){
	    		$(".sbox").prop('checked', $(obj).is(':checked'));
	    		$(".sbox").each(function(){
	    			selectexams(this,a);
	    		});
	    	}
	    	</script>
	        <table class="table table-hover table-bordered">
				<thead>
					<tr class="info">
	                    <th>ID</th>
				        <th>角色名</th>
	                </tr>
	            </thead>
	            <tbody>
                    <?php $aid = 0;
 foreach($this->tpl_var['actors']['data'] as $key => $actor){ 
 $aid++; ?>
			        <tr>
						<td>
							<input rel="1" class="sbox" type="checkbox" name="ids[]" value="<?php echo $actor['groupid']; ?>" onclick="javascript:selectexams(this,'<?php echo $this->tpl_var['target']; ?>')"/>
						</td>
						<td>
							<?php echo $actor['groupname']; ?>
						</td>
			        </tr>
			        <?php } ?>
	        	</tbody>
	        </table>
	        <div class="pagination pagination-right">
	            <ul><?php echo $this->tpl_var['actors']['pages']; ?></ul>
	        </div>
	        <script type="text/javascript">
	    		jQuery(function($) {
					markSelectedExams('ids[]','<?php echo $this->tpl_var['target']; ?>');
	    		});
	    	</script>