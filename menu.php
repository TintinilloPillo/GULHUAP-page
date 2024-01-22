
<?php
$idopcion=$_GET['idopcion'];
switch ($idopcion){//para manejar las opciones de cada icono
    case 1:
        ubuntu();
        break;
    case 2:
        centos();
        break;
    case 3:
        zorin();
        break; 
    case 4:
        mint();
        break;
    case 5:
        fedora();
        break;
    case 6:
        debian();
        break;
}
//orden para manejo de la funcion buscar del js:(idusuario, idopcion,idcontenedor)
function ubuntu(){
   print'
   <div class="container rounded border border-4 bg-light">
    <h4>Ubuntu</h4>
    <p>Ubuntu es y siempre será libre de costo. No pagas por una licencia de uso. Puedes descargar, usar y compartir Ubuntu con tus amigos, familiares, escuela o negocios libremente.Ubuntu es y siempre será libre de costo. No pagas por una licencia de uso. Puedes descargar, usar y compartir Ubuntu con tus amigos, familiares, escuela o negocios libremente.</p>
     <p>Ubuntu es un sistema operativo desarrollado por la comunidad que es perfecto para laptops, computadoras de escritorio y servidores. Ya sea que lo utilices en el hogar, en la escuela o en el trabajo, Ubuntu contiene todas las aplicaciones que puedas necesitar, desde procesadores de texto y aplicaciones de email, hasta software para servidor web y herramientas de programación.</p>
     <br>
     <h6>¿Deseas descargar Debian?</h6>
     <p>Pulsa el icono de descarga</p>
        <p class="text-start"><a href="https://releases.ubuntu.com/22.10/ubuntu-22.10-desktop-amd64.iso"><img src="img/descargar.png" alt="" width="50"></a></p>
   </div>
   '; 
}
function centos(){
    print'
    <br>
    <div class="container rounded border border-4 bg-light">
     <h4>Cent OS</h4>
     <p>El esfuerzo de software libre impulsado por la comunidad se centró en el objetivo de proporcionar una plataforma base rica para que las comunidades de código abierto construyan.</p>
     <p>Plataforma consistente y manejable que se adapta a una amplia variedad de implementaciones. Para algunas comunidades de código abierto, es una base sólida y predecible sobre la que construir.</p>
     <br>
     <h6>¿Deseas descargar CentOS?</h6>
     <p>Pulsa el icono de descarga</p>
        <p class="text-start"><a href="http://ftp.osuosl.org/pub/centos/7.9.2009/isos/x86_64/CentOS-7-x86_64-DVD-2009.iso"><img src="img/descargar.png" alt="" width="50"></a></p>
    </div>
    '; 
}
function zorin(){
    print'
    <br>
    <div class="container rounded border border-4 bg-light">
     <h4>Zorin OS</h4>
     <p>La alternativa a Windows y macOS diseñada para hacer que su computadora sea más rápida, más potente, segura y respetuosa con la privacidad.</p>
     <br>
     <p>Zorin OS está diseñado para ser fácil, por lo que no necesita aprender nada para comenzar. La aplicación Zorin Appearance le permite cambiar el diseño del escritorio para que se sienta como el entorno con el que está familiarizado, ya sea Windows, macOS o Linux.</p>
     <br>
     <h6>¿Deseas descargar Zorin OS?</h6>
     <p>Pulsa el icono de descarga</p>
        <p class="text-start"><a href="https://distro.ibiblio.org/zorinos/16/Zorin-OS-16.2-Core-64-bit.iso"><img src="img/descargar.png" alt="" width="50"></a></p>
    </div>
    '; 
}
function mint(){
    print'
    <div class="container rounded border border-4 bg-light">
     <h4>Linux Mint</h4>
     <p>Linux Mint es una de las distribuciones de Linux de escritorio más populares y utilizada por millones de personas, es una de las mejores alternativas a Microsoft Windows y Apple MacOS.</p>
     <ul>
        <li>Funciona fuera de la caja, con soporte multimedia completo y es extremadamente fácil de usar.</li>
        <li>Es gratuito y de código abierto.</li>
        <li>Es impulsado por la comunidad. Se anima a los usuarios a enviar comentarios al proyecto para que sus ideas puedan ser utilizadas para mejorar Linux Mint.</li>
        <li>Es seguro y confiable. Gracias a un enfoque conservador de las actualizaciones de software, un gestor de actualizaciones único y la robustez de su arquitectura Linux.</li>
        <li>Linux Mint requiere muy poco mantenimiento (sin regresiones, sin antivirus, sin anti-spyware ... etc).</li>
    </ul>
     <h6>¿Deseas descargar Linux Mint?</h6>
     <p>Pulsa el icono de descarga</p>
        <p class="text-start"><a href="https://mirrors.edge.kernel.org/linuxmint/stable/21/linuxmint-21-cinnamon-64bit.iso"><img src="img/descargar.png" alt="" width="50"></a></p>
    </div>
    '; 
}
function fedora(){
    print'
    <div class="container rounded border border-4 bg-light">
     <h4>Fedora Workstation</h4>
     <p>Fedora Workstation es un sistema operativo confiable, fácil de usar y potente para su computadora portátil o de escritorio. Es compatible con una amplia gama de desarrolladores, desde aficionados y estudiantes hasta profesionales en entornos corporativos.</p>
     <br>
     <p>Concéntrese en su código en el entorno de escritorio GNOME. GNOME está construido con los comentarios de los desarrolladores y minimiza las distracciones, para que pueda concentrarse en lo que es importante.</p>
     <br>
     <h6>¿Deseas descargar Fedora Workstation?</h6>
     <p>Pulsa el icono de descarga</p>
        <p class="text-start"><a href="https://mirror.xenyth.net/fedora/linux/releases/36/Workstation/x86_64/iso/Fedora-Workstation-Live-x86_64-36-1.5.iso"><img src="img/descargar.png" alt="" width="50"></a></p>
     </div>';
}
function debian(){
    print'
    <div class="container rounded border border-4 bg-light">
     <h4>Debian</h4>
     <p>Debian es un sistema operativo y una distribución de Software Libre. Se mantiene y actualiza gracias al trabajo de muchos usuarios que contribuyen con su tiempo y esfuerzo.</p>
     <br>
     <p>La dedicación de Debian al software libre, su base de voluntarios, su naturaleza no comercial y su modelo de desarrollo abierto la distingue de otras distribuciones del sistema operativo GNU.</p>
     <br>
     <h6>¿Deseas descargar Debian?</h6>
     <p>Pulsa el icono de descarga</p>
     <p><b>Nota:</b> Las nuevas versiones de Debian requieren conexión a internet para su proceso de instalación.</p>
        <p class="text-start"><a href="https://gemmei.ftp.acc.umu.se/debian-cd/current/amd64/iso-cd/debian-11.5.0-amd64-netinst.iso"><img src="img/descargar.png" alt="" width="50"></a></p>
    </div>';
}
?>