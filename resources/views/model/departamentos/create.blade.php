@extends('layouts.admin')
@section('contenido')

	<div class="row">
		<div class="col-lg-6 col-md-sm-6 col-xs-12">
			<H3>Nueva Departamentos</H3>

			@if (count ($errors) > 0)
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif


            {!! Form::open(array('url'=> '/model/departamentos/store',  'method'=>'POST', 'autocomplete'=>'off')) !!}
            {{ Form::token() }}
            <div class="form-group">
                <label for="cod_Depto">Codigo Departamento</label>
                <input type="text" name="cod_Depto" class="form-control" value="{{old('cod_Depto')}}" placeholder="Codigo - Ejemplo: 00, 01, 02 ... 12, 13, ... XX ...">
            </div>
            <div class="form-group">
                <label for="Desc_Deptos">Departamento</label>
                <input type="text" name="Desc_Deptos" class="form-control" value="{{old('Desc_Deptos')}}" placeholder="Departamento ...">
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Guardar</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
            {!! Form::close() !!}

			
		</div>
	</div>

@endsection

