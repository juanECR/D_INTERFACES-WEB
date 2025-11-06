document.addEventListener('DOMContentLoaded', function () {
    obtenerToken();
    listarEventos();
});

async function obtenerToken() {
    try {
        let datos = new FormData();
        datos.append('sesion', session_session);
        datos.append('token', token_token);
        let result = await fetch(base_url_server + 'src/control/tokensApi.php?tipo=listarTokens', {
            mode: 'cors',
            method: 'POST',
            cache: 'no-cache',
            body: datos
        });
        let json = await result.json();
        if (json.status && json.contenido && json.contenido.length > 0) {
            let datos = json.contenido;
            token = datos[0].token;
            localStorage.setItem('api_token', token);
        } else {
            console.log("Error al obtener el token" + json.mensaje);
        }
    } catch (e) {
        console.log("Error function || " + e);
    }
}

//API requests | | | | | ------------------------------------------------
const uri = 'https://sigev.cwefy.com/src/control/api.php?tipo=';
let token = localStorage.getItem('api_token');

async function listarEventos() {
    let tabla = document.getElementById("tbody_eventos");
    tabla.innerHTML = `<div class="text-center"><div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div></div>`;
    try {
        let datosForm = new FormData();
        datosForm.append('token', token);

        let respuesta = await fetch(uri + 'listarProximos', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: datosForm
        });

        let json = await respuesta.json();
        if (json.status) {
            if (Array.isArray(json.data)) {
                tabla.innerHTML = '';
                let contador = 0;
                json.data.forEach((item) => {
                    contador++; // Incrementa aquí
                    let nuevaFila = document.createElement("tr");
                    nuevaFila.id = item.id;
                    nuevaFila.dataset.categoria = item.categoria_evento_id;
                    nuevaFila.innerHTML = `

                                            <td><a href="#!">#ESN${contador}</a></td>
                                            <td>${item.fecha_inicio}</td>
                                            <td><a href="#!">${item.titulo}</a></td>
                                            <td>${item.categoriaName}</td>
                                            <td>${item.ubicacion}</td>
                                            <td>${item.organizador_id}</td>
                                            <td><i class="bx bxs-circle text-success me-1"></i>${item.estado}</td>
                    `;

                    tabla.appendChild(nuevaFila);
                });
            } else {
                console.log(json.mensaje);
                tabla.innerHTML = `<tr><td colspan="7">${json.mensaje}</td></tr>`;
            }
        } else {
            console.log(json.mensaje);
            tabla.innerHTML = `<tr><td colspan="7">Error al cargar eventos</td></tr>`;
        }
    } catch (e) {
        console.error('Error petición API:', e);
        document.getElementById("eventsTableBody").innerHTML =
            `<tr><td colspan="7">Error de conexión</td></tr>`;
    }
}

async function CrearEvento() {
    try {
        // capturamos datos del formulario html
        const datos = new FormData(frm_new_evento);
        datos.append('token', token);
        //enviar datos hacia el controlador
        let respuesta = await fetch(uri + 'crearEvento', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: datos
        });
        json = await respuesta.json();
        if (json.status) {
            let modalEl = document.getElementById("CrearEvento");
            let modal = bootstrap.Modal.getInstance(modalEl);
            // Cerrar modal
            modal.hide();
            listarEventos();
        } else {
            console.log(json.mensaje);
            let alertContainer = document.getElementById('alert-container_evento');
            alertContainer.innerHTML = `<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                              ${json.mensaje}
                                         </div>`;
        }
    } catch (e) {
        console.log("Oops, ocurrio un error " + e);
    }
}