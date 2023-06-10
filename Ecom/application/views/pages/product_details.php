<section>
	<div class="container">
		<div class="row">
			<?php $this->load->view('pages/template/sidebar'); ?>

			<div class="col-sm-9 padding-right">
				<?php
				foreach ($product_details as $key => $pro) {
				?>
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<img src="<?php echo base_url('uploads/product/' . $pro->image) ?>" alt="<?php echo $pro->title ?>" />
							</div>


						</div>
						<form action="<?php echo base_url('them-gio-hang') ?>" method="POST">
							<div class="col-sm-7">
								<div class="product-information"><!--/product-information-->
									<img src="images/product-details/new.jpg" class="newarrival" alt="" />
									<h2><?php echo $pro->title ?></h2>
									<input type="hidden" value="<?php echo $pro->id ?>" name="product_id">
									<img src="images/product-details/rating.png" alt="" />
									<span>
										<span><?php echo number_format($pro->price, 0, ',', '.') ?>₫</span>
										<div>Số lượng: <input type="number" min="1" value="1" name="quantity" /></div>
										<div style="margin: 15px 0;">
											<button type="submit" class="btn btn-fefault cart">
												<i class="fa fa-shopping-cart"></i>
												Thêm vào giỏ hàng
											</button>
										</div>

									</span>
									<div>Tình trạng: <p class="btn btn-warning" style="color: #fff; margin-left: 10px;">New</p>
									</div>

									<div>Thương hiệu:<p class="btn btn-info" style="color: #fff;margin-left: 10px;"> <?php echo $pro->tenthuonghieu ?></p>
									</div>

									<div>Danh mục: <p class="btn btn-danger" style="color: #fff;margin-left: 10px;"> <?php echo $pro->tendanhmuc ?></p>
									</div>
									<p><b></b> </p>
									<p><b></b> </p>
									<a href=""><img src="images/product-details/share.png" class="share img-responsive" alt="" /></a>
								</div><!--/product-information-->
							</div>
						</form>

					</div><!--/product-details-->
				<?php
				}
				?>
				<div class="category-tab shop-details-tab"><!--category-tab-->
					<div class="col-sm-12">
						<ul class="nav nav-tabs">
							<li><a href="#details" data-toggle="tab">Details</a></li>
							<li><a href="#companyprofile" data-toggle="tab">Company Profile</a></li>
							<li><a href="#tag" data-toggle="tab">Tag</a></li>
							<li class="active"><a href="#reviews" data-toggle="tab">Reviews (5)</a></li>
						</ul>
					</div>
					<div class="tab-content">
						<div class="tab-pane fade" id="details">
							<div class="col-sm-3">
								<div class="product-image-wrapper">
									<div class="single-products">
										<div class="productinfo text-center">
											<img src="images/home/gallery1.jpg" alt="" />
											<h2>$56</h2>
											<p>Easy Polo Black Edition</p>
											<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="product-image-wrapper">
									<div class="single-products">
										<div class="productinfo text-center">
											<img src="images/home/gallery2.jpg" alt="" />
											<h2>$56</h2>
											<p>Easy Polo Black Edition</p>
											<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="product-image-wrapper">
									<div class="single-products">
										<div class="productinfo text-center">
											<img src="images/home/gallery3.jpg" alt="" />
											<h2>$56</h2>
											<p>Easy Polo Black Edition</p>
											<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="product-image-wrapper">
									<div class="single-products">
										<div class="productinfo text-center">
											<img src="images/home/gallery4.jpg" alt="" />
											<h2>$56</h2>
											<p>Easy Polo Black Edition</p>
											<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="tab-pane fade" id="companyprofile">
							<div class="col-sm-3">
								<div class="product-image-wrapper">
									<div class="single-products">
										<div class="productinfo text-center">
											<img src="images/home/gallery1.jpg" alt="" />
											<h2>$56</h2>
											<p>Easy Polo Black Edition</p>
											<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="product-image-wrapper">
									<div class="single-products">
										<div class="productinfo text-center">
											<img src="images/home/gallery3.jpg" alt="" />
											<h2>$56</h2>
											<p>Easy Polo Black Edition</p>
											<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="product-image-wrapper">
									<div class="single-products">
										<div class="productinfo text-center">
											<img src="images/home/gallery2.jpg" alt="" />
											<h2>$56</h2>
											<p>Easy Polo Black Edition</p>
											<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="product-image-wrapper">
									<div class="single-products">
										<div class="productinfo text-center">
											<img src="images/home/gallery4.jpg" alt="" />
											<h2>$56</h2>
											<p>Easy Polo Black Edition</p>
											<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="tab-pane fade" id="tag">
							<div class="col-sm-3">
								<div class="product-image-wrapper">
									<div class="single-products">
										<div class="productinfo text-center">
											<img src="images/home/gallery1.jpg" alt="" />
											<h2>$56</h2>
											<p>Easy Polo Black Edition</p>
											<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="product-image-wrapper">
									<div class="single-products">
										<div class="productinfo text-center">
											<img src="images/home/gallery2.jpg" alt="" />
											<h2>$56</h2>
											<p>Easy Polo Black Edition</p>
											<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="product-image-wrapper">
									<div class="single-products">
										<div class="productinfo text-center">
											<img src="images/home/gallery3.jpg" alt="" />
											<h2>$56</h2>
											<p>Easy Polo Black Edition</p>
											<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-3">
								<div class="product-image-wrapper">
									<div class="single-products">
										<div class="productinfo text-center">
											<img src="images/home/gallery4.jpg" alt="" />
											<h2>$56</h2>
											<p>Easy Polo Black Edition</p>
											<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
										</div>
									</div>
								</div>
							</div>
						</div>

						<div class="tab-pane fade active in" id="reviews">
							<div class="col-sm-12">
								<ul>
									<li><a href=""><i class="fa fa-user"></i>EUGEN</a></li>
									<li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
									<li><a href=""><i class="fa fa-calendar-o"></i>31 DEC 2014</a></li>
								</ul>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>

								<p><b>Write Your Review</b></p>

								<form action="#">
									<span>
										<input type="text" placeholder="Your Name" />
										<input type="email" placeholder="Email Address" />
									</span>
									<textarea name=""></textarea>
									<b>Rating: </b> <img src="images/product-details/rating.png" alt="" />
									<button type="button" class="btn btn-default pull-right">
										Submit
									</button>
								</form>
							</div>
						</div>

					</div>
				</div><!--/category-tab-->

				<div class="recommended_items"><!--recommended_items-->
					<h2 class="title text-center">Sản phẩm liên quan</h2>

					<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
						<div class="carousel-inner">
							<?php
							foreach ($product_related as $key => $pro) {
							?>
								<div class="item active">

									<div class="col-sm-4">
										<div class="product-image-wrapper">

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

													</div>
												</div>
											</div>


										</div>
									</div>
								</div>
							<?php
							}
							?>
						</div>
						<a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>
				</div><!--/recommended_items-->

			</div>
		</div>
	</div>
</section>
