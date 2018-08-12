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
				<div class="box itembox" style="margin-bottom:0px;border-bottom:1px solid #CCCCCC;">
					<div class="col-xs-12">
						<ol class="breadcrumb">
							<li><a href="index.php">首页</a></li>
							<li><a href="index.php?<?php echo $this->tpl_var['_app']; ?>-app">用户中心</a></li>
							<li class="active">积分充值</li>
						</ol>
					</div>
				</div>
				<div class="box itembox" style="padding-top:10px;">
					<h4 class="title">积分充值</h4>
					<div class="row-fluid">
						<div class="col-xs-8">
							<table class="table table-hover">
								<thead>
									<tr>
										<th>订单号</th>
										<th>充值金额</th>
										<th>下单时间</th>
										<th>订单状态</th>
										<th>操作</th>
									</tr>
								</thead>
								<tbody>
									<?php $oid = 0;
 foreach($this->tpl_var['orders']['data'] as $key => $order){ 
 $oid++; ?>
									<tr>
										<td><?php echo $order['ordersn']; ?></td>
										<td><?php echo $order['orderprice']; ?></td>
										<td><?php echo date('Y-m-d',$order['ordercreatetime']); ?></td>
										<td><?php echo $this->tpl_var['orderstatus'][$order['orderstatus']]; ?></td>
										<td>
											<div class="btn-group">
												<a class="btn" href="index.php?user-center-payfor-orderdetail&ordersn=<?php echo $order['ordersn']; ?>" title="详细"><em class="glyphicon glyphicon-th-list"></em></a>
												<?php if($order['orderstatus'] == 1){ ?>
												<a class="btn" href="index.php?user-center-payfor-orderdetail&ordersn=<?php echo $order['ordersn']; ?>" title="支付"><em class="glyphicon glyphicon-shopping-cart"></em></a>
												<a class="btn confirm" href="index.php?user-center-payfor-remove&ordersn=<?php echo $order['ordersn']; ?>" title="撤单"><em class="glyphicon glyphicon-remove"></em></a>
												<?php } ?>
											</div>
										</td>
									</tr>
									<?php } ?>
								</tbody>
							</table>
							<ul class="pagination pagination-right"><?php echo $this->tpl_var['orders']['pages']; ?></ul>
						</div>
						<div class="col-xs-4">
							<form action="index.php?user-center-payfor" method="post">
								<fieldset class="form-inline">
									 <h4 class="title">充值</h4>
									 <p>充值金额</p>
									 <input type="text" name="money" class="form-control" style="width:80px" type="text" onchange="javascript:$('#moneycoin').html(parseInt($(this).val())*10);" needle="needle" datatype="number" min="1" msg="您最少充值1元，充值数必须为整数"/>  元
									 <span class="help-block">1元 = 10积分，可兑换 <b id="moneycoin">0</b> 积分</span>
									 <button class="btn btn-primary" type="submit">充值</button>
									 <input type="hidden" name="payforit" value="1" />
								</fieldset>
							</form>
							<hr />
							<fieldset>
								 <h4 class="title">代金券充值</h4>
								 <a href="#myModal" class="btn btn-primary" role="button" data-toggle="modal">代金券充值</a>
							</fieldset>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<form aria-hidden="true" id="myModal" method="post" class="modal fade" role="dialog" aria-labelledby="#myModalLabel" action="index.php?exam-app-basics-coupon">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button aria-hidden="true" class="close" type="button" data-dismiss="modal">×</button>
				<h4 class="modal-title" id="myModalLabel">代金券充值</h4>
			</div>
			<div class="modal-body" id="modal-body">
				<div class="control-group">
					<label class="control-label" for="content">代金券号码：</label>
			  		<div class="controls">
			  			<input type="text" class="form-control" name="couponsn" style="width:80%" value="" needle="needle" msg="请输入16位代金券号码"/>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				 <input name="coupon" type="hidden" value="1">
				 <button class="btn btn-primary" type="submit">充值</button>
			</div>
		</div>
	</div>
</form>
<?php $this->_compileInclude('footer'); ?>
</body>
</html>