@extends('layouts.admin')
@section('contenido')
	
	<div class="row">
		<div class= "col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<H3>Listado de Profesiones <a href="profesiones/create"><button class="btn btn-sucess">Nuevo</button></a></H3>

			@include('model.profesiones.search')


		</div>
	</div>


	<div class="row">
		<div class= "col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th> ID </th>
						<th>Profesion</th>
						<th>Opcion</th>
					</thead>
					@foreach ($profesiones as $an)
					<tr>
						<td>{{ $an->id_prefesion }}</td>
						<td>{{ $an->profesion }}</td>
						<td>
							<a href="{{URL::action('ProfesionesController@edit', $an->id_prefesion)}}"><button class="btn btn-info"> Editar </button></a>
							<a href="" data-target="#modal-delete-{{$an->id_prefesion}}" data-toggle="modal"><button class="btn btn-danger"> Eliminar </button></a>
						</td>
					</tr>
					@include('model.profesiones.modal')
					@endforeach
				</table>
			</div>
			{{$profesiones->render()}}
		</div>
	</div>

@endsection
