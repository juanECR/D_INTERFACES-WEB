document.addEventListener('DOMContentLoaded', function () {
    listarTokens();
});
async function registrarToken() {
    try {
        let valores = new FormData(frm_new_token);
        valores.append('sesion', session_session);
        valores.append('token', token_token);
        let result = await fetch(base_url_server + 'src/control/tokensApi.php?tipo=registrarToken', {
            mode: 'cors',
            method: 'POST',
            cache: 'no-cache',
            body: valores
        });
        let json = await result.json();
        let form = document.getElementById("frm_new_token");
        let modal = bootstrap.Modal.getInstance(document.getElementById('AgregarToken'));
        if (json.status) {
            form.reset();
            modal.hide();
            console.log('registrado');
            listarTokens();
        } else {
            let alertContainer = document.getElementById('alert-container');
            alertContainer.innerHTML = `<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                              ${json.mensaje}
                                         </div>`;
        }
    } catch (e) {
        console.log("Error function || " + e);
    }
}

async function listarTokens() {

    let tableBody = document.getElementById("tbody_tokensApi");
    tableBody.innerHTML = `<div class="card-body text-center"><div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div></div>`;
    try {
        let valores = new FormData();
        valores.append('sesion', session_session);
        valores.append('token', token_token);
        let result = await fetch(base_url_server + 'src/control/tokensApi.php?tipo=listarTokens', {
            mode: 'cors',
            method: 'POST',
            cache: 'no-cache',
            body: valores
        });
        let json = await result.json();
        if (json.status) {
            tableBody.innerHTML = '';
            let datos = json.contenido;
            if (datos.length > 0) {
                let contador = 0;
                datos.forEach(item => {
                    let tr = document.createElement("tr");
                    tr.id = item.id;
                    contador++;
                    tr.innerHTML = `
                                    <td><a href="#!">#T${contador}</a></td>
                                    <td>${item.creado_en}</td>
                                    <td><a href="#!">${item.token}</a></td>
                                    <td>${item.descripcion}</td>                     
                                    <td><button type="button" class="btn btn-link text-primary p-0" data-bs-toggle="modal"data-bs-target="#actualizazrToken" onclick="obtenerDatosToken(${item.id});"><i class="bx bx-edit fs-4"></i></button></td>
               `;
                    tableBody.append(tr);
                });
            } else {
                tableBody.innerHTML = '<tr><td colspan="5">no hay tokens para mostrar</td></tr>';
            }
        } else {
            console.log("json.mensaje");
            tableBody.innerHTML = '<tr><td colspan="5">Error al mostrar tokens</td></tr>';
        }
    } catch (e) {
        console.log("Error function || " + e);
    }
}

async function obtenerDatosToken(idToken) {
    let token = document.getElementById("tokenApi_new");
    let descripcion = document.getElementById("descripcion_new");
    let idTokenInput = document.getElementById("idToken_new");
    let body = document.querySelector("#actualizazrToken .modal-body");
    try {
        let datos = new FormData();
        datos.append('sesion', session_session);
        datos.append('token', token_token);
        datos.append('idToken', idToken);
        let result = await fetch(base_url_server + 'src/control/tokensApi.php?tipo=obtenerDatosToken', {
            mode: 'cors',
            method: 'POST',
            cache: 'no-cache',
            body: datos
        });
        let json = await result.json();
        if (json.status) {
            let tokenData = json.contenido;
            idTokenInput.value = tokenData.id;
            token.value = tokenData.token;
            descripcion.value = tokenData.descripcion;
        }else{
            body.innerHTML = `<div class="alert alert-danger" role="alert">
                                      Error al obtener los datos del token.
                                 </div>`;
        }
    } catch (e) {
        console.log("Error function || " + e);
    }
}

async function actualizarToken() {
    try {
        let valores = new FormData(frm_update_token);
        valores.append('sesion', session_session);
        valores.append('token', token_token);
        let result = await fetch(base_url_server + 'src/control/tokensApi.php?tipo=actualizarToken', {
            mode: 'cors',
            method: 'POST',
            cache: 'no-cache',
            body: valores
        });
        let json = await result.json();
        if (json.status) {
            let modal = bootstrap.Modal.getInstance(document.getElementById('actualizazrToken'));
            modal.hide();
            listarTokens();
        } else {
            let alertContainer = document.getElementById('alert-container-upd');
            alertContainer.innerHTML =  `<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                              ${json.mensaje}
                                         </div>`;
        }
    } catch (e) {
        console.log("Error function || " + e);
    }
}