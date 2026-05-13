
var reglas = {
    
    nombre:   /^[a-zA-ZáéíóúÁÉÍÓÚ\s]{3,50}$/,
    email:    /[\w\-.]{3,}@([\w-]{2,}\.)+[\w-]{2,4}/,
    pass:     /(?!^[0-9]*$)(?!^[a-zA-Z]*$)^([a-zA-Z0-9]{8,10})$/,
    telefono: /^[67]\d{7}$/,
    fecha:    /^\d{1,2}\/\d{1,2}\/\d{2,4}$/
};


function validarCampo(id, regex, msg) {
    var campo = document.getElementById(id);
    var error = document.getElementById('err_' + id);

    if (!regex.test(campo.value.trim())) {
       
        campo.style.borderColor = '#DC2626';
        error.textContent = msg;
        error.style.display = 'block';
        return false;
    }


    campo.style.borderColor = '#16A34A';
    error.style.display = 'none';
    return true;
}




document.getElementById('nombre').addEventListener('blur', function() {
    validarCampo('nombre', reglas.nombre, 'Solo letras, minimo 3 caracteres');
});

document.getElementById('email').addEventListener('blur', function() {
    validarCampo('email', reglas.email, 'Formato invalido: usuario@dominio.ext');
});


document.getElementById('pass').addEventListener('blur', function() {
    validarCampo('pass', reglas.pass, 'Entre 8 y 10 chars, necesita letras y numeros');
});


document.getElementById('telefono').addEventListener('blur', function() {
    validarCampo('telefono', reglas.telefono, 'Telefono boliviano: empieza en 6 o 7, 8 digitos');
});


document.getElementById('fecha').addEventListener('blur', function() {
    validarCampo('fecha', reglas.fecha, 'Formato invalido, use DD/MM/AAAA');
});


document.getElementById('miForm').addEventListener('submit', function(e) {
   
    e.preventDefault();

    var ok =
        validarCampo('nombre', reglas.nombre, 'Nombre inválido') &&
        validarCampo('email', reglas.email, 'Email inválido') &&
        validarCampo('pass', reglas.pass, 'Contraseña débil') &&
        validarCampo('telefono', reglas.telefono, 'Teléfono inválido');
    if (ok) alert('Formulario válido. Enviando...');
});
