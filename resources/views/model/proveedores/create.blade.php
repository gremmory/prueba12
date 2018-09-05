@extends('layouts.admin')
@section('contenido')

	<div class="row">
		<div class="col-lg-6 col-md-sm-6 col-xs-12">
			<H3>Nuevo Proveedor</H3>

			@if (count ($errors) > 0)
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif


            {!! Form::open(array('url'=> '/model/proveedores/store',  'method'=>'POST', 'autocomplete'=>'off')) !!}
            {{ Form::token() }}
            <div class="form-group">
                <label for="Nombre_Pro">Nombre Proveedor</label>
                <input type="text" name="Nombre_Pro" class="form-control" placeholder="Nombre Proveedor ..." value="{{old('Nombre_Pro')}}"  >
            </div>
            <div class="form-group">
                <label for="Direccion_Prov">Direccion Proveedor</label>
                <input type="text" name="Direccion_Prov" class="form-control" placeholder="Direccion Proveedor ..." value="{{old('Direccion_Prov')}}"  >
            </div>
            <div class="form-group">
                <label for="Tel_Prov">Telefono Proveedor</label>
                <input type="text" name="Tel_Prov" class="form-control" placeholder="Telefono Proveedor ..." value="{{old('Tel_Prov')}}">
            </div>
            <div class="form-group">
                <label for="Nomcontacto1">Nombre Contacto 1</label>
                <input type="text" name="Nomcontacto1" class="form-control" placeholder="Nomcontacto1 ..." value="{{old('Nomcontacto1')}}" >
            </div>
            <div class="form-group">
                <label for="Nomcontacto1">Nombre Contacto 2</label>
                <input type="text" name="Nomcontacto2" class="form-control" placeholder="Nomcontacto 2 ..." value="{{old('Nomcontacto2')}}">
            </div>
            <div class="form-group">
                <label for="e_mail">E-mail</label>
                <input type="email" name="e_mail" class="form-control" placeholder="E-mail ..." value="{{old('e_mail')}}">
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Guardar</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
            {!! Form::close() !!}

			
		</div>
	</div>

@endsection

