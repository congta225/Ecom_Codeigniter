<section>
	<div class="container">
		<div class="row">
			<?php $this->load->view('pages/template/sidebar'); ?>
			<div class="col-sm-9 padding-right">
				<div class="features_items"><!--features_items-->
					<h2 class="title text-center">SẢN PHẨM MỚI</h2>
					<?php
					foreach ($allproduct_pagination as $key => $pro) {
					?>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<form action="<?php echo base_url('them-gio-hang') ?>" method="POST">
									<div class="single-products">
										<div style="width: 100%; height: 250px" class="productinfo text-center">
											<input type="hidden" value="<?php echo $pro->id ?>" name="product_id">
											<input type="hidden" value="1" name="quantity">
											<img src="<?php echo base_url('uploads/product/' . $pro->image) ?>" alt="<?php echo $pro->title ?>" />
											<h2><?php echo number_format($pro->price, 0, ',', '.') ?>₫</h2>
											<p><?php echo $pro->title ?></p>
										</div>
										<div class="product-overlay">
											<div class="overlay-content">
												<h2><?php echo number_format($pro->price, 0, ',', '.') ?>₫</h2>
												<p><?php echo $pro->title ?></p>
												<a href="<?php echo base_url('san-pham/' . $pro->id . '/' . $pro->slug) ?>" class="btn btn-default add-to-cart"><i class="fa fa-eye"></i>Details</a>
												<button type="submit" class="btn btn-default add-to-cart">
													<i class="fa fa-shopping-cart"></i>
													Thêm vào giỏ hàng
												</button>
											</div>
										</div>
									</div>
									<!-- <div class="choose">
										<ul class="nav nav-pills nav-justified">
											<li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
											<li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
										</ul>
									</div> -->
								</form>
							</div>
						</div>
					<?php
					}
					?>

				</div><!--features_items-->
				<?php echo $links; ?>
			</div>
			<?php

			foreach ($items_categories as $key => $items_cate) {
			?>
				<div class="col-sm-3"></div>
				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center"><?php echo $key ?></h2>
						<?php
						foreach ($items_cate as $pro_cate) {
						?>
							<div class="col-sm-4">
								<div class="product-image-wrapper">
									<form action="<?php echo base_url('them-gio-hang') ?>" method="POST">
										<div class="single-products">
											<div style="width: 100%; height: 250px" class="productinfo text-center">
												<input type="hidden" value="<?php echo $pro_cate['id'] ?>" name="product_id">
												<input type="hidden" value="1" name="quantity">
												<img src="<?php echo base_url('uploads/product/' . $pro_cate['image']) ?>" alt="<?php echo $pro_cate['title'] ?>" />
												<h2><?php echo number_format($pro_cate['price'], 0, ',', '.') ?>₫</h2>
												<p><?php echo $pro_cate['title'] ?></p>
											</div>
											<div class="product-overlay">
												<div class="overlay-content">
													<h2><?php echo number_format($pro_cate['price'], 0, ',', '.') ?>₫</h2>
													<p><?php echo $pro_cate['title'] ?></p>
													<a href="<?php echo base_url('san-pham/' . $pro_cate['id'] . '/' . $pro_cate['slug']) ?>" class="btn btn-default add-to-cart"><i class="fa fa-eye"></i>Details</a>
													<button type="submit" class="btn btn-default add-to-cart">
														<i class="fa fa-shopping-cart"></i>
														Thêm vào giỏ hàng
													</button>
												</div>
											</div>
										</div>
										<!-- <div class="choose">
										<ul class="nav nav-pills nav-justified">
											<li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
											<li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
										</ul>
									</div> -->
									</form>
								</div>
							</div>
						<?php
						}
						?>
					</div>
				</div>

			<?php
			}
			?>
		</div>
</section>
