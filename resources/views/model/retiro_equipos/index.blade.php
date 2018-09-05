@extends('layouts.admin')
@section('contenido')
	
	<div class="row">
		<div class= "col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<H3>Listado de Establecimientos <a href="retiro_equipos/create"><button class="btn btn-sucess">Nuevo</button></a></H3>

			@include('model.establecimientos.search')


		</div>
	</div>


	<div class="row">
		<div class= "col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Codigo Establecimiento</th>
						<th>Fecha de Retiro</th>
						<th>Tipo Retiro</th>
						<th>Descripcion</th>
						<th>Cod. Nivel</th>
						<th>No Serie</th>
						<th>Nom. Retiro</th>
						<th>Nom. Entrega</th>
						<th>Fecha Entrega</th>
						<th>Opcion</th>
					</thead>
					@foreach ($retiro_equipos as $an)
					<tr>
						<td>{{ $an->Cod_establecimiento }}</td>
						<td>{{ $an->Fecha_Retiro }}</td>
						<td>{{ $an->tipo_equipo }}</td>
						<td>{{ $an->Descrip_Retiro }}</td>
						<td>{{ $an->No_Serie }}</td>
						<td>{{ $an->NomRetiro }}</td>
						<td>{{ $an->Nomentrega }}</td>
						<td>{{ $an->Fecha_Entrega }}</td>
						<td>
							<a href="{{ URL::action('Retiro_EquiposController@edit', $an->id_retiro_equipos) }}"><button class="btn btn-info"> Editar </button></a>
							<a href="" data-target="#modal-delete-{{$an->id_retiro_equipos}}" data-toggle="modal"><button class="btn btn-danger"> Eliminar </button></a>
						</td>
					</tr>
					@include('model.retiro_equipos.modal')
					@endforeach
				</table>
			</div>
			{{$retiro_equipos->render()}}
		</div>
	</div>

@endsection
