@extends('layouts.admin')
@section('contenido')

	<div class="row">
		<div class="col-lg-6 col-md-sm-6 col-xs-12">
			<H3>Nuevo Detalle de Equipo</H3>

			@if (count ($errors) > 0)
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif 

              


            {!! Form::open(array('url'=> '/model/detalle_equipos/store',  'method'=>'POST', 'autocomplete'=>'off')) !!}
            {{ Form::token() }}
            <div class="form-group">
                <label for="cod_establecimiento">Cod Establecimiento</label>
                <!-- <input type="text" name="cod_establecimiento" class="form-control" value="{{old('cod_establecimiento')}}" placeholder="Cod Establecimiento ..."> -->
                <select class="form-control" name="cod_establecimiento">
                @if ($establecimientos != null)
                @foreach($establecimientos as $item)
                    <option value="{{$item->cod_establecimiento}}">{{$item->cod_establecimiento}} --- {{$item->ESTABLECIMIENTO}}</option>
                @endforeach
                @endif
                </select>
            </div>
            <div class="form-group">
                <label for="cod_equipo">Cod. Equipo</label>
                <input type="text" name="cod_equipo" class="form-control" value="{{old('cod_equipo')}}" placeholder="Cod. del Equipo ... ">
            </div>
            <div class="form-group">
                <label for="tipo_equipo">Tipo Equipo</label>
                <!-- <input type="text" name="cod_establecimiento" class="form-control" value="{{old('cod_establecimiento')}}" placeholder="Cod Establecimiento ..."> -->
                <select class="form-control" name="tipo_equipo">
                @if ($dispositivos != null)
                @foreach($dispositivos as $item)
                    <option value="{{$item->tipo_equipo}}">{{$item->Desc_tipoequipo}}</option>
                @endforeach
                @endif
                </select>
            </div>
            <div class="form-group">
                <label for="desc_equipo">Descripcion Equipo</label>
                <input type="text" name="desc_equipo" class="form-control" value="{{old('desc_equipo')}}" placeholder="Descripcion equipo ... ">
            </div>
            <div class="form-group">
                <label for="id_marca">Marca</label>
                <select class="form-control" name="id_marca">
                    <option value=""></option>
                @if ($marcas != null)
                @foreach($marcas as $item)
                    <option value="{{$item->Id_Marca}}">{{$item->Desc_Marca}}</option>
                @endforeach
                @endif
                </select>
            </div>
            <div class="form-group">
                <label for="series">Serie</label>
                <input type="text" name="series" class="form-control" value="{{old('series')}}" placeholder="Series ... ">
            </div>
            <div class="form-group">
                <label for="cantidad">cantidad</label>
                <input type="number" name="cantidad" class="form-control" value="{{old('cantidad')}}" placeholder="Cantidad ... ">
            </div>         
            <div class="form-group">
                <label for="Observaciones">Observaciones</label>
                <textarea  type="text" name="Observaciones" class="form-control" value="{{old('Observaciones')}}" placeholder="Observaciones ..." rows="5" cols="80">{{old('Observaciones')}}</textarea>
            </div>    
            <div class="form-group">
                <label for="Fases_Id_Fase">Fase</label>
                <select class="form-control" name="Fases_Id_Fase">
                    <option value=""></option>
                @if ($fases != null)
                @foreach($fases as $item)
                    <option value="{{$item->Id_Fase}}">{{$item->Nombre}}</option>
                @endforeach
                @endif
                </select>
            </div>
            <div class="form-group">
                <label for="tipo">cantidad</label>
                <input type="text" name="cantidad" class="form-control" value="{{old('tipo')}}" placeholder="Cantidad ... ">
            </div>       
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Guardar</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
            {!! Form::close() !!}

			
		</div>
	</div>

@endsection

