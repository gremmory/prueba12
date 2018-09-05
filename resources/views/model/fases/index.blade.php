@extends('layouts.admin')
@section('contenido')
	
	<div class="row">
		<div class= "col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<H3>Listado de Fases <a href="fases/create"><button class="btn btn-sucess">Nuevo</button></a></H3>

			@include('model.fases.search')


		</div>
	</div>


	<div class="row">
		<div class= "col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Nombre Fase</th>
						<th>Descripcion</th>
						<th>Fecha Inicio</th>
						<th>Cooperador</th>
						<th>Proveedor</th>
						<th>Opcion</th>
					</thead>
					@foreach ($fases as $an)
					<tr>
						<td>{{ $an->Nombre }}</td>
						<td>{{ $an->Descripcion }}</td>
						<td>{{ $an->Fecha_Inicio }}</td>
						<td>{{ $an->Cooperador }}</td>
						@if($an->Proveedores($an->Id_Proveedor))
						<td>{{ $an->Proveedores($an->Id_Proveedor) }}</td>
						@else
						<td> --- </td>
						@endif
						<td>
							<a href="{{ URL::action('FasesController@edit', $an->Id_Fase) }}"><button class="btn btn-info"> Editar </button></a>
							<a href="" data-target="#modal-delete-{{$an->Id_Fase}}" data-toggle="modal"><button class="btn btn-danger"> Eliminar </button></a>
						</td>
					</tr>
					@include('model.fases.modal')
					@endforeach
				</table>
			</div>
			{{$fases->render()}}
		</div>
	</div>

@endsection
