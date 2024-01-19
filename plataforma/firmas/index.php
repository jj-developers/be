<?php 
error_reporting(0);
include('../class/conexion.php'); ?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="sign.js"></script>
    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">

    <script>




        $(document).ready(function()
        {
            $('#myCanvas').sign({
                resetButton: $('#resetSign'),
                lineWidth: 5,
              
            });
        });
    </script>
    <style>

        #myCanvas {
            height:100%;
                width:100%;
            border:4px solid #444;
            border-radius: 15px;
            background-color: #fafafa;
            align-content: center;
        }
        .container { margin: 0px ; }


        @media only screen
and (min-device-width: 320px)
and (max-device-width: 736px)
and (orientation: portrait)and (max-device-width: 736px)
{
    #myCanvas {
            height:10%;
                width:75%;
            border:4px solid #444;
            border-radius: 15px;
            background-color: #fafafa;
        }
}
    </style>
</head>
<body>
<div class="jquery-script-center">


<script type="text/javascript"
src="https://pagead2.googlesyndication.com/pagead/show_ads.js">
</script></div>

</div>
 <div class="container">
    <canvas id="myCanvas"></canvas><br><br>
    <input type="button" value="Limpiar" id='resetSign'>
    <input type="button" value="Guardar" id='grimg'>

</div>






<?php
$con = conexion();
$query = "SELECT * from th_pedidos ped
          inner join th_tipoestatus te on te.est_idEstatus=ped.ped_estatus
          inner join th_usuarios u on u.usr_idUsuario=ped.ped_idCliente
          inner join th_usuariossucursales suc on suc.suc_idSucursal=ped.ped_idSucursal
          where ped.ped_estatus=8 ";

$res = mysqli_query($con, $query);
?>

<!-- Genera el elemento select -->
<select id="miSelect" name="miSelect"> 
    <?php
    while ($registro = mysqli_fetch_array($res)) {
        $folio = $registro['ped_foliopedido'];
        $nombreid = $registro['ped_idCliente'];
        $usr_nombrenegos = $registro['usr_nombrenegocio'];

        echo "<option value='$folio'>$folio -  $usr_nombrenegos</option>";

    }
          
           ?>
          
          </select>

         




<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-36251023-1']);
  _gaq.push(['_setDomainName', 'jqueryscript.net']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

  document.getElementById('grimg').addEventListener('click', function() {
  var canvasElement = document.getElementById('myCanvas');
  
  // Captura el canvas como una imagen
  html2canvas(canvasElement).then(function(canvas) {
    // Convierte el canvas en una imagen
    var imgData = canvas.toDataURL('image/png');
    var select =  document.getElementById('miSelect');
    var valorSeleccionado = select.value;
  
    // Crea un objeto FormData para enviar la imagen al servidor
    var formData = new FormData();
    formData.append('imageData', imgData);
    formData.append('ped_foliopedido', valorSeleccionado);

    // Realiza la solicitud AJAX
    fetch('firmasfoto.php', {
      method: 'POST',
      body: formData
    })
    .then(response => response.text())
    .then(data => {
      // La respuesta del servidor se maneja aquí
      console.log(data);
      alert("Guardado con exito!!!")
      window.location.reload();

    })
    .catch(error => {
      console.error('Error:', error);
    });
  });

});



</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.min.js"></script>

</body>
</html>
