@extends('welcome')

@section('contenido')

<div class="content-wrapper">

    <section class="content-header">

        <h1><i class="fa fa-building"></i> Gestor de Sucursales</h1>
        <br>

        <div class="row">

            <form method="post"">
           @csrf

           <div class=" col-md-4">
                <input type="text" class="form-control" name="nombre" required placeholder="Nombre de la Sucursal">
        </div>

        <div class="col-md-4">
            <button type="submit" class="btn btn-primary">Agregar</button>

            </form>

        </div>

    </section>

    <section class="content">

        <div class="box">

            <div class="box-body">

                <table class="table table-bordered table-striped table-hover">

                    <thead>

                        <tr>
                            <th>Sucursal</th>
                        </tr>

                    </thead>

                    <tbody>

                        @foreach($sucursales as $sucursal

                        <tr>

                            <td>

                              <form>

                              
                              </form> 

                            </td>

                        </tr>



                        @endforeach
                    </tbody>

                </table>

            </div>

        </div>

    </section>
</div>



@endsection