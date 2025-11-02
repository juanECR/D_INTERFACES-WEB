document.addEventListener('DOMContentLoaded', function () {
    listarTokens();
});
async function registrarToken() {
    let form = document.getElementById("frm_new_token");
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
        if (json.status) {
            form.reset();
            console.log('registrado');
            listarTokens();
        } else {
            form.reset();
            console.log(json.mensaje);
        }
    } catch (e) {
        console.log("Error function || " + e);
    }
}

async function listarTokens() {
    let tableBody = document.getElementById("tbody_tokensApi");
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
                                    <td><i class="bx bxs-circle text-success me-1"></i>Completed</td>
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

/* async function actualizarToken() {
    let form = document.getElementById("frm_new_token");
    let tableBody = document.getElementById("tbody_tokensApi");
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
        if (json.status) {

        } else {

        }
    } catch (e) {
        console.log("Error function || " + e);
    }
} */