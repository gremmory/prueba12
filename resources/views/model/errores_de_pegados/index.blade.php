@extends('layouts.admin')
@section('contenido')
	
	<div class="row">
		<div class= "col-lg-8 col-md-8 col-sm-8 col-xs-12">
			<H3>Listado de Errores de Pegado <a href="errores_de_pegados/create"><button class="btn btn-sucess">Nuevo</button></a></H3>

			


		</div>
	</div>


	<div class="row">
		<div class= "col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-condensed table-hover">
					<thead>
						<th> ID </th>
						<th> Campo 0	</th>
						<th> Campo 1	</th>
						<th> Campo 2	</th>
						<th> Campo 3	</th>
						<th> Campo 4	</th>
						<th> Campo 5	</th>
						<th> Campo 6	</th>
						<th> Campo 7	</th>
						<th> Campo 8	</th>
						<th> Campo 9	</th>
						<th> Campo 10	</th>
						<th> Campo 11	</th>
						<th> Campo 12	</th>
						<th> Campo 13	</th>
						<th> Campo 14	</th>
						<th> Campo 15	</th>
						<th> Campo 16	</th>
						<th> Campo 17	</th>
						<th> Campo 18	</th>
						<th> Campo 19	</th>
						<th> Campo 20	</th>
						<th> Campo 21	</th>
						<th> Campo 22	</th>
						<th> Campo 23	</th>
						<th> Campo 24	</th>
						<th> Campo 25	</th>
						<th> Campo 26	</th>
						<th> Campo 27	</th>
						<th> Campo 28	</th>
						<th> Campo 29	</th>
						<th> Campo 30	</th>
					</thead>
					@foreach ($errores_de_pegados as $an)
					<tr>
						<td>{{ $an->Campo0	 }}</td>
						<td>{{ $an->Campo1	 }}</td>
						<td>{{ $an->Campo2	 }}</td>
						<td>{{ $an->Campo3	 }}</td>
						<td>{{ $an->Campo4	 }}</td>
						<td>{{ $an->Campo5	 }}</td>
						<td>{{ $an->Campo6	 }}</td>
						<td>{{ $an->Campo7	 }}</td>
						<td>{{ $an->Campo8	 }}</td>
						<td>{{ $an->Campo9	 }}</td>
						<td>{{ $an->Campo10	 }}</td>
						<td>{{ $an->Campo11	 }}</td>
						<td>{{ $an->Campo12	 }}</td>
						<td>{{ $an->Campo13	 }}</td>
						<td>{{ $an->Campo14	 }}</td>
						<td>{{ $an->Campo15	 }}</td>
						<td>{{ $an->Campo16	 }}</td>
						<td>{{ $an->Campo17	 }}</td>
						<td>{{ $an->Campo18	 }}</td>
						<td>{{ $an->Campo19	 }}</td>
						<td>{{ $an->Campo20	 }}</td>
						<td>{{ $an->Campo21	 }}</td>
						<td>{{ $an->Campo22	 }}</td>
						<td>{{ $an->Campo23	 }}</td>
						<td>{{ $an->Campo24	 }}</td>
						<td>{{ $an->Campo25	 }}</td>
						<td>{{ $an->Campo26	 }}</td>
						<td>{{ $an->Campo27	 }}</td>
						<td>{{ $an->Campo28	 }}</td>
						<td>{{ $an->Campo29	 }}</td>
						<td>{{ $an->Campo30	 }}</td>

					</tr>
					@endforeach
				</table>
			</div>
			{{$errores_de_pegados->render()}}
		</div>
	</div>

@endsection
