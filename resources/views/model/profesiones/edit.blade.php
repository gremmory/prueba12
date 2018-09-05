@extends('layouts.admin')
@section('contenido')

	<div class="row">
		<div class="col-lg-6 col-md-sm-6 col-xs-12">
			<H3>Editar Profesion: {{ $profesiones->profesion}}</H3>

			@if (count ($errors) > 0)
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif 


            {!! Form::model ($profesiones, ['method'=>'PATCH', 'route' => array('profesiones.update', $profesiones->id_prefesion)]) !!}
            {{ Form::token() }}
            <div class="form-group">
                <label for="profesion"></label>
                <input type="text" name="profesion" class="form-control" value="{{$profesiones->profesion}}" placeholder="Profesion ...">
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Guardar {{sprintf("%'.02d\n", $profesiones->id_prefesion)}}</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
            {!! Form::close() !!}

			
		</div>
	</div>

@endsection

