<!-- <div class="container">
	<h1>Đăng nhập ADMIN</h1>
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
	<form action="<?php echo base_url('login-user') ?>" method="POST">
		<div class="form-group">
			<label for="exampleInputEmail1">Email address</label>
			<input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
			<?php echo form_error('email'); ?>
		</div>
		<div class="form-group">
			<label for="exampleInputPassword1">Password</label>
			<input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
			<?php echo form_error('password'); ?>
		</div>
		<button type="submit" class="btn btn-primary">Đăng nhập</button>
		<a href="<?php echo base_url('register-admin') ?>" class="btn btn-success">Đăng ký</a>
	</form>
</div> -->

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Webleb</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="<?php echo base_url('frontend/css_login_admin/style.css') ?>">
</head>

<body>
	<div class="form">
		<ul class="tab-group">
			<li class="tab active"><a href="#signup" style="border-radius: 15px!important;margin-right:8x;">Đăng ký</a></li>
			<li class="tab"><a href="#login" style="border-radius: 15px!important;margin-left:8px;">Đăng nhập</a></li>
		</ul>

		<!-- đăng ký admin -->
		<div class="tab-content">
			<div id="signup">
				<h1>Đăng ký tài khoản</h1>
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
				<form action="<?php echo base_url('register-insert') ?>" method="POST">

					<div class="field-wrap">
						<input type="text" name="username" required placeholder="Enter Username" />
						<?php echo form_error('username'); ?>
					</div>

					<div class="field-wrap">
						<input type="email" name="email" required placeholder="Email Address" />
						<?php echo form_error('email'); ?>
					</div>

					<div class="field-wrap">
						<input type="password" name="password" required placeholder="Password" />
						<?php echo form_error('password'); ?>
					</div>
					<button type="submit" class="button button-block" />Đăng ký</button>
				</form>
			</div>
			<!-- đăng nhập admin -->
			<div id="login">
				<h1>Xin chào Admin</h1>
				<form action="<?php echo base_url('login-user') ?>" method="POST">
					<div class="field-wrap">
						<input type="email" name="email" required placeholder="Email" />
						<?php echo form_error('email'); ?>
					</div>
					<div class="field-wrap">
						<input type="password" name="password" required placeholder="Password" />
						<?php echo form_error('password'); ?>
					</div>
					<button class="button button-block" />Đăng nhập</button>
				</form>
			</div>
		</div>
	</div>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="<?php echo base_url('frontend/js/script_login_admin.js') ?>"></script>
</body>

</html>
