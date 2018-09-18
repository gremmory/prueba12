@extends('layouts.admin')
@section('contenido')

@if (count ($errors) > 0)
<div class="alert alert-danger">
	<ul>
		@foreach ($errors->all() as $error)
		<li>{{$error}}</li>
		@endforeach
	</ul>
</div>
@endif

{!! Form::open(array('url'=> '/pdf/generarpdf/crearvista',  'method'=>'POST', 'autocomplete'=>'off', 'files'=>true, 'enctype'=>'multipart/form-data')) !!}
{{ Form::token() }}

<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p style="line-height: 0%;">&nbsp;</p>
<p style="line-height: 0%;">&nbsp;</p>
<p style="line-height: 20%;">&nbsp;</p>
<p style="line-height: 0%; text-align: justify; padding-right: 30px; padding-left: 30px;"><strong><span style="font-family: 'Calibri';">ACTA No. <input type="text" name="num_acta" value=" {{old('num_acta')}} " size="3" required>-2018</span></strong></p>
<p style="text-align: justify; padding-right: 30px; padding-left: 30px;">
	<span style="font-family: 'Calibri';">En la ciudad de Guatemala, siendo las 
		<input type="text" name="hora_letra" value="{{old('hora_letra')}}" size="5" required > horas con 
		<input type="text" name="min_letra" value="{{old('min_letra')}}" size="10" required> minutos (
		<input type="text" name="hora_min" value="{{old('hora_min')}}" size="4" required>) del d&iacute;a 
		<input type="text" name="fecha_toda" value="{{old('fecha_toda')}}" size="25" placeholder="tres (03) de septiembre (09)" required > 
			de dos mil diez y ocho (2018), reunidos en las instalaciones de la Direcci&oacute;n General de Gesti&oacute;n de Calidad Educativa -DIGECADE- del Ministerio de Educaci&oacute;n, ubicada en la sexta (6&ordf;) calle uno gui&oacute;n ochenta y siete (1-87) de la zona diez (10), edificio dos (2), tercer nivel, ala norte, las siguientes personas: M.A. Ana Mar&iacute;a Hern&aacute;ndez Ayala, Directora de DIGECADE; 
		<input type="text" name="direc_dep" value="{{old('direc_dep')}}" size="20" required> 
			Director(a) Departamental de Guatemala Norte; Licenciado Hugo Ronaldo Reyes Hern&aacute;ndez, Subdirector de Innovaci&oacute;n educativa de la DIGECADE. <strong><u>PRIMERO</u></strong>: Se suscribe la presente Acta de <strong>ENTREGA-RECEPCI&Oacute;N</strong>, para hacer constar la entrega a la Departamental 

<select name="cod_depto2" id="cod_depto2" required>
	<option value="{{old('cod_depto2')}}">Seleccionar Departamento</option>
@if ($departamentos != null)
@foreach($departamentos as $item)
    <option value="{{$item->cod_Depto}}">{{$item->Desc_Deptos}}</option>
@endforeach
@endif
</select>

<select name="cod_fase_pdf" id="cod_fase_pdf" required>
	<option value="{{old('cod_fase_pdf')}}">Seleccionar Fase</option>
</select>
    , de 
    <input type="text" name="num_lab" value=" {{old('num_lab')}} " size="3" required > Laboratorios conformados por: 

<strong>

	<label name="cant_edu" id="cant_edu"></label> Computadoras port&aacute;tiles (NETBOOK EDUCATIVA) marca 
	<label name="marca_edu" id="marca_edu"></label>, modelo 
	<label name="model_edu" id="model_edu"></label>,
	
	<label name="cant_doce" id="cant_doc"></label> Computadores port&aacute;tiles (Laptop para docentes) Marca 
	<label name="marca_doce" id="marca_doc"></label>, modelo 
	<label name="model_doce" id="model_doc"></label>, 
	
	<label name="cant_servi" id="cant_ser"></label> Servidores (servidor de contenido) Marca 
	<label name="marca_servi" id="marca_ser"></label>, modelo 
	<label name="model_servi" id="model_ser"></label>, y 
	
	<label name="cant_rou" id="cant_rou"></label> Routers (enrutador inal&aacute;mbrico) marca 
	<label name="marca_rou" id="marca_rou"></label>, modelo 
	<label name="model_rou" id="model_rou"></label>, haciendo un total de 
	
	<label name="total_equi" id="total_equi"></label> equipos.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

</strong></span></p>
<p style="text-align: justify; padding-right: 30px; padding-left: 30px;"><span style="font-family: 'Calibri';"><strong><u>SEGUNDO:</u></strong> Los n&uacute;meros de serie que ser&aacute;n entregados se describen a continuaci&oacute;n:</span></p>
<p style="text-align: justify; padding-right: 30px; padding-left: 30px;">&nbsp;</p>

<p style="text-align: justify; padding-right: 30px; padding-left: 30px;"><span style="font-family: 'Calibri';">
	<strong>
		<label name="cant_edu2" id="cant_edu2"></label> Computadoras port&aacute;tiles (NETBOOK EDUCATIVA):</strong></span></p>


<table style="width: 100%; border-collapse: collapse; text-align: center;" border="0" name="t_edu" id="t_edu">
<tbody>
<tr>
<td>
<p ><strong>xxxxxxxxxxxx</strong></p>
</td>
<td>
<p ><strong>xxxxxxxxxxxx</strong></p>
</td>
<td>
<p ><strong>xxxxxxxxxxxx</strong></p>
</td>
</tr>
</tbody>
</table>


<p style="text-align: justify; padding-right: 30px; padding-left: 30px;">&nbsp;</p>
<p style="padding-left: 30px;"><strong>
	<label name="cant_doc2" id="cant_doc2"></label> Computadores port&aacute;tiles (Laptop para docentes): </strong></p>


<table style="width: 100%; border-collapse: collapse; text-align: center;" border="0" name="t_doc" id="t_doc">
<tbody>
<tr>
<td>
<p ><strong>xxxxxxxxxxxx</strong></p>
</td>
<td>
<p ><strong>xxxxxxxxxxxx</strong></p>
</td>
<td>
<p ><strong>xxxxxxxxxxxx</strong></p>
</td>
</tr>
</tbody>
</table>



<p style="text-align: justify; padding-right: 30px; padding-left: 30px;">&nbsp;</p>
<p style="padding-left: 30px;"><strong>
	<label name="cant_ser2" id="cant_ser2"></label> Servidores (servidor de contenido):</strong></p>
<table style="width: 100%; border-collapse: collapse; text-align: center;" border="0" name="t_ser" id="t_ser">
<tbody>
<tr>
<td>
<p ><strong>xxxxxxxxxxxx</strong></p>
</td>
<td>
<p ><strong>xxxxxxxxxxxx</strong></p>
</td>
<td>
<p ><strong>xxxxxxxxxxxx</strong></p>
</td>
</tr>
</tbody>
</table>

<p style="text-align: justify; padding-right: 30px; padding-left: 30px;">&nbsp;</p>
<p style="text-align: justify; padding-right: 30px; padding-left: 30px;"><strong><label name="cant_rou2" id="cant_rou2"></label> Routers (enrutador inal&aacute;mbrico):</strong></p>
<table style="width: 100%; border-collapse: collapse;" border="0">
<table style="width: 100%; border-collapse: collapse; text-align: center;" border="0" name="t_rou" id="t_rou">
<tbody>
<tr>
<td>
<p ><strong>xxxxxxxxxxxx</strong></p>
</td>
<td>
<p ><strong>xxxxxxxxxxxx</strong></p>
</td>
<td>
<p ><strong>xxxxxxxxxxxx</strong></p>
</td>
</tr>
</tbody>
</table>


<p style="text-align: justify; padding-right: 30px; padding-left: 30px;">&nbsp;</p>
<p style="text-align: justify; padding-left: 30px; padding-right: 30px;"><strong><u>TERCERO:</u></strong> El equipo entregado est&aacute; destinado para que puedan ser utilizados por 
	<textarea rows="2" cols="80" name="tercero_par" required>{{old('tercero_par')}}</textarea>
		<strong><u>CUARTO:</u></strong> El equipo que recibe la Departamental de Guatemala Norte es en calidad de donaci&oacute;n de acuerdo al 
	<textarea rows="2" cols="80" name="cuarto_par" required>{{old('cuarto_par')}}</textarea> 
		y el Ministerio de Educaci&oacute;n de la Rep&uacute;blica de Guatemala. <strong><u>QUINTO:</u> </strong>
	<input type="text" name="quinto_valor" value=" {{old('quinto_valor')}} " size="20" required> , Director
	<input type="text" name="parA" value=" {{old('parA')}} " size="1"> 
		Departamental de Guatemala Norte, ser&aacute; la persona responsable de realizar los tr&aacute;mites para el registro de ingreso a inventario ante la Direcci&oacute;n Departamental de Educaci&oacute;n de Guatemala Norte, de acuerdo al 
	<input type="text" name="reg_dona" value=" {{old('reg_dona')}} " size="20" required>. 
		<strong><u>SEXTO:</u></strong> Se da por finalizada la presente acta y la entrega y recepci&oacute;n del equipo antes mencionado en el mismo lugar y fecha a las 
	<input type="text" name="hora2_letra" value=" {{old('hora2_letra')}} " size="5" required > horas con 
	<input type="text" name="min2_letra" value=" {{old('min2_letra')}} " size="4" required > minutos (
	<input type="text" name="hora_min_2" value=" {{old('hora_min_2')}} " size="4" required >). 
		Le&iacute;da &iacute;ntegramente la presente y enterados de su contenido firmamos, aceptamos y ratificamos.</p>
<p style="text-align: justify; padding-left: 30px; padding-right: 30px;">&nbsp;</p>

<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<table border="0" style="width: 100%; border-collapse: collapse; margin-left: auto; margin-right: auto;">
<tbody>
<tr>
<td style="width: 50%; text-align: center; line-height: 50%;"><input type="text" name="encargado_inv" value=" {{old('encargado_inv')}} " size="40" required ></td>
<td style="width: 52.2913%; text-align: center;"><input type="text" name="direc_depto" value=" {{old('direc_depto')}} " size="40" required ></td>
</tr>
<tr>
<td style="width: 50%; text-align: center;">Encargado de Inventarios</td>
<td style="width: 52.2913%; text-align: center;">Directora Departamental de Guatemala Norte</td>
</tr>
</tbody>
</table>

<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<table border="0" style="width: 100%; border-collapse: collapse; margin-left: auto; margin-right: auto;">
<tbody>
<tr>
<td style="width: 50%; text-align: center; line-height: 50%;">Lic. Hugo Ronaldo Reyes Hern&aacute;ndez</td>
<td style="width: 52.2913%; text-align: center;">M.A. Ana Mar&iacute;a Hern&aacute;ndez Ayala</td>
</tr>
<tr>
<td style="width: 50%; text-align: center;">Subdirector de Innovaci&oacute;n Educativa</td>
<td style="width: 52.2913%; text-align: center;">Directora de DIGECADE</td>
</tr>
<tr>
<td style="width: 50%; text-align: center;">-DIGECADE-</td>
<td style="width: 52.2913%; text-align: center;"></td>
</tr>
</tbody>
</table>

<p>&nbsp;</p>
<p>&nbsp;</p>
<div  style="width: 100%; text-align: center;">
	<button style="width: 30%; text-align: center;" class="btn btn-primary" type="submit">Generar PDF</button>
	<button style="width: 30%; text-align: center;"class="btn btn-danger" type="reset">Cancelar</button>
</div>

{!! Form::close() !!}




@endsection
