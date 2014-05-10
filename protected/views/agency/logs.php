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
					<?php foreach($model as $key=>$value){ ?>
					<tr>
						<td>1</td>
						<td>1</td>
						<td>1</td>
					</tr>
					<?php } ?>
				<?php } else { ?>
				<tr>
					<td colspan="3">No data</td>
				</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
</div>