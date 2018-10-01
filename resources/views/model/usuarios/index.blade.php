@extends('layouts.admin')
@section('contenido')
	
	<div class="row">
		<div class= "col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<H3>Listado de Usuarios <a href="usuarios/create"><button class="btn btn-sucess">Nuevo</button></a></H3>

			@include('model.usuarios.search')


		</div>
	</div>


	<div class="row">
		<div class= "col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Apellidos</th>
						<th>Nombres</th>
						<th>Correo</th>
						<th>Administrador</th>
						<th>Ver</th>
						<th>Modificar</th>
						<th>Agregar</th>
						<th>Opcion</th>
					</thead>
					@foreach ($usuarios as $an)
					<tr>
						<td>{{ $an->Apellidos }}</td>
						<td>{{ $an->Nombres }}</td>
						<td>{{ $an->email }}</td>
						<td>{{ ($an->admin == 1) ? 'Si' : 'No' }}</td>
						<td>{{ ($an->permite_ver == 1) ? 'Si' : 'No' }}</td>
						<td>{{ ($an->permite_modif == 1) ? 'Si' : 'No' }}</td>
						<td>{{ ($an->permite_agregar == 1) ? 'Si' : 'No' }}</td>
						<td>
							<a href="{{ URL::action('UsuariosController@edit', $an->id_usuario) }}"><button class="btn btn-info"> Editar </button></a>
							<a href="" data-target="#modal-delete-{{$an->id_usuario}}" data-toggle="modal"><button class="btn btn-danger"> Eliminar </button></a>
						</td>
					</tr>
					@include('model.usuarios.modal')
					@endforeach
				</table>
			</div>
			{{$usuarios->render()}}
		</div>
	</div>

@endsection
