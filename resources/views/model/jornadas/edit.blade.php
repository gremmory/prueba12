@extends('layouts.admin')
@section('contenido')

	<div class="row">
		<div class="col-lg-6 col-md-sm-6 col-xs-12">
			<H3>Editar Jornada: {{ $jornadas->desc_nivel}}</H3>

			@if (count ($errors) > 0)
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif 


            {!! Form::model ($jornadas, ['method'=>'PATCH', 'route' => array('jornadas.update', $jornadas->id_jornada )]) !!}
            {{ Form::token() }}
            <div class="form-group">
                <label for="Desc_jornada">Jornada Descripcion</label>
                <input type="text" name="Desc_jornada" class="form-control" value="{{$jornadas->Desc_jornada}}" placeholder="Nivel ...">
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Guardar</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
            {!! Form::close() !!}
		</div>
	</div>

@endsection

