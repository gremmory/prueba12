@extends('layouts.admin')
@section('contenido')
	
	<div class="row">
		<div class= "col-lg-8 col-md-8 col-sm-8 col-xs-12">

			<H3>Listado de Establecimientos @if (Auth::user()->admin == 1 || Auth::user()->permite_agregar == 1) <a href="establecimientos/create"><button class="btn btn-sucess">Nuevo</button></a> @endif</H3>

			@include('model.establecimientos.search')


		</div>
	</div>


	<div class="row">
		<div class= "col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Codigo Establecimiento</th>
						<th>Cod. Depto</th>
						<th>Cod. Municipio</th>
						<th>Establecimiento</th>
						<th>Nivel</th>
						<th>Dirección</th>
						<th>Telefono</th>
						<th>Correo</th>
						<th>Modalidad</th>
						<th>Sector</th>
						<th>Area</th>
						<th>Jornada</th>
						<th>Director</th>
						<th>Alumnos</th>
						<th>Alumnas</th>
						<th>Total</th>
						<th>Maestros</th>
						<th>Multigrado</th>
						<th>OPF</th>

						<th>Cuenta Carta</th>
						<th>Latitud</th>
						<th>Longitud</th>
						<th>Certificación</th>
						<th>Acta Anuencia</th>
						<th>Electricidad</th>
						<th>Seguridad</th>
						<th>Estatus</th>
						<th>Observacionens</th>
						<th>Opcion</th>
					</thead>
					@foreach ($establecimientos as $an)
					<tr>
						<td>{{ $an->cod_establecimiento }}</td>
						<td>{{ $an->departamentos($an->cod_depto) }}</td>
						<td>{{ $an->municipios($an->cod_mupio) }}</td>
						<td>{{ $an->ESTABLECIMIENTO }}</td>
						<td>{{ $an->niveles($an->cod_nivel) }}</td>
						<td>{{ $an->DIRECCION }}</td>
						<td>{{ $an->TELEFONO }}</td>
						<td>{{ $an->correo }}</td>
						<td>{{ $an->modalidad }}</td>
						<td>{{ $an->SECTOR }}</td>
						<td>{{ $an->AREA }}</td>
						<td>{{ $an->JORNADA }}</td>
						<td>{{ $an->DIRECTOR }}</td>
						<td>{{ $an->ALUMNOS }}</td>
						<td>{{ $an->ALUMNAS }}</td>
						<td>{{ $an->TOTAL }}</td>
						<td>{{ $an->MAESTROS }}</td>
						<td>{{ $an->MULTIGRADO == 0 ? 'No' : 'Si' }}</td>
						<td>{{ $an->opf }}</td>
						<td>{{ $an->cuenta_carta == 0 ? 'No' : 'Si' }}</td>
						<td>{{ $an->latitud }}</td>
						<td>{{ $an->longitud }}</td>
						<td>{{ $an->certificacion == 0 ? 'No' : 'Si' }}</td>
						<td>{{ $an->acta_anuencia == 0 ? 'No' : 'Si' }}</td>
						<td>{{ $an->electricidad == 0 ? 'No' : 'Si' }}</td>
						<td>{{ $an->seguridad == 0 ? 'No' : 'Si' }}</td>
						<td>{{ $an->status}}</td>
						<td>{{ $an->observaciones }}</td>
						<td>
							@if (Auth::user()->admin == 1 || Auth::user()->permite_modif == 1)
							<a href="{{ URL::action('EstablecimientosController@edit', $an->cod_establecimiento) }}"><button class="btn btn-info"> Editar </button></a>
							<a href="" data-target="#modal-delete-{{$an->cod_establecimiento}}" data-toggle="modal"><button class="btn btn-danger"> Eliminar </button></a>
							@endif
							<a href="{{ URL::action('FotosController@getFotos', $an->cod_establecimiento) }}"><button class="btn btn-secondary">Fotos</button></a>
						</td>
					</tr>
					@include('model.establecimientos.modal')
					@endforeach
				</table>
			</div>
			{{$establecimientos->render()}}
		</div>
	</div>

@endsection
