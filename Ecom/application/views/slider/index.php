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

			<a href="<?php echo base_url('slider/create') ?>" style="text-decoration: none;">
				<button class="create_btn">
					<span>
						<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
							<path fill="none" d="M0 0h24v24H0z"></path>
							<path fill="currentColor" d="M11 11V5h2v6h6v2h-6v6h-2v-6H5v-2z"></path>
						</svg> Create
					</span>
				</button>
			</a>
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
								<a style="text-decoration: none;" href="<?php echo base_url('slider/delete/' . $sli->id) ?>">
									<button onclick="return confirm('Xóa slider này?')" class="Btn delete_btn">Delete
										<svg class="svg" viewBox="0 0 512 512">
											<path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"></path>
										</svg>
									</button>
								</a>
								<a style="text-decoration: none;" href="<?php echo base_url('slider/edit/' . $sli->id) ?>">
									<button class="Btn edit_btn">Edit
										<svg class="svg" viewBox="0 0 512 512">
											<path d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"></path>
										</svg>
									</button>
								</a>


								<!-- <a onclick="return confirm('Xóa slider này?')" href="<?php echo base_url('slider/delete/' . $sli->id) ?>" class="btn btn-danger">Delete</a> -->
								<!-- <a href="<?php echo base_url('slider/edit/' . $sli->id) ?>" class="btn btn-primary">Edit</a> -->
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
