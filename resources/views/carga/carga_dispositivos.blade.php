@extends('layouts.admin')
@section('contenido')
<style type="text/css">
  .loader {
    position: fixed;
    left: 0px;
    top: 0px;
    width: 100%;
    height: 100%;
    z-index: 9999;
    background: url({{ asset('img/cargando2.gif')}}) 50% 50% no-repeat rgb(249,249,249);
    opacity: .5;
}
</style>

<div class="col-md-12">
	<div class="box box-primary">
	<div class="box-header">
		<h3 class="box-title">Cargar Datos de Dispositivos</h3>
	</div><!-- /.box-header -->

	<div>
		@if(session('success'))
		<div class="alert alert-success">
			{{ session('success') }}
		</div> 
		@endif 
		@if(session('fail'))
		<div class="alert alert-danger">
			{{ session('fail') }}
		</div> 
		@endif
		@if(session('medium'))
		<div class="alert alert-warning">
			{{ session('medium') }}
		</div> 
		@endif
		
		<div class="alert alert-success" id="success" hidden></div> 
		<div class="alert alert-danger" id="fail" hidden></div> 
		<div class="alert alert-warning" id="medium" hidden></div> 

		<div class="loader"></div>

		{!! Form::open(array('url'=> '/carga/dispositivos/store',  'method'=>'POST', 'autocomplete'=>'off', 'files'=>true, 'enctype'=>'multipart/form-data', 'id'=>'casasola2')) !!}
		{{ Form::token() }}
			<div class="box-body">
				<div class="form-group col-xs-12"  >
					<label>Agregar Archivo de Excel </label>
					<input name="archivo" id="archivo" type="file"   class="archivo form-control"  required/><br /><br />
				</div>
				<div class="box-footer">
					<button type="submit" class="btn btn-primary" id="enlaceajax2">Cargar Datos</button>
				</div>
			</div>
		{!! Form::close() !!}  
	</div>
</div>




@endsection