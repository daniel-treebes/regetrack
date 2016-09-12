<script type="text/javascript" src="libs/jsqrcode-master/src/llqrcode.js"></script>
<script type="text/javascript" src="libs/jsqrcode-master/src/webqr.js"></script>

<div id="mainbody">
	<a id="webcamimg" align="left" /></a>
	<a id="qrimg" align="right"/></a>
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
</script>