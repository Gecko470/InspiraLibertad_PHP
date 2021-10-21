let arrayId = [];
let arrayC = [];
let arrayP = [];
let spanCant = document.getElementById("spanCant");
let btnModal = document.getElementById("btnModal");
let txtNombre = document.getElementById("txtNombre");
let txtEmail = document.getElementById("txtEmail");
let txaMensaje = document.getElementById("txaMensaje");
let frmC = document.getElementById("frmC");
let divCampos = document.getElementById("divCampos");
let divEmail = document.getElementById("divEmail");
let frmR = document.getElementById("frmR");
let usuario = document.getElementById("usuario");
let nombre = document.getElementById("nombre");
let email = document.getElementById("email");
let telefono = document.getElementById("telefono");
let password = document.getElementById("password");
let frmL = document.getElementById("frmL");
let nombreUsuario = document.getElementById("nombreUsuario");
let pass = document.getElementById("pass");
let inpInicio = document.getElementById("inpInicio");
let btnCompra = document.getElementById("btnCompra");
let frmCompra = document.getElementById("frmCompra");
let passwordNP = document.getElementById("passwordNP");
let repitePasswordNP = document.getElementById("repitePasswordNP");
let frmNP = document.getElementById("frmNP");
spanCant.innerHTML = 0;

function agregar(precio, curso, id) {

    if (arrayId.length == 0) {

        arrayId.push(id);
        arrayC.push(curso);
        arrayP.push(precio);
        spanCant.innerHTML = arrayC.length;

        dibujarTabla();

        localStorage.setItem('cursos', JSON.stringify(arrayC));
        localStorage.setItem('precios', JSON.stringify(arrayP));
        localStorage.setItem('ids', JSON.stringify(arrayId));
        localStorage.setItem('cant', JSON.stringify(arrayC.length));

        document.getElementById("spnCompra").innerHTML = "Curso agregado a tu carrito..";
        btnCompra.click();
    }
    else {

        if (arrayId.includes(id)) {
            document.getElementById("spnCompra").innerHTML = "Ya has agregado este curso a tu carrito..";
            btnCompra.click();
            return;
        }
        else {
            arrayId.push(id);
            arrayC.push(curso);
            arrayP.push(precio);
            spanCant.innerHTML = arrayC.length;

            dibujarTabla();

            localStorage.setItem('cursos', JSON.stringify(arrayC));
            localStorage.setItem('precios', JSON.stringify(arrayP));
            localStorage.setItem('ids', JSON.stringify(arrayId));
            localStorage.setItem('cant', JSON.stringify(arrayC.length));

            document.getElementById("spnCompra").innerHTML = "Curso agregado a tu carrito..";
            btnCompra.click();
        }

    }
}

function eliminar(pos) {

    arrayC.splice(pos, 1);
    arrayP.splice(pos, 1);
    arrayId.splice(pos, 1);
    spanCant.innerHTML = arrayC.length;

    localStorage.setItem('cursos', JSON.stringify(arrayC));
    localStorage.setItem('precios', JSON.stringify(arrayP));
    localStorage.setItem('ids', JSON.stringify(arrayId));
    localStorage.setItem('cant', JSON.stringify(arrayC.length));


    if (arrayC.length == 0 && arrayP.length == 0) {
        document.getElementsByClassName("modal-body")[0].innerHTML = "Tu carrito está vacío";
        localStorage.removeItem('cursos');
        localStorage.removeItem('precios');
        localStorage.removeItem('cant');
        localStorage.removeItem('ids');
    }
    else {
        dibujarTabla();
    }
}

function vaciarCarrito() {

    arrayC = [];
    arrayp = [];
    arrayId = [];
    spanCant.innerHTML = arrayC.length;

    document.getElementsByClassName("modal-body")[0].innerHTML = "Tu carrito está vacío";
    localStorage.removeItem('cursos');
    localStorage.removeItem('precios');
    localStorage.removeItem('cant');
    localStorage.removeItem('ids');

}

function dibujarTabla() {

    let modal = document.getElementsByClassName("modal-body")[0];
    modal.innerHTML = "";
    let text = "";
    let suma = 0;

    text += "<table class='table table-striped'><thead><tr><th>Producto</th><th style='text-align: center;'>Precio</th><th style='text-align: center;'>Acciones</th></tr></thead><tbody>";
    let i;
    for (i = 0; i < arrayC.length; i++) {
        text += "<tr><td>" + arrayC[i] + "</td><td style='text-align: center;'>" + arrayP[i] + "</td><td style='text-align: center;'><button onclick='eliminar(" + i + ")' class='btn text-danger'><i class='bi bi-trash'></i></button></td></tr>";
        suma += arrayP[i];
    }

    text += "<tr><th>Total</th><th style='text-align: center;'>" + suma + "</th></tr></tbody></table>";

    modal.innerHTML = text;
}

function cargarCarrito() {

    if (localStorage.getItem('cursos') != null) {

        arrayC = JSON.parse(localStorage.getItem('cursos'));
        arrayP = JSON.parse(localStorage.getItem('precios'));
        arrayId = JSON.parse(localStorage.getItem('ids'));
        spanCant.innerHTML = JSON.parse(localStorage.getItem('cant'));

        dibujarTabla();
    }
}
window.addEventListener('load', cargarCarrito);

function validarC() {

    if ((txtNombre.value == "") || (txtEmail.value == "") || (txaMensaje.value == "")) {

        alertaC("Todos los campos son obligatorios..");
    }
    else {

        if (!(/^[^\s@]+@[^\s@]+\.[^\s@]+$/).test(txtEmail.value)) {

            alertaC("Revisa tu Email, no es válido..");
        }
        else {

            frmC.submit();
            frmC.reset();
        }

    }
}

function validarR() {

    if ((usuario.value == "") || (nombre.value == "") || (email.value == "") || (telefono.value == "") || (password.value == "")) {

        alertaR("Todos los campos son obligatorios..");
    }
    else {

        if (!(/^[^\s@]+@[^\s@]+\.[^\s@]+$/).test(email.value)) {

            alertaR("Revisa tu Email, no es válido..");
        }
        else if (!(/^(\+34|0034|34)?[ -]*(6|7)[ -]*([0-9][ -]*){8}$/).test(telefono.value)) {

            alertaR("Debe introducir un Teléfono válido..");
        }
        else {

            frmR.submit();
            frmR.reset();
        }

    }
}

function validarL() {

    if ((nombreUsuario.value == "") || (pass.value == "")) {

        alertaL("Los dos campos son obligatorios..");
    }
    else {

        frmL.submit();
    }
}

function validarP() {

    if ((usuario.value == "") ||  (email.value == "") || (telefono.value == "")) {

        alertaP("Todos los campos son obligatorios..");
    }
    else {

        if (!(/^[^\s@]+@[^\s@]+\.[^\s@]+$/).test(email.value)) {

            alertaP("Revisa tu Email, no es válido..");
        }
        else if (!(/^(\+34|0034|34)?[ -]*(6|7)[ -]*([0-9][ -]*){8}$/).test(telefono.value)) {

            alertaP("Debe introducir un Teléfono válido..");
        }
        else {

            frmP.submit();

        }

    }
}

function validarNP(){

    if(passwordNP.value == "" || repitePasswordNP == ""){
        alertaNP("Todos los dos campos son obligatorios..");
    }
    else if(passwordNP.value != repitePasswordNP.value){
        alertaNP("Los password no coinciden..");
    }
    else{
        frmNP.submit();
    }
}

function alertaC(texto) {
    let divAlertaC = document.getElementById("divAlertaC");
    divAlertaC.innerHTML = "<div class='alert alert-danger alert-dismissible'><strong>" + texto + "</strong><button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>"
}

function alertaR(texto) {
    let divAlertaR = document.getElementById("divAlertaR");
    divAlertaR.innerHTML = "<div class='alert alert-danger alert-dismissible'><strong>" + texto + "</strong><button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>"
}

function alertaL(texto) {
    let divAlertaL = document.getElementById("divAlertaL");
    divAlertaL.innerHTML = "<div class='alert alert-danger alert-dismissible'><strong>" + texto + "</strong><button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>"
}

function alertaP(texto) {
    let divAlertaP = document.getElementById("divAlertaP");
    divAlertaP.innerHTML = "<div class='alert alert-danger alert-dismissible'><strong>" + texto + "</strong><button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>"
}

function alertaNP(texto) {
    let divAlertaNP = document.getElementById("divAlertaNP");
    divAlertaNP.innerHTML = "<div class='alert alert-danger alert-dismissible'><strong>" + texto + "</strong><button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button></div>"
}

function comprar() {

    if (inpInicio.value == "0") {
        document.getElementById("spnCompra").innerHTML = "Para poder comprar tus cursos debes estar registrado e iniciar sesión..";
        btnCompra.click();
    }
    else {
        if (arrayId.length == 0) {
            document.getElementById("spnCompra").innerHTML = "No has agregado ningún curso a tu carrito..";
            btnCompra.click();
        }
        else {

            for (let i = 0; i < arrayId.length; i++) {
                let inpCursos = document.createElement("input");
                inpCursos.name = "inpCursos" + i;
                inpCursos.type = "hidden";
                inpCursos.value = arrayId[i];
                frmCompra.appendChild(inpCursos);
            }
            frmCompra.submit();

            vaciarCarrito();

        }
    }
}
