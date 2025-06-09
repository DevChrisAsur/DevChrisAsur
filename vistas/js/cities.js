$(document).ready(function() {
    // Paso 1: Obtener el token de acceso
    $.ajax({
        url: 'https://www.universal-tutorial.com/api/getaccesstoken',
        method: 'GET',
        headers: {
            "Accept": "application/json",
            "api-token": "LGZ24KzWPGoWUUOaNQ5vhthiplxPZnOk-jaAEa0bf51Wi5jsJpdFodhtnwLOZ7hAglc",  // Reemplaza con tu token
            "user-email": "developer@asjurfinlegaltech.com"  // Reemplaza con tu correo
        },
        success: function (data) {
            if (data.auth_token) {
                var auth_token = data.auth_token; // Almacena el token para usarlo en futuras solicitudes

                // Paso 2: Obtener la lista de países
                $.ajax({
                    url: 'https://www.universal-tutorial.com/api/countries/',
                    method: 'GET',
                    headers: {
                        "Authorization": "Bearer " + auth_token,
                        "Accept": "application/json"
                    },
                    success: function (countries) {
                        var countryOptions = "<option value=''>Seleccionar País</option>";
                        countries.forEach(element => {
                            countryOptions += '<option value="' + element['country_short_name'] + '" data-name="' + element['country_name'] + '" data-phone="' + element['country_phone_code'] + '">' + element['country_name'] + '</option>';
                        });
                        $("#countryValue").html(countryOptions);

                        // Manejar el cambio de país
                        $("#countryValue").on("change", function() {
                            var selectedCountryCode = this.value;
                            var selectedCountryName = $(this).find("option:selected").data("name");
                            var selectedCountryPhone = $(this).find("option:selected").data("phone");
                            
                            // Mostrar la información del país seleccionado
                            $("#selectedInfo").html("País seleccionado: " + selectedCountryName + " (Código: " + selectedCountryCode + ")");

                            // Guardar el país en el campo oculto
                            $("#nuevoPais").val(selectedCountryName);

                            $("#stateValue").prop("disabled", false);
                            $("#stateValue").html("<option value=''>Seleccionar Estado</option>");
                            $("#cityValue").html("<option value=''>Seleccionar Ciudad</option>").prop("disabled", true);

                            // Obtener estados del país seleccionado
                            $.ajax({
                                url: 'https://www.universal-tutorial.com/api/states/' + selectedCountryName,
                                method: 'GET',
                                headers: {
                                    "Authorization": "Bearer " + auth_token,
                                    "Accept": "application/json"
                                },
                                success: function (states) {
                                    var stateOptions = "<option value=''>Seleccionar Estado</option>";
                                    states.forEach(element => {
                                        stateOptions += '<option value="' + element['state_name'] + '">' + element['state_name'] + '</option>';
                                    });
                                    $("#stateValue").html(stateOptions);

                                    // Manejar el cambio de estado
                                    $("#stateValue").on("change", function() {
                                        var selectedState = this.value;

                                        // Guardar el estado en el campo oculto
                                        $("#nuevoEstado").val(selectedState);

                                        $("#cityValue").prop("disabled", false);
                                        $("#cityValue").html("<option value=''>Seleccionar Ciudad</option>");

                                        // Obtener ciudades del estado seleccionado
                                        $.ajax({
                                            url: 'https://www.universal-tutorial.com/api/cities/' + selectedState,
                                            method: 'GET',
                                            headers: {
                                                "Authorization": "Bearer " + auth_token,
                                                "Accept": "application/json"
                                            },
                                            success: function (cities) {
                                                var cityOptions = "<option value=''>Seleccionar Ciudad</option>";
                                                cities.forEach(element => {
                                                    cityOptions += '<option value="' + element['city_name'] + '">' + element['city_name'] + '</option>';
                                                });
                                                $("#cityValue").html(cityOptions);
                                            },
                                            error: function (e) {
                                                //console.log("Error al obtener ciudades: " + e);
                                            }
                                        });
                                    });
                                },
                                error: function (e) {
                                    //console.log("Error al obtener estados: " + e);
                                }
                            });
                        });

                        // Manejar el cambio de ciudad
                        $("#cityValue").on("change", function() {
                            var selectedCity = this.value;
                            var selectedState = $("#stateValue").val();
                            var selectedCountry = $("#countryValue").find("option:selected").data("name");
                            var selectedCountryPhone = $("#countryValue").find("option:selected").data("phone");

                            // Guardar la ciudad en el campo oculto
                            $("#nuevoCiudad").val(selectedCity);

                            // Imprimir en consola
                            // console.log("Estado seleccionado:", selectedState);
                            // console.log("Ciudad seleccionada:", selectedCity);
                            // console.log("País seleccionado:", selectedCountry);
                            // console.log("Código país:", selectedCountryPhone); // Imprimir el número de país
                        });
                    },
                    error: function (e) {
                        //console.log("Error al obtener países: " + e);
                    }
                });
            }
        },
        error: function (e) {
            //}console.log("Error al obtener el token: " + e);
        }
    });
});
