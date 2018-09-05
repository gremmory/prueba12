@extends('layouts.admin')
@section('contenido')

	<div class="row">
		<div class="col-lg-6 col-md-sm-6 col-xs-12">
			<H3>Nueva Switchboard Items</H3>

			@if (count ($errors) > 0)
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif


            {!! Form::open(array('url'=> '/model/switchboard_items/store',  'method'=>'POST', 'autocomplete'=>'off')) !!}
            {{ Form::token() }}
            <div class="form-group">
                <label for="SwitchboardID">Switchboard ID</label>
                <input type="number" name="SwitchboardID" class="form-control" placeholder="Switchboard ID ..." value=" {{old('SwitchboardID')}} ">
            </div>
            <div class="form-group">
                <label for="ItemNumber">Item Number</label>
                <input type="number" name="ItemNumber" class="form-control" placeholder="Item Number ..." value=" {{old('ItemNumber')}} ">
            </div>
            <div class="form-group">
                <label for="ItemText">Item Text</label>
                <input type="text" name="ItemText" class="form-control" placeholder="Item Text ..." value=" {{old('ItemText')}} ">
            </div>
            <div class="form-group">
                <label for="Command">Command</label>
                <input type="number" name="Command" class="form-control" placeholder="Command ..." value=" {{old('Command')}} ">
            </div>
            <div class="form-group">
                <label for="Argument">Argument</label>
                <input type="text" name="Argument" class="form-control" placeholder="Argument ..." value=" {{old('Argument')}} ">
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Guardar</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
            {!! Form::close() !!}

			
		</div>
	</div>

@endsection

