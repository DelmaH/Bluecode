document.addEventListener("DOMContentLoaded", function () {
    const btnGeolocalizar = document.getElementById("btnGeolocalizar");
    const resultadoGeolocalizacion = document.getElementById("resultadoGeolocalizacion");
    const btnLlamadaEmergencia = document.getElementById("btnLlamadaEmergencia");

    let latitud = null; //Se declaran las variables para almacenar las coordenadas del paciente.
    let longitud = null;

    btnGeolocalizar.addEventListener("click", function () { //Evento que se activa cuando se haga click en el boton
        if ("geolocation" in navigator) {
            navigator.geolocation.getCurrentPosition(function (position) {
                latitud = position.coords.latitude;
                longitud = position.coords.longitude;

                // Muestra las coordenadas en el resultado
                resultadoGeolocalizacion.textContent = `Latitud: ${latitud}, Longitud: ${longitud}`;
            }, function (error) {
                console.error("Error de geolocalización:", error.message);
                resultadoGeolocalizacion.textContent = "Error al obtener la ubicación.";
            });
        } else {
            resultadoGeolocalizacion.textContent = "Geolocalización no compatible en este navegador.";
        }
    });

    btnLlamadaEmergencia.addEventListener("click", function () { //Evento que se activa cuando el paceinte haga click en el boton con ID btnLlamadaEmergencia
        if (latitud !== null && longitud !== null) { //Verificacion si las variables tiene un valor cargado diferente a null (declarado al inicio). Si no es asi, se ejecuta el bloque siguiente else
            // Realiza una solicitud AJAX para registrar la llamada de emergencia en la base de datos
            const data = {  //objeto data que contiene las coordenadas y el tipo de llamado
                latitud,  //variables
                longitud,
                tipo_llamada: "Emergencia" 
            };

            // Enviar los datos de llamada de emergencia al servidor a traves de una solicitud AJAX
            fetch("../registrar_llamada.php", { //fetch hace una solicitud al servidor
                method: "POST", //solicitud de entrada, envio de datos al servidor
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify(data) //los datos que contiene data se convierten en formato JSON
            })
            .then(response => response.json()) //maneja la respuesta cruda ("response") del servidor y los convierte en formato JSON para obtener un ojeto js
            .then(responseData => {
                if (responseData.success) { //responseData contiene la respuesta del servido en JSON 
                    alert("Llamada de emergencia registrada correctamente.");
                } else {
                    alert("Error al registrar la llamada de emergencia.");
                }
            })
            .catch(error => {
                console.error("Error de red:", error);
                alert("Error de red al registrar la llamada de emergencia.");
            });
        } else {
            alert("Debes activar la geolocalización antes de realizar una llamada de emergencia.");
        }
    });
});
