<div class="container">

	<div class="row">
		<div class="md-col-12 notfound">
			<h4>Nhận thông tin các chương trình của chúng tôi</h4>
			<form action="<?php echo base_url('send-contact') ?>" method="POST">
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
				<div class="form-group">
					<label for="exampleInputEmail1">Địa chỉ email *</label>
					<input type="email" class="form-control" name="email" required id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập vào email">
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">Họ và tên *</label>
					<input type="text" class="form-control" name="name" required id="exampleInputPassword1" placeholder="Nhập vào họ và tên">
				</div>
				<div class="form-group">
					<label for="exampleInputPassword1">Số điện thoại:</label>
					<input type="text" class="form-control" name="phone" required id="exampleInputPassword1" placeholder="Nhập vào số điện thoại">
				</div>

				<div class="form-group">
					<label for="exampleInputPassword1">Địa chỉ</label>
					<input type="text" class="form-control" name="address" id="exampleInputPassword1" placeholder="Nhập vào địa chỉ">
				</div>

				<div class="form-group">
					<label for="exampleInputPassword1">Ghi chú</label>
					<textarea id="" cols="30" rows="5" name="note" required resize="none" placeholder="......"></textarea>
				</div>
				<button type="submit" class="btn btn-primary">Gửi liên hệ</button>
			</form>
		</div>
	</div>
</div>
