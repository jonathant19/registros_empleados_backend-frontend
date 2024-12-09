@extends('welcome')

@section('ingresar')

<div class="login-box">
  <div class="login-logo">
    <a href=".#"><b>Administrador</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Igresar al Sistema</p>

    <form  action="{{ route('login') }}" method="post">
    @csrf

      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Email" name="email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>

      @error('email')

         <div class= "alert alert-danger">Error con el Email o Contraseña.</div>

      @enderror

      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>

      <div class="row">
       
        <!-- /.col -->
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Ingresar</button>
        </div>
        <!-- /.col -->
      </div>

    </form>


  </div>
  <!-- /.login-box-body -->
</div>

@endsection