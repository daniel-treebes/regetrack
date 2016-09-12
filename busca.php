<?php
//print_r($_GET);
 $ob = new RecursiveIteratorIterator(new RecursiveDirectoryIterator('./'), RecursiveIteratorIterator::SELF_FIRST);
 $directorios=array();
 $directorios[]='./';
 foreach($ob as $name => $object){
     if (is_dir($name)) {
     		if (substr($name, -1)!='.') $directorios[]=$name;
     }
 }

echo '<html>';
	echo '<body>';
		echo 'BUSCAR (treebes.com)<br>';
		echo '<form  action="busca.php" method="get">';
			echo 'Directorio: <select name="dir" id="dir">';
			foreach ($directorios as $directorio){
				echo '<option value="'.$directorio.'" ';
				if (isset($_GET['dir'])){
					if ($_GET['dir']==$directorio){
						echo 'selected="selected"';
					}
				}
				echo '>'.$directorio.'</option>';
			}
			echo '</select><br>';
			echo 'Palabra: <input type="text" name="busca" id="busca"';
				if (isset($_GET['busca'])){
					echo 'value="'.$_GET['busca'].'"';
				}
			echo '><br>';
			$extList = array('todas','php','html','tpl', 'groovy','java','xml', 'txt','js','css');
			$extensiones=array();
			echo 'Extensiones:&nbsp;&nbsp;';
			foreach ($extList as $ext){
				echo '<input type="checkbox" name="ext_'.$ext.'" id="ext_'.$ext.'" value=1 ';
				if (isset($_GET['ext_todas'])){
					if ($_GET['ext_todas']==1){
						$_GET['ext_'.$ext]=1;
					}
				}
				if (isset($_GET['ext_'.$ext])){
					if ($_GET['ext_'.$ext]==1){
						echo 'checked="checked"';
						if ($ext!='todas'){
							$extensiones[]='.'.$ext;
						}
					}
				}
				echo '>'.$ext.'&nbsp;&nbsp;';
			}
			echo '<br>';
			echo '<input type="submit" value="Buscar">';
		echo '</form><br>';
		if (isset($_GET['busca']) && count($extensiones)>0){
			if (strlen($_GET['busca'])>=3){
				echo '<b>RESULTADOS:</b><br><div>';
					resultados($_GET['dir'],$extensiones,$_GET['busca']);
				echo '</div>'; 
			}else {
				echo 'La palabra a buscar debe medir 3 ó más caracteres.';
			}
		}else{
			echo 'SIN RESULTADOS.';
		}
	echo '</body>';
echo '</html>';

function resultados ($dir, $extensiones, $busca){

	$searchDir = $dir;
	$searchExtList = $extensiones;
	$searchString = $busca;
	
	$allFiles = everythingFrom($searchDir,$searchExtList,$searchString);
	
	foreach($allFiles as $v){
	    echo $v."<br>";
	}
}

function everythingFrom($baseDir,$extList,$searchStr) {
	 $files=array();
    $ob = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($baseDir), RecursiveIteratorIterator::SELF_FIRST);
    foreach($ob as $name => $object){
        if (is_file($name)) {
            foreach($extList as $k => $ext) {
                if (substr($name,(strlen($ext) * -1)) == $ext) {
                    $tmp = file_get_contents($name);
                    if (strpos($tmp,$searchStr) !== false) {
                        $files[] = $name;
                    }
                }
            }
        }
    }
    return $files;
}

function pintaArray($array){
    // start table
    $html = '<table>';
    // header row
    $html .= '<tr>';
    foreach($array[0] as $key=>$value){
            $html .= '<th>' . $key . '</th>';
        }
    $html .= '</tr>';
    // data rows
    foreach( $array as $key=>$value){
	     $html .= '<tr>';
        foreach($value as $key2=>$value2){
            $html .= '<td>' . $value2 . '</td>';
        }
	     $html .= '</tr>';
    }
    // finish table and return it
    $html .= '</table>';
    return $html;
}

?>
