<?php 
include("model.php");
session_start(); 
/*if(!isset($_SESSION['id'])){
    header('location:login.html');
}*/
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CERTIFICACIONES</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<!--Inicio de la barra de operaciones-->
	<nav class="navbar color-barra">
		<div class="container-fluid">
			<a href="navbar-brand">
				<img src="img/centos.png" alt="bootstrap" width="40" height="40">
			</a>
			<ul class="nav nav-tabs">
				<li class="nav-item">
					<a class="nav-link negro link-light" aria-current="page" href="index.php">Inicio</a>
				</li>
				<li class="nav-item">
					<a class="nav-link negro link-light" aria-current="page" href="distribuciones.php">Distribuciones</a>
				</li>
				<li class="nav-item">
					<a class="nav-link negro link-light" aria-current="page" href="foro.php">Foro</a>
				</li>
				<li class="nav-item">
					<a class="nav-link active" aria-current="page" href="certificaciones.php">Certificaciones</a>
				</li>
				<?php
            if(!isset($_SESSION ['rol'] ) or !isset($_SESSION ['rol']) ){
              
              ?>
				<li class="nav-item">
              <a class="nav-link negro link-light" href="login.html">Registrarse</a>
            </li>
            <li class="nav-item">
              <a class="nav-link negro link-light"href="login.html">Ingresar</a>
            </li>
				<?php
			}
            if((@$_SESSION ['rol']=="1") ||(@$_SESSION ['rol']=="2")){
            $obj=new OperacionesBd;
            $rolcito=@$_SESSION['id'];
            $sql="SELECT*FROM usuarios u inner join roles r on u.id_rol=r.id_rol where id_usuario=$rolcito";
            $mostrar=$obj->mostrardatos($sql);
            foreach($mostrar as $columna){
            $nombre=$columna['nombres'];
            $apellidos=$columna['apellidos'];
            $tipo=$columna['rol'];
        
            print'<li>
              <button class="btn btn-outline-light" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScrolling" aria-controls="offcanvasScrolling">'.$nombre.'</button>

                <div class="offcanvas offcanvas-start" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
                  <div class="offcanvas-header">
                    <h5 class="offcanvas-title mayus" id="offcanvasScrollingLabel">¡HOLA '.$nombre.' '.$apellidos.'!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                  </div>
                  <div class="offcanvas-body">
                    <p>Eres parte importante de la comunidad GULHUAP y estás catalogado como <b>'.$tipo.'.</b></p>
                    <p>¿Qué deseas hacer?</p>
                    <div class="container px-4 text-center">
                      <div class="row gx-5">
                        <div class="col">
                        <div class="p"><a><button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z"/>
                        <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z"/>
                          </svg> Contraseña</button></a></div>
                        </div>
                        <div class="col">
                          <div class="p">
						  <a href="destroy.php"><button type="button" class="btn btn-danger">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-escape" viewBox="0 0 16 16">
                          <path d="M8.538 1.02a.5.5 0 1 0-.076.998 6 6 0 1 1-6.445 6.444.5.5 0 0 0-.997.076A7 7 0 1 0 8.538 1.02Z"/>
                          <path d="M7.096 7.828a.5.5 0 0 0 .707-.707L2.707 2.025h2.768a.5.5 0 1 0 0-1H1.5a.5.5 0 0 0-.5.5V5.5a.5.5 0 0 0 1 0V2.732l5.096 5.096Z"/>
                        </svg>
                        Salir</button></a>
                         </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
            </li>';
        }
      }?>
			</ul>
		</div>
	</nav>
	<!--Fin de la barra de operaciones-->

	<!--Titulo de la pagina-->
	<div class="container-fluid">
		<br>
		<h1 class="text-center text-info"><b>CERTIFICACIONES</b></h1>
		<br>
	</div>

	<!--Parrafo de la pagina-->
	<div class="container-fluid">
		<h4 class="display-5 text-center">
			<p>
				Te damos la biendenida a la serie de certificaciones ofertadas por parte del plan de estudios del Instituto Tecnológico Superior de Tamazunchale, S.L.P.
			</p>
		</h4>
		<br>
		<hr class="form-control bg-secondary">

	<div id="contenedor_certificaciones" class="container-fluid">
		<!--Contenedor que contiene las tarjetas de las certificaciones-->
		<div class="row d-flex justify-content-center py-3">

		<?php 
			$obj= new OperacionesBd;
			$query_select = "SELECT * FROM certificaciones;";
			$datos = $obj->mostrardatos($query_select);

			foreach ($datos as $columna) {
		?>
			<!--Inicio de formato-->
			<div class="col-sm-3 py-3">
				<div class="container-fluid <?php echo $columna["color"]; ?> rounded py-3">
					<div class="d-flex justify-content-center">
						<img class="img-thumbnail rounded-circle bg-light" width="150" height="150" src="<?php echo $columna["url_image"]; ?>" alt="">
					</div>
					<div class="d-flex justify-content-center text-white mt-4">
						<h4>Certificación:</h4>
					</div>
					<div class="d-flex justify-content-center text-white">
						<h4><?php echo $columna["titulo"]; ?></h4>
					</div>
					<div class="d-flex justify-content-center mt-4">
						<button class="btn btn-dark btn-lg" onclick="operaciones(2, 18, 5, <?php echo $columna['id_certificacion']; ?>);">
							<h5>Saber más</h5>
						</button>
					</div>
					<?php 
						if(@$_SESSION ['rol']=="1"){
							?>
								<div class="d-flex justify-content-center mt-4">
									<button class="btn btn-dark btn-lg" onclick="operaciones(2, 20, 5, <?php echo $columna['id_certificacion']; ?>);">
										<h5>Remover</h5>
									</button>
								</div>
							<?php
						}
					?>
					
				</div>
			</div>
			<!--Fin de formato-->
		<?php 
			}
		?>
			<!--Inicio de formato
			<div class="col-sm-3 py-3">
				<div class="container-fluid bg-dark rounded py-3">
					<div class="d-flex justify-content-center">
						<img class="img-thumbnail rounded-circle bg-secondary" width="150" height="150" src="img/centos.png" alt="">
					</div>
					<div class="d-flex justify-content-center text-white mt-4">
						<h4>Certificación:</h4>
					</div>
					<div class="d-flex justify-content-center text-white">
						<h4>Ejemplo01</h4>
					</div>
					<div class="d-flex justify-content-center mt-4">
						<button class="btn btn-secondary btn-lg">
							<h5>Estoy interesado</h5>
						</button>
					</div>
				</div>
			</div>
			Fin de formato-->

			<?php
			if(@$_SESSION ['rol']=="1"){
			?>
				<div class="col-sm-3 py-3">
					<div class="container-fluid bg-secondary rounded py-3">
						<div class="d-flex justify-content-center">
							<img class="img-thumbnail rounded-circle bg-secondary" width="150" height="150" src="img/More.png" alt="">
						</div>
						<div class="d-flex justify-content-center text-white mt-4">
							<h4>Nueva</h4>
						</div>
						<div class="d-flex justify-content-center text-white">
							<h4>Certificación</h4>
						</div>
						<div class="d-flex justify-content-center mt-4">
							<button class="btn btn-warning btn-lg" onclick="formularios(16, 5); return false;">
								<h5>Agregar</h5>
							</button>
						</div>
					</div>
				</div>
			<?php
			}?>
		</div>
	</div>
	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Actualizar contraseña</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                  <div class="hstack gap-3">
                                  <div id="mensaje"></div>
                                  <div class="col">
                                    <label for="validationCustom02" class="form-label">Contraseña anterior</label>
                                    <input class="form-control me-auto" type="password" placeholder="" aria-label="Contraseña anterior" id="c1">
                                    <span id="passwordHelpInline" class="form-text text-warning">
                                        Requiere la contraseña actual para poder modificar.
                                   </span>
                                  </div>
                                <div class="col">
                                  <label for="validationCustom02" class="form-label">Nueva contraseña</label>
                                  <input class="form-control me-auto" type="password" placeholder="" aria-label="Nueva contraseña" id="c2">
                                  <span id="passwordHelpInline" class="form-text text-warning">
                                        Debe de contener mínimo 8 caracteres.
                                  </span>
                                </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                    <button type="submit" class="btn btn-primary"  onclick="actualiza_pass(15,$('#c1').val(),$('#c2').val(),$(this).val()); return false;">Guardar cambios</button>
                                  </div>
                                </div>
                              </div>
                            </div>
                            </div>
</body>
<script src="js/jquery-3.6.1.min.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/validar.js"></script>
<script src="js/funcion_ajax.js"></script>
</html>