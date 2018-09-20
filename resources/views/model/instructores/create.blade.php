@extends('layouts.admin')
@section('contenido')

	<div class="row">
		<div class="col-lg-6 col-md-sm-6 col-xs-12">
			<H3>Nuevo Instructor</H3>

			@if (count ($errors) > 0)
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif 

              


            {!! Form::open(array('url'=> '/model/instructores/store',  'method'=>'POST', 'autocomplete'=>'off')) !!}
            {{ Form::token() }}
            <div class="form-group">
                <label for="cod_instructor">Cod. Instructor</label>
                <input type="text" name="cod_instructor" class="form-control" value="{{old('cod_instructor')}}" placeholder="Cod. Instructor ... ">
            </div>
            <div class="form-group">
                <label for="primer_apellido">Primer Apellido</label>
                <input type="text" name="primer_apellido" class="form-control" value="{{old('primer_apellido')}}" placeholder="Primer Apellido ... ">
            </div>
            <div class="form-group">
                <label for="segundo_apellido">Segundo Apellido</label>
                <input type="text" name="segundo_apellido" class="form-control" value="{{old('segundo_apellido')}}" placeholder="Segundo Apellido ... ">
            </div>
            <div class="form-group">
                <label for="apellido_casada">Apellido de Casada</label>
                <input type="text" name="apellido_casada" class="form-control" value="{{old('apellido_casada')}}" placeholder="Apellido de Casada ... ">
            </div>
            <div class="form-group">
                <label for="primer_nombre">Primer Nombre</label>
                <input type="text" name="primer_nombre" class="form-control" value="{{old('primer_nombre')}}" placeholder="Primer Nombre ... ">
            </div>
            <div class="form-group">
                <label for="segundo_nombre">Segundo Nombre</label>
                <input type="text" name="segundo_nombre" class="form-control" value="{{old('segundo_nombre')}}" placeholder="Segundo Nombre ... ">
            </div>
            <div class="form-group">
                <label for="direccion">Dirección</label>
                <input type="text" name="direccion" class="form-control" value="{{old('direccion')}}" placeholder="Dirección ... ">
            </div>
            <div class="form-group">
                <label for="telefono_casa">Telefono de Casa</label>
                <input type="number" name="telefono_casa" class="form-control" value="{{old('telefono_casa')}}" placeholder="Telefono de Casa ... ">
            </div>
            <div class="form-group">
                <label for="telefono_celular">Telefono Celular</label>
                <input type="number" name="telefono_celular" class="form-control" value="{{old('telefono_celular')}}" placeholder="Telefono Celular... ">
            </div>
            <div class="form-group">
                <label for="orden_cedula">Orden de Cedula</label>
                <input type="text" name="orden_cedula" class="form-control" value="{{old('orden_cedula')}}" placeholder="Orden de Cedula... ">
            </div>
            <div class="form-group">
                <label for="num_cedula">Numero de Cedula</label>
                <input type="number" name="num_cedula" class="form-control" value="{{old('num_cedula')}}" placeholder="Numero de Cedula... ">
            </div>
            <div class="form-group">
                <label for="cod_depto">Departamento</label>
                <select class="form-control" name="cod_Depto" id="cod_depto">
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
            <div class="form-group">
                <label for="e_mail">Email</label>
                <input type="email" name="e_mail" class="form-control" value=" {{old('e_mail')}} " placeholder="Correo ...">
            </div>
            <div class="form-group">
                <label for="fecha_nac">Fecha de Nacimiento</label>
                <input type="date" name="fecha_nac" class="form-control" value="{{old('fecha_nac')}}" placeholder="Y-m-d">
            </div>
            <div class="form-group">
                <label for="fecha_contrato">Fecha de Contrato</label>
                <input type="date" name="fecha_contrato" class="form-control" value="{{old('fecha_contrato')}}" placeholder="Y-m-d">
            </div>
            <div class="form-group">
                <label for="sueldo_inicial">Sueldo inicial</label>
                <input type="number" name="sueldo_inicial" class="form-control" value="{{old('sueldo_inicial')}}" placeholder="Saldo Incial ..." step="any">
            </div> 
            <div class="form-group">
                <label for="fecha_ingreso">Fecha de Ingreso</label>
                <input type="date" name="fecha_ingreso" class="form-control" value="{{old('fecha_ingreso')}}" placeholder="Y-m-d">
            </div>
            <div class="form-group">
                <label for="id_profesion">Profesion</label>
                <select class="form-control" name="id_profesion" id="id_profesion">
                    <option value="{{old('id_profesion')}}"></option>
                @if ($profesiones != null)
                @foreach($profesiones as $item)
                    <option value="{{$item->id_prefesion}}">{{$item->profesion}}</option>
                @endforeach
                @endif
                </select>
            </div>
            <div class="form-group">
                <label for="estudia_actualmente">Estudia Actualmente</label>
                <select name="estudia_actualmente" class="form-control">
                    <option value="1" > Si </option> 
                    <option value="0" > No </option> 
                </select>
            </div>
            <div class="form-group">
                <label for="carrera_que_estudia">Carrera que Estudia</label>
                <input type="text" name="carrera_que_estudia" class="form-control" value="{{old('carrera_que_estudia')}}" placeholder="Estudio ... ">
            </div>
            <div class="form-group">
                <label for="ultimo_grado_aprobado">Ultimo Grado Aprobado</label>
                <input type="text" name="ultimo_grado_aprobado" class="form-control" value="{{old('ultimo_grado_aprobado')}}" placeholder="Estudio ... ">
            </div>
            <div class="form-group">
                <label for="cod_establecimiento">Establecimiento</label>
                <select class="form-control" name="cod_establecimiento">
                @if ($establecimientos != null)
                @foreach($establecimientos as $item)
                    <option value="{{$item->cod_establecimiento}}">{{$item->ESTABLECIMIENTO}}</option>
                @endforeach
                @endif
                </select>
            </div>
            <div class="form-group">
                <label for="nombre_director">Nombre Director</label>
                <input type="text" name="nombre_director" class="form-control" value="{{old('nombre_director')}}" placeholder="Estudio ... ">
            </div>
            <div class="form-group">
                <label for="id_jornada">Jornada</label>
                <select class="form-control" name="id_jornada">
                @if ($jornadas != null)
                @foreach($jornadas as $item)
                    <option value="{{$item->id_jornada}}">{{$item->Desc_jornada}}</option>
                @endforeach
                @endif
                </select>
            </div>
            <div class="form-group">
                <label for="hora_entrada">Hora Entrada</label>
                <input type="time" name="hora_entrada" class="form-control" value="{{old('hora_entrada')}}">
            </div>

            <div class="form-group">
                <label for="hora_salida">Hora Salida</label>
                <input type="time" name="hora_salida" class="form-control" value="{{old('hora_salida')}}">
            </div>
            <div class="form-group">
                <label for="cantidad_alumnos">Cantidad de Alumnos</label>
                <input type="number" name="cantidad_alumnos" class="form-control" value="{{old('cantidad_alumnos')}}" placeholder="Cantidad de Alumnos... ">
            </div>
            <div class="form-group">
                <label for="fecha_actualizacion">Fecha de Actualizacion</label>
                <input type="date" name="fecha_actualizacion" class="form-control" value="{{old('fecha_actualizacion')}}" placeholder="Y-m-d">
            </div>
            <!-- FOto -->

            <div class="form-group">
                <label for="comentarios">Comentarios</label>
                <textarea  type="text" name="comentarios" class="form-control" value="{{old('comentarios')}}" placeholder="comentarios ..." rows="5" cols="80">{{old('comentarios')}}</textarea>
            </div>     
            <div class="form-group">
                <label for="estado">Estado</label>
                <input type="text" name="estado" class="form-control" value="{{old('estado')}}" placeholder="Estado... ">
            </div>

            <div class="form-group">
                <button class="btn btn-primary" type="submit">Guardar</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
            {!! Form::close() !!}

			
		</div>
	</div>

@endsection

