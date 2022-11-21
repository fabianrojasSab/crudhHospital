<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CRUD</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    </head>
    <body class="antialiased">
        <div>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="/">CRUD</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="/">Registro de pacientes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/hospitales">Hospitales</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/gestionhospitalaria">Gestion hospitalaria</a>
                    </li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="container-fluid row p-4">
            <h3>Registro Hospitales</h3>
            <form class="col-12 col-xl-4 p-4" action="{{ route('hospitales.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="cod_hospital">Cod Hospital</label>
                    <input type="text" class="form-control" name="cod_hospital"  placeholder="Codigo hospital" required>
                </div>
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text" class="form-control" name="nombre"  placeholder="Ingrese nombre" required>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Agregar hospital</button>
            </form>

            <div class="table-responsive col-12 col-xl-8 p-4"">
                <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">Cod Hospital</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Editar</th>
                        <th scope="col">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datos as $item)
                        <tr>
                            <th scope="row">{{$item->cod_hospital}}</th>
                            <td>{{$item->nombre}}</td>
                            <td>
                                <form action="{{ route('hospitales.edit', $item->cod_hospital)}}" method="GET">
                                    <button  class="btn btn-warning">
                                        <span class="fas fa-user-edit">Editar</span>
                                    </button>
                                </form>
                            </td>
                            <td>
                                <form action="{{ route('hospitales.show', $item->cod_hospital)}}" method="GET">
                                    @csrf
                                    <button  class="btn btn-danger">
                                        <span class="fas fa-user-edit">Eliminar</span>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach  
                    </tbody>
            </table>
            </div>
        </div>
        
        
        <!-- JavaScript Bundle with Popper -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    </body>
</html>