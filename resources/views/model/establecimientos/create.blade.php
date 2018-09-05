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

              


            {!! Form::open(array('url'=> '/model/establecimientos/store',  'method'=>'POST', 'autocomplete'=>'off')) !!}
            {{ Form::token() }}
            <div class="form-group">
                <label for="cod_establecimiento">Cod. Establecimiento</label>
                <input type="text" name="cod_establecimiento" class="form-control" value="{{old('cod_establecimiento')}}" placeholder="Cod. del Establecimiento ... ">
            </div>
            <div class="form-group">
                <label for="cod_depto">Departamento</label>
                <select class="form-control" name="cod_depto" id="cod_depto">
                    <option value="{{old('cod_Depto')}}">{{old('Desc_Deptos')}}</option>
                @if ($departamentos != null)
                @foreach($departamentos as $item)
                    <option value="{{$item->cod_Depto}}">{{$item->Desc_Deptos}}</option>
                @endforeach
                @endif
                </select>
            </div>
            <div class="form-group">
                <label for="cod_mupio">Municipio</label>
                <select class="form-control" name="cod_mupio" id="cod_mupio" value="{{old('cod_mupio')}}" placeholder="Elegir">
                    <option value="{{old('cod_mupio')}}">Elegir</option>
                </select>
            </div>

<!--  ***************************************************************** -->
            <div class="form-group">
                <label for="ESTABLECIMIENTO">Establecimiento</label>
                <input type="text" name="ESTABLECIMIENTO" class="form-control" value="{{old('ESTABLECIMIENTO')}}" placeholder="Establecimiento ... ">
            </div>
            <div class="form-group">
                <label for="cod_nivel">Nivel</label>
                <select class="form-control" name="cod_nivel" id="cod_nivel">
                @if ($niveles != null)
                @foreach($niveles as $item)
                    <option value="{{$item->cod_nivel}}">{{$item->desc_nivel}}</option>
                @endforeach
                @endif
                </select>
            </div>

            <div class="form-group">
                <label for="DIRECCION">Dirección</label>
                <input type="text" name="DIRECCION" class="form-control" value="{{old('DIRECCION')}}" placeholder="Dirección ... ">
            </div>

            <div class="form-group">
                <label for="TELEFONO">Telefono</label>
                <input type="text" name="TELEFONO" class="form-control" value="{{old('TELEFONO')}}">
            </div>
            <div class="form-group">
                <label for="correo">Correo</label>
                <input type="email" name="correo" class="form-control" value="{{old('correo')}}">
            </div>
            <div class="form-group">
                <label for="SECTOR">Sector</label>
                <input type="text" name="SECTOR" class="form-control" value="{{old('SECTOR')}}" placeholder="Sector ... ">
            </div>
            <div class="form-group">
                <label for="AREA">Area</label>
                <input type="text" name="AREA" class="form-control" value="{{old('AREA')}}" placeholder="Area ... ">
            </div>
            <div class="form-group">
                <label for="JORNADA">Jornada</label>
                <input type="text" name="JORNADA" class="form-control" value="{{old('JORNADA')}}" placeholder="Jornada ... ">
            </div>

            <div class="form-group">
                <label for="DIRECTOR">Director</label>
                <input type="text" name="DIRECTOR" class="form-control" value="{{old('DIRECTOR')}}" placeholder="Director ... ">
            </div>
            <div class="form-group">
                <label for="ALUMNOS">Alumnos</label>
                <input type="number" name="ALUMNOS" class="form-control" value="{{old('ALUMNOS')}}" placeholder="Alumnos ... ">
            </div>
            <div class="form-group">
                <label for="ALUMNAS">Alumnas</label>
                <input type="number" name="ALUMNAS" class="form-control" value="{{old('ALUMNAS')}}" placeholder="Alumnas ... ">
            </div>

            <div class="form-group">
                <label for="MAESTROS">Maestros</label>
                <input type="number" name="MAESTROS" class="form-control" value="{{old('MAESTROS')}}" placeholder="Maestros ... ">
            </div>
<!--

            <div class="form-group">
                <label for="TOTAL">Total</label>
                <input type="number" name="TOTAL" class="form-control" value="{{old('TOTAL')}}" placeholder="Total ... ">
            </div>
            <div class="form-group">
                <label for="MAESTROS">Maestros</label>
                <input type="number" name="MAESTROS" class="form-control" value="{{old('MAESTROS')}}" placeholder="Maestros ... ">
            </div>
-->
<!--
            <div class="form-group">
                <label for="MULTIGRADO">Multigrado</label>
                <input type="text" name="MULTIGRADO" class="form-control" value="{{old('MULTIGRADO')}}" placeholder="Multigrado ... ">
            </div>
-->
            <div class="form-group">
                <label for="MULTIGRADO">Multigrado</label>
                <select class="form-control" name="MULTIGRADO" id="MULTIGRADO">
                    <option value="{{old('MULTIGRADO')}}"> Elegir Opcion</option>
                    <option value="0">No</option>
                    <option value="1">Si</option>
                </select>
            </div>
            <div class="form-group">
                <label for="modalidad">Modalidad</label>
                <input type="text" name="modalidad" class="form-control" value="{{old('modalidad')}}" placeholder="Maestros ... ">
            </div>

            <div class="form-group">
                <label for="opf">OPF</label>
                <!--<input type="text" name="opf" class="form-control" value="{{old('opf')}}" placeholder="OPF ... ">-->
                <select class="form-control" name="MULTIGRADO" id="opf">
                    <option value="{{old('opf')}}"> Elegir Opcion</option>
                    <option value="0">No</option>
                    <option value="1">Si</option>
                </select>
            </div>

            <div class="form-group">
                <label for="cuenta_carta">cuenta Carta</label>
                <select class="form-control" name="cuenta_carta" id="cuenta_carta">
                    <option value="{{old('cuenta_carta')}}"> Elegir Opcion</option>
                    <option value="0">No</option>
                    <option value="1">Si</option>
                </select>
            </div>
            <div class="form-group">
                <label for="latitud">Cordenada Latitud</label>
                <input class="form-control" type="text" placeholder="0.00" required name="latitud" value="{{old('latitud')}}" placeholder="latitud ...">
            </div>
            <div class="form-group">
                <label for="longitud">Cordenada longitud</label>
                <input class="form-control" type="text" placeholder="0.00" required name="longitud" value="{{old('longitud')}}" placeholder="longitud ...">
            </div>

            <div class="form-group">
                <label for="certificacion">Certificación</label>
                <select class="form-control" name="certificacion" >
                    <option value="{{old('certificacion')}}"> Elegir Opcion</option>
                    <option value="0">No</option>
                    <option value="1">Si</option>
                </select>
            </div>

            <div class="form-group">
                <label for="acta_anuencia">Acta Anuencia</label>
                <select class="form-control" name="acta_anuencia" >
                    <option value="{{old('acta_anuencia')}}"> Elegir Opcion</option>
                    <option value="0">No</option>
                    <option value="1">Si</option>
                </select>
            </div>  

            <div class="form-group">
                <label for="electricidad">Electricidad</label>
                <select class="form-control" name="electricidad" >
                    <option value="{{old('electricidad')}}"> Elegir Opcion</option>
                    <option value="0">No</option>
                    <option value="1">Si</option>
                </select>
            </div>  

            <div class="form-group">
                <label for="seguridad">Seguridad</label>
                <select class="form-control" name="seguridad" >
                    <option value="{{old('seguridad')}}"> Elegir Opcion</option>
                    <option value="0">No</option>
                    <option value="1">Si</option>
                </select>
            </div>                        

            <div class="form-group">
                <label for="status">Estatus</label>
                <select class="form-control" name="status" >
                    <option value="{{old('status')}}">{{old('status')}}</option>
                    <option value="PENDIENTE">PENDIENTE</option>
                    <option value="ACEPTADA">ACEPTADA</option>
                    <option value="JUSTIFICAR">JUSTIFICAR</option>
                </select>
            </div>         
            <div class="form-group">
                <label for="observaciones">Observaciones</label>
                <textarea  type="text" name="observaciones" class="form-control" value="{{old('observaciones')}}" placeholder="Observaciones ..." rows="5" cols="80">{{old('observaciones')}}</textarea>
            </div>               

<!--
            <div class="form-group">
                <label for="id_fase">Fase</label>
                <select class="form-control" name="id_fase" id="id_fase">
                @if ($fases != null)
                @foreach($fases as $item)
                    <option value="{{$item->Id_Fase}}">{{$item->Descripcion}}</option>
                @endforeach
                @endif
                </select>
            </div>
-->
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Guardar</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
            {!! Form::close() !!}

			
		</div>
	</div>

@endsection

