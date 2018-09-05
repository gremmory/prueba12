<div class="modal fade modal-slide-in-right" aria-hidden="true" role="dialog" tabindex="-1" id="modal-delete-{{$an->Id_Cargo}}">
	{{Form::open (array('action'=>array('CargosController@destroy', $an->Id_Cargo), 'method'=>'delete'))}}
<!--<form name="hola" method="post" action="/nomodel/cargos/delete/{{$an->Id_Cargo}}" >-->
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="close">
					<span aria-hidden="true">X</span>
				</button>
				<h4 class="modal-title">Eliminar Cargo</h4>
			</div>
			<div class="modal-body">
				<p>Confirmar para Eliminar...</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
				<!--<button type="submit" class="btn btn-primary" data-dismiss="modal">Confirmar</button>-->
				{{ Form::submit('Confirmar', array('class' => 'btn btn-warning')) }}
			</div>
		</div>
	</div>
	{{Form::close()}}
</div>