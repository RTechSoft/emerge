<div class="row">
	<div class="col-sm-12">
		<div class="page-header">
			<div class="clearfix">
				<br/>
				<h3 class="content-title pull-left">Assets Manager</h3>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-6">
		<div class="box border primary">
			<div class="box-title">
				<h4><i class="fa fa-user"></i></h4>
			</div>
			<div class="box-body">
				<div class="tabbable header-tabs user-profile">
					<ul class="nav nav-tabs">
					   <li class="active" ><a href="#pro_overview" id="assetTab" data-toggle="tab" style="cursor:pointer !important;"><i class="fa fa-plus"></i> <span class="hidden-inline-mobile">Add</span></a></li>
					</ul>
					<div class="tab-content">
					   <div class="tab-pane fade in active" id="pro_overview">
							<div class="box border">
								<div class="box-body">
									<table class="table table-striped">
										<thead>
										  <tr>
											<th>Assets</th>
											<th>Quantity</th>
										  </tr>
										</thead>
										<tbody>
										  	<?php foreach($list as $value){ ?>
										  		<tr id="<?php echo $value['id']; ?>" class="assetValue">	
										  			<td><?php echo $value['asset']; ?></td>
										  			<td><?php echo $value['quantity']; ?></td>
										  		</tr>
										  	<?php } ?>
										</tbody>
									 </table>
								</div>
							</div>
					   </div>
				   </div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-6 actionBox" style="display:none">
		<div class="row">
			<div class="box border primary">
				<div class="box-title">
					<h4></h4>
				</div>
				<div class="box-body">
					<div class="box">
						<form name="youraction">
							<div class="form-group">
								<label for="asset">Asset Name</label>
								<input type="text" class="form-control" name="asset" id="asset">
							</div>
							<div class="form-group">
								<label for="quantity">Quantity</label>
								<input type="text" class="form-control" name="quantity" id="quantity" class="col-xs-4">
							</div>
							<input type="submit" value="Add" name="add" class="btn btn-primary">
							<input type="submit" value="Update" name="update" class="btn btn-primary hide">
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function(){
		$('#assetTab').click(function(){
			$('.actionBox').fadeIn('slow');
		});
		$('.assetValue').click(function(){
			$('.actionBox').fadeOut('slow');
			$('.actionBox').fadeIn('slow');
		})
	});
</script>