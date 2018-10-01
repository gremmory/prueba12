@extends('layouts.admin')
@section('contenido')

	<div class="row">
		<div class="col-lg-6 col-md-sm-6 col-xs-12">
			<H3>Nuevo Usuario</H3>

			@if (count ($errors) > 0)
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif


            {!! Form::open(array('url'=> '/model/usuarios/store',  'method'=>'POST', 'autocomplete'=>'off')) !!}
            {{ Form::token() }}
            <form method="POST" action="{{ route('register') }}" aria-label="{{ __('Register') }}">

            <!--  Apellido  -->
            <div class="form-group">
                <label for="Apellidos" class="col-md-4 col-form-label text-md-right">{{ __('Apellidos') }}</label>
                <input id="Apellidos" type="text" class="form-control{{ $errors->has('Apellidos') ? ' is-invalid' : '' }}" name="Apellidos" value="{{ old('Apellidos') }}" required autofocus>

                @if ($errors->has('Apellidos'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('Apellidos') }}</strong>
                    </span>
                @endif
            </div>

            <!--  Nombre  -->
            <div class="form-group">
                <label for="Nombres" class="col-md-4 col-form-label text-md-right">{{ __('Nombres') }}</label>
                <input id="Nombres" type="text" class="form-control{{ $errors->has('Nombres') ? ' is-invalid' : '' }}" name="Nombres" value="{{ old('Nombres') }}" required autofocus>
                @if ($errors->has('Nombres'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('Nombres') }}</strong>
                    </span>
                @endif
            </div>

            <!--    Email   -->
            <div class="form-group">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Dirección electronica') }}</label>
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>

            <!--    Password    -->
            <div class="form-group">
                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>
                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
            </div>


            <div class="form-group">
                <label for="permite_ver">Permitir Ver</label>
                <select name="permite_ver" class="form-control">
                    <option value="0" > No </option> 
                    <option value="1" > Si </option> 
                </select>
            </div>
            <div class="form-group">
                <label for="permite_modif">Permite Modificar</label>
                <select name="permite_modif" class="form-control">
                    <option value="0" > No </option> 
                    <option value="1" > Si </option> 
                </select>
            </div>
            <div class="form-group">
                <label for="permite_agregar">Permite Agregar</label>
                <select name="permite_agregar" class="form-control">
                    <option value="0" > No </option> 
                    <option value="1" > Si </option> 
                </select>
            </div>
            <div class="form-group">
                <label for="admin">Administrador</label>
                <select name="admin" class="form-control">
                    <option value="0" > No </option> 
                    <option value="1" > Si </option> 
                </select>
            </div>

            <div class="form-group">
                <button class="btn btn-primary" type="submit">Guardar</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
            {!! Form::close() !!}

			
		</div>
	</div>

@endsection

