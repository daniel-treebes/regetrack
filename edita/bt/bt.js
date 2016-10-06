function cancelacambios() {
   ocultaPasos();
   ocultaPasosI();
   $('#indicadores1').show(1000);
   $('#indicadores2').show(1000);
   $('#indicadores3').show(1000);
   $('#indicadores4').show(1000);
   $('#indicadores5').show(1000);
   $('#scaneo').hide(1000);
   $('#divCargar').hide(1000);
   $('#divInventario').hide(1000);
}

function cambiaestado(nuevoestado) {
    $("#pasosI").attr('nuevoestado',nuevoestado);
    $('#contenedorScaner').show(1000);
    muestraPasosI(3);
    setwebcam();
}

$(document).ready(function(){
   $("#paso1").attrchange({
      trackValues: true, /* Default to false, if set to true the event object is 
                updated with old and new value.*/
      callback: function (event) {
      if (event.attributeName=="val") {
         muestraPasos(2);
      }
      //event               - event object
      //event.attributeName - Name of the attribute modified
      //event.oldValue      - Previous value of the modified attribute
      //event.newValue      - New value of the modified attribute
      //Triggered when the selected elements attribute is added/updated/removed
    }        
   });
   
   // Paso 3 si quitar bateria
   $("#paso2").attrchange({
      trackValues: true, /* Default to false, if set to true the event object is 
                updated with old and new value.*/
      callback: function (event) {
         if (event.attributeName=="val") {
            ocultaPasos();
            $('#scaneo').hide(1000);
            ponBateriaEnCarga();
         }
      }        
   });
   
   $("#paso1I").attrchange({
      trackValues: true, /* Default to false, if set to true the event object is 
                updated with old and new value.*/
      callback: function (event) {
         if (event.attributeName=="modulonombre") {
            modulonuevo=$("#paso1I").attr("modulonombre");
            if (modulonuevo=="cargadores") {
               $('#contenedorScaner').hide(1000);
               stype=0;
               muestraPasosI(2);
            }else if (modulonuevo=="montacargas") {
               muestraPasosI(3);
            }else{
               alert("Ha seleccionado un código tipo: "+modulonuevo+". Solo debe seleccinar Montacargas o Cargadores. Se cancelará la operación.");
               cancelacambios();
            }
         }
      }        
   });

   $("#paso3I").attrchange({
      trackValues: true, /* Default to false, if set to true the event object is 
                updated with old and new value.*/
      callback: function (event) {
         if (event.attributeName=="val") {
            $('#scaneo').hide(1000);
            ponBateriaEnInventario();
         }
      }
   });

});

function ocultaPasos() {
	$("#paso1").hide();
	$("#paso2").hide();
}

function ocultaPasosI() {
	$("#paso1I").hide();
	$("#paso2I").hide();
	$("#paso3I").hide();
}

function muestraPasos(cual) {
	ocultaPasos();
	$("#paso"+cual).show();
    ciclo=cual;

}

function muestraPasosI(cual) {
	ocultaPasosI();
	$("#paso"+cual+"I").show();
    ciclo=cual;
}

ocultaPasos();
ocultaPasosI();

function ponBateriaEnCarga(){
   movimiento=$("#pasos").attr('movimiento');
   bateria=$("#pasos").attr('bateria');
   espacio=$("#pasos").attr('espacio');
   tipomovimiento=$("#pasos").attr('tipomovimiento');

   $.ajax({
      data: {
          "movimiento" : movimiento,
          "bateria" : bateria,
          "espacio" : espacio,
          "tipomovimiento" : tipomovimiento
      },
      type: "POST",
      dataType: "html",
      url: "ponBateriaEnCarga.php",
   })
   .done(function( data, textStatus, jqXHR) {
//      alert( "Bateria en carga");
      window.location.replace("https://regetrack.com/sistema.php?ruta=edita/baterias&id="+data);
   })
   .fail(function( jqXHR, textStatus, errorThrown ) {
   alert(movimiento);
   alert(bateria);
   alert(espacio);
   alert(tipomovimiento);
      alert( "El registro a fallado: " +  textStatus + " Inicie nuevamente. ");
      window.location.replace("/escanear.php");
   });
}

function ponBateriaEnInventario(){
   nuevoestado=$("#pasosI").attr('nuevoestado');
   bateria=$("#pasosI").attr('bateria');
   modulonombre=$("#paso1I").attr('modulonombre');
   moduloid=$("#paso1I").attr('moduloid');

   $.ajax({
      data: {
          "nuevoestado" : nuevoestado,
          "bateria" : bateria,
          "modulonombre" : modulonombre,
          "moduloid" : moduloid
      },
      type: "POST",
      dataType: "html",
      url: "ponBateriaEnInventario.php",
   })
   .done(function( data, textStatus, jqXHR) {
//      alert('RECIBIDO: '+data);
      posl=data.indexOf(" id=");
      id=data.substr(posl+3);
      if (data.substr(0,4)==" id=") { 
         id=data.substr(4);
      }else if (data.substr(0,5)=="ERROR"){
         alert(data);
      }else if (posl>0){
         vaciado=data.substr(0,posl);
         alert( "El módulo(s) "+vaciado+" tenía(n) todos sus espacios con batería(s) por lo que ha(n) sido LIBERADO(S) TOTALMENTE. Favor de ubicar las baterías removidas.");
      }
      window.location.replace("https://regetrack.com/sistema.php?ruta=edita/baterias&id="+id);
   })
   .fail(function( jqXHR, textStatus, errorThrown ) {
      alert( "El registro de inventario a fallado: " +  jqXHR.responseText + ". Inicie nuevamente");
      window.location.replace("/escanear.php");
   });
}

function imprimeQr(tipo,id) {
   var stingurl="https://regetrack.com/libs/imprimeQR.php?tipo="+tipo+"&id="+id;
   //url="<img src='https://chart.googleapis.com/chart?chs=250x250&cht=qr&chl="+encodeURIComponent(data)+"'/>";
   window.open(stingurl,'_self');
}

function cargaBateria() {
   $('#indicadores1').hide(1000);
   $('#indicadores2').hide(1000);
   $('#indicadores3').hide(1000);
   $('#indicadores4').hide(1000);
   $('#indicadores5').hide(1000);
   $('#scaneo').show(1000);
   $('#divInventario').hide(1000);
   $('#divCargar').show(1000);

   muestraPasos(1);
   $.ajax({
	  url : "edita/cambio2.php",
	  type: "POST",
	  data : {},
	  success: function(data, textStatus, jqXHR)
	  {
		  jQuery("#contenedorScaner").html(data);
	  },
	  error: function (jqXHR, textStatus, errorThrown)
	  {
   
	  }
   });
}

function inventario() {
   $('#indicadores1').hide(1000);
   $('#indicadores2').hide(1000);
   $('#indicadores3').hide(1000);
   $('#indicadores4').hide(1000);
   $('#indicadores5').hide(1000);
   $('#scaneo').show(1000);
   $('#divInventario').show(1000);
   $('#divCargar').hide(1000);

   muestraPasosI(1);
   $.ajax({
	  url : "edita/cambio2.php",
	  type: "POST",
	  data : {},
	  success: function(data, textStatus, jqXHR)
	  {
		  jQuery("#contenedorScaner").html(data);
	  },
	  error: function (jqXHR, textStatus, errorThrown)
	  {
   
	  }
   });
}

function deshabilita(idmc) {
   $('#indicadores1').hide(1000);
   $('#indicadores2').hide(1000);
   $('#indicadores3').hide(1000);
   $('#indicadores4').hide(1000);
   $('#indicadores5').hide(1000);
   $('#deshabilita').show(1000);
}
   
function deshabilitaEnvia(idbt){
   $.ajax({
	  url : "deshabilitabt.php",
	  type: "POST",
	  data : {func:"des",idBT:idbt,motivo:$('#formaEnviaDeshabilita').val()},
	  success: function(data, textStatus, jqXHR)
	  {
		  location.reload();
	  },
	  error: function (jqXHR, textStatus, errorThrown)
	  {
         alert(textStatus);
	  }
   });
}
   
function habilitaEnvia(idbt) {
   $.ajax({
	  url : "deshabilitabt.php",
	  type: "POST",
	  data : {func:"hab",idBT:idbt,motivo:$('#formaEnviaDeshabilita').val()},
	  success: function(data, textStatus, jqXHR)
	  {
		  location.reload();
	  },
	  error: function (jqXHR, textStatus, errorThrown)
	  {
         alert(textStatus);
	  }
   });
}
   
$('#formaDeshabilita').change(function() {
   if ($('#formaDeshabilita').val()=="Otro") {
      $('#formaEnviaDeshabilitaContenedor').show();
      $('#formaEnviaDeshabilita').val("");
   }else{
      $('#formaEnviaDeshabilitaContenedor').hide();
      $('#formaEnviaDeshabilita').val($('#formaDeshabilita').val());
   }
});
$('#formaEnviaDeshabilitaContenedor').hide();

/*
A simple jQuery function that can add listeners on attribute change.
http://meetselva.github.io/attrchange/
About License:
Copyright (C) 2013-2014 Selvakumar Arumugam
You may use attrchange plugin under the terms of the MIT Licese.
https://github.com/meetselva/attrchange/blob/master/MIT-License.txt
 */
(function($) {
	function isDOMAttrModifiedSupported() {
		var p = document.createElement('p');
		var flag = false;

		if (p.addEventListener) {
			p.addEventListener('DOMAttrModified', function() {
				flag = true;
			}, false);
		} else if (p.attachEvent) {
			p.attachEvent('onDOMAttrModified', function() {
				flag = true;
			});
		} else { return false; }
		p.setAttribute('id', 'target');
		return flag;
	}

	function checkAttributes(chkAttr, e) {
		if (chkAttr) {
			var attributes = this.data('attr-old-value');

			if (e.attributeName.indexOf('style') >= 0) {
				if (!attributes['style'])
					attributes['style'] = {}; //initialize
				var keys = e.attributeName.split('.');
				e.attributeName = keys[0];
				e.oldValue = attributes['style'][keys[1]]; //old value
				e.newValue = keys[1] + ':'
						+ this.prop("style")[$.camelCase(keys[1])]; //new value
				attributes['style'][keys[1]] = e.newValue;
			} else {
				e.oldValue = attributes[e.attributeName];
				e.newValue = this.attr(e.attributeName);
				attributes[e.attributeName] = e.newValue;
			}

			this.data('attr-old-value', attributes); //update the old value object
		}
	}

	//initialize Mutation Observer
	var MutationObserver = window.MutationObserver
         || window.WebKitMutationObserver;

	$.fn.attrchange = function(a, b) {
		if (typeof a == 'object') {//core
			var cfg = {
				trackValues : false,
				callback : $.noop
			};
			//backward compatibility
			if (typeof a === "function") { cfg.callback = a; } else { $.extend(cfg, a); }

			if (cfg.trackValues) { //get attributes old value
				this.each(function(i, el) {
					var attributes = {};
					for ( var attr, i = 0, attrs = el. attributes, l = attrs.length; i < l; i++) {
                        attr = attrs.item(i);
						attributes[attr.nodeName] = attr.value;
					}
					$(this).data('attr-old-value', attributes);
				});
			}

			if (MutationObserver) { //Modern Browsers supporting MutationObserver
				var mOptions = {
					subtree : false,
					attributes : true,
					attributeOldValue : cfg.trackValues
				};
				var observer = new MutationObserver(function(mutations) {
					mutations.forEach(function(e) {
						var _this = e.target;
						//get new value if trackValues is true
						if (cfg.trackValues) {							
							e.newValue = $(_this).attr(e.attributeName);
						}						
						if ($(_this).data('attrchange-status') === 'connected') { //execute if connected
							cfg.callback.call(_this, e);
						}
					});
				});

				return this.data('attrchange-method', 'Mutation Observer').data('attrchange-status', 'connected')
						.data('attrchange-obs', observer).each(function() {
							observer.observe(this, mOptions);
						});
			} else if (isDOMAttrModifiedSupported()) { //Opera
				//Good old Mutation Events
				return this.data('attrchange-method', 'DOMAttrModified').data('attrchange-status', 'connected').on('DOMAttrModified', function(event) {
					if (event.originalEvent) { event = event.originalEvent; }//jQuery normalization is not required 
					event.attributeName = event.attrName; //property names to be consistent with MutationObserver
					event.oldValue = event.prevValue; //property names to be consistent with MutationObserver
					if ($(this).data('attrchange-status') === 'connected') { //disconnected logically
						cfg.callback.call(this, event);
					}
				});
			} else if ('onpropertychange' in document.body) { //works only in IE		
				return this.data('attrchange-method', 'propertychange').data('attrchange-status', 'connected').on('propertychange', function(e) {
					e.attributeName = window.event.propertyName;
					//to set the attr old value
					checkAttributes.call($(this), cfg.trackValues, e);
					if ($(this).data('attrchange-status') === 'connected') { //disconnected logically
						cfg.callback.call(this, e);
					}
				});
			}
			return this;
		} else if (typeof a == 'string' && $.fn.attrchange.hasOwnProperty('extensions') &&
				$.fn.attrchange['extensions'].hasOwnProperty(a)) { //extensions/options
			return $.fn.attrchange['extensions'][a].call(this, b);
		}
	}
})(jQuery);