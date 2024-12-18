const url = "http://localhost/proyectoPlataformas/public/index.php";

// Esperar a que el DOM se cargue
document.addEventListener("DOMContentLoaded", function() {
    // Agregar el listener al cambio del select
    document.getElementById("reporte").addEventListener("change", mostrarOpcion);
});

function mostrarOpcion() {
    // Obtener la opción seleccionada
    const opcion = document.getElementById("reporte").value;
    console.log(opcion);

    const xhr = new XMLHttpRequest();

    // Preparar la solicitud
    xhr.open('GET', `${url}/${opcion}`, true);

    // Definir qué hacer cuando la solicitud se complete
    xhr.onload = function () {
        if (xhr.status === 200) {
            try {
                // Convertir la respuesta en JSON
                const response = JSON.parse(xhr.responseText);

                // Acceder al array dentro del objeto "Resultado"
                const data = response.Resultado;
                console.log("Datos recibidos: ", data);

                // Crear tabla dinámica
                generarTabla(data);
            } catch (error) {
                console.log("Error al parsear JSON: ", error);
            }
        } else {
            console.log("Error en la solicitud: " + xhr.status);
        }
    };

    // Definir qué hacer en caso de error
    xhr.onerror = function () {
        console.log("Hubo un error en la solicitud.");
    };

    // Enviar la solicitud
    xhr.send();
}

function generarTabla(data) {
    // Validar que data sea un array y contenga datos
    if (!Array.isArray(data) || data.length === 0) {
        console.log("No hay datos para mostrar en la tabla.");
        return;
    }

    // Obtener el contenedor donde se mostrará la tabla
    const contenedor = document.getElementById("tabla-contenedor");

    if (!contenedor) {
        console.error("El contenedor de la tabla no existe.");
        return;
    }

    // Limpiar contenido previo
    contenedor.innerHTML = "";

    // Crear la tabla
    const table = document.createElement("table");
    table.border = "1";

    // Crear encabezados de la tabla
    const thead = document.createElement("thead");
    const trHead = document.createElement("tr");

    // Obtener las claves del primer objeto para los encabezados
    const keys = Object.keys(data[0]);
    keys.forEach(key => {
        const th = document.createElement("th");
        th.textContent = key;
        trHead.appendChild(th);
    });
    thead.appendChild(trHead);
    table.appendChild(thead);

    // Crear cuerpo de la tabla
    const tbody = document.createElement("tbody");
    data.forEach(item => {
        const tr = document.createElement("tr");
        keys.forEach(key => {
            const td = document.createElement("td");
            td.textContent = item[key];
            tr.appendChild(td);
        });
        tbody.appendChild(tr);
    });
    table.appendChild(tbody);

    // Agregar la tabla al contenedor
    contenedor.appendChild(table);
}
