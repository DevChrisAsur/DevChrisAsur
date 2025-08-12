const countrySelect = document.getElementById("countryValue");
const stateSelect = document.getElementById("stateValue");
const citySelect = document.getElementById("cityValue");

const inputPais = document.getElementById("nuevoPais");
const inputEstado = document.getElementById("nuevoEstado");
const inputCiudad = document.getElementById("nuevoCiudad");

// Inicializar país fijo (Colombia)
countrySelect.innerHTML = `<option value="Colombia" selected>Colombia</option>`;
inputPais.value = "Colombia";

// Cargar departamentos
async function cargarDepartamentos() {
    try {
        const response = await fetch("https://api-colombia.com/api/v1/Department");
        const departamentos = await response.json();

        stateSelect.innerHTML = `<option value="">Seleccionar Estado</option>`;
        departamentos.forEach(dep => {
            const option = document.createElement("option");
            option.value = dep.name; // Guardar nombre en value
            option.dataset.id = dep.id; // Guardar id en data-id por si lo necesitamos para las ciudades
            option.textContent = dep.name;
            stateSelect.appendChild(option);
        });

        stateSelect.disabled = false;
    } catch (error) {
        console.error("Error cargando departamentos:", error);
    }
}

// Cargar ciudades por departamento
async function cargarCiudades(idDepartamento) {
    try {
        const response = await fetch(`https://api-colombia.com/api/v1/Department/${idDepartamento}/cities`);
        const ciudades = await response.json();

        citySelect.innerHTML = `<option value="">Seleccionar Ciudad</option>`;
        ciudades.forEach(city => {
            const option = document.createElement("option");
            option.value = city.name; // Guardar nombre en value
            option.textContent = city.name;
            citySelect.appendChild(option);
        });

        citySelect.disabled = false;
    } catch (error) {
        console.error("Error cargando ciudades:", error);
    }
}

// Evento cambio de departamento
stateSelect.addEventListener("change", function() {
    const nombreEstado = this.value;
    const idDepartamento = this.options[this.selectedIndex].dataset.id;

    inputEstado.value = nombreEstado;

    // Reset ciudades
    citySelect.innerHTML = `<option value="">Seleccionar Ciudad</option>`;
    citySelect.disabled = true;
    inputCiudad.value = "";

    if (idDepartamento) {
        cargarCiudades(idDepartamento);
    }
});

// Evento cambio de ciudad
citySelect.addEventListener("change", function() {
    inputCiudad.value = this.value;
});

// Ejecutar carga inicial de departamentos
cargarDepartamentos();
