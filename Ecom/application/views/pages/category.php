<section>
	<div class="container">
		<div class="row">
			<?php $this->load->view('pages/template/sidebar'); ?>
			<div class="col-sm-9 padding-right">
				<div class="features_items"><!--features_items-->
					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<label for="">Lọc theo</label>
								<select name="" class="form-control select-filter" id="select-filter">
									<option value="0">---LỌC THEO---</option>
									<option value="?kytu=asc">Ký tự A-Z</option>
									<option value="?kytu=desc">Ký tự Z-A</option>
									<option value="?gia=asc">Giá tăng dần</option>
									<option value="?gia=desc">Giá giảm dần</option>

								</select>
							</div>
						</div>
						<div class="col-md-7">
							<form method="GET">
								<p>
									<label for="amount">Khoảng giá:</label>
									<input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold; width: 50%">
								</p>
								<div id="slider-range"></div>
								<input type="hidden" class="price_from" name="from">
								<input type="hidden" class="price_to" name="to">
								<input type="submit" value="Lọc giá" class="btn btn-primary filter-price">
						</div>
						</form>
					</div>
					<h2 class="title text-center"><?php echo $title ?></h2>
					<?php
					foreach ($allproductbycate_pagination as $key => $pro) {
					?>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<form action="<?php echo base_url('them-gio-hang') ?>" method="POST">
									<div class="single-products">
										<div class="productinfo text-center">
											<input type="hidden" value="<?php echo $pro->id ?>" name="product_id">
											<input type="hidden" value="1" name="quantity">
											<img width="450" min-height="500" src="<?php echo base_url('uploads/product/' . $pro->image) ?>" alt="<?php echo $pro->title ?>" />
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
								</form>
								<!-- <div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
									</ul>
								</div> -->
							</div>
						</div>
					<?php
					}
					?>

				</div><!--features_items-->
				<?php echo $links; ?>
			</div>
		</div>
	</div>
</section>
