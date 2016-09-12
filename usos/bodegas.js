function paso1(modulo,id) {
	
		$.ajax({
                data: {funcion: 'saleBateriaBodega', bodega: id, bateria: 1},
                url:   'usos/bodega.php',
                type:  'post',
                success:  function (response) {
                        $("#indicacionesPaso").html(response);
						$("#guiaPasos1").removeClass('active').addClass('done');
						$("#guiaPasos2").addClass('active')
						secuenciaDePasos++;
                }
        });
	
 }
 
 function paso2(modulo,id) {
	
	
	if (modulo=="baterias") {
		if (secuenciaDePasos==1) {
		
		$("#guiaPasos2").removeClass('active').addClass('done');
	    $("#guiaPasos3").addClass('active')
		secuenciaDePasos++;
		
	}
	}else{
	alert("Porfavor selecciona una bateria")
 }
 }
  function paso3(modulo,id) {
	
	
	if (modulo=="montacargas") {
		if (secuenciaDePasos==2) {
		$("#guiaPasos3").removeClass('active').addClass('done');
		$("#guiaPasos4").addClass('active')
		secuenciaDePasos++;
	}
	}else{
	alert("Porfavor selecciona un Montacargas")
	}
 }
  function paso4(modulo,id) {
	
	if (modulo=="bateria") {
		if (secuenciaDePasos==3) {
		alert("Porfavor selecciona una bateria")
		
		}
	}else{
	$("#guiaPasos4").removeClass('active').addClass('done');
	}
 }