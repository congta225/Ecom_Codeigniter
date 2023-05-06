<div class="container">
	<div class="card">
		<div class="card-header">
			Danh sách đơn hàng
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
			<table class="table table-striped">
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Order Code</th>
						<th scope="col">Product Name</th>
						<th scope="col">Product Price</th>
						<th scope="col">Product Image</th>
						<th scope="col">Quantity</th>
						<th scope="col">Total</th>
					</tr>
				</thead>
				<tbody>
					<?php
					foreach ($order_details as $key => $ord) {
					?>
						<tr>
							<th scope="row"><?php echo $key ?></th>
							<td><?php echo $ord->order_code ?></td>
							<td><?php echo $ord->title ?></td>
							<td><img src="<?php echo base_url('uploads/product/' . $ord->image)  ?>" alt="" width="150" height="150"></td>
							<td><?php echo number_format($ord->price, 0, ',', '.') ?>₫</td>
							<td><?php echo $ord->soluong ?></td>
							<td>
								<?php echo number_format($ord->soluong * $ord->price, 0, ',', '.') ?>₫
							</td>
							<td>

							</td>
						</tr>
					<?php
					}
					?>

					<tr>
						<td>
							<select class="xulidonhang form-control">
								<?php
								if ($ord->order_status == 1) {
								?>
									<option selected id="<?php echo $ord->order_code ?>" value="0">---TRẠNG THÁI---</option>
									<option id="<?php echo $ord->order_code ?>" value="2">Đơn hàng đang được xử lí - đang giao hàng</option>
									<option id="<?php echo $ord->order_code ?>" value="5">Hủy đơn</option>
								<?php
								} elseif ($ord->order_status == 2) {
								?>
									<option id="<?php echo $ord->order_code ?>" value="0">---TRẠNG THÁI---</option>
									<option selected id="<?php echo $ord->order_code ?>" value="2">Đơn hàng đang được xử lí - đang giao hàng</option>
									<option id="<?php echo $ord->order_code ?>" value="5">Hủy đơn</option>
								<?php
								} else {
								?>
									<option selected id="<?php echo $ord->order_code ?>" value="0">---TRẠNG THÁI---</option>
									<option id="<?php echo $ord->order_code ?>" value="2">Đơn hàng đang được xử lí - đang giao hàng</option>
									<option selected id="<?php echo $ord->order_code ?>" value="5">Hủy đơn</option>
								<?php
								}
								?>



							</select>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
</div>
