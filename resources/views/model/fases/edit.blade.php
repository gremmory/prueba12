@extends('layouts.admin')
@section('contenido')

	<div class="row">
		<div class="col-lg-6 col-md-sm-6 col-xs-12">
			<H3>Editar Fase: {{ $fases->Nombre}}</H3>

			@if (count ($errors) > 0)
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif 


            {!! Form::model ($fases, ['method'=>'PATCH', 'route' => array('fases.update', $fases->Id_Fase)]) !!}
            {{ Form::token() }}
            <div class="form-group">
                <label for="Nombre">Nombre Fase</label>
                <input type="text" name="Nombre" class="form-control" value="{{$fases->Nombre}}" placeholder="Nombre ... ">
            </div>
            <div class="form-group">
                <label for="Descripcion">Descripcion</label>
                <input type="text" name="Descripcion" class="form-control" value="{{$fases->Descripcion}}" placeholder="Descripcion ... ">
            </div>
            <div class="form-group">
                <label for="Fecha_Inicio">Fecha de Inicio</label>
                <input type="date" name="Fecha_Inicio" class="form-control" value="{{date('Y-m-d', strtotime($fases->Fecha_Inicio)) }}" placeholder="Fecha ... ">
            </div>
            <div class="form-group">
                <label for="Cooperador">Cooperador</label>
                <input type="text" name="Cooperador" class="form-control" value="{{$fases->Cooperador}}" placeholder="Cooperador ... ">
            </div>
            <div class="form-group">
                <label for="Id_Proveedor">Proveedor</label>
                <select class="form-control" name="Id_Proveedor">
                    <option value="{{$fases->Id_Proveedor}}" >{{$fases->Proveedores($fases->Id_Proveedor)}}</option>
                @if ($proveedores != null)
                @foreach($proveedores as $item)
                    <option value="{{$item->id_Proveedor}}">{{$item->Nombre_Pro}}</option>
                @endforeach
                @endif
                <option value=""></option>
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

