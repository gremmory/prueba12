@extends('layouts.admin')
@section('contenido')

	<div class="row">
		<div class="col-lg-6 col-md-sm-6 col-xs-12">
			<H3>Editar Estableciemiento: {{ $establecimientos->ESTABLECIMIENTO}}</H3>

			@if (count ($errors) > 0)
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif 


            {!! Form::model ($establecimientos, ['method'=>'PATCH', 'route' => array('establecimientos.update', $establecimientos->cod_establecimiento)]) !!}
            {{ Form::token() }}
            <!--
            <div class="form-group">
                <label for="cod_establecimiento">Cod. Establecimiento</label>
                <input type="text" name="cod_establecimiento" class="form-control" value="{{ $establecimientos->cod_establecimiento }}" placeholder="Cod. del Establecimiento ... ">
            </div>
            -->
            <div class="form-group">
                <label for="cod_depto">Departamento</label>
                <select class="form-control" name="cod_depto" id="cod_depto">
                    <option value="{{ $establecimientos->cod_depto }}" >{{ $establecimientos->departamentos($establecimientos->cod_depto)  }}  </option>
                    @if ($departamentos != null)
                    @foreach($departamentos as $item)
                    <option value="{{$item->cod_Depto}}">{{$item->Desc_Deptos}}</option>
                    @endforeach
                    @endif
                </select>
            </div>
            <div class="form-group">
                <label for="cod_mupio">Municipio</label>
                <select class="form-control" name="cod_mupio" id="cod_mupio"  placeholder="Elegir">
                    <option value="{{ $establecimientos->cod_mupio }}" >{{ $establecimientos->municipios($establecimientos->cod_mupio)  }} </option>
                </select>
            </div>

<!--  ***************************************************************** -->
            <div class="form-group">
                <label for="ESTABLECIMIENTO">Establecimiento</label>
                <input type="text" name="ESTABLECIMIENTO" class="form-control" value="{{ $establecimientos->ESTABLECIMIENTO }}" placeholder="Establecimiento ... ">
            </div>
            <div class="form-group">
                <label for="cod_nivel">Nivel</label>
                <select class="form-control" name="cod_nivel" id="cod_nivel">
                    <option value="{{ $establecimientos->cod_nivel  }}" >{{ $establecimientos->niveles($establecimientos->cod_nivel)  }} </option>
                @if ($niveles != null)
                @foreach($niveles as $item)
                    <option value="{{$item->cod_nivel}}">{{$item->desc_nivel}}</option>
                @endforeach
                @endif
                </select>
            </div>

            <div class="form-group">
                <label for="DIRECCION">Dirección</label>
                <input type="text" name="DIRECCION" class="form-control" value="{{ $establecimientos->DIRECCION }}" placeholder="Dirección ... ">
            </div>

            <div class="form-group">
                <label for="TELEFONO">Telefono</label>
                <input type="text" name="TELEFONO" class="form-control" value="{{ $establecimientos->TELEFONO  }}" >
            </div>
            <div class="form-group">
                <label for="correo">Correo</label>
                <input type="email" name="correo" class="form-control" value="{{$establecimientos->correo}}">
            </div>
            <div class="form-group">
                <label for="SECTOR">Sector</label>
                <input type="text" name="SECTOR" class="form-control" value="{{ $establecimientos->SECTOR  }}"  placeholder="Sector ... ">
            </div>
            <div class="form-group">
                <label for="AREA">Area</label>
                <input type="text" name="AREA" class="form-control" value="{{ $establecimientos->AREA  }}"  placeholder="Area ... ">
            </div>
            <div class="form-group">
                <label for="JORNADA">Jornada</label>
                <input type="text" name="JORNADA" class="form-control" value="{{ $establecimientos->JORNADA  }}" placeholder="Jornada ... ">
            </div>

            <div class="form-group">
                <label for="DIRECTOR">Director</label>
                <input type="text" name="DIRECTOR" class="form-control" value="{{ $establecimientos->DIRECTOR  }}" placeholder="Director ... ">
            </div>
            <div class="form-group">
                <label for="ALUMNOS">Alumnos</label>
                <input type="number" name="ALUMNOS" class="form-control" value="{{ $establecimientos->ALUMNOS  }}" placeholder="Alumnos ... ">
            </div>
            <div class="form-group">
                <label for="ALUMNAS">Alumnas</label>
                <input type="number" name="ALUMNAS" class="form-control" value="{{ $establecimientos->ALUMNAS  }}"  placeholder="Alumnas ... ">
            </div>
            <div class="form-group">
                <label for="MAESTROS">Maestros</label>
                <input type="number" name="MAESTROS" class="form-control" value="{{ $establecimientos->MAESTROS}}" placeholder="Maestros ... ">
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
                    <option value="{{ $establecimientos->MULTIGRADO  }}">{{ $establecimientos->MULTIGRADO == 0 ? 'No' : 'Si'}}</option>
                    <option value="0">No</option>
                    <option value="1">Si</option>
                </select>
            </div>
            <div class="form-group">
                <label for="modalidad">Modalidad</label>
                <input type="text" name="modalidad" class="form-control" value="{{$establecimientos->modalidad}}" placeholder="Maestros ... ">
            </div>

            <div class="form-group">
                <label for="opf">OPF</label>
                <!-- <input type="text" name="opf" class="form-control" value="{{ $establecimientos->opf }}" placeholder="OPF ... "> -->
                <select class="form-control" name="MULTIGRADO" id="opf">
                    <option value="{{old('opf')}}"> {{ $establecimientos->opf == 0 ? 'No' : 'Si'}}</option>
                    <option value="0">No</option>
                    <option value="1">Si</option>
                </select>
            </div>

            <div class="form-group">
                <label for="cuenta_carta">cuenta Carta</label>
                <select class="form-control" name="cuenta_carta" id="cuenta_carta">
                    <option value="{{ $establecimientos->cuenta_carta  }}">{{ $establecimientos->cuenta_carta == 0 ? 'No' : 'Si'}}</option>
                    <option value="0">No</option>
                    <option value="1">Si</option>
                </select>
            </div>
            <div class="form-group">
                <label for="latitud">Cordenada Latitud</label>
                <input  class="form-control" type="text"  required name="latitud" value="{{$establecimientos->latitud}}"  placeholder="Latitud ...">
            </div>
            <div class="form-group">
                <label for="longitud">Cordenada longitud</label>
                <input  class="form-control" type="text" required name="longitud" value="{{$establecimientos->longitud}}" placeholder="longitud ...">
            </div>

            <div class="form-group">
                <label for="certificacion">Certificación</label>
                <select class="form-control" name="certificacion" >
                    <option value="{{ $establecimientos->certificacion  }}">{{ $establecimientos->certificacion == 0 ? 'No' : 'Si'}}</option>
                    <option value="0">No</option>
                    <option value="1">Si</option>
                </select>
            </div>

            <div class="form-group">
                <label for="acta_anuencia">Acta Anuencia</label>
                <select class="form-control" name="acta_anuencia" >
                    <option value="{{ $establecimientos->acta_anuencia  }}">{{ $establecimientos->acta_anuencia == 0 ? 'No' : 'Si'}}</option>
                    <option value="0">No</option>
                    <option value="1">Si</option>
                </select>
            </div>  

            <div class="form-group">
                <label for="electricidad">Electricidad</label>
                <select class="form-control" name="electricidad" >
                    <option value="{{ $establecimientos->electricidad  }}">{{ $establecimientos->electricidad == 0 ? 'No' : 'Si'}}</option>
                    <option value="0">No</option>
                    <option value="1">Si</option>
                </select>
            </div>  

            <div class="form-group">
                <label for="seguridad">Seguridad</label>
                <select class="form-control" name="seguridad" >
                    <option value="{{ $establecimientos->seguridad  }}">{{ $establecimientos->seguridad == 0 ? 'No' : 'Si'}}</option>
                    <option value="0">No</option>
                    <option value="1">Si</option>
                </select>
            </div>                        

            <div class="form-group">
                <label for="status">Estatus</label>
                <select class="form-control" name="status" >
                    <option value="{{ $establecimientos->status  }}">{{ $establecimientos->status }}</option>
                    <option value="PENDIENTE">PENDIENTE</option>
                    <option value="ACEPTADA">ACEPTADA</option>
                    <option value="JUSTIFICAR">JUSTIFICAR</option>
                </select>
            </div>         
            <div class="form-group">
                <label for="observaciones">Observaciones</label>
                <textarea  type="text" name="observaciones" class="form-control" value="{{$establecimientos->observaciones}}" placeholder="Recomendaciones ..." rows="5" cols="80">{{$establecimientos->observaciones}}</textarea>
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

