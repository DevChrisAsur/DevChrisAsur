<style>
  #formularioNotas {
    background-color: #f9f9f9;
    border-radius: 8px;
    padding: 20px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  }

  #formularioNotas .form-group label {
    font-weight: bold;
    color: #333;
  }

  #formularioNotas .form-control {
    border-radius: 6px;
  }

  #guardarNota {
    background-color: #007bff;
    border-color: #007bff;
    color: #fff;
    font-weight: bold;
    border-radius: 6px;
    padding: 10px 20px;
  }

  #guardarNota:hover {
    background-color: #0056b3;
    border-color: #004085;
  }

  /* Estilo personalizado para el campo de carga de documento */
  .form-group input[type="file"] {
    display: none;
    /* Ocultar el campo de archivo original */
  }

  .custom-file-upload {
    display: inline-block;
    padding: 10px 20px;
    color: #fff;
    background-color: #007bff;
    border-radius: 6px;
    cursor: pointer;
    font-weight: bold;
    transition: background-color 0.3s ease;
  }

  .custom-file-upload:hover {
    background-color: #0056b3;
  }

  #file-name {
    margin-left: 10px;
    font-style: italic;
    color: #555;
  }

  .nota-lista-scroll {
    max-height: 500px;
    /* Ajusta la altura que necesites */
    overflow-y: auto;
    padding-right: 8px;
  }

  .nota-card {
    width: 100%;
    background-color: #fff;
    border-radius: 12px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    padding: 16px;
    font-family: sans-serif;
    margin-bottom: 16px;
    display: flex;
    flex-direction: column;
  }

  .nota-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 10px;
    border-bottom: 1px solid #eee;
    padding-bottom: 10px;
  }

  .nota-titulo {
    font-size: 18px;
    margin: 0;
    color: #2c3e50;
  }

  .nota-usuario {
    font-size: 12px;
    color: #787779;
    display: flex;
    align-items: center;
  }

  .nota-usuario::before {
    content: "👤";
    margin-right: 4px;
  }

  .nota-body {
    font-size: 15px;
    color: #333;
    margin-bottom: 15px;
    white-space: pre-wrap;
  }

  .nota-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
    font-size: 13px;
    border-top: 1px solid #eee;
    padding-top: 10px;
    color: #888;
  }

  .nota-fecha::before {
    content: "📅 ";
  }

  .nota-archivo {
    text-decoration: none;
    color: #2980b9;
  }

  .nota-archivo::before {
    content: "📎 ";
  }

  .drop-zone {
    border: 2px dashed #aaa;
    border-radius: 10px;
    padding: 20px;
    text-align: center;
    cursor: pointer;
    transition: background-color 0.2s ease;
  }

  .drop-zone.dragover {
    background-color: #f1f1f1;
    border-color: #007bff;
  }

  .drop-zone input {
    display: none;
  }

  .modal-lg {
    max-width: 900px;
  }

  .nota-lista-scroll {
    max-height: 300px;
    overflow-y: auto;
    border: 1px solid #ddd;
    padding: 10px;
    background-color: #fafafa;
  }

  .card {
    border-radius: 8px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
  }

  .card-header {
    background-color: #f5f5f5;
    font-weight: bold;
  }
</style>

<div class="modal fade" id="modalNotasLead" tabindex="-1" role="dialog" aria-labelledby="modalNotasLeadLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

      <div class="modal-header" style="background-color:#922b21; color:white;">
        <h5 class="modal-title" id="modalNotasLeadLabel">Notas del Lead</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">

        <!-- Bloque formulario -->
        <div class="card mb-3">
          <div class="card-body">
            <form id="formularioNotas" method="POST" enctype="multipart/form-data">
              <input type="hidden" name="idLead" id="idLead" value="">

              <div class="row">
                <div class="col-md-6">
                  <label for="nuevoTituloNota">Título:</label>
                  <input type="text" class="form-control" name="nuevoTituloNota" id="nuevoTituloNota" placeholder="Ingresar Título" required>
                </div>
              </div>

              <div class="row mt-3">
                <div class="col-md-12">
                  <label for="contenidoNota">Nota:</label>
                  <textarea class="form-control" name="contenidoNota" id="contenidoNota" rows="5" required></textarea>
                </div>
              </div>

              <div class="row mt-3">
                <div class="col-md-12">
                  <label for="archivoNota">Subir Documento o Imagen:</label>
                  <div class="drop-zone" id="dropZone">
                    <span id="dropText">Arrastra el archivo aquí o haz clic</span>
                    <input type="file" name="archivoNota" id="archivoNota" accept=".pdf,.doc,.docx,.txt,.jpg,.jpeg,.png,.gif">
                  </div>
                  <span id="file-name">Ningún archivo seleccionado</span>
                </div>
              </div>

              <div class="modal-footer mt-3">
                <button type="submit" class="btn" id="guardarNota">Guardar Nota</button>
              </div>
            </form>
          </div>
        </div>

        <!-- Bloque notas -->
        <div class="card">
          <div class="card-header">Notas guardadas</div>
          <div class="card-body nota-lista-scroll" id="contenedorNotas"></div>
        </div>

      </div>

    </div>
  </div>
</div>

    <script>
        const dropZone = document.getElementById('dropZone');
        const fileInput = document.getElementById('archivoNota');
        const fileName = document.getElementById('file-name');

        // Click sobre la zona = abrir selector de archivos
        dropZone.addEventListener('click', () => fileInput.click());

        // Cambiar texto al seleccionar archivo
        fileInput.addEventListener('change', () => {
            if (fileInput.files.length) {
                fileName.textContent = fileInput.files[0].name;
            } else {
                fileName.textContent = "Ningún archivo seleccionado";
            }
        });

        // Evitar que el navegador abra el archivo
        ['dragover', 'drop'].forEach(eventName => {
            dropZone.addEventListener(eventName, e => e.preventDefault());
        });

        // Efecto visual al arrastrar
        dropZone.addEventListener('dragover', () => dropZone.classList.add('dragover'));
        dropZone.addEventListener('dragleave', () => dropZone.classList.remove('dragover'));

        // Manejar archivos soltados
        dropZone.addEventListener('drop', e => {
            dropZone.classList.remove('dragover');
            if (e.dataTransfer.files.length) {
                fileInput.files = e.dataTransfer.files; // Asignar el archivo al input
                fileName.textContent = e.dataTransfer.files[0].name;
            }
        });
    </script>