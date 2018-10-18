			        <table class="table table-hover table-bordered">
						<thead>
							<tr class="info">
			                    <th>知识点</th>
								<th>总数</th>
								<th>简单</th>
								<th>中等</th>
								<th>复杂</th>
			                </tr>
			            </thead>
			            <tbody>
		                    <?php $rid = 0;
 foreach($this->tpl_var['rs'] as $key => $r){ 
 $rid++; ?>
							<tr>
								<td><?php echo $r['knows']; ?></td>
								<td><?php echo $r['number']; ?></td>
								<td><?php if($r['easy']){ ?><?php echo $r['easy']; ?><?php } else { ?>不限<?php } ?></td>
								<td><?php if($r['mid']){ ?><?php echo $r['mid']; ?><?php } else { ?>不限<?php } ?></td>
								<td><?php if($r['hard']){ ?><?php echo $r['hard']; ?><?php } else { ?>不限<?php } ?></td>
							</tr>
							<?php } ?>
			        	</tbody>
			        </table>