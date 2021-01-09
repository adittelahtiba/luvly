<?php
if (!$this->session->userdata('username')) {
	$this->session->set_flashdata('message', '<div class=" alert alert-danger" role="alert">
                Please login first!</div>');
	redirect('auth');
}
?>
<html>
<!--<![endif]-->

<head>

	<!-- Meta -->
	<meta charset="utf-8">
	<meta name="keywords" content="HTML5 Template" />
	<meta name="description" content="">
	<meta name="author" content="">

	<title>
		<?php echo $judul; ?>
	</title>

	<!-- Mobile Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Favicon -->
	<link rel="shortcut icon" href="/favicon.ico">

	<!-- Google Webfont -->
	<link href='http://fonts.googleapis.com/css?family=Raleway:400,200,100,300,500,600,700,800,900' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Lato:400,100,300,300italic,700,900' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

	<!---->
	<link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700,900&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Cabin:400,500,600,700&display=swap" rel="stylesheet">

	<link href="https://fonts.googleapis.com/css?family=Rubik:400,500,700,900&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Karla:400,700&display=swap" rel="stylesheet">

	<link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">



	<!-- CSS -->
	<link rel="stylesheet" href="<?= base_url('assets/'); ?>css/font-awesome/css/font-awesome.css">
	<link rel="stylesheet" href="<?= base_url('assets/'); ?>css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= base_url('assets/'); ?>js/vendors/isotope/isotope.css">
	<link rel="stylesheet" href="<?= base_url('assets/'); ?>js/vendors/slick/slick.css">
	<link rel="stylesheet" href="<?= base_url('assets/'); ?>js/vendors/rs-plugin/css/settings.css">
	<link rel="stylesheet" href="<?= base_url('assets/'); ?>js/vendors/select/jquery.selectBoxIt.css">
	<link rel="stylesheet" href="<?= base_url('assets/'); ?>css/subscribe-better.css">
	<link rel="stylesheet" href="<?= base_url('assets/'); ?>http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/themes/ui-lightness/jquery-ui.css">
	<link rel="stylesheet" href="<?= base_url('assets/'); ?>plugin/owl-carousel/owl.carousel.css">
	<link rel="stylesheet" href="<?= base_url('assets/'); ?>plugin/owl-carousel/owl.theme.css">



	<link rel="stylesheet" href="<?= base_url('assets'); ?>/css/style.css">


</head>

<body>

	<!-- PRELOADER -->


	<div class="body">


		<!-- HEADER -->
		<header>
			<nav class="navbar navbar-default">
				<div class="container">
					<div class="row">
						<div class="navbar-header purple-gradient color-block mb-3 mx-auto rounded-circle z-depth-1">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<!-- Logo -->
							<a class="navbar-brand" href="<?= base_url('admin'); ?>">
								<img src="<?= base_url('assets/'); ?>images/basic/logo-metrobaru.png" class="img-responsive" alt="" />
							</a>
						</div>

						<!--<div class="header-xtra pull-right">
								<i class="fa fa-user-circle-o" aria-hidden="true">&nbsp;&nbsp;<span>ADMIN</span></i>
						</div>-->


						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

							<ul class="nav navbar-nav navbar-right">


								<li class="dropdown">

									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">MENU&nbsp;&nbsp;
										<i class="fa fa-angle-down" aria-hidden="true"></i>
									</a>


									<ul class="dropdown-menu submenu" role="menu">

										<li>
											<a href="<?= base_url('control/index'); ?>">
												<i class="fa fa-list">&nbsp;</i> Control</a>
										</li>

										<li>
											<a href="<?= base_url('history/index'); ?>">
												<i class="fa fa-history">&nbsp;</i>
												History</a>






									</ul>
								</li>





								<li class="dropdown">

									<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
										<i class="fa fa-user-circle-o" aria-hidden="true"></i>&nbsp;&nbsp;<?= $this->session->userdata('nama'); ?>
									</a>


									<ul class="dropdown-menu submenu" role="menu">

										<li>
											<a href="<?= base_url('admin/profil'); ?>">
												<i class="fa fa-user">&nbsp;</i> Profile</a>
										</li>

										<li>
											<a href="<?= base_url('setting'); ?>">
												<i class="fa fa-gear">&nbsp;</i> Setting</a>




										<li>
											<a href="#" data-toggle="modal" data-target="#logoutModal">

												<i class="fa fa-sign-out">&nbsp;</i>Logout</a>












									</ul>








								</li>








							</ul>







						</div>
					</div>
				</div>
			</nav>
		</header>

		<!-- Logout Modal-->
		<!-- Logout Modal-->
		<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-sm">

				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;
						</button>
						<h4 class="modal-title text-center">Do you want to exit ?</h4>
					</div>
					<div class="modal-footer">
						<div class="buttons-set text-center">
							<a href="<?= base_url('auth/logout'); ?>"><button type="submit" class=" btn-black">YES</button></a>
							<button type="reset" class=" btn-black2" data-dismiss="modal">CANCEL</button>
						</div>
					</div>
				</div>
			</div>
		</div>