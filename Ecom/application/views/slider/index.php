<div class="container">
	<div class="card">
		<div class="card-header">
			List Slider
		</div>
		<?php
		if ($this->session->flashdata('success')) {
		?>
			<div class="alert alert-success"><?php echo $this->session->flashdata('success') ?></div>
		<?php
		} elseif ($this->session->flashdata('error')) {
		?>
			<div class="alert alert-danger"><?php echo $this->session->flashdata('error') ?></div>
		<?php
		}
		?>
		<div class="card-body">
			<a href="<?php echo base_url('slider/create') ?>" class="btn btn-primary">Thêm mới</a>
			<table class="table table-striped">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Title</th>
						<th scope="col">Description</th>
						<th scope="col">Image</th>
						<th scope="col">Status</th>
						<th scope="col">Manage</th>
					</tr>
				</thead>
				<tbody>
					<?php
					foreach ($slider as $key => $sli) {
					?>
						<tr>
							<th scope="row"><?php echo $key ?></th>
							<td><?php echo $sli->title ?></td>
							<td><?php echo $sli->description ?></td>
							<td><img src="<?php echo base_url('uploads/slider/' . $sli->image)  ?>" alt="" width="100%" height="250"></td>
							<td>
								<?php
								if ($sli->status == 1) {
									echo 'Hiển thị';
								} else {
									echo 'Không hiển thị';
								}
								?>
							</td>
							<td>
								<a onclick="return confirm('Xóa slider này?')" href="<?php echo base_url('slider/delete/' . $sli->id) ?>" class="btn btn-danger">Delete</a>
								<a href="<?php echo base_url('slider/edit/' . $sli->id) ?>" class="btn btn-primary">Edit</a>
							</td>
						</tr>
					<?php
					}
					?>
				</tbody>
			</table>
		</div>
	</div>
</div>
