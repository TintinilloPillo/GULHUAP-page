<?php 
include("model.php");
session_start(); 
/*if(!isset($_SESSION['id'])){
    header('location:login.html');
}*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="shortcut icon" href="img/centos.png" type="image/x-icon">
    <title>GULHUAP</title>
</head>
    <!--barra de navegación-->
    <nav class="navbar color-barra">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">
            <img src="img/centos.png" alt="Bootstrap" width="40" height="40">
          </a>
          <ul class="nav nav-tabs">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">Inicio</a>
            </li>
            <li class="nav-item">
              <a class="nav-link negro link-light" href="distribuciones.php">Distribuciones</a>
            </li>
            <li class="nav-item">
              <a class="nav-link negro link-light" href="foro.php">Foro</a>
            </li>
            <li class="nav-item">
              <a class="nav-link negro link-light" href="certificaciones.php">Certificaciones</a>
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
                        <div class="p">
                        <a><button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#exampleModal"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-clockwise" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M8 3a5 5 0 1 0 4.546 2.914.5.5 0 0 1 .908-.417A6 6 0 1 1 8 2v1z"/>
                        <path d="M8 4.466V.534a.25.25 0 0 1 .41-.192l2.36 1.966c.12.1.12.284 0 .384L8.41 4.658A.25.25 0 0 1 8 4.466z"/>
                          </svg> Contraseña</button></a>
                      </div>
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
              </li>
            ';
        }
      }?>
          </ul>
        </div>
      </nav>
    
    <div class="container-fluid">
      <br>
      <h1 class="text-center"><b>BIENVENIDOS A GULHUAP</b></h1>
      <br>
     </div>
      <div class="container text-center" data-aos="fade-right">
        <div class="row">
          <div class="col">
            <div class="border border-warning p-3 border-3 rounded">
              <ol class="list-group list-group-numbered">
                <h4><b>TE OFRECEMOS</b></h4>
                <br>
                <br>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                  <div class="ms-2 me-auto">
                    <div class="fw-bold text-start">Capacitación y asesoramiento sobre el manejo de distintas versiones de LINUX</div>
                  </div>
                  <img src="img/verificado.png" alt="" width="30">
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                  <div class="ms-2 me-auto">
                    <div class="fw-bold text-start">Capacitación y asesoramiento sobre instalación de distintas versiones de LINUX</div>
                  </div>
                  <img src="img/verificado.png" alt="" width="30">
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                  <div class="ms-2 me-auto">
                    <div class="fw-bold text-start">Curso de capacitación para la Certificación NDG LINUX UNHATCHED</div>
                  </div>
                  <img src="img/verificado.png" alt="" width="30">
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                  <div class="ms-2 me-auto">
                    <div class="fw-bold text-start">Curso de capacitación para la Certificación NDG LINUX ESSENTIALS</div>
                  </div>
                  <img src="img/verificado.png" alt="" width="30">
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                  <div class="ms-2 me-auto">
                    <div class="fw-bold text-start">Curso de capacitación para la Certificación NDG LINUX I</div>
                  </div>
                  <img src="img/verificado.png" alt="" width="30">
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-start">
                  <div class="ms-2 me-auto">
                    <div class="fw-bold text-start">Curso de capacitación para la Certificación NDG LINUX II</div>
                  </div>
                  <img src="img/verificado.png" alt="" width="30">
                </li>
              </ol>
            </div>
            <br>
          </div>
          <div class="col">
            <div class="p-3"> 
              <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                <div class="carousel-inner align-items-center">
                  <div class="carousel-item active">
                    <img src="img/1668178281171.jpg" class="d-block w-100" alt="..." width="60px">
                  </div>
                  <div class="carousel-item">
                    <img src="img/1668178281183.jpg" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="img/1668178281193.jpg" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="img/1668178281202.jpg" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="img/1668178281212.jpg" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="img/1668178281221.jpg" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="img/1668178281231.jpg" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="img/1668178281240.jpg" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="img/1668178281249.jpg" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="img/1668178281259.jpg" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="img/1668178281268.jpg" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="img/1668178281278.jpg" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="img/1668178281287.jpg" class="d-block w-100" alt="...">
                  </div>
                  <div class="carousel-item">
                    <img src="img/1668178281296.jpg" class="d-block w-100" alt="...">
                  </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Anterior</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Siguiente</span>
            </button>
            <br>
        </div>
          </div>
     </div>
    </div>
  </div>
     </div> 
     <div class="container-fluid divs-negros" data-aos="fade-left">
        <br>
        <h2 class="text-center blanco"><b>¿QUIENES SOMOS?</b></h2>
        <br>
        <p class="lh-base blanco text-center fs-5">Somos una comunidad de usuarios LINUX perteneciente a la región de la Huasteca Potosina, siendo la primera en la región, la cual, está dirigida por el Ingeniero Lugi Alan Cruz Ponce y delegada por sección a alumnos del plantel del Instituto Tecnológico Superior de Tamazunchale, S.L.P.</p>
        <br>
      <div class="container text-center">
          <div class="row">
            <div class="col">
              <div class="p-3">
                  <div class="card border-4 border-warning" style="width: 12rem;">
                      <img src="img/inge.jpg" class="card-img-top" alt="...">
                      <div class="card-body">
                        <p class="card-text"><b>Ing.Lugi Alan Cruz Ponce.</b> 
                          <br>
                          <b>Docente encargado de la Academia local de CISCO</b> 
                        </p>
                      </div>
                    </div>
              </div>
            </div>
            <div class="col">
              <div class="p-3">
                  <div class="card border-warning" style="width: 12rem;">
                      <img src="img/tin.jpg" class="card-img-top" alt="...">
                      <div class="card-body">
                        <p class="card-text"><b>Martin Uriel Huesca Quezada.</b>
                          <br>
                          <b>Certificador</b> 
                        </p>
                      </div>
                    </div>
              </div>
            </div>
            <div class="col">
              <div class="p-3">
                  <div class="card border-warning" style="width: 12rem;">
                      <img src="img/pao.jpg" class="card-img-top" alt="...">
                      <div class="card-body">
                        <p class="card-text"><b>Litza Paola Antonio Fernández.</b> 
                          <br>
                          <b>Promoción</b> 
                        </p>
                      </div>
                    </div>
              </div>
            </div>
            <div class="col">
              <div class="p-3">
                  <div class="card border-warning" style="width: 12rem;">
                      <img src="img/lebent.jpg    " class="card-img-top" alt="...">
                      <div class="card-body">
                        <p class="card-text"><b>Lebent Noel Melendres Hernández.</b> 
                          <br>
                          <b>Administrador de Software</b> 
                        </p>
                      </div>
                    </div>
              </div>
            </div>  
          </div>
        </div>
        <br>
     </div>
     <div class="container-fluid" data-aos="fade-right">
      <br>
      <h2 class="text-center"><b>¿QUÉ ES LINUX?</b></h2>
      <br>
      <div class="container text-center">
        <div class="row">
          <div class="col">
            <div class="p-3">
              <p class="justificacion fs-5">Linux® es un sistema operativo (SO) open source. El sistema operativo es el software que gestiona directamente el hardware de un sistema y sus recursos, como la CPU, la memoria y el almacenamiento. El SO se sitúa entre las aplicaciones y el hardware, y establece las conexiones entre todo el sistema de software y los recursos físicos que ejecutan las tareas.</p>
            </div>
          </div>
          <div class="col">
            <div class="p-3">
                <img src="img/linux.png" alt="" width="250">
                <br>
            </div>
          </div>
          <br>
          <br>
     </div>
    </div>
  </div>
     <div class="container-fluid divs-negros" data-aos="fade-left">
      <br>
      <h2 class="text-center blanco"><b>¿QUÉ INCLUYE LINUX?</b></h2>
      <br>
      <div class="container text-center">
        <div class="row">
          <div class="col">
            <div class="p-3">
              <div class="card w-75">
                <div class="card-body">
                  <h5 class="card-title">Kernel
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                    <img src="img/tachuela.png" alt="" width="40">
                    <span class="visually-hidden">unread messages</span>
                  </span>
                </h5>
                  <p class="card-text justificacion">Elemento fundamental del SO que posibilita su funcionamiento. Gestiona los recursos del sistema, como la memoria, los procesos y los archivos, y se comunica con el hardware.</p>
                </div>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="p-3">
              <div class="card w-75">
                <div class="card-body">
                  <h5 class="card-title">Espacio de usuario del sistema
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                      <img src="img/tachuela.png" alt="" width="40">
                      <span class="visually-hidden">unread messages</span>
                    </span>
                  </h5>
                  <p class="card-text justificacion">Capa administrativa para las tareas a nivel del sistema, como la configuración y la instalación del software. Incluye el shell o la línea de comandos.</p>
                </div>
              </div>
                
            </div>
          </div>
          <div class="col">
            <div class="p-3">
              <div class="card w-75">
                <div class="card-body">
                  <h5 class="card-title">Aplicaciones
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                      <img src="img/tachuela.png" alt="" width="40">
                      <span class="visually-hidden">unread messages</span>
                    </span>
                  </h5>
                  <p class="card-text justificacion">Un tipo de software que permite ejecutar una tarea. Incluyen todo, desde las herramientas de escritorio hasta los lenguajes de programación y los conjuntos de programas  multiusuario.</p>
                </div>
              </div>
                
            </div>
          </div>
     </div>
    </div>
    <br>
     </div>
     <div class="container-fluid" data-aos="fade-right">
      <br>
      <h2 class="text-center"><b>¿CÓMO FUNCIONA LINUX?</b></h2>
      <br>
      <div class="container text-center">
        <div class="row">
          <div class="col">
            <div class="p-3">
              <img src="img/configuracion (1).png" alt="" width="250">
            </div>
          </div>
          <div class="col">
            <div class="p-3">
                <p class="justificacion fs-5">Linux se diseñó como un producto similar a UNIX, pero evolucionó para ejecutarse en una amplia variedad de sistemas de hardware, desde teléfonos hasta supercomputadoras. Todos los SO basados en Linux incluyen su kernel, que gestiona los recursos de hardware, y un conjunto de paquetes de software que conforman el resto del sistema operativo.</p>
                
            </div>
          </div>
     </div>
     </div>
    </div>
     <div class="container-fluid divs-negros" data-aos="fade-left">
        <br>
        <h2 class="text-center blanco"><b>¿SABÍAS QUE...?</b></h2>
        <br>
        <div class="container text-center">
          <div class="row">
            <div class="col">
              <p class="justificacion blanco fs-5">El inventor de Linux es el ingeniero de software finlandés Linus Benedict Torvalds. Ligado al mundo de la informática desde una edad muy temprana, estudió Ciencias de la Computación en la Universidad de Helsinki. Durante aquella época, decidió adquirir un nuevo PC 386 -33 Mhz, 4MB de RAM, uno de los más avanzados de su época, sin embargo, no le gustaba el sistema operativo con el que trabajaba y decidió crear uno él mismo.
                En septiembre de 1991 Linus Torvalds tenía ya su diseño básico, el cual llamó versión 0.01 de Linux, que era una combinación de su nombre con Unix. Este núcleo se utilizó junto con el sistema GNU para producir un sistema operativo totalmente libre.
              </p>
            </div>
            <div class="col">
              <figure class="figure">
                <img src="img/R.jpeg" class="figure-img img-fluid rounded" alt="...">
                <figcaption class="figure-caption blanco text-end fs-5">Linus Benedict Torvalds.</figcaption>
              </figure>
            </div>
          </div>
          <br>
     </div>
    </div></div>
     
     <div class="container-fluid" data-aos="fade-right">
      <br>
      <h2 class="text-center"><b>¿DÓNDE PUEDES UBICARNOS?</b></h2>
      <br>
      <div class="container text-center">
        <div class="row">
          <div class="col">
            <iframe class="rounded" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2210.6776252566074!2d-98.7499677957351!3d21.27535514007939!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d6ea7c675050f9%3A0x24a278523f0640d!2sInstituto%20Tecnol%C3%B3gico%20Superior%20de%20Tamazunchale%2C%20S.L.P.!5e0!3m2!1ses-419!2smx!4v1668223485399!5m2!1ses-419!2smx" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
          <div class="col">
            <img src="img/tec.jpeg" alt=""width="600"class="rounded">
          </div>
        </div>
      </div>
      <br>
     </div>
    </div>
  </div>
</div>
</div>
   <div class="container-fluid divs-negros">
    
    <div class="container-fluid text-center">
      <div class="row">
        <div class="col">
          <br>
          <h2 class="blanco"><b>CONTÁCTANOS</b></h2>
          <br>
          <div class="row text-center">
            <div class="col text-start container-fluid">
              <li class="blanco list-group-item">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-at-fill" viewBox="0 0 16 16">
                <path d="M2 2A2 2 0 0 0 .05 3.555L8 8.414l7.95-4.859A2 2 0 0 0 14 2H2Zm-2 9.8V4.698l5.803 3.546L0 11.801Zm6.761-2.97-6.57 4.026A2 2 0 0 0 2 14h6.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.606-3.446l-.367-.225L8 9.586l-1.239-.757ZM16 9.671V4.697l-5.803 3.546.338.208A4.482 4.482 0 0 1 12.5 8c1.414 0 2.675.652 3.5 1.671Z"/>
                <path d="M15.834 12.244c0 1.168-.577 2.025-1.587 2.025-.503 0-1.002-.228-1.12-.648h-.043c-.118.416-.543.643-1.015.643-.77 0-1.259-.542-1.259-1.434v-.529c0-.844.481-1.4 1.26-1.4.585 0 .87.333.953.63h.03v-.568h.905v2.19c0 .272.18.42.411.42.315 0 .639-.415.639-1.39v-.118c0-1.277-.95-2.326-2.484-2.326h-.04c-1.582 0-2.64 1.067-2.64 2.724v.157c0 1.867 1.237 2.654 2.57 2.654h.045c.507 0 .935-.07 1.18-.18v.731c-.219.1-.643.175-1.237.175h-.044C10.438 16 9 14.82 9 12.646v-.214C9 10.36 10.421 9 12.485 9h.035c2.12 0 3.314 1.43 3.314 3.034v.21Zm-4.04.21v.227c0 .586.227.8.581.8.31 0 .564-.17.564-.743v-.367c0-.516-.275-.708-.572-.708-.346 0-.573.245-.573.791Z"/>
              </svg>  
                  itstmz@tamazunchale.tecnm.mx</li>
              <li class="blanco list-group-item">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-envelope-at-fill" viewBox="0 0 16 16">
                <path d="M2 2A2 2 0 0 0 .05 3.555L8 8.414l7.95-4.859A2 2 0 0 0 14 2H2Zm-2 9.8V4.698l5.803 3.546L0 11.801Zm6.761-2.97-6.57 4.026A2 2 0 0 0 2 14h6.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.606-3.446l-.367-.225L8 9.586l-1.239-.757ZM16 9.671V4.697l-5.803 3.546.338.208A4.482 4.482 0 0 1 12.5 8c1.414 0 2.675.652 3.5 1.671Z"/>
                <path d="M15.834 12.244c0 1.168-.577 2.025-1.587 2.025-.503 0-1.002-.228-1.12-.648h-.043c-.118.416-.543.643-1.015.643-.77 0-1.259-.542-1.259-1.434v-.529c0-.844.481-1.4 1.26-1.4.585 0 .87.333.953.63h.03v-.568h.905v2.19c0 .272.18.42.411.42.315 0 .639-.415.639-1.39v-.118c0-1.277-.95-2.326-2.484-2.326h-.04c-1.582 0-2.64 1.067-2.64 2.724v.157c0 1.867 1.237 2.654 2.57 2.654h.045c.507 0 .935-.07 1.18-.18v.731c-.219.1-.643.175-1.237.175h-.044C10.438 16 9 14.82 9 12.646v-.214C9 10.36 10.421 9 12.485 9h.035c2.12 0 3.314 1.43 3.314 3.034v.21Zm-4.04.21v.227c0 .586.227.8.581.8.31 0 .564-.17.564-.743v-.367c0-.516-.275-.708-.572-.708-.346 0-.573.245-.573.791Z"/>
              </svg> 
              Luigi.cp@tamazunchale.tecnm.mx</li>
              <li class="blanco list-group-item">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
              </svg>  
               01(483)3618361/62</li>
              <li class="blanco list-group-item">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
              </svg>  
               4891000179</li>
            </div>
          </div>
        </div>
        <div class="col">
          <br>
          <h2 class="blanco"><b>SÍGUENOS</b></h2>
          <br>
          <div class="row text-center">
            <div class="col text-center container-fluid">
              <li class="list-group-item blanco">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
              </svg>
              GULGUAP</li>
              <li class="list-group-item blanco">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-instagram" viewBox="0 0 16 16">
                <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
              </svg> 
              @hulguap</li>
              <li class="list-group-item blanco">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
                <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
              </svg>  
              @hulguap</li>
            </div>
          </div>
        </div>
        <div class="col">
          <br>
          <h2 class="blanco"><b>ESCANÉAME</b></h2>
            <img src="img/adobe_express.png" alt="" class="border rounded" width="100">
        </div>
        <div class="col">
          <br>
          <br>
          <figure class="text-end">
            <blockquote class="blockquote">
              <p class="blanco fs-4">“El software es como el sexo: cuando es gratis es mejor.”</p>
            </blockquote>
            <figcaption class="blockquote-footer blanco fs-6">
              Linus <cite title="Source Title">Benedict Torvalds.</cite>
            </figcaption>
          </figure>
        </div>
      </div>
    </div>
    <br>
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
<script src="js/funcion_ajax.js"></script>
<script src="js/validar.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init();
</script>
</html>