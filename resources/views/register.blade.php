<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="author" content="Super Star">

        <title>SuperStar | Registrarse</title>

        <!-- Custom fonts for this template-->
        <link rel="shortcut icon" type="image/png" href="{{ asset('img/favicon.png') }}">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
        <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    </head>

    <body class="bg-gradient-primary">
        @if(session('error'))
            <script>
                Swal.fire({
                    icon: "error",
                    title: `{{ session('error') }}`
                });
            </script>
        @endif
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10 col-lg-12 col-md-9">
                    <div class="card o-hidden border-0 shadow-lg my-5">
                        <div class="card-header text-center">
                            <img src="{{ asset('img/favicon.png') }}" style="width: 50px" alt="">
                        </div>
                        <div class="card-body p-0">
                            <!-- Nested Row within Card Body -->
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Registrate</h1>
                                </div>

                                <form action="{{ url('/registro') }}" method="post">
                                    @csrf

                                    <p>Los campos con asteriscos *, son obligatorios</p>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <label for="name">Nombre(s): *</label>
                                                    <input type="text" class="form-control form-control-user" id="name" name="name" placeholder="--Nombre(s) completo--" autocomplete="on" required>
                                                </div>
                                            </div>
                                            <div class="col-xl-6">
                                                <div class="form-group">
                                                    <label for="lastname">Apellidos: *</label>
                                                    <input type="text" class="form-control form-control-user" id="lastname" name="lastname" placeholder="--Apellidos completos--" autocomplete="on" required>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Correo Electronico: *</label>
                                        <input type="email" class="form-control" name="email" id="email" placeholder="--Ingrese su correo--" autocomplete="on" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Contraseña: *</label>
                                        <input type="password" class="form-control" name="password" id="password" placeholder="--Ingrese la contraseña--" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="address">Dirección:</label>
                                        <input type="text" class="form-control form-control-user" id="address" name="address" placeholder="--Domicilio(opcional)--" autocomplete="on">
                                    </div>
                                    <div class="form-group">
                                        <label for="phone_number">Telefono:</label>
                                        <input type="number" class="form-control form-control-user" id="phone_number" name="phone_number" placeholder="--Numero telefonico--" autocomplete="on">
                                    </div>

                                    <input type="submit" class="btn btn-warning btn-block" value="Registrarse">
                                </form>
                                <div class="text-center pt-4">
                                    <hr>
                                    <a href="{{ url('/') }}">¡Ya tienes cuenta!, Inicia Sesión</a>
                                    <footer class="sticky-footer bg-white">
                                        <div class="container my-auto">
                                            <div class="copyright text-center my-auto">
                                                <span>Todos los derechos SUPERSTAR&reg;</span><br>
                                                <span>Created by <a href="https://www.instagram.com/davidclaymrx/" target="_blank" rel="davidclaymrx">DavidClayMRX</a></span>
                                            </div>
                                        </div>
                                    </footer>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>