

function pregunta1() {

    
    var peticion = new XMLHttpRequest();

    peticion.open('GET', 'galeria.php', true);

   
    peticion.onreadystatechange = function() {
        if (peticion.readyState == 4 && peticion.status == 200) {

            document.getElementById('contenido').innerHTML = peticion.responseText;
        }
    };

    peticion.send();
}


function abrirModal(idReceta) {

    var peticion = new XMLHttpRequest();

    peticion.open('GET', 'detalle_receta.php?id=' + idReceta, true);

    peticion.onreadystatechange = function() {
        if (peticion.readyState == 4 && peticion.status == 200) {
            document.getElementById('vista').innerHTML = peticion.responseText;
            document.getElementById('modalVerReceta').style.display = 'block';
        }
    };

    peticion.send();
}

function cerrarModal() {
    document.getElementById('modalVerReceta').style.display = 'none';
}



function pregunta2() {

    fetch('form_receta.html')
        .then(function(respuesta) {
            return respuesta.text();  
        })
        .then(function(html) {

            document.getElementById('contenidoFormulario').innerHTML = html;
            document.getElementById('modalFormulario').style.display = 'block';

            cargarTiposSelect();
        });
}



function cargarTiposSelect() {

    fetch('tipos_receta.php')
        .then(function(respuesta) {
            return respuesta.text();
        })
        .then(function(html) {
           
            document.getElementById('selectTipo').innerHTML = html;
        });
}


function guardarReceta() {

    
    var titulo      = document.getElementById('titulo').value;
    var tipo        = document.getElementById('selectTipo').value;
    var preparacion = document.getElementById('preparacion').value;
    var imagen      = document.getElementById('imagen').value;

    
    if (titulo == '' || preparacion == '') {
        document.getElementById('mensajeGuardado').innerHTML = 'Completa titulo y preparacion.';
        document.getElementById('mensajeGuardado').style.color = 'red';
        return; 
    }

    
    var datos = new FormData();
    datos.append('titulo',      titulo);
    datos.append('tipo',        tipo);
    datos.append('preparacion', preparacion);
    datos.append('imagen',      imagen);

    
    var archivoInput = document.getElementById('imagenFile');
    if (archivoInput.files.length > 0) {
        datos.append('imagenFile', archivoInput.files[0]);
    }

    
    fetch('guardar_receta.php', {
        method: 'POST',  
        body: datos     
    })
        .then(function(respuesta) {
            return respuesta.text();
        })
        .then(function(resultado) {

          
            document.getElementById('mensajeGuardado').innerHTML = resultado;

           
            if (resultado.indexOf('correcto') != -1) {

               
                setTimeout(function() {

                    
                    document.getElementById('modalFormulario').style.display = 'none';

                    
                    pregunta1();

                }, 1500);
            }
        });
}

function pregunta3() {
    fetch('listar-recetas.php')
        .then(function(respuesta) {
            return respuesta.text();
        })
        .then(function(html) {
            document.getElementById('contenido').innerHTML = html;
        });
}


function filtrarTabla(tipoElegido) {

    fetch('listar-recetas.php?tipo=' + tipoElegido)
        .then(function(respuesta) {
            return respuesta.text();
        })
        .then(function(html) {
            var parser   = new DOMParser();
            var docNuevo = parser.parseFromString(html, 'text/html');
            var tbodyNuevo  = docNuevo.querySelector('#tablaRecetas tbody');
            var tbodyActual = document.querySelector('#tablaRecetas tbody');
            tbodyActual.innerHTML = tbodyNuevo.innerHTML;
        });
}


function pregunta4() {

  
    fetch('temas.html')
        .then(function(respuesta) {
            return respuesta.text();
        })
        .then(function(html) {
            
            document.getElementById('contenido').innerHTML = html;
        });
}


function anadirColor() {

    
    var color = document.getElementById('inputColor').value;
    var grid = document.getElementById('coloresGrid');

  
    var tarjeta = document.createElement('div');

    tarjeta.style.border        = '1px solid #ddd';
    tarjeta.style.borderRadius  = '6px';
    tarjeta.style.overflow      = 'hidden';
    tarjeta.style.textAlign     = 'center';

    tarjeta.innerHTML =
        '<div style="height:60px; background:' + color + ';"></div>' +
        '<div style="font-size:11px; padding:5px; background:#f9f9f9;">'
            + color.toUpperCase() +
        '</div>';

    grid.appendChild(tarjeta);
}


function cambiarTema(temaElegido) {

    document.body.className = '';

    if (temaElegido == 'oscuro') {
        document.body.classList.add('tema-oscuro');

    } else if (temaElegido == 'contraste') {
        document.body.classList.add('tema-contraste');

    } else if (temaElegido == 'pastel') {
        document.body.classList.add('tema-pastel');
    }
   
}