<!DOCTYPE html>
<html>
<head>
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>DeskApp - Bootstrap Admin Dashboard HTML Template</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="180x180" href="vendors/images/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="vendors/images/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="vendors/images/favicon-16x16.png">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="../../static/vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="../../static/vendors/styles/icon-font.min.css">
	<!-- Slick Slider css -->
	<link rel="stylesheet" type="text/css" href="../../static/src/plugins/slick/slick.css">
	<!-- bootstrap-touchspin css -->
	<link rel="stylesheet" type="text/css" href="../../static/src/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.css">
	<link rel="stylesheet" type="text/css" href="../../static/vendors/styles/style.css">

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-119386393-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];
		function gtag(){dataLayer.push(arguments);}
		gtag('js', new Date());

		gtag('config', 'UA-119386393-1');
	</script>
</head>
<body>

	<div class="main-container">
		<div class="pd-ltr-20 xs-pd-20-10">
			<div class="min-height-200px">
				<div class="page-header">
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<div class="title">
								<h4>Product Detail</h4>
							</div>
							<nav aria-label="breadcrumb" role="navigation">
								<ol class="breadcrumb">
									<li class="breadcrumb-item"><a href="index.html">Home</a></li>
									<li class="breadcrumb-item active" aria-current="page">Product Detail</li>
								</ol>
							</nav>
						</div>
					</div>
				</div>
				<div class="product-wrap">
					<div class="product-detail-wrap mb-30">
						<div class="row">
							<div class="col-lg-6 col-md-12 col-sm-12">
								<div class="product-slider slider-arrow">
									<div class="product-slide">
										<img src="../../static/vendors/images/product-img1.jpg" alt="">
									</div>
								</div>
							</div>
							<div class="col-lg-6 col-md-12 col-sm-12">
								<div class="product-detail-desc pd-20 card-box height-100-p">
									<h4 class="mb-20 pt-20">Gufram Bounce Black</h4>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
									<div class="price">
										<del>$55.5</del><ins>$49.5</ins>
									</div>
									<div class="mx-w-150">
										<div class="form-group">
											<label class="text-blue">quantity</label>
											<input class="form-control" id="demo3_22" type="text" value="1" name="demo3_22">
										</div>
									</div>
									<div class="row">
										<div class="col-md-6 col-6">
											<a href="#" class="btn btn-primary btn-block">Add To Cart</a>
										</div>
										<div class="col-md-6 col-6">
											<a href="#" class="btn btn-outline-primary btn-block">Buy Now</a>
										</div>
									</div>
								</div>
							</div>
								
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- js -->
	<script src="../../static/vendors/scripts/core.js"></script>
	<script src="../../static/vendors/scripts/script.min.js"></script>
	<script src="../../static/vendors/scripts/process.js"></script>
	<script src="../../static/vendors/scripts/layout-settings.js"></script>
	<!-- Slick Slider js -->
	<script src="../../static/src/plugins/slick/slick.min.js"></script>
	<!-- bootstrap-touchspin js -->
	<script src="../../static/src/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.js"></script>
	<script>
		jQuery(document).ready(function() {
			jQuery('.product-slider').slick({
				slidesToShow: 1,
				slidesToScroll: 1,
				arrows: true,
				infinite: true,
				speed: 1000,
				fade: true,
				asNavFor: '.product-slider-nav'
			});
			jQuery('.product-slider-nav').slick({
				slidesToShow: 3,
				slidesToScroll: 1,
				asNavFor: '.product-slider',
				dots: false,
				infinite: true,
				arrows: false,
				speed: 1000,
				centerMode: true,
				focusOnSelect: true
			});
			$("input[name='demo3_22']").TouchSpin({
				initval: 1
			});
		});
	</script>
</body>
</html>