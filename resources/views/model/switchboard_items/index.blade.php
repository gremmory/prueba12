@extends('layouts.admin')
@section('contenido')
	
	<div class="row">
		<div class= "col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<H3>Listado de Switchboard Items <a href="switchboard_items/create"><button class="btn btn-sucess">Nuevo</button></a></H3>

			@include('model.switchboard_items.search')


		</div>
	</div>


	<div class="row">
		<div class= "col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>SwitchboardID</th>
						<th>ItemNumber</th>
						<th>ItemText</th>
						<th>Command</th>
						<th>Argument</th>
						<th>Opcion</th>
					</thead>
					@foreach ($switchboard_items as $an)
					<tr>
						<td>{{ $an->SwitchboardID }}</td>
						<td>{{ $an->ItemNumber }}</td>
						<td>{{ $an->ItemText }}</td>
						<td>{{ $an->Command }}</td>
						<td>{{ $an->Argument }}</td>
						<td>
							<a href="{{URL::action('Switchboard_ItemsController@edit', array('id'=>$an->id_Switchboard_Items))}}"><button class="btn btn-info"> Editar </button></a>
							<a href="" data-target="#modal-delete-{{(String)$an->SwitchboardID . (String)$an->ItemNumber}}" data-toggle="modal"><button class="btn btn-danger"> Eliminar </button></a>
						</td>
					</tr>
					@include('model.switchboard_items.modal')
					@endforeach
				</table>
			</div>
			{{$switchboard_items->render()}}
		</div>
	</div>

@endsection
