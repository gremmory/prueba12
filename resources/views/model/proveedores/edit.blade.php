@extends('layouts.admin')
@section('contenido')

	<div class="row">
		<div class="col-lg-6 col-md-sm-6 col-xs-12">
			<H3>Editar Profesion: {{ $proveedores->Nombre_Pro}}</H3>

			@if (count ($errors) > 0)
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif 


            {!! Form::model ($proveedores, ['method'=>'PATCH', 'route' => array('proveedores.update', $proveedores->id_Proveedor)]) !!}
            {{ Form::token() }}
            <div class="form-group">
                <label for="Nombre_Pro">Nombre Proveedor</label>
                <input type="text" name="Nombre_Pro" class="form-control" value="{{$proveedores->Nombre_Pro}}" placeholder="Nombre Proveedor ...">
            </div>
            <div class="form-group">
                <label for="Direccion_Prov">Direccion Proveedor</label>
                <input type="text" name="Direccion_Prov" class="form-control" value="{{$proveedores->Direccion_Prov}}" placeholder="Direccion Proveedor ...">
            </div>
            <div class="form-group">
                <label for="Tel_Prov">Telefono Proveedor</label>
                <input type="text" name="Tel_Prov" class="form-control" value="{{$proveedores->Tel_Prov}}" placeholder="Telefono Proveedor ...">
            </div>
            <div class="form-group">
                <label for="Nomcontacto1">Nombre Contacto 1</label>
                <input type="text" name="Nomcontacto1" class="form-control" value="{{$proveedores->Nomcontacto1}}" placeholder="Nomcontacto1 ...">
            </div>
            <div class="form-group">
                <label for="Nomcontacto1">Nombre Contacto 2</label>
                <input type="text" name="Nomcontacto2" class="form-control" value="{{$proveedores->Nomcontacto2}}" placeholder="Nomcontacto 2 ...">
            </div>
            <div class="form-group">
                <label for="e_mail">E-mail</label>
                <input type="email" name="e_mail" class="form-control" value="{{$proveedores->e_mail}}" placeholder="E-mail ...">
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Guardar</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
            {!! Form::close() !!}			
		</div>
	</div>

@endsection

