$('#cod_depto').change(function(event){
	$.get("/model/municipios2/" + event.target.value + "", function(response, cod_depto) {
		//console.log(response);
		$("#cod_mupio").empty();
		for(i=0; i<response.length; i++){
			//console.log("<option value='" + response[i].COD_MUPIO + "'>" + response[i].NOM_MUPIO + "" +"</option>");
			$("#cod_mupio").append("<option value='" + response[i].COD_MUPIO + "'>" + response[i].NOM_MUPIO + "" +"</option>");
		}
	});
});

$('#cod_depto2').change(function(event){
    console.log('hola mundo');
    $.get("/pdf/generarpdf/depto/" + event.target.value + "", function(response, cod_depto2) {
        console.log(response);
        $("#cod_fase_pdf").empty();
        $("#cod_fase_pdf").append("<option>Seleccione Fase</option>");
        for(i=0; i<response.length; i++){
            //console.log("<option value='" + response[i].Id_Fase + "'>" + response[i].Nombre + "" +"</option>");
            $("#cod_fase_pdf").append("<option value='" + response[i].Id_Fase + "'>" + response[i].Nombre + "" +"</option>");
        }
    });
});

$(window).load(function() {
    $(".loader").fadeOut("slow");
});


$('#cod_fase_pdf').change(function(event){
    console.log('Cambio info.');
    var total = 0;
    $.get("/pdf/generarpdf/all/" + event.target.value + "/" + $("#cod_depto2").val() + "", function(response, cod_fase_pdf) {
        //console.log("Educativas");
        
            //console.log(response.edu);
        //if(response.length > 0){
            //var edu_cant = response.edu.length; //cantidad que tiene
        total = total + response.edu.length;
        $("#t_edu").empty();
        $("#edu_hidde").empty();
        for(i = 0; i < response.edu.length; i++){
            var nuevafila= "<tr><td>" + 
            response.edu[i].series + "</td>";
            i++;
            if(i < response.edu.length){
                nuevafila= nuevafila + "<td>" + 
                response.edu[i].series + "</td>";
            }
            i++;
            if(i < response.edu.length){
                nuevafila= nuevafila + "<td>" + 
                response.edu[i].series + "</td>";
            }
            nuevafila= nuevafila + "</tr>" + 
            $('#t_edu').append(nuevafila);
            
        }
        //$('#edu_hidde').val(response.edu); //---------
        $("#cant_edu").text(response.edu.length);
        $("#cant_edu2").text(response.edu.length);
        if(response.edu.length > 0){
            $("#marca_edu").text(response.edu[0].Desc_Marca);
            $("#model_edu").text(response.edu[0].desc_equipo);
        }


        total = total + response.doc.length;
        $("#t_doc").empty();
        $("#doc_hidde").empty();
        for(i = 0; i < response.doc.length; i++){
            var nuevafila= "<tr><td>" + 
            response.doc[i].series + "</td>";
            i++;
            if(i < response.doc.length){
                nuevafila= nuevafila + "<td>" + 
                response.doc[i].series + "</td>";
            }
            i++;
            if(i < response.doc.length){
                nuevafila= nuevafila + "<td>" + 
                response.doc[i].series + "</td>";
            }
            nuevafila= nuevafila + "</tr>" + 
            $('#t_doc').append(nuevafila);
            //$('#doc_hidde').append(nuevafila);
        }
        $("#cant_doc").text(response.doc.length);
        $("#cant_doc2").text(response.doc.length);
        if(response.doc.length > 0){
            $("#marca_doc").text(response.doc[0].Desc_Marca);
            $("#model_doc").text(response.doc[0].desc_equipo);
        }

        total = total + response.ser.length;
        $("#t_ser").empty();
        //$("#doc_hidde").empty();
        for(i = 0; i < response.ser.length; i++){
            var nuevafila= "<tr><td>" + 
            response.ser[i].series + "</td>";
            i++;
            if(i < response.ser.length){
                nuevafila= nuevafila + "<td>" + 
                response.ser[i].series + "</td>";
            }
            i++;
            if(i < response.ser.length){
                nuevafila= nuevafila + "<td>" + 
                response.ser[i].series + "</td>";
            }
            nuevafila= nuevafila + "</tr>" + 
            $('#t_ser').append(nuevafila);
            //$('#ser_hidde').append(nuevafila);
        }
        $("#cant_ser").text(response.ser.length);
        $("#cant_ser2").text(response.ser.length);
        if(response.ser.length > 0){
            $("#marca_ser").text(response.ser[0].Desc_Marca);
            $("#model_ser").text(response.ser[0].desc_equipo);
        }

        total = total + response.rou.length;
        $("#t_rou").empty();
        //$("#doc_hidde").empty();
        for(i = 0; i < response.rou.length; i++){
            var nuevafila= "<tr><td>" + 
            response.rou[i].series + "</td>";
            i++;
            if(i < response.rou.length){
                nuevafila= nuevafila + "<td>" + 
                response.rou[i].series + "</td>";
            }
            i++;
            if(i < response.rou.length){
                nuevafila= nuevafila + "<td>" + 
                response.rou[i].series + "</td>";
            }
            nuevafila= nuevafila + "</tr>" + 
            $('#t_rou').append(nuevafila);
            //$('#ser_hidde').append(nuevafila);
        }
        $("#cant_rou").text(response.rou.length);
        $("#cant_rou2").text(response.rou.length);
        if(response.rou.length > 0){
            $("#marca_rou").text(response.rou[0].Desc_Marca);
            $("#model_rou").text(response.rou[0].desc_equipo);
        }

        //}
        $('#total_equi').text(total);
    });



/*

                $("#cod_mupio").append("<option value='" + response[i].COD_MUPIO + "'>" + response[i].NOM_MUPIO + "" +"</option>");
                edu_cant++;
                $("#cant_edu").text(response[0].edu.educativa + " hola mundo ");
                $("#marca_edu").text(response[0].edu.Desc_Marca);
                $("#model_edu").text(response[0].edu.desc_equipo);



    $.get("/pdf/generarpdf/doc/" + event.target.value + "", function(response, cod_fase_pdf) {
        console.log(response);
        if(response.length > 0){
            total = total + response[0].educativa;
            $("#cant_doce").text(response[0].educativa);
            $("#marca_doce").text(response[0].Desc_Marca);
            $("#model_doce").text(response[0].desc_equipo);
        }

    });
    $.get("/pdf/generarpdf/ser/" + event.target.value + "", function(response, cod_fase_pdf) {
        console.log(response);
        if(response.length > 0){
            total = total + response[0].educativa;
            $("#cant_ser").text(response[0].educativa);
            $("#marca_ser").text(response[0].Desc_Marca);
            $("#model_ser").text(response[0].desc_equipo);
        }

    });
    $.get("/pdf/generarpdf/rou/" + event.target.value + "", function(response, cod_fase_pdf) {
        console.log(response);
        if(response.length > 0){
            total = total + response[0].educativa;
            $("#cant_rou").text(response[0].educativa);
            $("#marca_rou").text(response[0].Desc_Marca);
            $("#model_rou").text(response[0].desc_equipo);
        }

        $('#total_equi').text(total);
    });
    */
});


$(document).ready(function(){
   $("#casasola").submit(function(evento){
      evento.preventDefault();
      var formData = new FormData();
      formData.append('_token',$('input[name="_token"]').val());//$('meta[name="csrf-token"]').attr('content'));
      formData.append('archivo',$('#archivo')[0].files[0]);
      $.ajax({
            url: '/carga/establecimiento/store',  
            type: 'POST',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,

            beforeSend: function(){
				$(".loader").fadeIn("slow");        
            },
            success: function(data){   
            	$(".loader").fadeOut("slow");
            	if(data.success == ""){
            		$("#medium").fadeIn();
            		$("#medium").append(data.medium);
            		//console.log(data.medium);
            	} 
                else if (data.success != "") {
            		$("#success").fadeIn();
            		$("#success").append(data.success);
            		//console.log(data.medium);
            	}        
                else{
                    $("#fail").fadeIn();
                    $("#fail").append(data.fail);
                }
            	//console.log(data);
            },
            //timeout: 100000,
            error: function(jqXHR, textStatus, errorThrown){
		    	console.log(JSON.stringify(jqXHR));
		        console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
		    }
        });
    });
});

$(document).ready(function(){
   $("#casasola2").submit(function(evento){ //$("#enlaceajax2").click(function(evento){
      evento.preventDefault();
      var formData = new FormData();
      formData.append('_token',$('input[name="_token"]').val());//$('meta[name="csrf-token"]').attr('content'));
      formData.append('archivo',$('#archivo')[0].files[0]);
      $.ajax({
            url: '/carga/dispositivos/store',  
            type: 'POST',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function(){
				$(".loader").fadeIn("slow");        
            },
            success: function(data){   
            	$(".loader").fadeOut("slow");
            	if(data.success == ""){
            		$("#medium").fadeIn();
            		$("#medium").append(data.medium);
            		//console.log(data.medium);
            	}
                else if (data.success != "") {
                    $("#success").fadeIn();
                    $("#success").append(data.success);
                    //console.log(data.medium);
                }        
                else{
                    $("#fail").fadeIn();
                    $("#fail").append(data.fail);
                }
            },
            //timeout: 100000,
            error: function(jqXHR, textStatus, errorThrown){
		    	console.log(JSON.stringify(jqXHR));
		        console.log("AJAX error: " + textStatus + ' : ' + errorThrown);
		    }
        });
    });
});

