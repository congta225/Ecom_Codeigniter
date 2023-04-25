<div class="card">
		<div class="card-header">
			Create Product
		</div>
		<a href="<?php echo base_url('product/list') ?>" class="btn btn-success">Danh sách sản phẩm</a>

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
			<form action="<?php echo base_url('product/store') ?>" method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<label for="exampleInputEmail1">Title</label>
					<input type="text" name="title" class="form-control">
					<?php echo '<span class="text text-danger">' . form_error('title') . '</span>' ?>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Price</label>
					<input type="text" name="price" class="form-control">
					<?php echo '<span class="text text-danger">' . form_error('price') . '</span>' ?>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Quantity</label>
					<input type="text" name="quantity" class="form-control">
					<?php echo '<span class="text text-danger">' . form_error('quantity') . '</span>' ?>
				</div>
				<div class="form-group">
					<label for="exampleInputEmail1">Slug</label>
					<input type="text" name="slug" class="form-control">
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
					<label for="exampleFormControlSelect1">Category</label>
					<select class="form-control" name="category_id">
						<?php
						foreach ($category as $key => $cate) {
						?>
							<option value="<?php echo $cate->id ?>"><?php echo $cate->title ?></option>
						<?php
						}
						?>
					</select>
				</div>
				<div class="form-group">
					<label for="exampleFormControlSelect1">Brand</label>
					<select class="form-control" name="brand_id">

						<?php
						foreach ($brand as $key => $bra) {
						?>
							<option value="<?php echo $bra->id ?>"><?php echo $bra->title ?></option>
						<?php
						}
						?>

					</select>
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
