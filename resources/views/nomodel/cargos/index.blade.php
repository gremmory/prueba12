@extends('layouts.admin')
@section('contenido')
	
	<div class="row">
		<div class= "col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<H3>Listado de Cargos <a href="cargos/create"><button class="btn btn-sucess">Nuevo</button></a></H3>

			@include('nomodel.cargos.search')


		</div>
	</div>


	<div class="row">
		<div class= "col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th> ID </th>
						<th>Cargo</th>
						<th>Opcion</th>
					</thead>
					@foreach ($cargos as $an)
					<tr>
						<td>{{ $an->Id_Cargo }}</td>
						<td>{{ $an->Descripcion_Cargo }}</td>
						<td>
							<a href="{{URL::action('CargosController@edit', $an->Id_Cargo)}}"><button class="btn btn-info"> Editar </button></a>
							<a href="" data-target="#modal-delete-{{$an->Id_Cargo}}" data-toggle="modal"><button class="btn btn-danger"> Eliminar </button></a>
						</td>
					</tr>
					@include('nomodel.cargos.modal')
					@endforeach
				</table>
			</div>
			{{$cargos->render()}}
		</div>
	</div>

@endsection
