<table class="table table-hover table-bordered">
	<tr class="success"><td colspan="2"><?php echo $this->tpl_var['knows']['knows']; ?></td></tr>
    <tr>
    <?php $tmp = 0; ?>
    <?php $qid = 0;
 foreach($this->tpl_var['questype'] as $key => $quest){ 
 $qid++; ?>
    	<?php if($this->tpl_var['numbers'][$quest['questid']]){ ?>
    	<td>
    	<a href="index.php?exam-app-lesson-ajax-setlesson&questype=<?php echo $quest['questid']; ?>&knowsid=<?php echo $this->tpl_var['knows']['knowsid']; ?>" class="ajax" action-before="clearStorage"><?php echo $quest['questype']; ?>（共<?php echo $this->tpl_var['numbers'][$quest['questid']]; ?>题）</a>
    	<?php $tmp++; ?>
    	</td>
    	<?php } ?>
    	<?php if($tmp % 2 == 0){ ?>
	</tr>
	<tr>
    	<?php } ?>
	<?php } ?>
	</tr>
</table>