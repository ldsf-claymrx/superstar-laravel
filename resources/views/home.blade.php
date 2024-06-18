@extends('masterhome')

@section('title')
    <!-- title -->
	<title>Super Star | Inicio</title>
@endsection

@section('PageContent')
    <!-- hero area -->
		<div class="hero-area hero-bg">
			<div class="container">
				<div class="row">
					<div class="col-lg-9 offset-lg-2 text-center">
						<div class="hero-text">
							<div class="hero-text-tablecell">
								<p class="subtitle">Restaurante</p>
								<h1>Super Star</h1>
								<div class="hero-btns">
									<a href="" class="boxed-btn">Productos</a>
									<a href="" class="bordered-btn">Conoce mas información</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end hero area -->


        <!-- features list section -->
		<div class="list-section pt-80 pb-80">
			<div class="container">

				<div class="row">
					<div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
						<div class="list-box d-flex align-items-center">
							<div class="list-icon">
								<i class="fas fa-shopping-cart"></i>
							</div>
							<div class="content">
								<h3>Compra en linea</h3>
								<p>Ahorrate las filas y el viaje</p>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
						<div class="list-box d-flex align-items-center">
							<div class="list-icon">
								<i class="fas fa-dollar-sign"></i>
							</div>
							<div class="content">
								<h3>Paga desde tu casa</h3>
								<p>¡Aceptamos tarjetas de debito, credito y vales!</p>
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-6">
						<div class="list-box d-flex justify-content-start align-items-center">
							<div class="list-icon">
								<i class="fas fa-shipping-fast"></i>
							</div>
							<div class="content">
								<h3>¡Recibelo en tu casa!</h3>
								<p>Conoce los precios y las zonas de entrega <a href="">aquí</a></p>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
		<!-- end features list section -->


        <!-- product section -->
		<div class="product-section mt-150 mb-150">
			<div class="container">
				<div class="row">
					<div class="col-lg-8 offset-lg-2 text-center">
						<div class="section-title">	
							<h3><span class="orange-text">Nuestros</span> Productos</h3>
							<p>Contamos con diferentes variedades de hamburguesas y hot-dogs, aqui te mostraremos los mas vendidos</p>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-4 col-md-6 text-center">
						<div class="single-product-item">
							<div class="product-image">
								<a href="single-product.html"><img src="{{ asset('img/products/product-img-1.jpg') }}" alt=""></a>
							</div>
							<h3>DOBLE</h3>
							<p class="product-price"><span>HAMBURGUESA</span> $70 </p>
							<a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i>Agregar al carrito</a>
						</div>
					</div>
					<div class="col-lg-4 col-md-6 text-center">
						<div class="single-product-item">
							<div class="product-image">
								<a href="single-product.html"><img src="{{ asset('img/products/product-img-2.jpg') }}" alt=""></a>
							</div>
							<h3>SUIZA</h3>
							<p class="product-price"><span>HAMBURGUESA</span> $55 </p>
							<a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i>Agregar al carrito</a>
						</div>
					</div>
					<div class="col-lg-4 col-md-6 offset-md-3 offset-lg-0 text-center">
						<div class="single-product-item">
							<div class="product-image">
								<a href="single-product.html"><img src="{{ asset('img/products/product-img-3.jpg') }}" alt=""></a>
							</div>
							<h3>ESPECIAL</h3>
							<p class="product-price"><span>HOT-DOG</span> $35 </p>
							<a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i>Agregar al carrito</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end product section -->
		
		<!-- advertisement section -->
		<div class="abt-section mb-150">
			<div class="container">
				<div class="row">
                    <div class="col-lg-6 col-md-12">
						<div class="abt-bg">
							<a href="https://www.youtube.com/watch?v=DBLlFWYcIGQ" class="video-play-btn popup-youtube"><i class="fas fa-play"></i></a>
						</div>
					</div>
					<div class="col-lg-6 col-md-12">
						<div class="abt-text">
							<p class="top-sub">Desde el año 2008</p>
							<h2>Somos <span class="orange-text">Super Star</span></h2>
							<p>Etiam vulputate ut augue vel sodales. In sollicitudin neque et massa porttitor vestibulum ac vel nisi. Vestibulum placerat eget dolor sit amet posuere. In ut dolor aliquet, aliquet sapien sed, interdum velit. Nam eu molestie lorem.</p>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente facilis illo repellat veritatis minus, et labore minima mollitia qui ducimus.</p>
							<a href="about.html" class="boxed-btn mt-4">know more</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end advertisement section -->
@endsection