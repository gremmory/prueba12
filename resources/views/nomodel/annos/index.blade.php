@extends('layouts.admin')
@section('contenido')
	
	<div class="row">
		<div class= "col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<H3>Listado de Años <a href="annos/create"><button class="btn btn-sucess">Nuevo</button></a></H3>

			@include('nomodel.annos.search')


		</div>
	</div>


	<div class="row">
		<div class= "col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th> ID </th>
						<th>Año</th>
						<th>Opcion</th>
					</thead>
					@foreach ($annos as $an)
					<tr>
						<td>{{ $an->id_anno }}</td>
						<td>{{ $an->anno }}</td>
						<td>
							<a href="{{URL::action('AnnosController@edit', $an->id_anno)}}"><button class="btn btn-info"> Editar </button></a>
							<a href="" data-target="#modal-delete-{{$an->id_anno}}" data-toggle="modal"><button class="btn btn-danger"> Eliminar </button></a>
						</td>
					</tr>
					@include('nomodel.annos.modal')
					@endforeach
				</table>
			</div>
			{{$annos->render()}}
		</div>
	</div>

@endsection
