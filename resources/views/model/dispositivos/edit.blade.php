@extends('layouts.admin')
@section('contenido')

	<div class="row">
		<div class="col-lg-6 col-md-sm-6 col-xs-12">
			<H3>Editar Profesion: {{ $dispositivos->Desc_tipoequipo}}</H3>

			@if (count ($errors) > 0)
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif 


            {!! Form::model ($dispositivos, ['method'=>'PATCH', 'route' => array('dispositivos.update', $dispositivos->tipo_equipo)]) !!}
            {{ Form::token() }}
            <div class="form-group">
                <label for="Desc_tipoequipo"></label>
                <input type="text" name="Desc_tipoequipo" class="form-control" value="{{$dispositivos->Desc_tipoequipo}}" placeholder="Descripcion Tipo Equipo ...">
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Guardar</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
            {!! Form::close() !!}

			
		</div>
	</div>

@endsection

