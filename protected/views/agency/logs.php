<div class="row">
	<div class="col-sm-12">
		<div class="page-header">
			<div class="clearfix">
				<h3 class="content-title pull-left">Logs</h3>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="col-md-12">
		<table class="table">
			<thead>
				<tr>
					<th>ID</th>
					<th>Date</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
				<?php if($model){ ?>
					<tr>
					<?php foreach($model as $value){ ?>
						<td><?php echo $value['id']; ?></td>
						<td><?php echo $value['response_date']; ?></td>
						<td>
							<?php if($value['status'] == 0) {
								echo 'On Going';
							} else {
								echo 'Done';
							} ?>
						</td>
					<?php } ?>
					</tr>
				<?php } else { ?>
				<tr>
					<td colspan="3">No data</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>