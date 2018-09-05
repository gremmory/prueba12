@extends('layouts.admin')
@section('contenido')

	<div class="row">
		<div class="col-lg-6 col-md-sm-6 col-xs-12">
			<H3>Editar Control de Supervisiones: {{ $ctrlsupervisiones->id_control}}</H3>

			@if (count ($errors) > 0)
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif 


            {!! Form::model ($ctrlsupervisiones, ['method'=>'PATCH', 'route' => array('ctrlsupervisiones.update', $ctrlsupervisiones->id_control)]) !!}
            {{ Form::token() }}

            <div class="form-group">
                <label for="cod_establecimiento">Cod Establecimiento</label>
                <!-- <input type="text" name="cod_establecimiento" class="form-control" value="{{old('cod_establecimiento')}}" placeholder="Cod Establecimiento ..."> -->
                <select class="form-control" name="cod_establecimiento">
                    <option value="{{$ctrlsupervisiones->cod_establecimiento}}">{{$ctrlsupervisiones->establecimientos($ctrlsupervisiones->cod_establecimiento)}}</option>
                @if ($establecimientos != null)
                @foreach($establecimientos as $item)
                    <option value="{{$item->cod_establecimiento}}">{{$item->ESTABLECIMIENTO}}</option>
                @endforeach
                @endif
                </select>
            </div>
            <div class="form-group">
                <label for="numsupervision">Numero Supervision</label>
                <input type="text" name="numsupervision" class="form-control" value="{{$ctrlsupervisiones->numsupervision }}" placeholder="Numero Supervision ...">
            </div>
            <div class="form-group">
                <label for="nomsupervisor">Nombre Supervision</label>
                <input type="text" name="nomsupervisor" class="form-control" value="{{$ctrlsupervisiones->nomsupervisor}}" placeholder="Nombre Supervision ...">
            </div>
            <div class="form-group">
                <label for="fecha_inicio">Fecha de Inicio</label>
                <input type="date" name="fecha_inicio" class="form-control" value="{{date($ctrlsupervisiones->fecha_inicio)}}" placeholder="Y-m-d">
            </div>
            <div class="form-group">
                <label for="fecha_fin">Fecha de Fin</label>
                <input type="date" name="fecha_fin" class="form-control" value="{{date('y-m-d', strtotime($ctrlsupervisiones->fecha_fin))}}" placeholder="Y-m-d">
            </div>
            <div class="form-group">
                <label for="actividades">Actividades</label>
                <textarea  type="text" name="actividades" class="form-control" value="{{$ctrlsupervisiones->actividades}}" placeholder="Actividades ..." rows="5" cols="80">{{$ctrlsupervisiones->actividades}}</textarea>
            </div>
            <div class="form-group">
                <label for="observaciones">Observaciones</label>
                <textarea  type="text" name="observaciones" class="form-control" value="{{$ctrlsupervisiones->observaciones}}" placeholder="Observaciones ..." rows="5" cols="80">{{$ctrlsupervisiones->observaciones}}</textarea>
            </div>
            <div class="form-group">
                <label for="recomendaciones">Recomendaciones</label>
                <textarea  type="text" name="recomendaciones" class="form-control" value="{{$ctrlsupervisiones->recomendaciones}}" placeholder="Recomendaciones ..." rows="5" cols="80">{{$ctrlsupervisiones->recomendaciones}}</textarea>
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Guardar</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
            {!! Form::close() !!}

			
		</div>
	</div>

@endsection

