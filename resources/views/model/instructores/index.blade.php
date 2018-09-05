@extends('layouts.admin')
@section('contenido')
	
	<div class="row">
		<div class= "col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<H3>Listado de Instructores <a href="instructores/create"><button class="btn btn-sucess">Nuevo</button></a></H3>

			@include('model.instructores.search')


		</div>
	</div>


	<div class="row">
		<div class= "col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th>Codigo</th>
						<th>Primer Apellido</th>
						<th>Segudo Apellido</th>
						<th>Apellido de Casada</th>
						<th>Primer Nombre</th>
						<th>Segundo Nombre</th>
						<th>Dirección</th>
						<th>Tel. Casa</th>
						<th>Tel. Celular</th>
						<th>Orden Cedula</th>
						<th>Num. Ceduda</th>
						<th>Municipio</th>
						<th>Departamento</th>
						<th>E-mail</th>
						<th>Fecha Nac.</th>
						<th>Fecha Contrato</th>
						<th>Sueldo Inicial</th>
						<th>Fecha Ingreso</th>
						<th>Profesion</th>
						<th>Estudia Actualmente</th>
						<th>Carrera que estudia</th>
						<th>Ultimo Grado</th>
						<th>Establecimiento </th>
						<th>Director</th>
						<th>Jornada</th>
						<th>Hora Entrada</th>
						<th>Hora Salida</th>
						<th>Cantidad Alumnos</th>
						<th>Fecha Actulizacion</th>
						<th>Foto</th>
						<th>Comentario</th>
						<th>Estado</th>
						<th>Opcion</th>
					</thead>
					@foreach ($instructores as $an)
					<tr>
						<th>{{ $an->cod_instructor }}</th>
						<th>{{ $an->primer_apellido }}</th>
						<th>{{ $an->segundo_apellido }}</th>
						<th>{{ $an->apellido_casada }}</th>
						<th>{{ $an->primer_nombre }}</th>
						<th>{{ $an->segundo_nombre }}</th>
						<th>{{ $an->direccion }}</th>
						<th>{{ $an->telefono_casa }}</th>
						<th>{{ $an->telefono_celular }}</th>
						<th>{{ $an->orden_cedula }}</th>
						<th>{{ $an->num_cedula }}</th>
						<th>{{ $an->municipios($an->cod_mupio) }}</th>
						<th>{{ $an->departamentos($an->cod_Depto) }}</th>
						<th>{{ $an->e_mail }}</th>
						<th>{{ $an->fecha_nac }}</th>
						<th>{{ $an->fecha_contrato }}</th>
						<th>{{ $an->sueldo_inicial }}</th>
						<th>{{ $an->fecha_ingreso }}</th>
						<th>{{ $an->profesiones($an->id_profesion) }}</th>
						<th>{{ $an->estudia_actualmente }}</th>
						<th>{{ $an->carrera_que_estudia }}</th>
						<th>{{ $an->ultimo_grado_aprobado }}</th>
						<th>{{ $an->cod_establecimiento }}</th>
						<th>{{ $an->nombre_director }}</th>
						<th>{{ $an->jornadas($an->id_jornada) }}</th>
						<th>{{ $an->hora_entrada }}</th>
						<th>{{ $an->hora_salida }}</th>
						<th>{{ $an->cantidad_alumnos }}</th>
						<th>{{ $an->fecha_actualizacion }}</th>
						<th>{{ $an->foto }}</th>
						<th>{{ $an->comentarios }}</th>
						<th>{{ $an->estado }}</th>


						<td>
							<a href="{{ URL::action('InstructoresController@edit', $an->id_instructor) }}"><button class="btn btn-info"> Editar </button></a>
							<a href="" data-target="#modal-delete-{{ $an->id_instructor}}" data-toggle="modal"><button class="btn btn-danger"> Eliminar </button></a>
						</td>
					</tr>
					@include('model.instructores.modal')
					@endforeach
				</table>
			</div>
			{{ $instructores->render()}}
		</div>
	</div>

@endsection
