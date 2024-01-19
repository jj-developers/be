$('#Btn_reportarpago').click(function() {
    let valoresCheck = [];

    $("input[type=checkbox]:checked").each(function() {
        valoresCheck.push(this.value);
    });
    let formData = new FormData();
    formData.append("file", archivopago.files[0]);
    formData.append("pedidos", valoresCheck);

    if ((valoresCheck.length) >= 1) {
        $.ajax({
            type: "POST",
            url: 'pagos.php',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                console.log(response);
                if (response.status == "1") {
                    alert('Pago registrado correctamente');
                    location.reload()

                } else {
                    alert(response.message);
                }
            }

        });
    } else {
        alert('Debe seleccionar al menos un pedido y un archivo en pdf');
    }

});