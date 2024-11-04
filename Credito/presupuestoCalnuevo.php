<?php 

include_once 'Credito-estilo.php';
 
 if(isset($_POST['ahorro'])){
     $ahorro = $_POST['ahorro'];   
 }

 if(isset($_POST['ps1'])){
    $ps1=1000; 
}else{
    $ps1=0; 
}

if(isset($_POST['ps2'])){
    $ps2=1000; 
}else{
    $ps2=0; 
}

 //echo calcularPresupuesto($ahorro, $ps1, $ps2);

 $ahorro_total= calcularPresupuesto($ahorro, $ps1, $ps2);
 $aval1=$ahorro_total+5000;

 $aval2=$ahorro_total+10000;

 $cp=$ahorro_total*2.7;


 if($cp > 110000){
   $cp = 110000;
}

 if($cp <= $aval2){
    $aval2 = $cp;
    $cp = "NA";
 }
 
 if($aval2 < $aval1){
    $aval1 = $ahorro_total*2.7;;
    $aval2 ="NA";
    $cp = "NA";
 }

 $credito_ahorro=calcularAhorro($ahorro_total);
 $credito_ahorro1=round($credito_ahorro, -2, PHP_ROUND_HALF_DOWN);
 echo "<center><h1>NGU PRESUPUESTO DE CREDITO</h1><br>";
 echo "<table border='1' class='table table-striped table-bordered table-condensed tabla_personalizada'>
 <tr>
 <th colspan='2'><b>Informacion</b></th>
 </tr>
 <tr> 
 <td><label for='numero'>Ahorro: </td><td><label for='numero'>$ahorro</td>
 </tr>
 <tr> 
 <td><label for='numero'>PS1: </label></td><td><label for='numero'>$ps1</label></td>
 </tr>
 <tr>  
 <td><label for='numero'>PS2: </label></td><td><label for='numero'>$ps2</label></td> 
 </tr>
 <tr>
 <td colspan='2'><label for='numero'><b>Total de ahorros: $ahorro_total<b></label></td> 
 </tr>
 <th colspan='2'><b>Credito de ahorro</b></th>
 <tr> 
 <td><label for='numero'>Ahorros: </td><td><label for='numero'>$credito_ahorro</td>
 </tr>
 <th colspan='2'><b>Creditos con riesgo</b></th>
 <tr> 
 <td><label for='numero'>AVAL TIPO 1: </td><td><label for='numero'>$aval1</td>
 </tr>
 <tr> 
 <td><label for='numero'>AVAL TIPO 2: </td><td><label for='numero'>$aval2</td>
 </tr>
 <tr> 
 <td><label for='numero'>CON PROPIEDAD: </td><td><label for='numero'>$cp</td>
 </tr>
 </table> ";

 function calcularPresupuesto($ahorro, $ps1, $ps2){
    $total_ahorros = $ahorro+$ps1+$ps2;
    return $total_ahorros;
 }
   
 function calcularAhorro($total_ahorros){
     if($total_ahorros >= 1000 && $total_ahorros <= 7000){
         $reduccion=$total_ahorros*0.05;
         $ahorro=$total_ahorros-$reduccion;
     }else if($total_ahorros >= 7001 && $total_ahorros <= 15000){
        $reduccion=$total_ahorros*0.04;
        $ahorro=$total_ahorros-$reduccion;
     }else if($total_ahorros >= 15001 && $total_ahorros <= 30000){
        $reduccion=$total_ahorros*0.03;
        $ahorro=$total_ahorros-$reduccion;
     }else if($total_ahorros > 30000){
        $reduccion=$total_ahorros*0.02;
        $ahorro=$total_ahorros-$reduccion; 
     }

     return $ahorro;
 }

?>