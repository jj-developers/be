function actualizarF() {

    let formData = new FormData();
    var razonsocial = $("#razonsocial").val();
    var rfc = $("#rfc").val();
    var direccion = $("#direccionf").val();
    var numeroe = $("#numeroe").val();
    var cp = $("#cp").val();
    var colonia = $("#colonia").val();
    var municipio = $("#municipio").val();
    var estado = $("#estado").val();
    var regimen = $("#regimen").val();
    var usocfdi = $("#usocfdi").val();
    var user_idf = $("#user_idf").val();

    formData.append("file", constanciaA.files[0]);
    formData.append("razonsocial", razonsocial);
    formData.append("rfc", rfc);
    formData.append("direccion", direccion);
    formData.append("numeroe", numeroe);
    formData.append("cp", cp);
    formData.append("colonia", colonia);
    formData.append("municipio", municipio);
    formData.append("estado", estado);
    formData.append("regimen", regimen);
    formData.append("usocfdi", usocfdi);
    formData.append("user_idf", user_idf);

    $.ajax({
        type: "POST",
        url: 'fiscales.php',
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
            console.log(response);
            var jsonData = JSON.parse(response);
            if (jsonData.status == "1") {
                alert(jsonData.message);
                window.location.reload();
            } else {
                alert(jsonData.message);
            }
        }

    });

};