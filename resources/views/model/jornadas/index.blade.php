@extends('layouts.admin')
@section('contenido')
	
	<div class="row">
		<div class= "col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<H3>Listado de Jornadas <a href="jornadas/create"><button class="btn btn-sucess">Nuevo</button></a></H3>

			@include('model.jornadas.search')


		</div>
	</div>


	<div class="row">
		<div class= "col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th> ID </th>
						<th> Jornadas </th>
						<th>Opcion</th>
					</thead>
					@foreach ($jornadas as $an)
					<tr>
						<td>{{ $an->id_jornada }}</td>
						<td>{{ $an->Desc_jornada }}</td>
						<td>
							<a href="{{URL::action('JornadasController@edit', $an->id_jornada)}}"><button class="btn btn-info"> Editar </button></a>
							<a href="" data-target="#modal-delete-{{$an->id_jornada}}" data-toggle="modal"><button class="btn btn-danger"> Eliminar </button></a>
						</td>
					</tr>
					@include('model.jornadas.modal')
					@endforeach
				</table>
			</div>
			{{$jornadas->render()}}
		</div>
	</div>

@endsection
