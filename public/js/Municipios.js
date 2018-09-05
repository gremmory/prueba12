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


$(window).load(function() {
    $(".loader").fadeOut("slow");
});
