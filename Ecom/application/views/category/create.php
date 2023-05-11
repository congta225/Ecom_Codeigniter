<div class="container">
	<div class="card">
		<div class="card-header">
			Create Category
		</div>
		<a href="<?php echo base_url('category/list') ?>" class="btn btn-success">Danh sách danh mục</a>

		<div class="card-body">
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
			<form action="<?php echo base_url('category/store') ?>" method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<label for="exampleInputEmail1">Title</label>
					<input type="text" name="title" class="form-control" id="slug" onkeyup="ChangeToSlug()">
					<?php echo '<span class="text text-danger">' . form_error('title') . '</span>' ?>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Slug</label>
					<input type="text" name="slug" class="form-control" id="convert_slug">
					<?php echo '<span class="text text-danger">' . form_error('slug') . '</span>' ?>
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">Description</label>
					<input type="text" name="description" class="form-control">
					<?php echo '<span class="text text-danger">' . form_error('description') . '</span>' ?>
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">Image</label>
					<input type="file" name="image" class="form-control-file">
					<small><?php if (isset($error)) {
								echo $error;
							} ?></small>
				</div>
				<div class="form-group">
					<label for="exampleFormControlSelect1">Status</label>
					<select class="form-control" name="status">
						<option value="1">Active</option>
						<option value="0">InActive</option>
					</select>
				</div>

				<button type="submit" class="btn btn-primary">Add</button>
			</form>
		</div>
	</div>
</div>
