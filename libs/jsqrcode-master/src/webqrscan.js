// QRCODE reader Copyright 2011 Lazar Laszlo
// http://www.webqr.com

var gCtx = null;
var gCanvas = null;
var c=0;
var stype=0;
var gUM=false;
var webkit=false;
var moz=false;
var v=null;

var imghtml='<div id="qrfile"><canvas id="out-canvas" width="320" height="240"></canvas>'+
    '<div id="imghelp">drag and drop a QRCode here'+
	'<br>or select a file'+
	'<input type="file" onchange="handleFiles(this.files)"/>'+
	'</div>'+
'</div>';

var vidhtml = '<video id="v" autoplay></video>';

function dragenter(e) {
  e.stopPropagation();
  e.preventDefault();
}

function dragover(e) {
  e.stopPropagation();
  e.preventDefault();
}
function drop(e) {
  e.stopPropagation();
  e.preventDefault();

  var dt = e.dataTransfer;
  var files = dt.files;
  if(files.length>0)
  {
	handleFiles(files);
  }
  else
  if(dt.getData('URL'))
  {
	qrcode.decode(dt.getData('URL'));
  }
}

function handleFiles(f)
{
	var o=[];
	
	for(var i =0;i<f.length;i++)
	{
        var reader = new FileReader();
        reader.onload = (function(theFile) {
        return function(e) {
            gCtx.clearRect(0, 0, gCanvas.width, gCanvas.height);

			qrcode.decode(e.target.result);
        };
        })(f[i]);
        reader.readAsDataURL(f[i]);	
    }
}

function initCanvas(w,h)
{
    gCanvas = document.getElementById("qr-canvas");
    gCanvas.style.width = w + "px";
    gCanvas.style.height = h + "px";
    gCanvas.width = w;
    gCanvas.height = h;
    gCtx = gCanvas.getContext("2d");
    gCtx.clearRect(0, 0, w, h);
}


function captureToCanvas() {
    if(stype!=1)
        return;
    if(gUM)
    {
        try{
            gCtx.drawImage(v,0,0);
            try{
                qrcode.decode();
            }
            catch(e){       
                //console.log(e);
                setTimeout(captureToCanvas, 500);
            };
        }
        catch(e){       
                //console.log(e);
                setTimeout(captureToCanvas, 500);
        };
    }
}

function htmlEntities(str) {
    return String(str).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
}
ciclo=1;
ultimo="";
pasoActual=0;
var html
function read(a)
{
  var data=htmlEntities(a);
  
 
  var stingurl="https://regetrack.com/sistema.php?ruta=edita/";
  
  var res = data.substring(0, stingurl.length);
 // alert(data);
  var cadena = data.substring(stingurl.length,data.length);
  veAModulo(dameModulo(data),dameId(data))
  
  
 /* if (res==stingurl) {
	if (ultimo==data) {
	}
	else{
	  
	  if(verificaPasoModulo(data)==true)
		{
		jQuery(elemento+" span").html(dameId(data))
		//html="<br><h1>"+ciclo+"</h1>";
		if(a.indexOf("http://") === 0 || a.indexOf("https://") === 0)
		//	html+="<a target='_blank' href='"+a+"'>"+a+"</a><br>";
		//html+="<b>"+data+"</b><br><br>";
		//document.getElementById("result").innerHTML=html;
		ultimo=data;
		ciclo++;
		pasoActual++;
		cambiaPaso(cadena,secuenciaDePasos);
		}
	  }
  }
	reinicia();*/
  
	//load();
}

function verificaPasoModulo( valor) {
 
  idrecibe=dameId(valor);
  if (modulo==dameModulo(valor)) {
	if (idrecibe==idproximo) {
		veAModulo();
		//jQuery(elemento).attr("val",idrecibe)
	return true;
	}else{
	  alert(modulo+" no corresponde al que deberia ingresar, porfavor verifique");
	  return false
	}
	
  }else{
	alert("El objeto recibido no fue un "+ modulo + ", fue un "+dameModulo(valor));
	return false;
  }
  
}

function mandaRespuesta(args) {
	//code
}



function reinicia()
{
	

    if(stype==1)
    {
        setTimeout(captureToCanvas, 500);    
        return;
    }
   
}


function isCanvasSupported(){
  var elem = document.createElement('canvas');
  return !!(elem.getContext && elem.getContext('2d'));
}
function success(stream) {
    v.src = window.URL.createObjectURL(stream);
    gUM=true;
    setTimeout(captureToCanvas, 500);
}
		
function error(error) {
    gUM=false;
    return;
}

function load()
{
	if(isCanvasSupported() && window.File && window.FileReader)
	{
		initCanvas(800, 600);
		qrcode.callback = read;
		document.getElementById("mainbody").style.display="inline";
        setwebcam();
	}
	else
	{
		document.getElementById("mainbody").style.display="inline";
		document.getElementById("mainbody").innerHTML='<p id="mp1">QR code scanner for HTML5 capable browsers</p><br>'+
        '<br><p id="mp2">sorry your browser is not supported</p><br><br>'+
        '<p id="mp1">try <a href="http://www.mozilla.com/firefox"><img src="firefox.png"/></a> or <a href="http://chrome.google.com"><img src="chrome_logo.gif"/></a> or <a href="http://www.opera.com"><img src="Opera-logo.png"/></a></p>';
	}
}

var maxcam=0;
gotDevices();
function gotDevices(deviceInfos) {
	var j;
  for (var i = 0; i !== deviceInfos.length; ++i) {
    var deviceInfo = deviceInfos[i];
		if (deviceInfo.kind === 'videoinput') {
			j=i;
    }
  }
	maxcam=j;
	//alert('cam:'+maxcam);
}

function setwebcam()
{

	document.getElementById("result").innerHTML="- Buscando -";
    if(stype==1)
    {
        setTimeout(captureToCanvas, 500);    
        return;
    }
		//MediaStreamTrack.getSources(gotSources);
    var n=navigator;
    document.getElementById("outdiv").innerHTML = vidhtml;
    v=document.getElementById("v");
		navigator.mediaDevices.enumerateDevices().then(gotDevices).catch(error);
    if(n.getUserMedia)
        n.getUserMedia({video: {deviceId: maxcam ? {exact: maxcam} : undefined}, audio: false}, success, error);
    else
    if(n.mediaDevices.getUserMedia)
        n.mediaDevices.getUserMedia({video: { facingMode: "environment"} , audio: false})
            .then(success)
            .catch(error);
    else
    if(n.webkitGetUserMedia)
    {
        webkit=true;
        n.webkitGetUserMedia({video:true, audio: false}, success, error);
    }
    else
    if(n.mozGetUserMedia)
    {
        moz=true;
        n.mozGetUserMedia({video: true, audio: false}, success, error);
    }

    //document.getElementById("qrimg").src="qrimg2.png";
    //document.getElementById("webcamimg").src="webcam.png";
    document.getElementById("qrimg").style.opacity=0.2;
    document.getElementById("webcamimg").style.opacity=1.0;

    stype=1;
    setTimeout(captureToCanvas, 500);
}
function setimg()
{
	document.getElementById("result").innerHTML="";
    if(stype==2)
        return;
    document.getElementById("outdiv").innerHTML = imghtml;
    //document.getElementById("qrimg").src="qrimg.png";
    //document.getElementById("webcamimg").src="webcam2.png";
    document.getElementById("qrimg").style.opacity=1.0;
    document.getElementById("webcamimg").style.opacity=0.2;
    var qrfile = document.getElementById("qrfile");
    qrfile.addEventListener("dragenter", dragenter, false);  
    qrfile.addEventListener("dragover", dragover, false);  
    qrfile.addEventListener("drop", drop, false);
    stype=2;
}



