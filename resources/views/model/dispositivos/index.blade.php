@extends('layouts.admin')
@section('contenido')
	
	<div class="row">
		<div class= "col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<H3>Listado de Dispositivos <a href="dispositivos/create"><button class="btn btn-sucess">Nuevo</button></a></H3>

			@include('model.dispositivos.search')


		</div>
	</div>


	<div class="row">
		<div class= "col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th> ID </th>
						<th>Tipo</th>
						<th>Descripcion</th>
					</thead>
					@foreach ($dispositivos as $an)
					<tr>
						<td>{{ $an->tipo_equipo }}</td>
						<td>{{ $an->Desc_tipoequipo }}</td>
						<td>
							<a href="{{URL::action('DispositivosController@edit', $an->tipo_equipo)}}"><button class="btn btn-info"> Editar </button></a>
							<a href="" data-target="#modal-delete-{{$an->tipo_equipo}}" data-toggle="modal"><button class="btn btn-danger"> Eliminar </button></a>
						</td>
					</tr>
					@include('model.dispositivos.modal')
					@endforeach
				</table>
			</div>
			{{$dispositivos->render()}}
		</div>
	</div>

@endsection
