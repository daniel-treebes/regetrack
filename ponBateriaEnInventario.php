<?php
require_once("models/config.php");
if (!securePage($_SERVER['PHP_SELF']))
{
	echo "ERROR";
	die();
}
$error='';

if (isset($_GET['nuevoestado'])) $_POST['nuevoestado']=$_GET['nuevoestado'];
if (isset($_GET['modulonombre'])) $_POST['modulonombre']=$_GET['modulonombre'];
if (isset($_GET['moduloid'])) $_POST['moduloid']=$_GET['moduloid'];
if (isset($_GET['bateria'])) $_POST['bateria']=$_GET['bateria'];

$estado=$_POST['nuevoestado'];
$modulo=$_POST['modulonombre'];
$moduloid=$_POST['moduloid'];
$bt=$_POST['bateria'];


$query="SELECT num_serie FROM baterias WHERE id=".$bt;
$resm=$mysqli->query($query);
$btnombre='';
if (count($resm)>0){
    $dcar=$resm->fetch_array();
    $btnombre=$dcar['num_serie'];
}

$cgnuevonombre='';

if ($modulo=='cargadores'){
    $query="SELECT nombre FROM cargadores WHERE id=".$moduloid;
    $resm=$mysqli->query($query);
    if (count($resm)>0){
        $dcar=$resm->fetch_array();
        $cgnuevonombre=$dcar['nombre'];
    }
}
$mcnuevonombre='';

if ($modulo=='montacargas'){
    $query="SELECT nombre FROM montacargas WHERE id=".$moduloid;
    $resm=$mysqli->query($query);
    if (count($resm)>0){
        $dcar=$resm->fetch_array();
        $mcnuevonombre=$dcar['nombre'];
    }
}
//Primero verifica si la batería está en cargador
$query="
    SELECT u.id as id,
        cg.id as cgid,
        cg.nombre as cgnombre,
        u.fecha_entrada,
        u.fecha_carga,
        u.fecha_descanso
    FROM uso_baterias_bodega as u, bodegas as bg, cargadores as cg
    WHERE u.bt=".$bt."
        AND u.fecha_salida='0000-00-00 00:00:00'
        AND u.bt = bg.id
        AND bg.cg = cg.id
    ORDER BY id DESC
    LIMIT 1
";
$resp=$mysqli->query($query);
$movbgid=0;
$cgviejoid=0;
$cgnombre='';
if (count($resp)>0){
    $linea=$resp->fetch_array();
    $movbgid=$linea['id'];
    $cgviejoid=$linea['cgid'];
    $cgnombre=$linea['cgnombre'];
    $fe=$linea['fecha_entrada'];
    $fc=$linea['fecha_carga'];
    $fd=$linea['fecha_descanso'];
}

//Ahora verifica si esta en montacargas
$query="
    SELECT u.id as id, mc.id as mcid, mc.nombre as mcnombre
    FROM uso_baterias_montacargas as u, montacargas as mc
    WHERE u.bt=".$bt."
        AND u.fecha_salida='0000-00-00 00:00:00'
        AND u.bt = mc.id
    ORDER BY id DESC
    LIMIT 1
";
$resp=$mysqli->query($query);
$movmcid=0;
$mcviejoid=0;
$mcnombre='';
if (count($resp)>0){
    $linea=$resp->fetch_array();
    $movmcid=$linea['id'];
    $mcviejoid=$linea['mcid'];
    $mcnombre=$linea['mcnombre'];
}

//echo " ModuloID: ".$moduloid.'<br>';
//echo " BateriaID: ".$bt.'<br>';
//echo " cgviejoid: ".$cgviejoid.'<br>';
//echo " mcviejoid: ".$mcviejoid.'<br>';

if ($modulo=="cargadores"){
    //verifica si es el mismo

    if ($moduloid==$cgviejoid){
//echo "IGUALES<br>";
        //si es el mismo la misma linea la pone en el estado y ya
        if ($estado=="ESPERA"){
            $query="
                UPDATE uso_baterias_bodega
                SET fecha_entrada=now(),
                    fecha_carga='0000-00-00 00:00:00',
                    fecha_descanso='0000-00-00 00:00:00',
                    fecha_salida='0000-00-00 00:00:00',
                    usuario_entrada=".$loggedInUser->user_id.",
                    usuario_carga='',
                    usuario_descanso='',
                    usuario_salida=''
                WHERE id=".$movbgid;
//echo $query.'<br>';	
            $mysqli->query($query);
        }
		
        if ($estado=="CARGA"){
            if ($fe!='0000-00-00 00:00:00'){
                $nfe="'".$fe."'";
                $nue="";
            }else{
                $nfe='now()';
                $nue="usuario_entrada=".$loggedInUser->user_id.",";
            }
            $query="
                UPDATE uso_baterias_bodega
                SET fecha_entrada=".$nfe.",
                    fecha_carga=now(),
                    fecha_descanso='0000-00-00 00:00:00',
                    fecha_salida='0000-00-00 00:00:00',
                   ".$nue."
                    usuario_carga=".$loggedInUser->user_id.",
                    usuario_descanso='',
                    usuario_salida=''
                WHERE id=".$movbgid;
//echo $query.'<br>';	
            $mysqli->query($query);
        }
        if ($estado=="DESCANSO"){
            if ($fe!='0000-00-00 00:00:00'){
                $nfe="'".$fe."'";
                $nue="";
            }else{
                $nfe='now()';
                $nue="usuario_entrada=".$loggedInUser->user_id.",";
            }
            if ($fc!='0000-00-00 00:00:00'){
                $nfc="'".$fc."'";
                $nuc="";
            }else{
                $nfc='now()';
                $nuc="usuario_carga=".$loggedInUser->user_id.",";
            }
            $query="
                UPDATE uso_baterias_bodega
                SET fecha_entrada=".$nfe.",
                    fecha_carga=".$nfc.",
                    fecha_descanso=now(),
                    fecha_salida='0000-00-00 00:00:00',
                   ".$nue."
                   ".$nuc."
                    usuario_descanso=".$loggedInUser->user_id.",
                    usuario_salida=''
                WHERE id=".$movbgid;
//echo $query.'<br>';	
            $mysqli->query($query);
        }
        $query="INSERT INTO deshabilitabt(bt,motivo,fecha_entrada,fecha_salida,usuario_entrada,usuario_salida)
            VALUES(
                ".$bt.",
                'BATERIA FORZADA EN INVENTARIO AL CARGADOR: ".$cgnuevonombre."',
                now(),
                now(),
                ".$loggedInUser->user_id.",
                ".$loggedInUser->user_id."                    
            )";
//echo $query.'<br>';	
        $mysqli->query($query);
        
    }
	
    if ($moduloid!=$cgviejoid && $cgviejoid>0){
//echo "DIFERENTE en CG<br>";

		//Si no es el anterior pero cambio de cargador
        //quita el anterior y agrega alerta   
        if ($fe!='0000-00-00 00:00:00'){
            $nfe="'".$fe."'";
            $nue="";
        }else{
            $nfe='now()';
            $nue="usuario_entrada=".$loggedInUser->user_id.",";
        }
        if ($fc!='0000-00-00 00:00:00'){
            $nfc="'".$fc."'";
            $nuc="";
        }else{
            $nfc='now()';
            $nuc="usuario_carga=".$loggedInUser->user_id.",";
        }
        if ($fd!='0000-00-00 00:00:00'){
            $nfd="'".$fd."'";
            $nud="";
        }else{
            $nfd='now()';
            $nud="usuario_descanso=".$loggedInUser->user_id.",";
        }
        $query="
            UPDATE uso_baterias_bodega
            SET fecha_entrada=".$nfe.",
                fecha_carga=".$nfc.",
                fecha_descanso=".$nfd.",
                fecha_salida=now(),
               ".$nue."
               ".$nuc."
               ".$nud."
                usuario_salida=".$loggedInUser->user_id."
            WHERE id=".$movbgid;
//echo $query.'<br>';		
        $mysqli->query($query);
        
        $query="INSERT INTO deshabilitacg(cg,motivo,fecha_entrada,fecha_salida,usuario_entrada,usuario_salida)
            VALUES(
                ".$cgviejoid.",
                'BATERIA QUITADA FORZADA EN INVENTARIO: ".$btnombre."',
                now(),
                now(),
                ".$loggedInUser->user_id.",
                ".$loggedInUser->user_id."                    
            )";
//echo $query.'<br>';		
        $mysqli->query($query);

    }
    
    if ($mcviejoid>0){
//echo "DIFERENTE en MC<br>";
       //Si estaba por elguna razón vivo en montacargas, lo quita de ahí
        $query="
            UPDATE uso_baterias_montacargas
            SET fecha_salida=now(),
                usuario_salida=".$loggedInUser->user_id."
            WHERE id=".$mcviejoid;
//echo $query.'<br>';	
        $mysqli->query($query);
        
        $query="INSERT INTO deshabilitamc(mc,motivo,fecha_entrada,fecha_salida,usuario_entrada,usuario_salida)
            VALUES(
                ".$mcviejoid.",
                'BATERIA QUITADA FORZADA EN INVENTARIO: ".$btnombre."',
                now(),
                now(),
                ".$loggedInUser->user_id.",
                ".$loggedInUser->user_id."                    
            )";
//echo $query.'<br>';	
        $mysqli->query($query);

    }
    
    if ($moduloid!=$cgviejoid){
//echo "DIFERENTE<br>";
        // Si es diferente id verifica si tiene espacios libres tiene el nuevo cg
        $query="
            SELECT id
            FROM bodegas
            WHERE cg=".$moduloid."
                AND id NOT IN(
                    SELECT bg
                    FROM uso_baterias_bodega
                    WHERE fecha_salida='0000-00-00 00:00:00'
                    GROUP BY bg
                )
            GROUP BY id
            LIMIT 1
        ";
        $res=$mysqli->query($query);

        if (!(count($res)>0)){
            //Si NO hay espacios libres Quita todas las pilas y comenta el error
            $error.=$cgnuevonombre;
            $query="
                UPDATE uso_baterias_bodega as b
                SET fecha_carga = IF(fecha_carga!='0000-00-00 00:00:00',fecha_carga,now()),
                    fecha_descanso = IF(fecha_descanso!='0000-00-00 00:00:00',fecha_descanso,now()),
                    fecha_salida = now(),
                    usuario_carga = IF(usuario_carga IS NULL OR usuario_carga='',".$loggedInUser->user_id.",usuario_carga),
                    usuario_descanso = IF(usuario_descanso IS NULL OR usuario_descanso='',".$loggedInUser->user_id.",usuario_descanso),
                    usuario_salida = ".$loggedInUser->user_id."
                WHERE fecha_salida='0000-00-00 00:00:00'
                    AND bg IN (SELECT id FROM bodegas WHERE cg=".$moduloid." GROUP BY id)
            ";
//echo $query.'<br>';	
            $mysqli->query($query);

            $query="INSERT INTO deshabilitacg(cg,motivo,fecha_entrada,fecha_salida,usuario_entrada,usuario_salida)
                VALUES(
                    ".$moduloid.",
                    'VACIADO DE BATERIAS POR INVENTARIO FORZADO Y CARGADOR LLENO POR BATERIA: ".$btnombre."',
                    now(),
                    now(),
                    ".$loggedInUser->user_id.",
                    ".$loggedInUser->user_id."                    
                )";
//echo $query.'<br>';	
            $mysqli->query($query);
        }
        //Ahora Agrega una linea en el primer espacio vacío del cargador
        $query="
            SELECT id
            FROM bodegas
            WHERE cg=".$moduloid."
                AND id NOT IN(
                    SELECT bg
                    FROM uso_baterias_bodega
                    WHERE fecha_salida='0000-00-00 00:00:00'
                    GROUP BY bg
                )
            GROUP BY id
            LIMIT 1
        ";
        $res=$mysqli->query($query);
        $linea=$res->fetch_array();
        $bglibre=$linea['id'];
        
        if ($estado=="ESPERA"){
            $nfe='now()';
            $nue="usuario_entrada=".$loggedInUser->user_id.",";
            $nfc="'0000-00-00 00:00:00'";
            $nuc="";
            $nfd="'0000-00-00 00:00:00'";
            $nud="";
            $nfs="'0000-00-00 00:00:00'";
            $nus="";
        }
        if ($estado=="CARGA"){
            $nfe='now()';
            $nue="usuario_entrada=".$loggedInUser->user_id.",";
            $nfc='now()';
            $nuc="usuario_carga=".$loggedInUser->user_id.",";
            $nfd="'0000-00-00 00:00:00'";
            $nud="";
            $nfs="'0000-00-00 00:00:00'";
            $nus="";
        }
        if ($estado=="DESCANSO"){
            $nfe='now()';
            $nue="usuario_entrada=".$loggedInUser->user_id.",";
            $nfc='now()';
            $nuc="usuario_carga=".$loggedInUser->user_id.",";
            $nfd='now()';
            $nud="usuario_descanso=".$loggedInUser->user_id.",";
            $nfs="'0000-00-00 00:00:00'";
            $nus="";
        }
        
        $query="
         INSERT INTO uso_baterias_bodega
            SET fecha_entrada=".$nfe.",
                fecha_carga=".$nfc.",
                fecha_descanso=".$nfd.",
                fecha_salida=".$nfs.",
               ".$nue."
               ".$nuc."
               ".$nud."
               ".$nus."
               bt=".$bt.",
               bg=".$bglibre."
        ";
//echo $query.'<br>';	
        $mysqli->query($query);
        $query="INSERT INTO deshabilitabt(bt,motivo,fecha_entrada,fecha_salida,usuario_entrada,usuario_salida)
            VALUES(
                ".$bt.",
                'BATERIA FORZADA EN INVENTARIO AL CARGADOR ".$cgnuevonombre." Y ESTADO ".$estado."',
                now(),
                now(),
                ".$loggedInUser->user_id.",
                ".$loggedInUser->user_id."                    
            )";
//echo $query.'<br>';	
        $mysqli->query($query);

    }

}elseif ($modulo=="montacargas"){
	// SI ES MODULO MONTACARGAS
    if ($moduloid==$mcviejoid){
//echo 'M IGUAL<br>';	
        //SI ES EL MISMO SOLO CAMBIA la fecha de entrada
        $query="
            UPDATE uso_baterias_montacargas
            SET fecha_entrada=now(),
                fecha_salida='0000-00-00 00:00:00'
            WHERE id=".$mcviejoid;
//echo $query.'<br>';	
        $mysqli->query($query);
        $query="INSERT INTO deshabilitabt(bt,motivo,fecha_entrada,fecha_salida,usuario_entrada,usuario_salida)
            VALUES(
                ".$bt.",
                'BATERIA FORZADA EN INVENTARIO AL MONTACARGAS ".$mcnuevonombre."',
                now(),
                now(),
                ".$loggedInUser->user_id.",
                ".$loggedInUser->user_id."                    
            )";
//echo $query.'<br>';	
        $mysqli->query($query);
            
    }
    if ($moduloid!=$mcviejoid && $mcviejoid>0){
//echo 'M DIFERENTE en MC<br>';	
        //SI ES OTRO lo quita del anterior y agrega alerta
        $query="
            UPDATE uso_baterias_montacargas
            SET fecha_salida=now(),
                usuario_salida=".$loggedInUser->user_id."
            WHERE id=".$mcviejoid;
//echo $query.'<br>';	
        $mysqli->query($query);
        
        $query="INSERT INTO deshabilitamc(mc,motivo,fecha_entrada,fecha_salida,usuario_entrada,usuario_salida)
            VALUES(
                ".$mcviejoid.",
                'BATERIA QUITADA FORZADA EN INVENTARIO: ".$btnombre."',
                now(),
                now(),
                ".$loggedInUser->user_id.",
                ".$loggedInUser->user_id."                    
            )";
//echo $query.'<br>';	
        $mysqli->query($query);
    }
    
    if ($cgviejoid>0){
//echo 'M DIFERENTE en CG<br>';	
        //Si estaba en cargador lo quita
         if ($fe!='0000-00-00 00:00:00'){
            $nfe="'".$fe."'";
            $nue="";
        }else{
            $nfe='now()';
            $nue="usuario_entrada=".$loggedInUser->user_id.",";
        }
        if ($fc!='0000-00-00 00:00:00'){
            $nfc="'".$fc."'";
            $nuc="";
        }else{
            $nfc='now()';
            $nuc="usuario_carga=".$loggedInUser->user_id.",";
        }
        if ($fd!='0000-00-00 00:00:00'){
            $nfd="'".$fd."'";
            $nud="";
        }else{
            $nfd='now()';
            $nud="usuario_descanso=".$loggedInUser->user_id.",";
        }
        $query="
            UPDATE uso_baterias_bodega
            SET fecha_entrada=".$nfe.",
                fecha_carga=".$nfc.",
                fecha_descanso=".$nfd.",
                fecha_salida=now(),
               ".$nue."
               ".$nuc."
               ".$nud."
                usuario_salida=".$loggedInUser->user_id."
            WHERE id=".$cgviejoid;
//echo $query.'<br>';	
        $mysqli->query($query);
        
        $query="INSERT INTO deshabilitacg(cg,motivo,fecha_entrada,fecha_salida,usuario_entrada,usuario_salida)
            VALUES(
                ".$cgviejoid.",
                'BATERIA QUITADA FORZADA EN INVENTARIO: ".$btnombre."',
                now(),
                now(),
                ".$loggedInUser->user_id.",
                ".$loggedInUser->user_id."                    
            )";
//echo $query.'<br>';	
        $mysqli->query($query);
       
    }
    
    if ($moduloid!=$mcviejoid){
//echo 'M DIFERENTE<br>';	
        //Agrega nueva linea y alerta bateria
        $query="
         INSERT INTO uso_baterias_montacargas
            SET fecha_entrada=now(),
               fecha_salida='0000-00-00 00:00:00',
               usuario_entrada='".$loggedInUser->user_id."',
               usuario_salida='',
               bt=".$bt.",
               mc=".$moduloid."
        ";
//echo $query.'<br>';	
        $mysqli->query($query);
        $query="INSERT INTO deshabilitabt(bt,motivo,fecha_entrada,fecha_salida,usuario_entrada,usuario_salida)
            VALUES(
                ".$bt.",
                'BATERIA FORZADA EN INVENTARIO AL MONTACARGAS ".$mcnuevonombre."',
                now(),
                now(),
                ".$loggedInUser->user_id.",
                ".$loggedInUser->user_id."                    
            )";
//echo $query.'<br>';	
        $mysqli->query($query);
    }

 }
$error=' ';
if ($cgnombre>0){
	$error.=$cgnombre.' ';
}
if ($mcnombre>0){
	$error.=$mcnombre.' ';
}
$error.='id='.$bt;
echo $error;
?>
