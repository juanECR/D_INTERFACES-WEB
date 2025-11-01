//apis consulting
const uri = 'https://sigev.cwefy.com/src/control/api.php?tipo=';
let token = '72590064c38aa4ad1a9561e4dd80bb9f2bb57ebd05a32808a964396f2bc14322-20251005-1';


document.addEventListener('DOMContentLoaded', function() {
    listarEventos();
});

async function listarEventos() {
    try {
        let datosForm = new FormData();
        datosForm.append('token', token);

        let respuesta = await fetch(uri +'listarProximos', {
            method: 'POST',
            mode: 'cors',
            cache: 'no-cache',
            body: datosForm
        });

        let json = await respuesta.json();
        let tabla = document.getElementById("tbody_eventos");

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