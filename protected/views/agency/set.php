<div class="row">
	<div class="col-sm-12">
		<div class="page-header">
			<div class="clearfix">
				<br/>
				<h3 class="content-title pull-left">Deploy Assets</h3>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-5">
		<div class="box border primary">
			<div class="box-title">
				<h4><i class="fa fa-bars"></i></h4>
			</div>
			<div class="box-body">
				<div class="tabbable header-tabs user-profile">
					<ul class="nav nav-tabs">
					   <li class="active"><a href="#assets" data-toggle="tab"><i class="fa fa-dot-circle-o"></i> <span class="hidden-inline-mobile">Assets</span></a></li>
					</ul>
					<div class="tab-content">
					   <div class="tab-pane fade in active" id="assets">
					   	<?php if(count($assets) > 0){ ?>
					   		<form method="POST" action="<?php echo $this->createUrl('agency/respond',array('id'=>$_GET['id'])); ?>">
					   			<table>
					   				<thead>
						   				<tr>
						   					<th>Asset Name</th>
						   					<th>Quantity</th>
						   				</tr>
					   				</thead>
					   				<tbody>
								   		<?php $i = 0; ?>
								   		<?php foreach($assets as $asset){ ?>
								   			<?php if($asset->quantity-ActiveAssets::getRemaining($asset->id) > 0){ ?>
									   			<tr>
										   			<td class="col-md-9"><input type="hidden" name="id[<?php echo $i; ?>]" value="<?php echo $asset->id; ?>"><?php echo $asset->asset; ?>(Total of <?php echo $asset->quantity; ?>, <?php echo ActiveAssets::getRemaining($asset->id); ?> already deployed, <?php echo $asset->quantity-ActiveAssets::getRemaining($asset->id); ?> remaining)</td>
													<td><input type="text" class="form-control" id="asset[<?php echo $i; ?>]" name="asset[<?php echo $i; ?>]"></td>
												</tr>
												<?php $i++; ?>
											<?php } ?>
								   		<?php } ?>
								   	</tbody>
								   	<tfoot>
								   		<tr>
								   			<td>
								   				<input type="submit" class="btn btn-primary" value="Respond">
								   				<a href="<?php echo $this->createUrl('agency/dashboard'); ?>"><input type="submit" class="btn btn-danger" value="Cancel"></a>
								   			</td>
								   		</tr>
								   	</tfoot>
					   			</table>
					   		</form>
					   	<?php }else{ ?>
					   		<div class="alert alert-block alert-danger fade in">
								<b><i class="fa fa-warning"></i> You don't have registered assets at the moment.</b>
							</div>
					   	<?php } ?>
					   </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>