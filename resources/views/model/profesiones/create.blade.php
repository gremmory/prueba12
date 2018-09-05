@extends('layouts.admin')
@section('contenido')

	<div class="row">
		<div class="col-lg-6 col-md-sm-6 col-xs-12">
			<H3>Nueva Profesion</H3>

			@if (count ($errors) > 0)
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif


            {!! Form::open(array('url'=> '/model/profesiones/store',  'method'=>'POST', 'autocomplete'=>'off')) !!}
            {{ Form::token() }}
            <div class="form-group">
                <label for="id_prefesion"></label>
                <input type="text" name="id_prefesion" class="form-control" placeholder="Id Profesion - Ejemplo: 00, 01, 02 ... 12, 13, ... XX  ..." value="{{old('id_prefesion')}}" >
            </div>
            <div class="form-group">
                <label for="profesion"></label>
                <input type="text" name="profesion" class="form-control" placeholder="Profesion ..." value="{{old('profesion')}}" >
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Guardar</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
            {!! Form::close() !!}

			
		</div>
	</div>

@endsection

