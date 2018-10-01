@extends('layouts.admin')
@section('contenido')

	<div class="row">
		<div class="col-lg-6 col-md-sm-6 col-xs-12">
			<H3>Editar Usuario: {{ $usuarios->id_usuario}}</H3>

			@if (count ($errors) > 0)
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif 


            {!! Form::model ($usuarios, ['method'=>'PATCH', 'route' => array('usuarios.update', $usuarios->id_usuario)]) !!}
            {{ Form::token() }}
            <!--  Apellido  -->
            <div class="form-group">
                <label for="Apellidos" >{{ __('Apellidos') }}</label>
                <input id="Apellidos" type="text" class="form-control{{ $errors->has('Apellidos') ? ' is-invalid' : '' }}" name="Apellidos" value="{{$usuarios->Apellidos}}" required autofocus>

                @if ($errors->has('Apellidos'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('Apellidos') }}</strong>
                    </span>
                @endif
            </div>

            <!--  Nombre  -->
            <div class="form-group">
                <label for="Nombres" >{{ __('Nombres') }}</label>
                <input id="Nombres" type="text" class="form-control{{ $errors->has('Nombres') ? ' is-invalid' : '' }}" name="Nombres" value="{{$usuarios->Nombres}}" required autofocus>
                @if ($errors->has('Nombres'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('Nombres') }}</strong>
                    </span>
                @endif
            </div>

            <!--    Email   -->
            <div class="form-group">
                <label for="email" >{{ __('Dirección electronica') }}</label>
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{$usuarios->email}}" readonly="true">
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>

            <!--    Password    -->
            <div class="form-group">
                <label for="password" >{{ __('Password') }}</label>
                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label for="password-confirm" >{{ __('Confirm Password') }}</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
            </div>


            <div class="form-group">
                <label for="admin">Administrador</label>
                <select name="admin" class="form-control">
                    <option value="{{$usuarios->admin}}">{{$usuarios->admin == 0 ? 'No' : 'Si'}}</option>
                    <option value="0" > No </option> 
                    <option value="1" > Si </option> 
                </select>
            </div>
            <div class="form-group">
                <label for="permite_ver">Permitir Ver</label>
                <select name="permite_ver" class="form-control">
                    <option value="{{$usuarios->permite_ver}}">{{$usuarios->permite_ver == 0 ? 'No' : 'Si'}}</option>
                    <option value="0" > No </option> 
                    <option value="1" > Si </option> 
                </select>
            </div>
            <div class="form-group">
                <label for="permite_modif">Permite Modificar</label>
                <select name="permite_modif" class="form-control">
                    <option value="{{$usuarios->permite_modif}}">{{$usuarios->permite_modif == 0 ? 'No' : 'Si'}}</option>
                    <option value="0" > No </option> 
                    <option value="1" > Si </option> 
                </select>
            </div>
            <div class="form-group">
                <label for="permite_agregar">Permite Agregar</label>
                <select name="permite_agregar" class="form-control">
                    <option value="{{$usuarios->permite_agregar}}">{{$usuarios->permite_agregar == 0 ? 'No' : 'Si'}}</option>
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

