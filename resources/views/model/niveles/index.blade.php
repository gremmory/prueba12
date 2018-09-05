@extends('layouts.admin')
@section('contenido')
	
	<div class="row">
		<div class= "col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<H3>Listado de Niveles <a href="niveles/create"><button class="btn btn-sucess">Nuevo</button></a></H3>

			@include('model.niveles.search')


		</div>
	</div>


	<div class="row">
		<div class= "col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th> ID </th>
						<th>Niveles</th>
						<th>Opcion</th>
					</thead>
					@foreach ($niveles as $an)
					<tr>
						<td>{{ $an->cod_nivel }}</td>
						<td>{{ $an->desc_nivel }}</td>
						<td>
							<a href="{{URL::action('NivelesController@edit', $an->cod_nivel)}}"><button class="btn btn-info"> Editar </button></a>
							<a href="" data-target="#modal-delete-{{$an->cod_nivel}}" data-toggle="modal"><button class="btn btn-danger"> Eliminar </button></a>
						</td>
					</tr>
					@include('model.niveles.modal')
					@endforeach
				</table>
			</div>
			{{$niveles->render()}}
		</div>
	</div>

@endsection
