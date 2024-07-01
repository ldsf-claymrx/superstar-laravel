@extends('admin.masterdashboard')

@section('title')
    <!-- Custom styles for this page -->
    <link href="{{ url('vendor/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
    <title>Admin | Productos</title>
@endsection

@section('PageContent')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h4 mb-2 text-gray-800"><b>Mis Productos</b></h1>
        <p class="mb-4" style="text-align: justify">
            Crea, edita o elimina tus productos, para que tus clientes lo puedan visualizar
            en la pagina web y hacer su pedidos.
        </p>

        @if(session('success'))
            <script>
                Swal.fire({
                    icon: "success",
                    title: `{{ session('success') }}`
                });
            </script>
        @endif

        @if(session('error'))
            <script>
                Swal.fire({
                    icon: "error",
                    title: "Error",
                    text: `{{ session('error') }}`,
                    footer: '<a href="#">Contactar a soporte</a>'
                });
            </script>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Productos</h6><br><br>
                <a href="" class="btn btn-primary btn-icon-split" type="button" data-toggle="modal" data-target="#crearproducto">
                    <span class="icon text-white-50">
                        <i class="fas fa-check"></i>
                    </span>
                    <span class="text">Crear nuevo producto</span>
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Categoria</th>
                                <th>Nombre(s)</th>
                                <th>Descripción</th>
                                <th>Precio</th>
                                <th>Imagen</th>
                                <th>Registrado Por:</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Categoria</th>
                                <th>Nombre(s)</th>
                                <th>Descripción</th>
                                <th>Precio</th>
                                <th>Imagen</th>
                                <th>Registrado Por:</th>
                                <th>Acciones</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->category_name }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->description }}</td>
                                <td>{{ $product->price }}</td>
                                <td style="text-align: center">
                                    <img src="{{ asset('img/products/'.$product->name_img) }}" style="width: 40px">
                                </td>
                                <td>{{ $product->who_registered }}</td>
                                <td style="text-align: center">
                                    <div class="btn-group" role="group">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#edit{{$product->id}}"><i class="fas fa-fw fa-pen"></i></button>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#delete{{$product->id}}"><i class="fas fa-fw fa-trash"></i></button>
                                    </div>
                                </td>

                                <div class="modal fade" id="edit{{ $product->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                                                <div class="card shadow mb-4">
                                                    <!-- Card Header - Dropdown -->
                                                    <div class="card-header py-3">
                                                        <h6 class="m-0 font-weight-bold text-primary">Editar un producto</h6>
                                                    </div>
                                                    <!-- Card Body -->
                                                    <div class="card-body">
                                                        @csrf
                                                        @method('PUT')                                                        
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-xl-6">
                                                                    <div class="form-group">
                                                                        <label for="name">Nombre del producto:</label>
                                                                        <input type="text" class="form-control form-control-user" id="name" name="name" value="{{ $product->name }}">
                                                                    </div>
                                                                </div>
                                                                
                                                                <div class="col-xl-6">
                                                                    <div class="form-group">
                                                                        <label for="">Precio:</label>
                                                                        <input type="number" class="form-control form-control-user" id="price" name="price" step=".01" value="{{ $product->price }}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-xl-2">
                                                                    <img src="{{ asset('img/products/'.$product->name_img) }}" width="50px">
                                                                </div>
                                                                <div class="col-xl-10">
                                                                    <div class="custom-file">
                                                                        <input type="file" class="custom-file-input" name="name_img" id="name_img" aria-describedby="inputGroupFileAddon01">
                                                                        <label class="custom-file-label" for="name_img">--Seleccione la imagen del producto--</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
            
                                                        <div class="form-group">
                                                            <label for="id_category">Categoria</label>
                                                            <select name="id_category" id="id_category" class="form-control form-control-user">
                                                                <option value="" selected disabled>--Seleccione la categoria--</option>
                                                                @foreach ($categories as $category)
                                                                    <option value="{{ $category->id }}" {{ ($product->id_category == $category->id  ? 'selected' : '') }}>{{ $category->name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
            
                                                        <div class="form-group">
                                                            <label for="description">Descripción</label>
                                                            <textarea class="form-control" name="description" id="description" rows="3">{{ $product->description }}</textarea>
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                    <input type="submit" class="btn btn-primary" value="Editar">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <div class="modal fade" id="delete{{ $product->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <form action="{{ route('product.delete', $product->id) }}" method="POST" enctype="multipart/form-data">
                                                <div class="card shadow mb-4">
                                                    <!-- Card Header - Dropdown -->
                                                    <div class="card-header py-3">
                                                        <h6 class="m-0 font-weight-bold text-primary">¡Advertencia!</h6>
                                                    </div>
                                                    <!-- Card Body -->
                                                    <div class="card-body">
                                                        @csrf
                                                        @method('DELETE')
                                                        <label for="">¿Estás seguro de eliminar <b>{{ $product->name }}</b> de tu lista de productos?</label>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                    <input type="submit" class="btn btn-primary" value="Eliminar">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>


                    <div class="modal fade" id="crearproducto" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <div class="card shadow mb-4">
                                        <!-- Card Header - Dropdown -->
                                        <div class="card-header py-3">
                                            <h6 class="m-0 font-weight-bold text-primary">Registrar un producto</h6>
                                        </div>
                                        <!-- Card Body -->
                                        <div class="card-body">
                                            @csrf
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-xl-6">
                                                        <div class="form-group">
                                                            <label for="name">Nombre del producto:</label>
                                                            <input type="text" class="form-control form-control-user" id="name" name="name" placeholder="--Nombre del producto--">
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-xl-6">
                                                        <div class="form-group">
                                                            <label for="">Precio:</label>
                                                            <input type="number" class="form-control form-control-user" id="price" name="price" step=".01" placeholder="--10.00--">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="name_img" id="name_img" aria-describedby="inputGroupFileAddon01">
                                                    <label class="custom-file-label" for="name_img">--Seleccione la imagen del producto--</label>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="id_category">Categoria</label>
                                                <select name="id_category" id="id_category" class="form-control form-control-user">
                                                    <option value="" selected disabled>--Seleccione la categoria--</option>
                                                    @foreach ($categories as $category)
                                                        <option value="{{ $category->id }}">{{ $category->name}}</option>    
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label for="description">Descripción</label>
                                                <textarea class="form-control" name="description" id="description" rows="3" placeholder="--Ingresa la descripción del producto--"></textarea>
                                            </div>

                                            <input type="hidden" name="who_registered" value="{{ Auth::user()->id }}">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                        <input type="submit" class="btn btn-primary" value="Registrar">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection

@section('scripts-personales')
    <!-- Page level plugins -->
    <script src="{{ url('vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ url('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ url('js/demo/datatables-demo.js') }}"></script>
@endsection