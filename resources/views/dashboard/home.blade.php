@extends('dashboard.masterhome')

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
								@auth
									<p class="subtitle">Bienvenido(a)</p>
									<h1>{{ Auth::user()->name." ".Auth::user()->lastname}}</h1>
								@endauth
								@guest
									<p class="subtitle">Restaurante</p>
									<h1>Super Star</h1>
								@endguest
								<div class="hero-btns">
									<a href="" class="boxed-btn">Nuestros productos</a>
									<a href="" class="bordered-btn">Más información</a>
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
								<p>Ahorrate las filas.</p>
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
								<h3>¡Proximamente a Domicilio!</h3>
								<p>Por este medio daremos a conocer este servicio.</p>
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
							<p>
								Contamos con diferentes variedades de hamburguesas y hot-dogs, 
								aquí te mostramos algunos de ellos.
							</p>
						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-lg-3 col-md-6 text-center">
						<div class="single-product-item">
							<div class="product-image">
								<img src="{{ asset('img/products/1719794059.jpg') }}" alt="">
							</div>
							<h3>NOMBRE</h3>
							<p class="product-price"><span>HAMBURGUESA</span> $70 </p>
							<a href="cart.html" class="cart-btn"><i class="fas fa-box"></i> Ver producto</a>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 text-center">
						<div class="single-product-item">
							<div class="product-image">
								<a href="single-product.html"><img src="{{ asset('img/products/product-img-2.jpg') }}" alt=""></a>
							</div>
							<h3>SUIZA</h3>
							<p class="product-price"><span>HAMBURGUESA</span> $55 </p>
							<a href="cart.html" class="cart-btn"><i class="fas fa-box"></i> Ver producto</a>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 text-center">
						<div class="single-product-item">
							<div class="product-image">
								<a href="single-product.html"><img src="{{ asset('img/products/product-img-3.jpg') }}" alt=""></a>
							</div>
							<h3>Sencillo</h3>
							<p class="product-price"><span>HOT-DOG</span> $35 </p>
							<a href="cart.html" class="cart-btn"><i class="fas fa-box"></i> Ver producto</a>
						</div>
					</div>
					<div class="col-lg-3 col-md-6 text-center">
						<div class="single-product-item">
							<div class="product-image">
								<a href="single-product.html"><img src="{{ asset('img/products/product-img-3.jpg') }}" alt=""></a>
							</div>
							<h3>ESPECIAL</h3>
							<p class="product-price"><span>HOT-DOG</span> $35 </p>
							<a href="cart.html" class="cart-btn"><i class="fas fa-box"></i> Ver producto</a>
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
						</div>
					</div>
					<div class="col-lg-6 col-md-12">
						<div class="abt-text">
							<p class="top-sub">Desde el año 2006</p>
							<h2>Somos <span class="orange-text">Super Star</span></h2>
							<p style="text-align: justify">
								Desde el año 2006 que estamos ofreciendo nuestros servicios de hamburguesas y hot dogs a todos nuestro clientes,
								ofreciendo productos de calidad y con la higiene que se corresponde.

							</p>
							<p style="text-align: justify">
								A lo largo del trayecto, tambien hemos ofrecido nuevos productos como lo son las Tortas de la Barda y
								hasta Orden de Flautas; sin embargo por motivos de espacio, ya no pudimos seguirle ofreciendo estos productos.
								De ante mano queremos agradecerles a todos nuestros clientes su apoyo y su preferencia.
							</p>
							@auth
								<a href="" class="boxed-btn mt-4">Vamos a comprar</a>
							@endauth
							@guest
								<a href="{{ url('/login') }}" class="boxed-btn mt-4">Iniciemos Sesion</a>
							@endguest
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- end advertisement section -->
@endsection