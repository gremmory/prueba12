<!DOCTYPE html>
<html>
<head>
	<title>Acta</title>
</head>
<body>



<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p style="line-height: 0%;">&nbsp;</p>
<p style="line-height: 0%;">&nbsp;</p>
<p style="line-height: 20%;">&nbsp;</p>
<p style="line-height: 0%; text-align: justify; padding-right: 30px; padding-left: 30px;"><strong><span style="font-family: 'Calibri';">ACTA No. {{$num_acta}}-2018</span></strong></p>
<p style="text-align: justify; padding-right: 30px; padding-left: 30px;">
	<span style="font-family: 'Calibri';">En la ciudad de Guatemala, siendo las 
		{{$hora_letra}}  horas con 
		{{$min_letra}}  minutos (
		{{$hora_min}} ) del d&iacute;a 
		{{$fecha_toda}}  
			de dos mil diez y ocho (2018), reunidos en las instalaciones de la Direcci&oacute;n General de Gesti&oacute;n de Calidad Educativa -DIGECADE- del Ministerio de Educaci&oacute;n, ubicada en la sexta (6&ordf;) calle uno gui&oacute;n ochenta y siete (1-87) de la zona diez (10), edificio dos (2), tercer nivel, ala norte, las siguientes personas: M.A. Ana Mar&iacute;a Hern&aacute;ndez Ayala, Directora de DIGECADE; 
		{{$direc_dep}} 
			Director(a) Departamental de Guatemala Norte; Licenciado Hugo Ronaldo Reyes Hern&aacute;ndez, Subdirector de Innovaci&oacute;n educativa de la DIGECADE. <strong><u>PRIMERO</u></strong>: Se suscribe la presente Acta de <strong>ENTREGA-RECEPCI&Oacute;N</strong>, para hacer constar la entrega a la Departamental 

	{{$cod_depto2}}, de 
    {{$num_lab}} Laboratorios conformados por: 

<strong>

	{{$cant_edu}} Computadoras port&aacute;tiles (NETBOOK EDUCATIVA) marca 
	{{$marca_edu}}, modelo 
	{{$model_edu}},
	
	{{$cant_doce}} Computadores port&aacute;tiles (Laptop para docentes) Marca 
	{{$marca_doce}}, modelo 
	{{$model_doce}}, 
	
	{{$cant_servi}} Servidores (servidor de contenido) Marca 
	{{$marca_servi}}, modelo 
	{{$model_servi}}, y 
	
	{{$cant_rou}} Routers (enrutador inal&aacute;mbrico) marca 
	{{$marca_rou}}, modelo 
	{{$model_rou}}, haciendo un total de 
	
	{{$total_equi}} equipos.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

</strong></span></p>
<p style="text-align: justify; padding-right: 30px; padding-left: 30px;"><span style="font-family: 'Calibri';"><strong><u>SEGUNDO:</u></strong> Los n&uacute;meros de serie que ser&aacute;n entregados se describen a continuaci&oacute;n:</span></p>
<p style="text-align: justify; padding-right: 30px; padding-left: 30px;">&nbsp;</p>

<p style="text-align: justify; padding-right: 30px; padding-left: 30px;"><span style="font-family: 'Calibri';">
	<strong>
	{{$cant_edu2}}  Computadoras port&aacute;tiles (NETBOOK EDUCATIVA):</strong></span></p>


<table style="width: 100%; border-collapse: collapse; text-align: center;" border="0" name="t_edu" id="t_edu">
<tbody>
	@for($i = 0; $i < count($t_edu); $i++){
        <tr>
        	<td>{{$t_edu[$i]->series}}</td>"
            {{$i++}}
            @if($i < count($t_edu))
                <td>{{$t_edu[$i]->series}}</td>
            @endif
            {{$i++}}
            @if($i < count($t_edu))
                <td>{{$t_edu[$i]->series}}</td>
            @endif
		</tr>
	@endfor
</tbody> 
</table>


<p style="text-align: justify; padding-right: 30px; padding-left: 30px;">&nbsp;</p>
<p style="padding-left: 30px;"><strong>
	
	{{$cant_doc2}} Computadores port&aacute;tiles (Laptop para docentes): </strong></p>



<table style="width: 100%; border-collapse: collapse; text-align: center;" border="0" name="t_doc" id="t_doc">
<tbody>
	@for($i = 0; $i < count($t_doc); $i++){
        <tr>
        	<td>{{$t_doc[$i]->series}}</td>"
            {{$i++}}
            @if($i < count($t_doc))
                <td>{{$t_doc[$i]->series}}</td>
            @endif
            {{$i++}}
            @if($i < count($t_doc))
                <td>{{$t_doc[$i]->series}}</td>
            @endif
		</tr>
	@endfor
</tbody> 
</table>



<p style="text-align: justify; padding-right: 30px; padding-left: 30px;">&nbsp;</p>
<p style="padding-left: 30px;"><strong>
	{{$cant_ser2}} 
	 Servidores (servidor de contenido):</strong></p>


<table style="width: 100%; border-collapse: collapse; text-align: center;" border="0" name="t_ser" id="t_ser">
<tbody>
	@for($i = 0; $i < count($t_ser); $i++){
        <tr>
        	<td>{{$t_ser[$i]->series}}</td>"
            {{$i++}}
            @if($i < count($t_ser))
                <td>{{$t_ser[$i]->series}}</td>
            @endif
            {{$i++}}
            @if($i < count($t_ser))
                <td>{{$t_ser[$i]->series}}</td>
            @endif
		</tr>
	@endfor
</tbody> 
</table>

<p style="text-align: justify; padding-right: 30px; padding-left: 30px;">&nbsp;</p>
<p style="text-align: justify; padding-right: 30px; padding-left: 30px;"><strong>
	{{$cant_rou2}}  
		Routers (enrutador inal&aacute;mbrico):</strong></p>

<table style="width: 100%; border-collapse: collapse; text-align: center;" border="0" name="t_rou" id="t_rou">
<tbody>
	@for($i = 0; $i < count($t_rou); $i++){
        <tr>
        	<td>{{$t_rou[$i]->series}}</td>"
            {{$i++}}
            @if($i < count($t_rou))
                <td>{{$t_rou[$i]->series}}</td>
            @endif
            {{$i++}}
            @if($i < count($t_rou))
                <td>{{$t_rou[$i]->series}}</td>
            @endif
		</tr>
	@endfor
</tbody> 
</table>

<p style="text-align: justify; padding-right: 30px; padding-left: 30px;">&nbsp;</p>
<p style="text-align: justify; padding-left: 30px; padding-right: 30px;"><strong><u>TERCERO:</u></strong> El equipo entregado est&aacute; destinado para que puedan ser utilizados por {{$tercero_par}} <strong><u>CUARTO:</u></strong> El equipo que recibe la Departamental de Guatemala Norte es en calidad de donaci&oacute;n de acuerdo al {{$cuarto_par}} y el Ministerio de Educaci&oacute;n de la Rep&uacute;blica de Guatemala. <strong><u>QUINTO:</u> </strong> {{$quinto_valor}}, Director {{$parA}} Departamental de Guatemala Norte, ser&aacute; la persona responsable de realizar los tr&aacute;mites para el registro de ingreso a inventario ante la Direcci&oacute;n Departamental de Educaci&oacute;n de Guatemala Norte, de acuerdo al {{$reg_dona}}. <strong><u>SEXTO:</u></strong> Se da por finalizada la presente acta y la entrega y recepci&oacute;n del equipo antes mencionado en el mismo lugar y fecha a las {{$hora2_letra}} horas con {{$min2_letra}} minutos ({{$hora_min_2}}). Le&iacute;da &iacute;ntegramente la presente y enterados de su contenido firmamos, aceptamos y ratificamos.</p>
<p style="text-align: justify; padding-left: 30px; padding-right: 30px;">&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<table border="0" style="width: 100%; border-collapse: collapse; margin-left: auto; margin-right: auto;">
<tbody>
<tr>
<td style="width: 50%; text-align: center; line-height: 50%;">{{$encargado_inv}}</td>
<td style="width: 52.2913%; text-align: center;">{{$direc_depto}}</td>
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


</body>
</html>
