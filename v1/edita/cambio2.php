
								<script type="text/javascript" src="libs/jsqrcode-master/src/llqrcode.js"></script>
								<script type="text/javascript" src="libs/jsqrcode-master/src/webqr.js"></script>

							
                               <div id="mainbody">
									<a id="webcamimg"  align="left" /></a>
									<a id="qrimg"   align="right"/></a>
									<div id="outdiv"></div>
									<div id="result"></div>
									<canvas id="qr-canvas" width="80" height="60"></canvas>  
							    </div>
<style>
	video#v {
    width: 100%;
}
#qr-canvas{
    display:none;
}
</style>
 <script type="text/javascript">
load();
window.onload = function() {
  setwebcam();
};
 
 var secuenciaDePasos=0;
 
 function dameModulo(cadena) {
	var pos;
	var pos2;
	pos=cadena.indexOf("&");
	pos2=cadena.indexOf("edita/");
	return cadena.substring(pos2+6, pos);
 }
 
 function dameId(cadena) {
	var pos;
	pos=cadena.indexOf("&amp;id=");
	return cadena.substring(pos+8, cadena.length );
 }
 
 
 
</script>