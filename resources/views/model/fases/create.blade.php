@extends('layouts.admin')
@section('contenido')

	<div class="row">
		<div class="col-lg-6 col-md-sm-6 col-xs-12">
			<H3>Nuev Fase</H3>

			@if (count ($errors) > 0)
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif

              


            {!! Form::open(array('url'=> '/model/fases/store',  'method'=>'POST', 'autocomplete'=>'off')) !!}
            {{ Form::token() }}
            <div class="form-group">
                <label for="Nombre">Nombre Fase</label>
                <input type="text" name="Nombre" class="form-control" value="{{old('Nombre')}}" placeholder="Nombre ... ">
            </div>
            <div class="form-group">
                <label for="Descripcion">Descripcion</label>
                <input type="text" name="Descripcion" class="form-control" value="{{old('Descripcion')}}" placeholder="Descripcion ... ">
            </div>
            <div class="form-group">
                <label for="Fecha_Inicio">Fecha de Inicio</label>
                <input type="date" name="Fecha_Inicio" class="form-control" value="{{old('Fecha_Inicio')}}" placeholder="Fecha ... ">
            </div> 
            <div class="form-group">
                <label for="Cooperador">Cooperador</label>
                <input type="text" name="Cooperador" class="form-control" value="{{old('Cooperador')}}" placeholder="Cooperador ... ">
            </div>
            <div class="form-group">
                <label for="Id_Proveedor">Proveedor</label>
                <select class="form-control" name="Id_Proveedor">
                    <option value="{{old('Id_Proveedor')}}"></option>
                @if ($proveedores != null)
                @foreach($proveedores as $item)
                    <option value="{{$item->id_Proveedor}}">{{$item->Nombre_Pro}}</option>
                @endforeach
                @endif
                </select>
            </div>

            <div class="form-group">
                <button class="btn btn-primary" type="submit">Guardar</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
            {!! Form::close() !!}

			
		</div>
	</div>

@endsection

