// facturas.js
function cargarInformacionFactura(idCliente) {
  var datos = new FormData();
  datos.append("idCliente", idCliente);

  $.ajax({
    url: "ajax/facturas.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      console.log(respuesta);
      if (respuesta.error) {
        console.error("Error:", respuesta.error);
        alert("Error: " + respuesta.error);
      } else {
        $("#InfoFactura").text(respuesta.id_factura);
        $("#InfoFechaEmision").text(respuesta.fecha_emision);
        $("#InfoBanco").text(respuesta.bank);
        $("#InfoTitular").text(respuesta.titular);
        $("#InfoNumeroCuenta").text(respuesta.account_number);
        $("#InfoTipoCuenta").text(respuesta.account_type);
        $("#InfoMonto").text(respuesta.monto);
        $("#InfoStatusFactura").text(respuesta.status_factura);
        $("#InfoFechaLimite").text(respuesta.fecha_limite);

        // Guardar el ID en localStorage
        localStorage.setItem("idFacturaSeleccionado", respuesta.id_factura);

        // Llamar a verCuotas para actualizar la tabla
        verCuotas();
      }
    },
    error: function (jqXHR, textStatus, errorThrown) {
      console.error("Error en la solicitud AJAX:", textStatus, errorThrown);
    },
  });
}

$(document).on("click", "#btnInformacionAdicional", function () {
  var idCliente = $(this).attr("idCliente");
  if (!idCliente) {
    console.error("No se encontró idCliente en el botón.");
    return;
  }

  cargarInformacionFactura(idCliente); // Reutiliza la lógica
});

function verCuotas() {
  var idFactura = localStorage.getItem("idFacturaSeleccionado");
  if (!idFactura) {
    limpiarTablaCuotas();
    console.error("No se encontró idFactura en localStorage.");
    return;
  }

  var datos = new FormData();
  datos.append("accion", "verCuotasPorFactura");
  datos.append("idFactura", idFactura);

  $.ajax({
    url: "ajax/cuotas.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (response) {
      if (response.error) {
        console.error("Error:", response.error);
        alert("Error: " + response.error);
        limpiarTablaCuotas();
      } else {
        llenarTablaCuotas(response);
      }
    },
    error: function (jqXHR, textStatus, errorThrown) {
      console.error("Error en la solicitud AJAX:", textStatus, errorThrown);
      limpiarTablaCuotas();
    },
  });
}

function llenarTablaCuotas(cuotas, perfilUsuario) {
  const tbody = $(".table-cuotas"); // Selecciona el tbody de la tabla específica
  tbody.empty(); // Limpia el contenido anterior de la tabla

  cuotas.forEach((cuota, index) => {
    // Botón visible solo para ciertos perfiles
    let botonAccion = "";
    if (
      perfilUsuario === "Coordinador Comercial" ||
      perfilUsuario === "Administrador" ||
      perfilUsuario === "Super Administrador"
    ) {
      botonAccion = `
        <button class="btn btn-warning btn-editar-cuota" data-id="${cuota.id_cuota}" 
                data-toggle="modal" data-target="#editarCuota">
            <i class="fa fa-pencil"></i> Acción
        </button>`;
    }

    const row = `
      <tr>
          <td>${index + 1}</td>
          <td><input type="text" class="form-control text-center" value="${cuota.fecha_vencimiento}" readonly></td>
          <td><input type="text" class="form-control text-center" value="${cuota.monto}" readonly></td>
          <td><input type="text" class="form-control text-center" value="${cuota.estado_pago}" readonly></td>
          <td>${botonAccion}</td>
      </tr>
    `;

    tbody.append(row); // Añadir la fila a la tabla
  });

  // Evento para abrir el modal con datos específicos (si existe el botón)
  $(".btn-editar-cuota").on("click", function () {
    const idCuota = $(this).data("id"); // Obtener el id de la cuota desde data-id
    cargarDatosModal(idCuota); // Cargar datos en el modal
  });
}


function cargarDatosModal(idCuota) {
  const datos = new FormData();
  datos.append("idCuota", idCuota);
  datos.append("accion", "editar");

  $.ajax({
    url: "ajax/cuotas.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      if (respuesta.error) {
        alert("Error: " + respuesta.error);
      } else {
        $("#editarCuota input[name='idCuota']").val(respuesta.id_cuota);
        $("#editarCuota input[name='fecha_vencimiento']").val(
          respuesta.fecha_vencimiento
        );
        $("#editarCuota input[name='fecha_pago']").val(respuesta.fecha_pago);
        $("#editarCuota select[name='estado_pago']").val(respuesta.estado_pago);
      }
    },
    error: function (xhr, status, error) {
      console.error("Error en la solicitud AJAX:", status, error);
    },
  });
}

$(document).on("click", ".btn-editar-cuota", function () {
  const idCuota = $(this).data("id");
  cargarDatosModal(idCuota);
});

// Función para guardar los cambios en el modal
$("#guardarCambios").on("click", function () {
  var idCuota = $("#idCuota").val();
  var fechaVencimiento = $("#fechaVencimiento").val();
  var estadoPago = $("#estadoPago").val();
  var fechaPago = $("#fechaPago").val();

  var datos = new FormData();
  datos.append("idCuota", idCuota);
  datos.append("editarfechaVencimiento", fechaVencimiento);
  datos.append("editarEstadoPago", estadoPago);
  datos.append("editarFechaPago", fechaPago);

  datos.append("accion", "editarCuota");

  console.log("Datos enviados:", {
    idCuota: idCuota,
    fechaVencimiento: fechaVencimiento,
    estadoPago: estadoPago,
    fechaPago: fechaPago,
    action: "editarCuota",
  });

  $.ajax({
    url: "ajax/cuotas.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (respuesta) {
      console.log("respuesta del servidor", respuesta);
      if (respuesta.success) {
        alert(respuesta.success); // Mensaje de éxito
        $("#editarCuota").modal("hide"); // Cerrar el modal
        verCuotas(); // Refrescar la tabla de cuotas
      } else {
        alert("Error: " + respuesta.error);
      }
    },
    error: function (xhr, status, error) {
      console.error("Error en la solicitud AJAX: ", status, error);
    },
  });
});

document.addEventListener("DOMContentLoaded", function () {
    const editBtn = document.getElementById("btnEdit");
    const saveBtn = document.getElementById("btnSave");
    const fields = document.querySelectorAll(".info-value");

    if (!editBtn || !saveBtn) return;

    let datosFactura = {}; // 🔹 Guardará los datos actuales

    editBtn.addEventListener("click", () => {
        datosFactura = {}; // Reiniciamos

        fields.forEach((field) => {
            datosFactura[field.id] = field.innerText.trim();

            // 🔹 Si es estado, poner un select
            if (field.id === "InfoStatusFactura") {
                const select = document.createElement("select");
                select.id = "InfoStatusFactura";
                select.className = "info-value";

                const opciones = ["Activa", "Finalizada"];
                opciones.forEach((opcion) => {
                    const opt = document.createElement("option");
                    opt.value = opcion;
                    opt.textContent = opcion;
                    if (opcion === field.innerText.trim()) {
                        opt.selected = true;
                    }
                    select.appendChild(opt);
                });

                field.replaceWith(select);

            // 🔹 Si es monto, NO permitir edición
            } else if (field.id === "InfoMonto") {
                field.setAttribute("contenteditable", "false");
                field.style.backgroundColor = "#f0f0f0"; // color suave para indicar que está bloqueado
                field.style.cursor = "not-allowed";

            // 🔹 El resto de campos sí son editables
            } else {
                field.setAttribute("contenteditable", "true");
            }
        });

        console.group("📋 Datos actuales antes de editar");
        console.log(datosFactura);
        console.groupEnd();

        editBtn.style.display = "none";
        saveBtn.style.display = "inline-block";
    });

    saveBtn.addEventListener("click", () => {
        document.querySelectorAll(".info-value").forEach((field) => {
            datosFactura[field.id] = field.tagName === "SELECT"
                ? field.value
                : field.innerText.trim();
        });

        datosFactura["id_factura"] = localStorage.getItem("idFacturaSeleccionado");
        datosFactura["action"] = "actualizarInfoFinanciera";

        let formData = new FormData();
        for (let key in datosFactura) {
            formData.append(key, datosFactura[key]);
        }

        $.ajax({
            url: "ajax/facturas.ajax.php",
            method: "POST",
            data: formData,
            processData: false,
            contentType: false,
            dataType: "json",
            success: function (respuesta) {
                console.log("Servidor:", respuesta);
                if (respuesta.ok || respuesta.success) {
                    alert("Información actualizada correctamente ✅");
                } else {
                    alert("Error al actualizar ❌");
                }
            },
            error: function (xhr, status, error) {
                console.error("Error AJAX:", error);
                console.log("Respuesta completa:", xhr.responseText);
                alert("Hubo un error en la conexión con el servidor");
            },
        });

        // Restaurar campo de estado a texto
        const selectEstado = document.getElementById("InfoStatusFactura");
        if (selectEstado && selectEstado.tagName === "SELECT") {
            const divEstado = document.createElement("div");
            divEstado.id = "InfoStatusFactura";
            divEstado.className = "info-value";
            divEstado.textContent = selectEstado.value;
            selectEstado.replaceWith(divEstado);
        }

        fields.forEach((field) => {
            if (field.tagName === "DIV") {
                field.setAttribute("contenteditable", "false");
                field.style.backgroundColor = ""; // quitar fondo gris
                field.style.cursor = "";
            }
        });

        saveBtn.style.display = "none";
        editBtn.style.display = "inline-block";
    });
});