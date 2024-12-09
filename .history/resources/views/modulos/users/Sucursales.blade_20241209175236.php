@extends('welcome')

@section('contenido')

<div class="content-wrapper">

    <section class="content-header">

        <h1><i class="fa fa-building"></i> Gestor de Sucursales</h1>
        <br>

        <div class="row">

         <form method="post"">
           @csrf
           <div class="col-md-4">
            <input type="text" class="form-control" name="nombre" required placeholder="Nombre de la Sucur">
           </div>
        
        </form>

        </div>

    </section>

    <section class="content">

        <div class="box">

            <div class="box-body">



            </div>

        </div>

    </section>
</div>



@endsection