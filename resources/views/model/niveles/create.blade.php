@extends('layouts.admin')
@section('contenido')

	<div class="row">
		<div class="col-lg-6 col-md-sm-6 col-xs-12">
			<H3>Nuevo Nivel</H3>

			@if (count ($errors) > 0)
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif


            {!! Form::open(array('url'=> '/model/niveles/store',  'method'=>'POST', 'autocomplete'=>'off')) !!}
            {{ Form::token() }}
            <div class="form-group">
                <label for="cod_nivel">Codigo Nivel</label>
                <input type="text" name="cod_nivel" class="form-control" placeholder="Codigo - No anteponer un 0..." value="{{old('cod_nivel')}}" >
            </div>
            <div class="form-group">
                <label for="desc_nivel">Departamento</label>
                <input type="text" name="desc_nivel" class="form-control" placeholder="Nivel ..." value="{{old('desc_nivel')}}" >
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Guardar</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
            {!! Form::close() !!}

			
		</div>
	</div>

@endsection

