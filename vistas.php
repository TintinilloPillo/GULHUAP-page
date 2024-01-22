<?php

session_start();

$idopcion;

if (@$_POST['idopcion'] == null)
    $idopcion=@$_GET['idopcion'];
else
    $idopcion=@$_POST['idopcion'];

switch ($idopcion){
    case 7:
        //echo $idopcion;
        regis_usuario();
        break;
    case 8: // Formulario de publicaciones nuevas.
        frm_publicacion();
        break;
    case 9: // Funcion que guarda una nueva publicacion.
        guardar_publicacion();
        break;
    case 10: // Interfaz de la publicacion.
        frm_repsuestas();
        break;
    case 11: // Formulario de respuestas.
        frm_add_respuesta();
        break;
    case 12: // Funcion que guarda una nueva respuesta.
        guardar_respuesta();
        break;
    case 13: // Funcion que muestra las respuestas de la publicacion.
        $id_publicacion = $_POST['parametro_1'];
        respuestas($id_publicacion);
        break;
    case 14: // Funcion que elimina la respuesta seleccionada.
        eliminar_respuesta();
        break;
    case 15:
      validar_pasword();
      echo $idopcion;
      break;
    case 16: // Formulario de certificaciones nuevas.
        frm_certificacion();
        break;
    case 17: // Funcion que guarda una nueva certificacion.
        guardar_certificacion();
        break;
    case 18; // Funcion que visualiza el contenido de la certificacion.
        frm_ver_certificacion();
        break;
    case 19; // Funcion que guarda los datos de una nueva solicitud.
        solicitud_certificacion();
        break;
    case 20: // Funcion que elimina la certificacion seleccionada.
        remover_certificacion();
        break;
}

function regis_usuario(){
    include ('model.php');  
    $obj= new OperacionesBd;
   $c1=$_POST['c1'];
    $c2=$_POST['c2'];
   echo "Clave:". $c3=$_POST['c3'];
   echo "Correo:".$c4=$_POST['c4'];
   $c5=$_POST['c5'];

   $conn=$obj->conexion();
   //validacion de correo repetido
   $val="SELECT clave, correo FROM usuarios WHERE clave='$c3' or correo='$c4'";

   $verifiacion=mysqli_query($conn,$val);
   //$verifiacion=$obj->mostrardatos($val);
   echo $total=mysqli_num_rows($verifiacion);
   foreach ( $verifiacion as $columna) {
  echo $clave=$columna['clave'];
  echo $email=$columna['correo'];
}



if($total>=1 && $email==$c4 && $clave==$c3){
    echo 'usuario ya registrado';
}
elseif ($total>=1 && $email==$c4 && $clave!=$c3) {
    echo 'correo existentes';
}
elseif ($total>=1 && $email!=$c4 && $clave==$c3) {
  echo 'numero de control existentes';
}
else{
  //consulta de insercion
$sql="INSERT INTO `usuarios` (`nombres`, `apellidos`, `clave`, `correo`, `contraseña`, `id_rol`) VALUES ('$c1', '$c2', '$c3', '$c4', '$c5', '2');";
$guardar=$obj->guardardatos($sql);  
date_default_timezone_set('America/Mexico_City');
         $fecha_actual=date("y/m/d H:i:s");
echo'
<div class="toast bg-info" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="toast-header">
    <img src="img/centos.png" class="rounded me-2" alt="...">
    <strong class="me-auto">GULHUAP</strong>
    <small>'.$fecha_actual.'</small>
    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
  </div>
  <div class="toast-body">
    ¡¡Nuevo usuario registrado!!
  </div>
</div>
';
}
}
function validar_pasword(){
    include ('model.php');
  $idusuario=$_SESSION["id"];
  $obj=new OperacionesBd;
  echo $c1=$_POST['c1'];
  echo $c2=$_POST['c2'];
  $sql="SELECT*FROM usuarios WHERE id_usuario='$idusuario' ";
  $mostrar=$obj->mostrardatos($sql);
  foreach($mostrar as $columna){
      $pass_actual=$columna['contraseña'];
  }
  if ($pass_actual==$c1) {
      
      $sql="UPDATE `usuarios` SET `contraseña` = '$c2' WHERE (`id_usuario` = '$idusuario')";
         $actualizar=$obj->actualizadatos($sql);
  }
  else{
      echo '<div class="alert alert-danger" role="alert">
          <br>
              !La contraseña actual no coincide!
          </div>';
      }
}

//**************Funciones auxiliares**************

function extract_name($id_usuario){
    /*
    Funcion que extrae el nombre del usuario
    mediante el session start y lo retorna.
    */
    $obj= new OperacionesBd;
    $query_select = "SELECT * FROM usuarios WHERE id_usuario = $id_usuario;";
    $datos = $obj->mostrardatos($query_select);
    return $datos[0]['nombres'];
}

function respuestas($id_publicacion){
    /*
    Funcion que imprime las respuestas de
    la publicacion actual.
    */
    $obj= new OperacionesBd;
    $query_select = "SELECT * FROM respuestas WHERE id_publicacion = $id_publicacion;";
    $datos = $obj->mostrardatos($query_select);

    //Se extrae el id del usuario.
    $id_usuario = $_SESSION['id'];
    $query_select_usuarios = "SELECT * FROM usuarios WHERE id_usuario = $id_usuario;";
    $datos_us = $obj->mostrardatos($query_select_usuarios);

    foreach ($datos as $columna) {
        ?>

        <div class="container-fluid">
            <h5><?php echo $columna['nombre']; ?></h5>
            <p>
                <?php echo $columna['respuesta']; ?>
            </p>
            <?php 

            if ($columna['nombre'] == $datos_us[0]['nombres']){
                ?>
                <a href="javascript:operaciones(2, 14, 4, <?php echo $columna['id_respuesta'] ?>);">
                    <p>Eliminar</p>
                </a>
                <?php
            }
            ?>
        </div>
        <hr>

        <?php 
    }
}

//**************Formularios****************

function frm_publicacion(){
    /*
    Funcion que contiene el formulario para añadir
    una nueva publicación.
    */
    $id_usuario = $_SESSION['id'];
    $nombre = extract_name($id_usuario);
    date_default_timezone_set('America/Mexico_City');
    $fecha_actual = date("y/m/d H:i:s")
    ?>
    <a href="foro.php">
        <button class="btn btn-danger text-white"><- Atras</button>
    </a>
    <div class="container-sm">
        
        <form id="formulario_pubblicaciones" class="mt-5" action="javascript:operaciones(1, 9, 3, 0);">
            <!--Fila del título-->
            <div class="row mb-3 bg-secondary border rounded">
                <div class="input-group col-sm mb-3">
                    <h1 class="font-weight-light">
                        <p class="font-weight-light text-white">
                            Nueva publicacion
                        </p>
                    </h1>
                </div>
            </div>

            <div class="row d-flex justify-content-center mt-3">
                <div class="col-sm-5 mb-3 ml-4">
                    <div class="row">
                        <label>
                            Titulo de la publicacion:
                        </label>
                    </div>
                    <div class="row input-group">
                        <input type="text" class="form-control" id="i1" name="i1" value="">
                    </div>
                </div>

                <div class="col-sm-5 mb-3 ml-4">
                    <div class="row">
                        <label>
                            Nombre:
                        </label>
                    </div>
                    <div class="row input-group">
                        <input type="text" class="form-control" id="i2" name="i2" value="<?php echo $nombre; ?>" disabled>
                    </div>
                </div>
            </div>

            <!--Fila 2-->
            <div class="row d-flex justify-content-center">
                <div class="col-sm-5 mb-3 ml-4">
                    <div class="row">
                        <label>
                            Fecha:
                        </label>
                    </div>
                    <div class="row input-group">
                        <input type="datetime" class="form-control" id="i3" name="i3" value="<?php echo $fecha_actual; ?>" disabled>
                    </div>
                </div>

                <div class="col-sm-5 mb-3 ml-4">
                    <div class="row">
                        <label>
                            Semestre:
                        </label>
                    </div>
                    <div class="row input-group">
                        <select id="i4" name="i4" class="form-control">
                            <option value="1">
                                1
                            </option>
                            <option value="2">
                                2
                            </option>
                            <option value="3">
                                3
                            </option>
                            <option value="4">
                                4
                            </option>
                            <option value="5">
                                5
                            </option>
                            <option value="6">
                                6
                            </option>
                            <option value="7">
                                7
                            </option>
                            <option value="8">
                                8
                            </option>
                            <option value="9">
                                9
                            </option>
                            <option value="10">
                                10
                            </option>
                            <option value="11">
                                11
                            </option>
                            <option value="12">
                                12
                            </option>
                        </select>
                    </div>
                </div>  
            </div>

            <!--Fila 7-->
            <div class="row d-flex justify-content-center">
                <div class="col-sm-10 mb-3">
                    <div class="row">
                        <label>
                            Resumen:
                        </label>
                    </div>
                    <div class="row input-group">
                        <textarea class="form-control" rows="3" id="i5" name="i5" ></textarea>
                    </div>
                </div>  
            </div>

            <div class="row d-flex justify-content-center">
                <div class="col-sm-9 mb-3 border">
                    <div class="row">
                        <button type="submit" class="btn btn-primary ml-2" onclick="">
                            Guardar Datos
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <?php
}

function frm_repsuestas(){
    /*
    Funcion que contiene el formato del
    formulario de respuestas.
    */
    $obj = new OperacionesBd;
    $id_publicacion = $_POST['parametro_1'];
    $query_select = "SELECT * FROM publicaciones WHERE id_publicacion = '$id_publicacion';";
    $publicacion = $obj->mostrardatos($query_select);

    ?>
    <a href="foro.php">
        <button class="btn btn-danger text-white"><- Atras</button>
    </a>

    <div class="row d-flex justify-content-center mb-5 mt-3">
        <div class="col-sm-8">
            
            <div class="row border rounded">
                <div class="col-sm-2 d-flex justify-content-center bg-danger rounded">
                    <img src="img/centos.png" height="70" width="70" alt="">
                </div>
                <div class="col">
                    <h4><?php echo $publicacion[0]['nombre']; ?></h4>
                    <h5><?php echo $publicacion[0]['titulo']; ?></h5>
                    <p>
                        <?php echo $publicacion[0]['resumen']; ?>
                    </p>
                    <p>
                        Fecha: <?php echo $publicacion[0]['fecha']; ?>
                        <br>
                        Semestre: <?php echo $publicacion[0]['semestre']; ?>
                    </p>
                    <a href="javascript:operaciones(2, 11, 4, <?php echo $id_publicacion; ?>);">Añadir respuesta</a>
                    <br>
                    <a href="javascript:operaciones(2, 13, 4, <?php echo $id_publicacion; ?>);">Respuestas</a>
                    <hr>
                    
                    <div id="contenedor_respuestas" class="container-fluid">
                        <?php respuestas($id_publicacion); ?>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <?php
}

function frm_add_respuesta(){
    /*
    Funcion que contiene el formulario
    para adicionar una respuesta a la publicacion.
    */

    $id_publicacion = $_POST['parametro_1'];
    ?>

    <form id="formulario_respuestas" action="javascript:operaciones(3, 12, 4, <?php echo $id_publicacion; ?>);">
        <div class="row">
            <div class="col-sm mb-3">
                <div class="row">
                    <label>
                        Escribe tu respuesta:
                    </label>
                </div>
                <div class="row input-group">
                    <div class="col-sm-10">
                        <textarea class="form-control" rows="3" id="i1" name="i1" ></textarea>
                    </div>
                    <div class="col-sm-2 mt-2">
                        <button class="btn btn-primary">Enviar</button>
                    </div>
                </div>
            </div>  
        </div>
    </form>

    <?php
}

function frm_certificacion(){
    /*
    Funcion que contiene el formulario
    para generar una nueva publicacion.
    */
    ?>
        <a href="certificaciones.php">
            <button class="btn btn-danger text-white"><- Atras</button>
        </a>
        <div class="container-sm">
            <form id="formulario_certificaciones" class="mt-5" action="javascript:operaciones(4, 17, 5, 0);">
                <!--Fila del título-->
                <div class="row mb-3 bg-secondary border rounded">
                    <div class="input-group col-sm mb-3">
                        <h1 class="font-weight-light">
                            <p class="font-weight-light text-white">
                                Nueva certificacion
                            </p>
                        </h1>
                    </div>
                </div>

                <div class="row d-flex justify-content-center mt-3">
                    <div class="col-sm-5 mb-3 ml-4">
                        <div class="row">
                            <label>
                                Titulo de la certificacion:
                            </label>
                        </div>
                        <div class="row input-group">
                            <input type="text" class="form-control" id="i1" name="i1" value="">
                        </div>
                    </div>

                    <div class="col-sm-5 mb-3 ml-4">
                        <div class="row">
                            <label>
                                URL de la imagen:
                            </label>
                        </div>
                        <div class="row input-group">
                            <input type="text" class="form-control" id="i2" name="i2" value="">
                        </div>
                    </div>
                </div>

                <!--Fila 2-->
                <div class="row d-flex justify-content-center">
                    <div class="col-sm-5 mb-3 ml-4">
                        <div class="row">
                            <label>
                                Fecha de inicio:
                            </label>
                        </div>
                        <div class="row input-group">
                            <input type="date" class="form-control" id="i3" name="i4" value="">
                        </div>
                    </div>

                    <div class="col-sm-5 mb-3 ml-4">
                        <div class="row">
                            <label>
                                Fecha de fin:
                            </label>
                        </div>
                        <div class="row input-group">
                            <input type="date" class="form-control" id="i4" name="i4" value="">
                        </div>
                    </div>
                </div>

                <!--Fila 3-->
                <div class="row d-flex justify-content-center">
                    <div class="col-sm-5 mb-3 ml-4">
                        <div class="row">
                            <label>
                                Semestre:
                            </label>
                        </div>
                        <div class="row input-group">
                            <select name="" id="i5" name="i5" class="form-control">
                                <option value="1">
                                    1
                                </option>
                                <option value="2">
                                    2
                                </option>
                                <option value="3">
                                    3
                                </option>
                                <option value="4">
                                    4
                                </option>
                                <option value="5">
                                    5
                                </option>
                                <option value="6">
                                    6
                                </option>
                                <option value="7">
                                    7
                                </option>
                                <option value="8">
                                    8
                                </option>
                                <option value="9">
                                    9
                                </option>
                                <option value="10">
                                    10
                                </option>
                                <option value="11">
                                    11
                                </option>
                                <option value="12">
                                    12
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-5 ml-4">
                        <div class="row">
                            <label>
                                Color:
                            </label>
                        </div>
                        <div class="row input-group">
                            <select name="" id="i6" name="i6" class="form-control">
                                <option value="bg-danger">
                                    Red
                                </option>
                                <option value="bg-success">
                                    Green
                                </option>
                                <option value="bg-primary">
                                    Blue
                                </option>
                                <option value="bg-dark">
                                    Dark
                                </option>
                            </select>
                        </div>
                    </div>
                </div>

                <!--Fila 7-->
                <div class="row d-flex justify-content-center">
                    <div class="col-sm-1 mb-3 "></div>  
                    <div class="col-sm-10 mb-3">
                        <div class="row">
                            <label>
                                Descripcion:
                            </label>
                        </div>
                        <div class="row input-group">
                            <textarea class="form-control" rows="3" id="i7" name="i7"></textarea>
                        </div>
                    </div>
                    <div class="col-sm-1 mb-3"></div>   
                </div>

                <div class="row d-flex justify-content-center">
                    <div class="col-sm-9 mb-3 border">
                        <div class="row">
                            <button type="submit" class="btn btn-primary ml-2" onclick="">
                                Guardar Datos
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

    <?php
}

function frm_ver_certificacion(){
    $obj = new OperacionesBd;
    $id_certificacion = $_POST['parametro_1'];
    $query_select = "SELECT * FROM certificaciones WHERE id_certificacion = $id_certificacion;";
    $certificacion = $obj->mostrardatos($query_select);
    ?>
    <a href="certificaciones.php">
        <button class="btn btn-danger text-white"><- Atras</button>
    </a>

    <div class="row d-flex justify-content-center mt-3 mb-5">
        <div class="col-sm-8 bg-light rounded">
            <div class="row d-flex justify-content-center">
                <div class="col-sm-3 d-flex justify-content-center <?php echo $certificacion[0]["color"]; ?> rounded">
                    <img class="rounded-circle bg-light mt-3 mb-3" src="<?php echo $certificacion[0]["url_image"]; ?>" height="100" width="100" alt="">
                </div>
                <div class="col">
                    <h3 class="d-flex justify-content-center text-primary">CERTIFICACIÓN: <?php echo $certificacion[0]["titulo"]; ?></h3>
                    <br>
                    <h5>Fecha de inicio: <?php echo $certificacion[0]["fecha_inicio"]; ?></h5>
                    <h5>Fecha de término: <?php echo $certificacion[0]["fecha_fin"]; ?></h5>
                    <br>
                    <h5>Dirigida al semestre: <?php echo $certificacion[0]["semestre"]; ?></h5>
                    <br>
                    <h5>Descripción:</h5>
                    <p><?php echo $certificacion[0]["descripcion"]; ?></p>

                </div>
                <button class="btn btn-secondary btn-lg btn-block" onclick="operaciones(2, 19, 5, <?php echo $id_certificacion; ?>);">Estoy interesado</button>
            </div>
        </div>
    </div>
    <?php
}

//**************Ooperaciones con la base de datos**************

function guardar_publicacion(){
    /*
    Funcion que guarda la nueva publicacion
    en la base de datos.
    */
    $obj = new OperacionesBd;

    $id_usuario = $_SESSION['id'];
    $i1 = $_POST['i1'];
    $i2 = $_POST['i2'];
    $i3 = $_POST['i3'];
    $i4 = $_POST['i4'];
    $i5 = $_POST['i5'];

    $query_insert = "INSERT INTO publicaciones(id_usuario,
                                        titulo,
                                        nombre,
                                        fecha,
                                        semestre,
                                        resumen)
    VALUES ($id_usuario, '$i1', '$i2', '$i3', $i4, '$i5');";

    ?>
        <a href="foro.php" class="mb-5">
            <button class="btn btn-danger"><-Atras</button>
        </a>
    <?php

    $obj->guardardatos($query_insert);
}

function guardar_respuesta(){
    /*
    Funcion que guarda las nuevas
    respuestas en la base de datos.
    */
    $obj= new OperacionesBd;

    //Se cachan las variables.
    $id_usuario = $_SESSION['id'];
    $i1 = $_POST['i1'];
    $id_publicacion = $_POST['id_publicacion'];
    $nombre = extract_name($id_usuario);
    $respuesta = $_POST['i1'];

    $query_insert = "INSERT INTO respuestas (id_publicacion,
                                             id_usuario,
                                             nombre,
                                             respuesta) 
    VALUES ($id_publicacion, $id_usuario, '$nombre', '$respuesta');";

    $obj->guardardatos($query_insert);
}

function eliminar_respuesta(){
    /*
    Funcion que elimina (actualiza) los comentarios
    en la base de datos de acuerdo al id del comentario.
    */
    $obj= new OperacionesBd;
    $id_respuesta = $_POST['parametro_1'];
    $query_update = "UPDATE respuestas SET nombre = '-----',
                                           respuesta = 'Este comentario ha sido eliminado por el autor.' 
                     WHERE id_respuesta = $id_respuesta;";

    $obj->actualizadatos($query_update);

    echo '<div class="alert alert-danger" role="alert">
            El comentario ha sido eliminado.
          </div>';
}

function guardar_certificacion(){
    $obj = new OperacionesBd;

    $i1 = $_POST['i1'];
    $i2 = $_POST['i2'];
    $i3 = $_POST['i3'];
    $i4 = $_POST['i4'];
    $i5 = $_POST['i5'];
    $i6 = $_POST['i6'];
    $i7 = $_POST['i7'];

    $query_insert = "INSERT INTO certificaciones(titulo,
                                        url_image,
                                        fecha_inicio,
                                        fecha_fin,
                                        semestre,
                                        descripcion,
                                        color)
    VALUES ('$i1', '$i2', '$i3', '$i4', '$i5', '$i7', '$i6');";

    ?>
        <a href="certificaciones.php" class="mb-5">
            <button class="btn btn-danger"><-Atras</button>
        </a>
    <?php

    $obj->guardardatos($query_insert);
}

function solicitud_certificacion(){
    $obj = new OperacionesBd;
    $id_certificacion = $_POST['parametro_1'];
    $id_usuario = $_SESSION['id'];

    $query_insert = "INSERT INTO solicitudes (id_usuario, id_certificacion) 
                     VALUES ($id_usuario, $id_certificacion);";

    ?>
        <a href="certificaciones.php" class="mb-5">
            <button class="btn btn-danger"><-Atras</button>
        </a>
    <?php

    $obj->guardardatos($query_insert);

}

function remover_certificacion(){
    $obj = new OperacionesBd;
    $id_certificacion = $_POST['parametro_1'];

    $query_delete = "DELETE FROM certificaciones WHERE id_certificacion = $id_certificacion;";
    $obj->eliminardatos($query_delete);

    ?>
        <a href="certificaciones.php" class="mb-5">
            <button class="btn btn-danger"><-Atras</button>
        </a>
    <?php

    echo '<div class="alert alert-danger" role="alert">
            La certificacion ha sido removida con éxito.
          </div>';
}
?>