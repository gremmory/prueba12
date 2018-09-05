@extends('layouts.admin')
@section('contenido')

	<div class="row">
		<div class="col-lg-6 col-md-sm-6 col-xs-12">
			<H3>Nuevo Municipio</H3>

			@if (count ($errors) > 0)
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif

              


            {!! Form::open(array('url'=> '/model/municipios/store',  'method'=>'POST', 'autocomplete'=>'off')) !!}
            {{ Form::token() }}
            <div class="form-group">
                <label for="COD_MUPIO">Cod. Municipio</label>
                <input type="text" name="COD_MUPIO" class="form-control" value="{{old('COD_MUPIO')}}" placeholder="Cod ... 01, 02, 03 ... 15,16 ... XX">
            </div>

            <div class="form-group">
                <label for="NOM_MUPIO">Departamento</label>
                <select class="form-control" name="COD_DEPTO">
                @if ($departamentos != null)
                @foreach($departamentos as $item)
                    <option value="{{$item->cod_Depto}}">{{$item->Desc_Deptos}}</option>
                @endforeach
                @endif
                </select>
            </div>

            <div class="form-group">
                <label for="NOM_MUPIO">Nombre</label>
                <input type="text" name="NOM_MUPIO" class="form-control" value="{{old('NOM_MUPIO')}}" placeholder="Nombres ...">
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Guardar</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
            {!! Form::close() !!}

			
		</div>
	</div>

@endsection

