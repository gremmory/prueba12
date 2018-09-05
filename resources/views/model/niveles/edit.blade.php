@extends('layouts.admin')
@section('contenido')

	<div class="row">
		<div class="col-lg-6 col-md-sm-6 col-xs-12">
			<H3>Editar Nivel: {{ $niveles->desc_nivel}}</H3>

			@if (count ($errors) > 0)
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif 


            {!! Form::model ($niveles, ['method'=>'PATCH', 'route' => array('niveles.update', $niveles->cod_nivel )]) !!}
            {{ Form::token() }}
            <div class="form-group">
                <label for="desc_nivel">Nivel Descripcion</label>
                <input type="text" name="desc_nivel" class="form-control" value="{{$niveles->desc_nivel}}" placeholder="Nivel ...">
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Guardar</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
            {!! Form::close() !!}
		</div>
	</div>

@endsection

