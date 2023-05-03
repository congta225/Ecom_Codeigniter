<section id="form"><!--form-->
	<div class="container">
		<div class="row">
			<div class="col-sm-4 col-sm-offset-1">
				<div class="login-form"><!--login form-->
					<h2>Login to your account</h2>
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
					<form action="<?php echo base_url('login-customer') ?>" method="POST">
						<input type="email" name="email" placeholder="Email" />
						<?php echo form_error('email'); ?>
						<input type="password" name="password" placeholder="Password" />
						<?php echo form_error('password'); ?>
						<button type="submit" class="btn btn-default">Login</button>
					</form>
				</div><!--/login form-->
			</div>
			<div class="col-sm-1">
				<h2 class="or">OR</h2>
			</div>
			<div class="col-sm-4">
				<div class="signup-form"><!--sign up form-->
					<h2>New User Signup!</h2>
					<form action="#">
						<input type="text" placeholder="Name" />
						<input type="email" placeholder="Email Address" />
						<input type="password" placeholder="Password" />
						<button type="submit" class="btn btn-default">Signup</button>
					</form>
				</div><!--/sign up form-->
			</div>
		</div>
	</div>
</section><!--/form-->
