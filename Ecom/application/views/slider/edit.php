<div class="container">
	<div class="card">
		<div class="card-header">
			Edit Slider
		</div>
		<div>
			<a href="<?php echo base_url('slider/list') ?>">
				<button class="btn_hover_list"> Danh sách Slider</button>
			</a>
			<a href="<?php echo base_url('slider/create') ?>">
				<button class="btn_hover_add"> Thêm Slider</button>
			</a>
		</div>

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
			<form action="<?php echo base_url('slider/update/' . $slider->id) ?>" method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<label for="exampleInputEmail1">Title</label>
					<input type="text" name="title" value="<?php echo $slider->title ?>" class="form-control">
					<?php echo '<span class="text text-danger">' . form_error('title') . '</span>' ?>
				</div>

				<div class="form-group">
					<label for="exampleInputPassword1">Description</label>
					<input type="text" name="description" value="<?php echo $slider->description ?>" class="form-control">
					<?php echo '<span class="text text-danger">' . form_error('description') . '</span>' ?>
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">Image</label>
					<!-- <input type="file" name="image" class="form-control-file"> -->
					<div class="container">
						<div class="header">
							<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<g id="SVGRepo_bgCarrier" stroke-width="0"></g>
								<g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
								<g id="SVGRepo_iconCarrier">
									<path d="M7 10V9C7 6.23858 9.23858 4 12 4C14.7614 4 17 6.23858 17 9V10C19.2091 10 21 11.7909 21 14C21 15.4806 20.1956 16.8084 19 17.5M7 10C4.79086 10 3 11.7909 3 14C3 15.4806 3.8044 16.8084 5 17.5M7 10C7.43285 10 7.84965 10.0688 8.24006 10.1959M12 12V21M12 12L15 15M12 12L9 15" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
								</g>
							</svg>
							<p>Browse File to upload!</p>
						</div>
						<label for="file" class="footer">
							<svg fill="#000000" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg">
								<g id="SVGRepo_bgCarrier" stroke-width="0"></g>
								<g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
								<g id="SVGRepo_iconCarrier">
									<path d="M15.331 6H8.5v20h15V14.154h-8.169z"></path>
									<path d="M18.153 6h-.009v5.342H23.5v-.002z"></path>
								</g>
							</svg>
							<p>Not selected file</p>
							<svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
								<g id="SVGRepo_bgCarrier" stroke-width="0"></g>
								<g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
								<g id="SVGRepo_iconCarrier">
									<path d="M5.16565 10.1534C5.07629 8.99181 5.99473 8 7.15975 8H16.8402C18.0053 8 18.9237 8.9918 18.8344 10.1534L18.142 19.1534C18.0619 20.1954 17.193 21 16.1479 21H7.85206C6.80699 21 5.93811 20.1954 5.85795 19.1534L5.16565 10.1534Z" stroke="#000000" stroke-width="2"></path>
									<path d="M19.5 5H4.5" stroke="#000000" stroke-width="2" stroke-linecap="round"></path>
									<path d="M10 3C10 2.44772 10.4477 2 11 2H13C13.5523 2 14 2.44772 14 3V5H10V3Z" stroke="#000000" stroke-width="2"></path>
								</g>
							</svg>
						</label>
						<input name="image" id="file" type="file">
					</div>
					<img src="<?php echo base_url('uploads/slider/' . $slider->image)  ?>" alt="" width="150" height="150">
					<small><?php if (isset($error)) {
								echo $error;
							} ?></small>
				</div>
				<div class="form-group">
					<label for="exampleFormControlSelect1">Status</label>
					<select class="form-control" name="status">
						<?php
						if ($slider->status == '1') {
						?>
							<option selected value="1">Active</option>
							<option value="0">InActive</option>
						<?php
						} else {
						?>
							<option value="1">Active</option>
							<option selected value="0">InActive</option>
						<?php
						}
						?>
					</select>
				</div>

				<button type="submit" class="btn btn-primary">Update</button>
			</form>
		</div>
	</div>
</div>
