<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="author" content="Super Star SA de CV">
		@yield('title')
		<!-- favicon -->
		<link rel="shortcut icon" type="image/png" href="{{ asset('img/favicon.png') }}">
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
		<link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="{{ asset('css/all.min.css') }}">
		<link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
		<link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }}">
		<link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
		<link rel="stylesheet" href="{{ asset('css/animate.css') }}">
		<link rel="stylesheet" href="{{ asset('css/meanmenu.min.css') }}">
		<link rel="stylesheet" href="{{ asset('css/main.css') }}">
		<link rel="stylesheet" href="{{ asset('css/responsive.css') }}">

	</head>
	<body>
		
		<!--PreLoader-->
		<div class="loader">
			<div class="loader-inner">
				<div class="circle"></div>
			</div>
		</div>
		<!--PreLoader Ends-->
		
		<!-- header -->
		<div class="top-header-area" id="sticker">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-sm-12 text-center">
						<div class="main-menu-wrap">
							<!-- logo -->
							<div class="site-logo">
								<a href="index.html">
									<img src="{{ asset('img/logo.png') }}" alt="">
								</a>
							</div>
							<!-- logo -->

							<!-- menu start -->
							<nav class="main-menu">
								<ul>
									<li><a href="{{ url('/') }}"><i class="fas fa-home"></i> Inicio</a></li>
									<li><a href=""><i class="fas fa-boxes"></i> Productos</a></li>
									<li><a href=""><i class="fas fa-newspaper"></i> Noticias</a></li>
									@auth
										<li><a class="shopping-cart" href="cart.html"><i class="fas fa-shopping-cart"></i> Carrito</a></li>
									@endauth
									<li>
										<div class="header-icons">
											@auth
												<a class="shopping-cart" href="{{ url('/logout') }}"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a>
											@endauth

											@guest
												<a class="shopping-cart" href="{{ url('/login') }}"><i class="fas fa-sign-in-alt"></i> Iniciar Sesión</a>
											@endguest
										</div>
									</li>
								</ul>
							</nav>
							<div class="mobile-menu"></div>
							<!-- menu end -->
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end header -->


		@yield('PageContent')

		<!-- footer -->
		<div class="footer-area">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-6">
						<div class="footer-box about-widget">
							<h2 class="widget-title">Acerca de nosotros</h2>
							<p>Somos un negocio, que desde el año 2008 vendemos hamburguesas y hotdogs, de diferentes variedades.</p>
						</div>
					</div>
					<div class="col-lg-3 col-md-6">
						<div class="footer-box get-in-touch">
							<h2 class="widget-title">Encuentranos</h2>
							<ul>
								<li>Alga 368, Fracc. Arrecifes, 89603, Altamira.</li>
								<li>contacto.superstar@gmail.com</li>
								<li>+52 no disponible</li>
							</ul>
						</div>
					</div>
					<div class="col-lg-3 col-md-6">
						<div class="footer-box pages">
							<h2 class="widget-title">Paginas</h2>
							<ul>
								<li><a href="">Inicio</a></li>
								<li><a href="">Productos</a></li>
								<li><a href="">Noticias</a></li>
								<li><a href="">Iniciar Sesión</a></li>
								<li><a href="">Registrarte</a></li>
							</ul>
						</div>
					</div>
					<div class="col-lg-3 col-md-6">
						<div class="footer-box subscribe">
							<h2 class="widget-title">Subscribete</h2>
							<p>Subscribete y recibe correos de promociones o actualizacion de nuestro productos</p>
							<form action="">
								<input type="email" placeholder="-- Ingrese su correo electronico --">
								<button type="submit"><i class="fas fa-paper-plane"></i></button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end footer -->
		
		<!-- copyright -->
		<div class="copyright">
			<div class="container">
				<div class="row">
					<div class="col-lg-6 col-md-12">
						<p>Copyrights &copy; 2024 - <a href="">Super Star</a>,  Todos los derechos reservados.<br>
							Creado por - <a href="https://www.instagram.com/davidclaymrx/" target="_blank">DavidClayMRX</a>
						</p>
					</div>
					<div class="col-lg-6 text-right col-md-12">
						<div class="social-icons">
							<ul>
								<li><a href="https://www.facebook.com/davidclaymrx" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
								<li><a href="https://www.instagram.com/davidclaymrx/" target="_blank"><i class="fab fa-instagram"></i></a></li>
								<li><a href="https://mx.linkedin.com/in/developer-lucio-david" target="_blank"><i class="fab fa-linkedin"></i></a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end copyright -->
		
		<!-- jquery -->
		<script src="{{ asset('js/jquery-1.11.3.min.js') }}"></script>
		<!-- bootstrap -->
		<script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>
		<!-- count down -->
		<script src="{{ asset('js/jquery.countdown.js') }}"></script>
		<!-- isotope -->
		<script src="{{ asset('js/jquery.isotope-3.0.6.min.js') }}"></script>
		<!-- waypoints -->
		<script src="{{ asset('js/waypoints.js') }}"></script>
		<!-- owl carousel -->
		<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
		<!-- magnific popup -->
		<script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
		<!-- mean menu -->
		<script src="{{ asset('js/jquery.meanmenu.min.js') }}"></script>
		<!-- sticker js -->
		<script src="{{ asset('js/sticker.js') }}"></script>
		<!-- main js -->
		<script src="{{ asset('js/main.js') }}"></script>

	</body>
</html>