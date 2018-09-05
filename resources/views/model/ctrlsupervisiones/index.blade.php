@extends('layouts.admin')
@section('contenido')
	
	<div class="row">
		<div class= "col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<H3>Listado de Control de Supervision <a href="ctrlsupervisiones/create"><button class="btn btn-sucess">Nuevo</button></a></H3>

			@include('model.ctrlsupervisiones.search')


		</div>
	</div>


	<div class="row">
		<div class= "col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Cod Establecimiento</th>
						<th>Num. Supervision</th>
						<th>Nombre Supervisor</th>
						<th>Fecha Inicio</th>
						<th>Fecha Fin</th>
						<th>Actividades</th>
						<th>Observaciones</th>
						<th>Recomendaciones</th>
						<th>Opcion</th>
					</thead>
					@foreach ($ctrlsupervision as $an)
					<tr>
						<td>{{ $an->cod_establecimiento }}</td>
						<td>{{ $an->numsupervision }}</td>
						<td>{{ $an->nomsupervisor }}</td>
						<td>{{ $an->fecha_inicio }}</td>
						<td>{{ $an->fecha_fin }}</td>
						<td>{{ $an->actividades }}</td>
						<td>{{ $an->observaciones }}</td>
						<td>{{ $an->recomendaciones }}</td>
						<td>
							<a href="{{ URL::action('CtrlsupervisionesController@edit', $an->id_control) }}"><button class="btn btn-info"> Editar </button></a>
							<a href="" data-target="#modal-delete-{{$an->id_control}}" data-toggle="modal"><button class="btn btn-danger"> Eliminar </button></a>
						</td>
					</tr>
					@include('model.ctrlsupervisiones.modal')
					@endforeach
				</table>
			</div>
			{{$ctrlsupervision->render()}}
		</div>
	</div>

@endsection
