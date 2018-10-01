@extends('layouts.admin')
@section('contenido')

	<div class="row">
		<div class="col-lg-6 col-md-sm-6 col-xs-12">
			<H3 class="jumbotron">Imagenes - Establecimiento: {{$establecimiento->ESTABLECIMIENTO}}</H3>
			@if (count ($errors) > 0)
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif
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
			@if(Auth::user()->admin == 1 || Auth::user()->permite_modif == 1)
			<div>
				{!! Form::open(array('url'=> '/model/fotos/store',  'method'=>'POST', 'autocomplete'=>'off', 'files'=>true, 'enctype'=>'multipart/form-data')) !!}
				{{ Form::token() }}
					{!! Form::file('imagen[]', array('multiple' => true)) !!}
					<input type="hidden" name="establecimientos_cod_establecimiento" class="form-control" value="{{$establecimiento->cod_establecimiento}}">
					<button type="submit" class="btn btn-primary" style="margin-top:10px">Cargar Imagenes</button>
				{!! Form::close() !!}        
			</div>
			@endif
		</div>
	</div>


	<div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row">
                            @foreach($fotos as $an)
                            <div class="col-sm-6 col-md-4">
                                <div class="thumbnail">
                                    <a href="{{ url('/uploads/' . $an->imagen) }}" target="_blank"><img src="{{ asset('uploads/'.$an->imagen) }}" alt="{{$an->imagen}}"></a>
                                    <div class="caption">
                                        <!--<h>{{$an->imagen}}</h>-->
                                        @if(Auth::user()->admin == 1 || Auth::user()->permite_modif == 1)
                                        <a href="{{URL::action('FotosController@destroy', [$an->imagen, $an->idFotos])}}" ><button class="btn btn-danger"> Eliminar </button></a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection

