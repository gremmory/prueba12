@extends('layouts.admin')
@section('contenido')
	
	<div class="row">
		<div class= "col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<H3>Listado de Marcas <a href="marcas/create"><button class="btn btn-sucess">Nuevo</button></a></H3>

			@include('model.marcas.search')


		</div>
	</div>


	<div class="row">
		<div class= "col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th> ID </th>
						<th>Marca</th>
						<th>Opcion</th>
					</thead>
					@foreach ($marcas as $an)
					<tr>
						<td>{{ $an->Id_Marca }}</td>
						<td>{{ $an->Desc_Marca }}</td>
						<td>
							<a href="{{URL::action('MarcasController@edit', $an->Id_Marca)}}"><button class="btn btn-info"> Editar </button></a>
							<a href="" data-target="#modal-delete-{{$an->Id_Marca}}" data-toggle="modal"><button class="btn btn-danger"> Eliminar </button></a>
						</td>
					</tr>
					@include('model.marcas.modal')
					@endforeach
				</table>
			</div>
			{{$marcas->render()}}
		</div>
	</div>

@endsection
