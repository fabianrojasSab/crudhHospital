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
        <div class="row justify-content-md-center p-4">
            <h3>ACTUALIZAR HOSPITALIZAION</h3>
            <div class="col-12 .col-md-4  col-xl-4 p-4">
                <form class="col align-self-center p-4" action="{{ route('gestionhospitalaria.update', $res[2]->id_hospitalizacion)}}" method="POST">
                    @csrf
                    @method("PUT")
                    <div class="form-group">
                        <label for="tipo_documento">Tipo documento</label>
                        <input type="text" class="form-control" name="tipo_documento" value="{{$res[2]->tipo_documento}}" >
                    </div>
                    <div class="form-group">
                        <label for="no_documento">No Documento</label>
                        <input type="text" class="form-control" name="no_doc_paciente" value="{{$res[2]->no_doc_paciente}}" >
                    </div>
                    <div class="form-group">
                        <label for="fec_ingreso">Fecha de ingreso</label>
                        <input type="date" class="form-control" name="fec_ingreso" value="{{$res[2]->fec_ingreso}}" >
                    </div>
                    <div class="form-group">
                        <label for="fec_salida">Fecha de salida</label>
                        <input type="date" class="form-control" name="fec_salida" value="{{$res[2]->fec_salida}}" >
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1" >Hospitales select</label>
                        <select class="form-control" name="cod_hospital">
                        <option>{{$res[1]->cod_hospital}}</option>
                        <option>{{$res[0]->cod_hospital}}</option>
                        </select>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Actualizar hospitalizacion</button>
                    
                </form>
            </div>


        </div>
        
        
        <!-- JavaScript Bundle with Popper -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    </body>
</html>
