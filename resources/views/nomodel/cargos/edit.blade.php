@extends('layouts.admin')
@section('contenido')

	<div class="row">
		<div class="col-lg-6 col-md-sm-6 col-xs-12">
			<H3>Editar Cargo: {{ $cargos->Descripcion_Cargo}}</H3>

			@if (count ($errors) > 0)
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif 


            {!! Form::model ($cargos, ['method'=>'PATCH', 'route' => array('cargos.update', $cargos->Id_Cargo)]) !!}
            {{ Form::token() }}
            <div class="form-group">
                <label for="Descripcion_Cargo"></label>
                <input type="text" name="Descripcion_Cargo" class="form-control" value="{{$cargos->Descripcion_Cargo}}" placeholder="Año ...">
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Guardar</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
            {!! Form::close() !!}

			
		</div>
	</div>

@endsection

