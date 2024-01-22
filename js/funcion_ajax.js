function ajax() {
    var xmlhttp = false;
    try {
        xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
    } catch (e) {
        try {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        } catch (E) {
            xmlhttp = false;
        }
    }

    if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
        xmlhttp = new XMLHttpRequest();
    }
    return xmlhttp;
}


function seleccionarContnenedor(idopcion) {
    switch (idopcion) {
        case 1:
            contenedor = document.getElementById('contenedor_submenu');
            break;

        case 2:
            contenedor = document.getElementById('contenedor_submenu2');
            break;
        case 3:
            contenedor = document.getElementById('contenedor_publicaciones');
            break;
        case 4:
            contenedor = document.getElementById('contenedor_respuestas');
            break;
        case 5:
            contenedor = document.getElementById('contenedor_certificaciones');
            break;
    }
    return contenedor;
}

//este a es para el manejo de las opciones de botones y formularios
function buscar(idusuario, idopcion, idcontenedor) {
    seleccionarContnenedor(idcontenedor);
    objetoajax = ajax();
    objetoajax.open("GET", "controller.php?idopcion=" + idopcion);
    objetoajax.onreadystatechange = function() {
        if (objetoajax.readyState == 4 && objetoajax.status == 200) {
            contenedor.innerHTML = objetoajax.responseText
        }
    }
    objetoajax.send(null)
}
//este ajax servira para operacioens datos
function Guardar_usuario(idusuario, idopcion, idcontenedor, tipo) {
    console.log(idusuario, idopcion, idcontenedor, tipo);
    seleccionarContnenedor(idcontenedor);
    Informacion = "c1=" + $('#c1').val() + "&c2=" + $('#c2').val() + "&c3=" + $('#c3').val() + "&c4=" + $('#c4').val() + "&c5=" + $('#c5').val()
    console.log(Informacion);
    objetoajax = ajax();
    objetoajax.open("POST", "controller.php?idopcion=" + idopcion);
    objetoajax.onreadystatechange = function() {
        if (objetoajax.readyState == 4) {
            contenedor.innerHTML = objetoajax.responseText
        }
    }
    objetoajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    objetoajax.send(Informacion);
}

//************************************************************************************

function formularios(idopcion, idcontenedor){
    /*
    Función que envía el orden para mostrar los
    formularios.
    */
    console.log(idopcion, idcontenedor);
    seleccionarContnenedor(idcontenedor);

    objetoajax=ajax();
    objetoajax.open("GET", "controller.php?idopcion=" + idopcion); 
    objetoajax.onreadystatechange=function() {
         if (objetoajax.readyState==4 && objetoajax.status==200) {
                contenedor.innerHTML = objetoajax.responseText
                         }
   }
   objetoajax.send(null)  
}

function operaciones(idoperacion, idopcion, idcontenedor, parametro1){
    /*
    Funcion que lleva a cabo la captura
    de los parametros de los diferentes formularios
    del programa.
    */

    switch (idoperacion){
        case 1: // Cacha los parametros del formulario de publicaciones.
            seleccionarContnenedor(idcontenedor);
            parameters = "i1="+document.getElementById('i1').value
                        +"&i2="+document.getElementById('i2').value
                        +"&i3="+document.getElementById('i3').value
                        +"&i4="+document.getElementById('i4').value
                        +"&i5="+document.getElementById('i5').value;
            objectAjax(idopcion, parameters);
            break;
        case 2: // Envia el id de la publicacion al apartado de respuestas.
            seleccionarContnenedor(idcontenedor);
            parameters = "parametro_1="+parametro1;
            objectAjax(idopcion, parameters);
            break;
        case 3: // Envia el id de la publicacion junto con la respuesta para su guardado.
            seleccionarContnenedor(idcontenedor);
            parameters = "id_publicacion="+parametro1
                        +"&i1="+document.getElementById('i1').value;
            objectAjax(idopcion, parameters);
            operaciones(2, 13, 4, parametro1);
            break;
        case 4: // Cacha los parametros del formulario de certificaciones.
            seleccionarContnenedor(idcontenedor);
            parameters = "i1="+document.getElementById('i1').value
                        +"&i2="+document.getElementById('i2').value
                        +"&i3="+document.getElementById('i3').value
                        +"&i4="+document.getElementById('i4').value
                        +"&i5="+document.getElementById('i5').value
                        +"&i6="+document.getElementById('i6').value
                        +"&i7="+document.getElementById('i7').value;
            objectAjax(idopcion, parameters);
            break;

    }
}

function objectAjax(idopcion, parameters){
    /*
    Función que contiene el objeto ajax extraido
    para evitar redundancias de código.
    */
        console.log(parameters);
        objetoajax=ajax();
        objetoajax.open("POST", "controller.php?idopcion=" + idopcion); 
        objetoajax.onreadystatechange=function() {
        if (objetoajax.readyState==4 && objetoajax.status==200) {
                contenedor.innerHTML = objetoajax.responseText
        }

        }
        objetoajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        objetoajax.send(parameters);
}

//************************************************************************************

function Guardar_prestamos(idusuario, idopcion, idcontenedor, tipo) {
    console.log(idusuario, idopcion, idcontenedor, tipo);
    seleccionarContnenedor(idcontenedor);
    Informacion = "c1=" + $('#c11').val() + "&c2=" + $('#c22').val() + "&c3=" + $('#c33').val() + "&c4=" + $('#c4').val() + "&c5=" + $('#c5').val()
    console.log(Informacion);

    objetoajax = ajax();
    objetoajax.open("POST", "controller.php?idopcion=" + idopcion);
    objetoajax.onreadystatechange = function() {
        if (objetoajax.readyState == 4) {
            contenedor.innerHTML = objetoajax.responseText
        }
    }
    objetoajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    objetoajax.send(Informacion);
}

function drop_datos(idusuario, idopcion, idcontenedor, tipo) {
    console.log(idusuario, idopcion, idcontenedor, tipo);
    seleccionarContnenedor(idcontenedor);
    Informacion = "c1=" + $('#c1').val()
    console.log(Informacion);


    objetoajax = ajax();
    objetoajax.open("POST", "controller.php?idopcion=" + idopcion);
    objetoajax.onreadystatechange = function() {
        if (objetoajax.readyState == 4) {
            contenedor.innerHTML = objetoajax.responseText
        }
    }
    objetoajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    objetoajax.send(Informacion);
}

function regis_devol(idusuario, idopcion, idcontenedor, tipo) {
    console.log(idusuario, idopcion, idcontenedor, tipo);
    seleccionarContnenedor(idcontenedor);
    Informacion = "c1=" + $('#c1').val() + "&c2=" + $('#c2').val() + "&c3=" + $('#c33').val()+ "&c4=" + $('#c4').val()
    console.log(Informacion);


    objetoajax = ajax();
    objetoajax.open("POST", "controller.php?idopcion=" + idopcion);
    objetoajax.onreadystatechange = function() {
        if (objetoajax.readyState == 4) {
            contenedor.innerHTML = objetoajax.responseText
        }
    }
    objetoajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    objetoajax.send(Informacion);
}
function modificar_datos(idusuario, idopcion, idcontenedor, tipo) {
    console.log(idusuario, idopcion, idcontenedor, tipo);
    seleccionarContnenedor(idcontenedor);
    Informacion = "c1=" + $('#c1').val() + "&c2=" + $('#c2').val()
    console.log(Informacion);


    objetoajax = ajax();
    objetoajax.open("POST", "controller.php?idopcion=" + idopcion);
    objetoajax.onreadystatechange = function() {
        if (objetoajax.readyState == 4) {
            contenedor.innerHTML = objetoajax.responseText
        }
    }
    objetoajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    objetoajax.send(Informacion);
}
function Guardar_libros(idusuario, idopcion, idcontenedor, tipo) {
    console.log(idusuario, idopcion, idcontenedor, tipo);
    seleccionarContnenedor(idcontenedor);
    Informacion = "c1=" + $('#c1').val() + "&c2=" + $('#c2').val() + "&c3=" + $('#c3').val() + "&c4=" + $('#c4').val() + "&c5=" + $('#c5').val()
    console.log(Informacion);

    objetoajax = ajax();
    objetoajax.open("POST", "controller.php?idopcion=" + idopcion);
    objetoajax.onreadystatechange = function() {
        if (objetoajax.readyState == 4) {
            contenedor.innerHTML = objetoajax.responseText
        }
    }
    objetoajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    objetoajax.send(Informacion);
}