function validar_datos(clave, contra) {
    let parametros = {
        clave: clave,
        contra: contra,
    }
    $.ajax({
            type: "POST",
            url: "validar_login.php",
            data: parametros
        })
        .done(function(response) {
            if (response == 1) {
                window.location.assign("index.php");
            } else {
                console.log(response);
            }
        })
}

function recibe_datos(idopcion,c1,c2,c3,c4,c5){
    //console.log(c1,c2,c3,c4,c5) 
    let parametros={
        'idopcion':idopcion,
        'c1':c1,
        'c2':c2,
        'c3':c3,
        'c4':c4,
        'c5':c5,
    }
    $.ajax({
        type: "POST",
        url: "vistas.php",
        data: parametros
    })
    .done(function(response){
        console.log(response);
        //alert(response);
        //location.reload();
    })
}

function actualiza_pass(idopcion,c1,c2){
    console.log(idopcion, c1, c2); 
    let parametros={
        'idopcion':idopcion,
        'c1':c1,
        'c2':c2,
    }
    $.ajax({
        type: "POST",
        url: "vistas.php",
        data: parametros
    })
    .done(function(response){
        console.log(response);
        //alert(response);
        //location.reload();
    })
}