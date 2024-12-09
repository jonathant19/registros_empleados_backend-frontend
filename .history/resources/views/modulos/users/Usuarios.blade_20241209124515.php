@extends('welcome')

@section('contenido')

<div class="content-wrapper">

    <section class="content-header">

        <h1><i class="fa fa-users"></i> Gestor de Usuarios</h1>

    </section>

    <section class="content">

        <div class="box">

            <div class="box-header">
                <button class="btn btn-primary" data-toggle="modal" data-target="#CrearUsuario">Crear Usuario</button>
            </div>

            <div class="box-body">

                <table class="table table-bordered table-striped table-hover">

                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Usuario</th>
                            <th>Email</th>
                            <th>Rol</th>

                            <th></th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach($users as $user)

                        <tr>

                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->rol }}</td>

                            <td>

                                <a href="{{ url('Editar-Usuario/'.$user->id) }}">
                                    <button class="btn btn-success"><i class="fa fa-edit"></i></button>
                                </a>

                                <a href="{{ url('Eliminar-Usuario/'.$user->id) }}">
                                    <button class="btn btn-danger"><i class="fa fa-trash"></i></button>
                                </a>

                            </td>

                        </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

        </div>

    </section>
</div>


<div id="CrearUsuario" class="modal fade">

    <div class="modal-dialog">

        <div class="modal-content">

            <form method="post" action="{{ url('Usuarios') }}">
                @csrf

                <div class="modal-body">

                    <div class="box-body">

                        <div class="form-group">

                            <h2>Nombre y Apellido</h2>
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}" required>

                        </div>

                        <div class="form-group">

                            <h2>Rol</h2>
                            <select name="rol" class="form-control" required>

                                <option value="">Seleccionar...</option>
                                <option value="Administrador">Administrador</option>
                                <option value="Encargado">Encargado</option>

                            </select>
                        </div>

                        <div class="form-group">

                            <h2>Email</h2>
                            <input type="text" class="form-control" name="email" value="{{ old('email') }}" required>

                            @error('email')

                            <p class="alert alert-danger">El Email ya Existe.</p>

                            @enderror

                        </div>

                        <div class="form-group">

                            <h2>Contraseña</h2>
                            <input type="text" class="form-control" name="password" value="" required>

                            @error('password')

                            <p class="alert alert-danger">La Contraseña debe tener al menos 3 caracteres.</p>

                            @enderror

                        </div>

                    </div>

                </div>

                <div class="modal-footer">

                    <button class="btn btn-primary" type="submit">Crear</button>
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Cancelar</button>

                </div>

            </form>

        </div>

    </div>

</div>

@php

$exp = explode('/', $_SERVER["REQUEST_URI"]);

@endphp

@if($exp[3] == 'Editar-Usuario')
<div id="EditarUsuario" class="modal fade">

    <div class="modal-dialog">

        <div class="modal-content">

            <form method="post" action="{{ url('Actualizar-Usuario/'.$usuario->id) }}">
                @csrf
                @method('put')

                <div class="modal-body">

                    <div class="box-body">

                        <div class="form-group">

                            <h2>Nombre y Apellido</h2>
                            <input type="text" class="form-control" name="name" value="{{ $usuario->name }}" required>

                        </div>

                        <div class="form-group">

                            <h2>Rol</h2>
                            <select name="rol" class="form-control" required>

                                <option value="">{{ $usuario->rol }}</option>

                                @if($usuario->rol != 'Administrador')
                                <option value="Administrador">Administrador</option>
                                @else
                                <option value="Encargado">Encargado</option>
                                @endif
                            </select>
                        </div>

                        <div class="form-group">

                            <h2>Email</h2>
                            <input type="text" class="form-control" name="email" value="{{ $usuario->email }}" required>

                            @error('email')

                            <p class="alert alert-danger">El Email ya Existe.</p>

                            @enderror

                        </div>

                        <div class="form-group">

                            <h2>Contraseña</h2>
                            <input type="text" class="form-control" name="password" value="" >

                            @error('password')

                            <p class="alert alert-danger">La Contraseña debe tener al menos 3 caracteres.</p>

                            @enderror

                        </div>

                    </div>

                </div>

                <div class="modal-footer">

                    <button class="btn btn-success" type="submit">Guardar Cambios</button>
                    <button class="btn btn-danger" type="button" data-dismiss="modal">Cancelar</button>

                </div>

            </form>

        </div>

    </div>


</div>

@endif

@endsection