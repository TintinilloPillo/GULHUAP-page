<?php
//manejar idusuario,idopcion e idcontenedor
include 'model.php';
$obj = new OperacionesBd;

$idopcion=$_GET['idopcion'];
switch ($idopcion){//para manejar las opciones de cada icono
    case 1:
    case 2:
    case 3:
    case 4:
    case 5:
    case 6:
        $obj->menu();
        break;
   
    case 7://a partir de aqui mandaremos a llamar los formularios
    case 8: // Formulario de publicaciones nuevas.
    case 9: // Funcion que guarda una nueva publicacion.
    case 10: // Interfaz de la publicacion.
    case 11: // Formulario de respuestas.
    case 12: // Funcion que guarda una nueva respuesta.
    case 13: // Funcion que muestra las respuestas de la publicacion.
    case 14: // Funcion que elimina la respuesta seleccionada.
    case 15:
    case 16: // Formulario de certificaciones nuevas.
    case 17: // Funcion que guarda una nueva certificacion.
    case 18: // Funcion que visualiza el contenido de la certificacion.
    case 19: // Funcion que guarda los datos de una nueva solicitud.
    case 20: // Funcion que elimina la certificacion seleccionada.
        $obj->vistas();
        break;

}
?>