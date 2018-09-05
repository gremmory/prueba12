@extends('layouts.admin')
@section('contenido')

	<div class="row">
		<div class="col-lg-6 col-md-sm-6 col-xs-12">
			<H3>Editar Switchboard Items: {{ $switchboard_items->ItemText}}</H3>

			@if (count ($errors) > 0)
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif 


            
            {{Form::open (array('action'=>array('Switchboard_ItemsController@update', $switchboard_items->SwitchboardID, $switchboard_items->ItemNumber), 'method'=>'get'))}}
    
            {{ Form::token() }}

            <div class="form-group">
                <!--<label for="SwitchboardID">Switchboard ID</label>-->
                <input type="hidden" name="SwitchboardID" class="form-control" value="{{$switchboard_items->SwitchboardID}}" placeholder="Switchboard ID ...">
            </div>
            <div class="form-group">
            <!--  <label for="ItemNumber">Item Number</label> -->
                <input type="hidden" name="ItemNumber" class="form-control" value="{{$switchboard_items->ItemNumber}}" placeholder="Item Number ...">
            </div>     
            <div class="form-group">
                <label for="ItemText">Item Text</label>
                <input type="text" name="ItemText" class="form-control" value="{{$switchboard_items->ItemText}}" placeholder="Item Text ...">
            </div>
            <div class="form-group">
                <label for="Command">Command</label>
                <input type="number" name="Command" class="form-control" value="{{$switchboard_items->Command}}" placeholder="Command ...">
            </div>
            <div class="form-group">
                <label for="Argument">Argument</label>
                <input type="text" name="Argument" class="form-control" value="{{$switchboard_items->Argument}}" placeholder="Argument ...">
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Guardar</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
            {!! Form::close() !!}
		</div>
	</div>

@endsection

