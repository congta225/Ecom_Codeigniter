<div class="container">
	<div class="card">
		<div class="card-header">
			List Category
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
			<a href="<?php echo base_url('category/create') ?>" class="btn btn-primary">Thêm mới</a>
			<table class="table table-striped">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Title</th>
						<th scope="col">Description</th>
						<th scope="col">Slug</th>
						<th scope="col">Image</th>
						<th scope="col">Status</th>
						<th scope="col">Manage</th>
					</tr>
				</thead>
				<tbody>
					<?php
					foreach ($category as $key => $cate) {
					?>
						<tr>
							<th scope="row"><?php echo $key ?></th>
							<td><?php echo $cate->title ?></td>
							<td><?php echo $cate->description ?></td>
							<td><?php echo $cate->slug ?></td>
							<td><img src="<?php echo base_url('uploads/category/' . $cate->image)  ?>" alt="" width="150" height="150"></td>
							<td>
								<?php
								if ($cate->status == 1) {
									echo 'Hiển thị';
								} else {
									echo 'Không hiển thị';
								}
								?>
							</td>
							<td>
								<a onclick="return confirm('Xóa danh mục này?')" href="<?php echo base_url('category/delete/' . $cate->id) ?>" class="btn btn-danger">Delete</a>
								<a href="<?php echo base_url('category/edit/' . $cate->id) ?>" class="btn btn-primary">Edit</a>
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
