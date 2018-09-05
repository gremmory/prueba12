@extends('layouts.admin')
@section('contenido')
	
	<div class="row">
		<div class= "col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<H3>Listado de Municipios <a href="municipios/create"><button class="btn btn-sucess">Nuevo</button></a></H3>

			@include('model.municipios.search')


		</div>
	</div>


	<div class="row">
		<div class= "col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Cod. Municipio</th>
						<th>Cod. Departamento</th>
						<th>Municipio</th>
						<th>Opcion</th>
					</thead>
					@foreach ($municipios as $an)
					<tr>
						<td>{{ $an->COD_MUPIO }}</td>
						<td>{{ $an->departamentos($an->COD_DEPTO) }}</td>
						<td>{{ $an->NOM_MUPIO }}</td>
						<td>
							<a href="{{ URL::action('MunicipiosController@edit', $an->COD_MUPIO) }}"><button class="btn btn-info"> Editar </button></a>
							<a href="" data-target="#modal-delete-{{$an->COD_MUPIO}}" data-toggle="modal"><button class="btn btn-danger"> Eliminar </button></a>
						</td>
					</tr>
					@include('model.municipios.modal')
					@endforeach
				</table>
			</div>
			{{$municipios->render()}}
		</div>
	</div>

@endsection
