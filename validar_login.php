<?php
include("model.php");
session_start();
$obj=new OperacionesBd;
$clave=$_POST['clave'];
$contra=$_POST['contra'];
$sql="SELECT*FROM usuarios WHERE clave='$clave' AND contraseña='$contra'";
$mostraruser=$obj->mostrardatos($sql);
foreach ($mostraruser as $columna) {
    $idusuario=$columna["id_usuario"];
   // $nombre=$columna["nombre"];
   // $apellidos=$columna["apellidos"];
    $idrol=$columna['id_rol'];
}
if($mostraruser){
echo "1";
$_SESSION["id"]=$idusuario;
$_SESSION ['rol']=$idrol;
//$_SESSION ['nombre']=$nombre;
//$_SESSION ['apellidos']=$apellidos;
}else{
    echo $clave;
}
  ?>