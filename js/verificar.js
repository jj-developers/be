$(document).ready(function () {
    // Your code to be executed on page load
    $.ajax({
        url: 'verificarFiscales',
        type: "POST",
        success: function (cmb) {
         //alert(cmb);
       console.log(cmb);
       if(cmb){
        var c = cmb.split(' ');

        $("#fiscales").text(c[0]);
        $("#sucursales").text(c[1]);

        $("#modalFiscales").modal('show');

       }

      }
  }); 


});