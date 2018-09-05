@extends('layouts.admin')
@section('contenido')
	
	<div class="row">
		<div class= "col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<H3>Listado de Detalle Equipos <a href="detalle_equipos/create"><button class="btn btn-sucess">Nuevo</button></a></H3>

			@include('model.detalle_equipos.search')


		</div>
	</div>


	<div class="row">
		<div class= "col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Codigo Establecimiento</th>
						<th>Establecimiento</th>
						<th>Equipo</th>
						<th>Tipo de Equipo</th>
						<th>Descripcion Equipo</th>
						<th>Marca</th>
						<th>Serie</th>
						<th>Cantidad</th>
						<th>Observaciones</th>
						<th>Fase</th>
						<th>Tipo</th>
						<th>Opcion</th>
					</thead>
					@foreach ($detalle_equipos as $an)
					<tr>
						<td>{{ $an->cod_establecimiento }}</td>
						<td>{{ $an->establecimientos($an->cod_establecimiento) }}</td>
						<td>{{ $an->cod_equipo }}</td>
						<td>{{ $an->dispositivos($an->tipo_equipo) }}</td>
						<td>{{ $an->desc_equipo	 }}</td>
						<td>{{ $an->marcas($an->id_marca) }}</td>
						<td>{{ $an->series }}</td>
						<td>{{ $an->cantidad }}</td>
						<td>{{ $an->Observaciones }}</td>
						<td>{{ $an->fases($an->Fases_Id_Fase) }}</td>
						<td>{{$an->tipo}}</td>
						<td>
							<a href="{{ URL::action('Detalle_EquiposController@edit', $an->id_detalle) }}"><button class="btn btn-info"> Editar </button></a>
							<a href="" data-target="#modal-delete-{{$an->id_detalle}}" data-toggle="modal"><button class="btn btn-danger"> Eliminar </button></a>
						</td>
					</tr>
					@include('model.detalle_equipos.modal')
					@endforeach
				</table>
			</div>
			{{$detalle_equipos->render()}}
		</div>
	</div>

@endsection
