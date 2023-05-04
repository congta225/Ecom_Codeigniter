<section id="cart_items">
	<div class="container">
		<div class="breadcrumbs">
			<ol class="breadcrumb">
				<li><a href="#">Home</a></li>
				<li class="active">Shopping Cart</li>
			</ol>
		</div>
		<div class="table-responsive cart_info">
			<?php
			if ($this->cart->contents()) {
			?>
				<table class="table table-condensed">
					<thead>
						<tr class="cart_menu">
							<td class="description">Image</td>
							<td class="image">Item</td>
							<td class="price">Price</td>
							<td class="quantity">Quantity</td>
							<td class="total">Total</td>
							<td></td>
						</tr>
					</thead>
					<tbody>
						<?php
						$subtotal = 0;
						$total = 0;
						foreach ($this->cart->contents() as $items) {
							$subtotal = $items['qty'] * $items['price'];
							$total += $subtotal;
						?>
							<tr>
								<td class="cart_product">
									<a href=""><img src="<?php echo base_url('uploads/product/' . $items['options']['image']) ?>" width="130" height="130" alt="<?php echo $items['name'] ?>"></a>
								</td>
								<td class="cart_description">
									<h4><a href=""><?php echo $items['name'] ?></a></h4>
								</td>
								<td class="cart_price">
									<p><?php echo number_format($items['price'], 0, ',', '.') ?>₫</p>
								</td>
								<td class="cart_quantity">
									<form action="<?php echo base_url('update-cart-item') ?>" method="POST">
										<div class="cart_quantity_button">
											<input type="hidden" value="<?php echo $items['rowid'] ?>" name="rowid">
											<input class="cart_quantity_input" type="number" min=1 name="quantity" value="<?php echo $items['qty'] ?>" autocomplete="off" size="2"> <br>
											<input type="submit" name="capnhat" class="btn btn-primary " value="Cập nhật"></input>
										</div>
									</form>

								</td>
								<td class="cart_total">
									<p class="cart_total_price"><?php echo number_format($subtotal, 0, ',', '.') ?>₫</p>
								</td>
							</tr>
						<?php
						}
						?>

						<tr>
							<td class="colspan-5">
								Tổng tiền:
								<p class="cart_total_price">
									<?php echo number_format($total, 0, ',', '.') ?>₫
								</p>
							</td>

							<!-- <td><a href="<?php echo base_url('checkout') ?>" class="btn btn-success ">Đặt hàng</a></td> -->
						</tr>
					</tbody>
				</table>
			<?php
			} else {
				echo '<span class="text text-danger">Bạn chưa có sản phẩm nào</span>';
			}
			?>
		</div>
		<section><!--form-->
			<div class="container">
				<div class="row">
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
					<div class="col-sm-10 col-sm-offset-1">
						<div class="login-form"><!--login form-->
							<h2>Thông tin thanh toán</h2>

							<form onsubmit="return confirm('Xác nhận đặt hàng')" action="<?php echo base_url('confirm-checkout') ?>" method="POST">
								<input type="text" name="name" placeholder="Name" />
								<?php echo form_error('name'); ?>
								<input type="text" name="address" placeholder="Address" />
								<?php echo form_error('address'); ?>
								<input type="text" name="phone" placeholder="Phone" />
								<?php echo form_error('phone'); ?>
								<input type="text" name="email" placeholder="Email" />
								<?php echo form_error('email'); ?>
								<label for="">Hình thức thanh toán</label>
								<select name="shiping_method">
									<option value="cod">COD</option>
									<option value="vnpay">VNPAY</option>
								</select>
								<button type="submit" class="btn btn-primary">Xác nhận thanh toán</button>
							</form>
						</div><!--/login form-->
					</div>



				</div>
			</div>
		</section><!--/form-->
	</div>
</section> <!--/#cart_items-->
