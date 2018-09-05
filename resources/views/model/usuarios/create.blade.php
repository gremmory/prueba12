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
            <div class="form-group">
                <label for="Apellidos">Apellidos</label>
                <input type="text" name="Apellidos" class="form-control" placeholder="Apellidos ...">
            </div>
            <div class="form-group">
                <label for="Nombres">Nombres</label>
                <input type="text" name="Nombres" class="form-control" placeholder="Nombres ...">
            </div>
            <div class="form-group">
                <label for="CorreoE">Email</label>
                <input type="email" name="CorreoE" class="form-control" placeholder="Correo ...">
            </div>
            <div class="form-group">
                <label for="Nomusuario">Usuario</label>
                <input type="text" name="Nomusuario" class="form-control" placeholder="Usuario ...">
            </div>
            <div class="form-group">
                <label for="contrasena">Contrasena</label>
                <input type="password" name="contrasena" class="form-control" placeholder="contrasena ...">
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
                <button class="btn btn-primary" type="submit">Guardar</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
            {!! Form::close() !!}

			
		</div>
	</div>

@endsection

