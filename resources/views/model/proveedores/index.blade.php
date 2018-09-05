@extends('layouts.admin')
@section('contenido')
	
	<div class="row">
		<div class= "col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<H3>Listado de Proveedores <a href="proveedores/create"><button class="btn btn-sucess">Nuevo</button></a></H3>

			@include('model.proveedores.search')


		</div>
	</div>


	<div class="row">
		<div class= "col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th> ID </th>
						<th>Nombre Proveedor</th>
						<th>Direccion</th>
						<th>Telefono</th>
						<th>Nombre Contacto 1</th>
						<th>Nombre Contacto 2</th>
						<th>Correo</th>
						<th>Opcion</th>
					</thead>
					@foreach ($proveedores as $an)
					<tr>
						<td>{{ $an->id_Proveedor }}</td>
						<td>{{ $an->Nombre_Pro }}</td>
						<td>{{ $an->Direccion_Prov }}</td>
						<td>{{ $an->Tel_Prov }}</td>
						<td>{{ $an->Nomcontacto1 }}</td>
						<td>{{ $an->Nomcontacto2 }}</td>
						<td>{{ $an->e_mail }}</td>
						<td>
							<a href="{{URL::action('ProveedoresController@edit', $an->id_Proveedor)}}"><button class="btn btn-info"> Editar </button></a>
							<a href="" data-target="#modal-delete-{{$an->id_Proveedor}}" data-toggle="modal"><button class="btn btn-danger"> Eliminar </button></a>
						</td>
					</tr>
					@include('model.proveedores.modal')
					@endforeach
				</table>
			</div>
			{{$proveedores->render()}}
		</div>
	</div>

@endsection
