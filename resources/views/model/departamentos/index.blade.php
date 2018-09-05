@extends('layouts.admin')
@section('contenido')
	
	<div class="row">
		<div class= "col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<H3>Listado de Departamentos <a href="departamentos/create"><button class="btn btn-sucess">Nuevo</button></a></H3>

			@include('model.departamentos.search')


		</div>
	</div>


	<div class="row">
		<div class= "col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th> ID </th>
						<th>Departamento</th>
						<th>Opcion</th>
					</thead>
					@foreach ($departamentos as $an)
					<tr>
						<td>{{ $an->cod_Depto }}</td>
						<td>{{ $an->Desc_Deptos }}</td>
						<td>
							<a href="{{URL::action('DepartamentosController@edit', $an->cod_Depto)}}"><button class="btn btn-info"> Editar </button></a>
							<a href="" data-target="#modal-delete-{{$an->cod_Depto}}" data-toggle="modal"><button class="btn btn-danger"> Eliminar </button></a>
						</td>
					</tr>
					@include('model.departamentos.modal')
					@endforeach
				</table>
			</div>
			{{$departamentos->render()}}
		</div>
	</div>

@endsection
