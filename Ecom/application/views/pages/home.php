<section>
	<div class="container">
		<div class="row">
			<div class="col-sm-3">
				<div class="left-sidebar">
					<h2>Category</h2>
					<div class="panel-group category-products" id="accordian"><!--category-productsr-->
						<?php
						foreach ($category as $key => $cate) {
						?>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="<?php echo base_url('danh-muc/' . $cate->id . '/' . $cate->slug) ?>"><?php echo $cate->title ?></a></h4>
								</div>
							</div>
						<?php
						}
						?>
					</div><!--/category-products-->

					<div class="brands_products"><!--brands_products-->
						<h2>Brands</h2>
						<div class="brands-name">
							<ul class="nav nav-pills nav-stacked">
								<?php
								foreach ($brand as $key => $bra) {
								?>
									<li><a href="<?php echo base_url('thuong-hieu/' . $bra->id . '/' . $bra->slug) ?>"><?php echo $bra->title ?></a></li>
								<?php
								}
								?>
							</ul>
						</div>
					</div><!--/brands_products-->


				</div>
			</div>

			<div class="col-sm-9 padding-right">
				<div class="features_items"><!--features_items-->
					<h2 class="title text-center">Features Items</h2>
					<?php
					foreach ($allproduct as $key => $pro) {
					?>
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
									<div class="productinfo text-center">
										<img width="450" min-height="500" src="<?php echo base_url('uploads/product/' . $pro->image) ?>" alt="<?php echo $pro->title ?>" />
										<h2><?php echo number_format($pro->price, 0, ',', '.') ?>₫</h2>
										<p><?php echo $pro->title ?></p>
									</div>
									<div class="product-overlay">
										<div class="overlay-content">
											<h2><?php echo number_format($pro->price, 0, ',', '.') ?>₫</h2>
											<p><?php echo $pro->title ?></p>
											<a href="<?php echo base_url('san-pham/' . $pro->id . '/' . $pro->slug) ?>" class="btn btn-default add-to-cart"><i class="fa fa-eye"></i>Details</a>
											<a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
									</div>
								</div>
								<div class="choose">
									<ul class="nav nav-pills nav-justified">
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
										<li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
									</ul>
								</div>
							</div>
						</div>
					<?php
					}
					?>

				</div><!--features_items-->

			</div>
		</div>
	</div>
</section>
