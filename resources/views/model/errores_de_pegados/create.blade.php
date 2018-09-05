@extends('layouts.admin')
@section('contenido')

	<div class="row">
		<div class="col-lg-6 col-md-sm-6 col-xs-12">
			<H3>Nueva Jornada</H3>

			@if (count ($errors) > 0)
			<div class="alert alert-danger">
				<ul>
					@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif


            {!! Form::open(array('url'=> '/model/errores_de_pegados/store',  'method'=>'POST', 'autocomplete'=>'off')) !!}
            {{ Form::token() }}
            <div class="form-group">
                <label for="Campo0">Campo 0</label>
                <input type="text" name="Campo0" class="form-control" placeholder="Campo 0 ...">
            </div>
            <div class="form-group">
                <label for="Campo1">Campo 1</label>
                <input type="text" name="Campo1" class="form-control" placeholder="Campo 1 ...">
            </div>
            <div class="form-group">
                <label for="Campo2">Campo 2</label>
                <input type="text" name="Campo2" class="form-control" placeholder="Campo 2 ...">
            </div>
            <div class="form-group">
                <label for="Campo3">Campo 3</label>
                <input type="text" name="Campo3" class="form-control" placeholder="Campo 3 ...">
            </div>
            <div class="form-group">
                <label for="Campo4">Campo 4</label>
                <input type="text" name="Campo4" class="form-control" placeholder="Campo 4 ...">
            </div>
            <div class="form-group">
                <label for="Campo5">Campo 5</label>
                <input type="text" name="Campo5" class="form-control" placeholder="Campo 5 ...">
            </div>
            <div class="form-group">
                <label for="Campo6">Campo 6</label>
                <input type="text" name="Campo6" class="form-control" placeholder="Campo 6 ...">
            </div>
            <div class="form-group">
                <label for="Campo7">Campo 7</label>
                <input type="text" name="Campo7" class="form-control" placeholder="Campo 7 ...">
            </div>
            <div class="form-group">
                <label for="Campo8">Campo 8</label>
                <input type="text" name="Campo8" class="form-control" placeholder="Campo 8 ...">
            </div>
            <div class="form-group">
                <label for="Campo9">Campo 9</label>
                <input type="text" name="Campo9" class="form-control" placeholder="Campo 9 ...">
            </div>
            <div class="form-group">
                <label for="Campo10">Campo 10</label>
                <input type="text" name="Campo10" class="form-control" placeholder="Campo 10 ...">
            </div>
            <!-- 10 -->
            <div class="form-group">
                <label for="Campo11">Campo 11</label>
                <input type="text" name="Campo11" class="form-control" placeholder="Campo 11 ...">
            </div>
            <div class="form-group">
                <label for="Campo12">Campo 12</label>
                <input type="text" name="Campo12" class="form-control" placeholder="Campo 12 ...">
            </div>
            <div class="form-group">
                <label for="Campo13">Campo 13</label>
                <input type="text" name="Campo13" class="form-control" placeholder="Campo 13 ...">
            </div>
            <div class="form-group">
                <label for="Campo14">Campo 14</label>
                <input type="text" name="Campo14" class="form-control" placeholder="Campo 14 ...">
            </div>
            <div class="form-group">
                <label for="Campo15">Campo 15</label>
                <input type="text" name="Campo15" class="form-control" placeholder="Campo 15 ...">
            </div>
            <div class="form-group">
                <label for="Campo16">Campo 16</label>
                <input type="text" name="Campo16" class="form-control" placeholder="Campo 16 ...">
            </div>
            <div class="form-group">
                <label for="Campo17">Campo 17</label>
                <input type="text" name="Campo17" class="form-control" placeholder="Campo 17 ...">
            </div>
            <div class="form-group">
                <label for="Campo18">Campo 18</label>
                <input type="text" name="Campo18" class="form-control" placeholder="Campo 18 ...">
            </div>
            <div class="form-group">
                <label for="Campo19">Campo 19</label>
                <input type="text" name="Campo19" class="form-control" placeholder="Campo 19 ...">
            </div>
            <div class="form-group">
                <label for="Campo20">Campo 20</label>
                <input type="text" name="Campo20" class="form-control" placeholder="Campo 20 ...">
            </div>

            <!-- 20 -->
            <div class="form-group">
                <label for="Campo2">Campo 21</label>
                <input type="text" name="Campo21" class="form-control" placeholder="Campo 21 ...">
            </div>
            <div class="form-group">
                <label for="Campo2">Campo 22</label>
                <input type="text" name="Campo22" class="form-control" placeholder="Campo 22 ...">
            </div>
            <div class="form-group">
                <label for="Campo2">Campo 23</label>
                <input type="text" name="Campo23" class="form-control" placeholder="Campo 23 ...">
            </div>
            <div class="form-group">
                <label for="Campo2">Campo 24</label>
                <input type="text" name="Campo24" class="form-control" placeholder="Campo 24 ...">
            </div>
            <div class="form-group">
                <label for="Campo2">Campo 25</label>
                <input type="text" name="Campo25" class="form-control" placeholder="Campo 25 ...">
            </div>
            <div class="form-group">
                <label for="Campo2">Campo 26</label>
                <input type="text" name="Campo26" class="form-control" placeholder="Campo 26 ...">
            </div>
            <div class="form-group">
                <label for="Campo2">Campo 27</label>
                <input type="text" name="Campo27" class="form-control" placeholder="Campo 27 ...">
            </div>
            <div class="form-group">
                <label for="Campo2">Campo 28</label>
                <input type="text" name="Campo28" class="form-control" placeholder="Campo 28 ...">
            </div>
            <div class="form-group">
                <label for="Campo2">Campo 29</label>
                <input type="text" name="Campo29" class="form-control" placeholder="Campo 29 ...">
            </div>
            <div class="form-group">
                <label for="Campo2">Campo 30</label>
                <input type="text" name="Campo30" class="form-control" placeholder="Campo 30 ...">
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="submit">Guardar</button>
                <button class="btn btn-danger" type="reset">Cancelar</button>
            </div>
            {!! Form::close() !!}

			
		</div>
	</div>

@endsection

