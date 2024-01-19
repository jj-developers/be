<?php 
require_once ("header.php");
session_start;
$idCliente=$_SESSION['Id']; ;
$longitud = 5;
$key = "";
$pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
$max = strlen($pattern)-1;
for($i=0;$i < $longitud;$i++) $key .= $pattern[mt_rand(0,$max)];
?>
<!-- START SECTION BREADCRUMB -->

<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
        	<div class="col-md-6">
                <div class="page-title">
            		<h1>Mi Cuenta</h1>
                </div>
            </div>

            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active">Mi Cuenta</li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->
<!-- START MAIN CONTENT -->
<div class="main_content">
<!-- START SECTION SHOP -->
<div class="section">
	<div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4">
                <div class="dashboard_menu">
                    <ul class="nav nav-tabs flex-column" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" id="dashboard-tab" data-bs-toggle="tab" href="#dashboard" role="tab" aria-controls="dashboard" aria-selected="false"><i class="ti-layout-grid2"></i>Dashboard</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="orders-tab" data-bs-toggle="tab" href="#orders" role="tab" aria-controls="orders" aria-selected="false"><i class="ti-shopping-cart-full"></i>Pedidos</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="pagos-tab" data-bs-toggle="tab" href="#pagos" role="tab" aria-controls="pagos" aria-selected="false"><i class="ti-control-shuffle"></i>Pagos</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" id="address-tab" data-bs-toggle="tab" href="#address" role="tab" aria-controls="address" aria-selected="true"><i class="ti-location-pin"></i>Mis Sucursales</a>
                      </li>
                      <?php if($_SESSION['status'] == 1) { ?>
                      <li class="nav-item">
                        <a class="nav-link " id="account-detail-tab" data-bs-toggle="tab" href="#account-detail" role="tab" aria-controls="account-detail" aria-selected="true"><i class="ti-id-badge"></i>Detalle de Cuenta</a>
                      </li>
                         <?php } ?>
                      <li class="nav-item">
                        <a class="nav-link" href="salir.php"><i class="ti-lock"></i>Cerrar Session</a>
                      </li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-9 col-md-8">
                <div class="tab-content dashboard_content">
                  	<div class="tab-pane fade active show" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                    	<div class="card">
                        	<div class="card-header">
                                <h3>Dashboard</h3>
                            </div>
                            <div class="card-body">
                                <?php if($_SESSION['status'] == 1) { ?>
                                    <p>Favor de terminar con el registro de la informacion, para seguir con el proceso de activacion de cuenta.</a></p>
                                    <div class="card">
                                        <div class="card-header">
                                            <h3>Detalle de la Cuenta</h3>
                                        </div>
                                        <div class="card-body">
                                            <form method="post" action="">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Nombre de la empresa</label>
                                                        <input type="text" class="form-control" id="nombrenegocio" name="nombrenegocio" value="<?php echo $_SESSION['negocio']; ?>" readonly>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Contacto</label>
                                                        <input type="text" class="form-control" id="nombrecompletousr" name="nombrecompletousr" value="<?php echo $_SESSION['nombre']; ?>" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Número de Sucursales</label>
                                                    <input type="text" class="form-control" id="nosucursales" name="nosucursales" placeholder="Número de Sucursales">
                                                    <input type="hidden" class="form-control" id="activarRegistro" name="activarRegistro" value="activarRegistro">
                                                    <input type="hidden" class="form-control" id="idUsuario" name="idUsuario" value="<?php echo $_SESSION['Id']; ?>">
                                                </div>
                                                </div>
                                                <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Ticket promedio</label>
                                                    <input type="text" class="form-control" id="ticket" name="ticket" placeholder="Ticket promedio">
                                                </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Número de mesas</label>
                                                    <input type="text" class="form-control" id="nomesas" name="nomesas" placeholder="Número total de mesas">
                                                </div>
                                                </div>
                                                <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Número de empleados</label>
                                                    <input type="text" class="form-control" id="noempleados" name="noempleados" placeholder="Total de empleados">
                                                </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Constancia de Situación Fiscal (PDF)</label>
                                                            <div class="input-group">
                                                                <div class="custom-file">
                                                                    <input type="hidden" id="urlpdf" name="urlpdf">
                                                                    <input type="hidden" id="code" value="<?php echo $key ?>"  name="code">
                                                                    <input class="custom-file-input" type="file" id="archivocsf" name="archivocsf" accept=".pdf" required>
                                                                </div>
                                                            </div> 
                                                    </div>
                                                </div>
                                                <br>
                                                <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Plazo de pago en días</label>
                                                    <input type="text" class="form-control" id="plazopago" name="plazopago" value="7" readonly placeholder="Dias de credito del cliente">
                                                </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <div class="widget">
                                                            <h5 class="widget_title">Monto a solicitar</h5>
                                                            <div class="filter_price">
                                                            <input id="myRange"
                                                                    step="100" 
                                                                    max="50000"
                                                                    type="range" 
                                                                    class="form-range" />
                                                                <div class="price_range">
                                                                    <span>Solicitud de crédito: $<span id="curr"></span></span>
                                                                    <input type="hidden" id="credito">
                                                                </div>
                                                                <!-- <h4>
                                                                    Credito:
                                                                    <span id="curr"></span>
                                                                </h4> -->
                                                                <!-- <div id="price_filter" name="price_filter" data-min="0" data-max="20000" data-min-value="0" data-max-value="20000" data-price-sign="$"></div> -->
                                                                <!--<div class="price_range">
                                                                    <span>Credito: <span id="flt_price"></span></span>
                                                                    <input type="hidden" id="price_first">
                                                                    <input type="hidden" id="price_second">
                                                                </div> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>        
                                            <div class="row">
                                                <legend>Referencias comerciales de la Empresa</legend>
                                                <div class="col-md-12"> 
                                                    <div class="form-group">
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered" id="dynamic_field3">
                                                            <tr>
                                                                <td><b>Proveedor</b></td>
                                                                <td><b>Teléfono</b></td>
                                                                <td><b>Dirección</b></td>
                                                                <td><b>Comentarios</b></td>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="text" class="form-control" id="nameref1" name="nameref1" placeholder="Nombre comercial del proveedor"></td>
                                                                <td><input type="text" class="form-control" id="telref1" name="telref1" placeholder="Teléfono de contacto"></td>
                                                                <td><input type="text" class="form-control" id="dirref1" name="dirref1" placeholder="Dirección (Incluye calle, colonia, estado y municipio)"></td>
                                                                <td><input type="text" class="form-control" id="comment1" name="comment1"></td>
                                                            </tr>
                                                            <tr>
                                                                <td><input type="text" class="form-control" id="nameref2" name="nameref2" placeholder="Nombre comercial del proveedor"></td>
                                                                <td><input type="text" class="form-control" id="telref2" name="telref2" placeholder="Teléfono de contacto"></td>
                                                                <td><input type="text" class="form-control" id="dirref2" name="dirref2" placeholder="Dirección (Incluye calle, colonia, estado y municipio)"></td>
                                                                <td><input type="text" class="form-control" id="comment2" name="comment2"></td>
                                                            </tr>
                                                            </table>
                                                        </div>        
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-fill-out" id="Btn_actualizarinformacionusuario" name="Btn_actualizarinformacionusuario" value="Submit">Actualizar información</button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                <?php }else{ ?>
                                    <p>Desde el panel de tu cuenta. puede verificar y ver fácilmente sus pedidos recientes, administrar sus direcciones de envío y facturación y editar su contraseña y los detalles de su cuenta</p>
                                <?php } ?> 
                            </div>
                        </div>
                  	</div>
                  	<div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                    	<div class="card">
                        	<div class="card-header">
                                <h3>Mis Pedidos</h3>
                            </div>
                            <div class="card-body">
                    			<div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Pedido</th>
                                                <th>Fecha</th>
                                                <th>Total</th>
                                                <th>Estatus</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php // recorro los pedidos
                                            $qrypedidos="SELECT * from th_pedidos ped
                                            inner join th_tipoestatus te on te.est_idEstatus=ped.ped_estatus
                                            left join th_pedidosfacturas fac on fac.fac_idPedido=ped.ped_idPedido
                                            where ped_idCliente=$idCliente";
                                            $respedidos=mysqli_query($con,$qrypedidos);
                                            while ($regpedidos=mysqli_fetch_array($respedidos)){
                                                $facturapdf=$regpedidos['fac_pdf'];
                                                $facturaxml=$regpedidos['fac_xml'];
                                                $estatus=$regpedidos['ped_estatus'];
                                                if ($estatus==8){$b='warning';}
                                                if ($estatus==7){$b='info';}
                                                if ($estatus==4){$b='success';}
                                                if ($estatus==5){$b='danger';}
                                            ?>
                                            <tr>
                                                <td><?php echo $regpedidos['ped_foliopedido'] ?></td>
                                                <td><?php echo $regpedidos['ped_fechacreado'] ?></td>
                                                <td>$<?php echo number_format($regpedidos['ped_montototal'], 2, '.', ',') ?></td>
                                                <td><?php echo $regpedidos['est_descripcionEstatus'] ?></td>
                                                <td><?php if ($facturapdf!=''){ ?>
                                                <a href="plataforma/<?php echo $facturapdf ?>" class="btn btn-fill-out btn-sm" target="_new">Factura PDF</a>
                                                <a href="plataforma/<?php echo $facturaxml ?>" class="btn btn-fill-out btn-sm" target="_new">Factura XML</a><?php } ?></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                  	</div>
					<div class="tab-pane fade" id="address" role="tabpanel" aria-labelledby="address-tab">
                        <div class="accordion" id="accordionPanelsStayOpenExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                    Registro de Sucursales
                                </button>
                                </h2>
                                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                                    <div class="accordion-body">
                                    <div class="card card-default">
                                        <div class="card-header">
                                            <h3 class="card-title">Datos generales del cliente para el registro</h3>
                                            <div class="card-tools">
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <form action="" method="POST" autocomplete="off" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label>Nombre de la empresa</label>
                                                <input id="IdCliente" name="IdCliente" type="hidden" value="<?php echo $_SESSION['Id']; ?>">
                                                <input type="text" class="form-control" id="nombrenegocio" name="nombrenegocio" value="<?php echo $_SESSION['negocio']; ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Contacto</label>
                                                    <input type="text" class="form-control" id="nombrecompletousr" name="nombrecompletousr" value="<?php echo $_SESSION['nombre']; ?>" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label>Nombre de la sucursal</label>
                                                <input type="text" class="form-control" id="nombresucursal" name="nombresucursal" placeholder="Nombre con el que se identifica la sucursal. Ejemplo:  Suc. Centro">
                                                <input type="hidden" class="form-control" id="altaSucursal" name="altaSucursal" value="altaSucursal">
                                                <input type="hidden" class="form-control" id="idCliente" name="idCliente" value="<?php echo $idUsuario ?>">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Contacto de sucursal</label>
                                                    <input type="text" class="form-control" id="contactosuc" name="contactosuc" placeholder="Nombre completo de la persona con la cual se puede comunicar a la sucursal">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label>Teléfono</label>
                                                <input type="text" class="form-control" id="telefonosuc" name="telefonosuc" placeholder="Teléfono de la sucursal">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <label>Email (opcional)</label>
                                                <input type="text" class="form-control" id="emailsuc" name="emailsuc" placeholder="Email de la sucursal, en caso de tenerlo">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Dirección</label>
                                                        <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Captura la direccion de la sucursal">
                                                        <input type="hidden" class="form-control" id="latitud" name="latitud" >
                                                        <input type="hidden" class="form-control" id="longitud" name="longitud">
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div id="mapasucursales"></div>
                                                </div>
                                            </div>
                                        </div>
                                              <div class="card-footer" id="botonenviar">
                                                    <button type="button" class="btn btn-success" onclick="generarSucursal()">Crear Sucursal</button>
                                                </div>
                                                </form>
                                            </div>
                                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Sucursal</th>
                                                <th>Contacto</th>
                                                <th>Teléfono</th>
                                                <th>Ubicación</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                          $queryl="select * from th_usuariossucursales where suc_idCliente=$idUsuario";
                                          $resl=mysqli_query($con,$queryl);
                                          while ($regsucursales = mysqli_fetch_array($resl)) {
                                          ?>
                                      <tr>
                                        <td><b><?php echo $regsucursales['suc_nombresucursal'] ?></b></td>
                                        <td><?php echo $regsucursales['suc_contactosucursal'] ?></td>
                                        <td><?php echo $regsucursales['suc_telefono'] ?></td>
                                        <td><a class="btn btn-info" href="https://www.google.com/maps/place/<?php echo $regsucursales['suc_direccion']; ?>/@<?php echo $regsucursales['suc_latitud']; echo ","; echo $regsucursales['suc_longitud']; ?>,16z" target="_new">
                                          <i class="fas fa-map-marker"></i>
                                        </a>
                                        </td>
                                      </tr>
                                    <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
					</div>
                    <div class="tab-pane fade" id="account-detail" role="tabpanel" aria-labelledby="account-detail-tab">
						<div class="card">
                        	<div class="card-header">
                                <h3>Detalle de la Cuenta</h3>
                            </div>
                            <div class="card-body">
                                <form method="post" action="">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Nombre del negocio</label>
                                            <input type="text" class="form-control" id="nombrenegocio" name="nombrenegocio" value="<?php echo $_SESSION['negocio']; ?>" readonly>
                                        </div>
                                    </div>
                                    <!-- <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Giro de la empresa</label>
                                            <select class="form-control select2 select2" id="giroempresa" name="giroempresa"></select>               
                                        </div>
                                    </div> -->
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Contacto</label>
                                            <input type="text" class="form-control" id="nombrecompletousr" name="nombrecompletousr" value="<?php echo $_SESSION['nombre']; ?>" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Número de Sucursales</label>
                                        <input type="text" class="form-control" id="nosucursales" name="nosucursales" placeholder="Cuantas sucursales tienes?">
                                        <input type="hidden" class="form-control" id="activarRegistro" name="activarRegistro" value="activarRegistro">
                                        <input type="hidden" class="form-control" id="idUsuario" name="idUsuario" value="<?php echo $_SESSION['Id']; ?>">
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Ticket promedio</label>
                                        <input type="text" class="form-control" id="ticket" name="ticket" placeholder="Ticket promedio">
                                    </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Número de mesas</label>
                                        <input type="text" class="form-control" id="nomesas" name="nomesas" placeholder="Número de mesas por todas las sucursales">
                                    </div>
                                    </div>
                                    <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Número de empleados</label>
                                        <input type="text" class="form-control" id="noempleados" name="noempleados" placeholder="Número total de empleados por todas las sucursales">
                                    </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Constancia de Situación Fiscal (PDF)</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="hidden" id="urlpdf" name="urlpdf">
                                                        <input type="hidden" id="code" value="<?php echo $key ?>"  name="code">
                                                        <input class="custom-file-input" type="file" id="archivocsf" name="archivocsf" accept=".pdf" required>
                                                    </div>
                                                </div> 
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Plazo de pago en días</label>
                                        <input type="text" class="form-control" id="plazopago" name="plazopago" value="7" readonly placeholder="Dias de credito del cliente">
                                    </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="widget">
                                                <h5 class="widget_title">Monto a Solicitar</h5>
                                                <div class="filter_price">
                                                <input id="myRange"
                                                        step="100" 
                                                        max="20000"
                                                        type="range" 
                                                        class="form-range" />
                                                    <div class="price_range">
                                                        <span>Credito a solicitar: <span id="curr"></span></span>
                                                        <input type="hidden" id="credito">
                                                    </div>
                                                    <!-- <h4>
                                                        Credito:
                                                        <span id="curr"></span>
                                                    </h4> -->
                                                    <!-- <div id="price_filter" name="price_filter" data-min="0" data-max="20000" data-min-value="0" data-max-value="20000" data-price-sign="$"></div> -->
                                                    <!--<div class="price_range">
                                                        <span>Credito: <span id="flt_price"></span></span>
                                                        <input type="hidden" id="price_first">
                                                        <input type="hidden" id="price_second">
                                                    </div> -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>        
                                <div class="row">
                                    <legend>Referencias comerciales de la Empresa</legend>
                                    <div class="col-md-12"> 
                                        <div class="form-group">
                                            <div class="table-responsive">
                                                <table class="table table-bordered" id="dynamic_field3">
                                                <tr>
                                                    <td><b>Proveedor</b></td>
                                                    <td><b>Teléfono</b></td>
                                                    <td><b>Dirección</b></td>
                                                    <td><b>Comentarios</b></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" class="form-control" id="nameref1" name="nameref1" placeholder="Nombre comercial del proveedor"></td>
                                                    <td><input type="text" class="form-control" id="telref1" name="telref1" placeholder="Teléfono de contacto"></td>
                                                    <td><input type="text" class="form-control" id="dirref1" name="dirref1" placeholder="Dirección (Incluye calle, colonia, estado y municipio)"></td>
                                                    <td><input type="text" class="form-control" id="comment1" name="comment1"></td>
                                                </tr>
                                                <tr>
                                                    <td><input type="text" class="form-control" id="nameref2" name="nameref2" placeholder="Nombre comercial del proveedor"></td>
                                                    <td><input type="text" class="form-control" id="telref2" name="telref2" placeholder="Teléfono de contacto"></td>
                                                    <td><input type="text" class="form-control" id="dirref2" name="dirref2" placeholder="Dirección (Incluye calle, colonia, estado y municipio)"></td>
                                                    <td><input type="text" class="form-control" id="comment2" name="comment2"></td>
                                                </tr>
                                                </table>
                                            </div>        
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-fill-out" id="Btn_actualizarinformacionusuario" name="Btn_actualizarinformacionusuario" value="Submit">Actualizar información</button>
                                </div>
                                </form>
                            </div>
                        </div>
					</div>
                    <div class="tab-pane fade" id="pagos" role="tabpanel" aria-labelledby="pagos">
                        <div class="card">
                            <div class="card-header">
                                <h3>Reportar pago</h3>
                            </div>
                            <div class="card-body">
                                <form method="post" action="">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Nombre del negocio</label>
                                            <input type="text" class="form-control" id="nombrenegocio" name="nombrenegocio" value="<?php echo $_SESSION['negocio']; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Contacto</label>
                                            <input type="text" class="form-control" id="nombrecompletousr" name="nombrecompletousr" value="<?php echo $_SESSION['nombre']; ?>" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Formato de pago (PDF)</label>
                                                <div class="input-group">
                                                    <div class="custom-file">
                                                        <input type="hidden" id="urlpdf" name="urlpdf">
                                                        <input type="hidden" id="code" value="<?php echo $key ?>"  name="code">
                                                        <input class="custom-file-input" type="file" id="archivocsf" name="archivocsf" accept=".pdf" required>
                                                    </div>
                                                </div> 
                                        </div>
                                    </div>
                                    <br>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <br><label>Elije el o los pedidos que cubren tu pago</label><br>
                                            <hr>
                                        </div>
                                    </div>
                                    <br>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>Pedido</th>
                                                <th>Fecha</th>
                                                <th>Total</th>
                                                <th>Estatus</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php // recorro los pedidos
                                            $qrypedidos="SELECT * from th_pedidos ped
                                            inner join th_tipoestatus te on te.est_idEstatus=ped.ped_estatus
                                            left join th_pedidosfacturas fac on fac.fac_idPedido=ped.ped_idPedido
                                            where ped_idCliente=$idCliente";
                                            $respedidos=mysqli_query($con,$qrypedidos);
                                            while ($regpedidos=mysqli_fetch_array($respedidos)){
                                                if ($estatus==8){$b='warning';}
                                                if ($estatus==7){$b='info';}
                                                if ($estatus==4){$b='success';}
                                                if ($estatus==5){$b='danger';}
                                            ?>
                                            <tr>
                                                <td>A<input type="checkbox" value="" id="flexCheckDefault"></td>
                                                <td><?php echo $regpedidos['ped_foliopedido'] ?></td>
                                                <td><?php echo $regpedidos['ped_fechacreado'] ?></td>
                                                <td>$<?php echo number_format($regpedidos['ped_montototal'], 2, '.', ',') ?></td>
                                                <td><?php echo $regpedidos['est_descripcionEstatus'] ?></td>
                                            </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                    </div>
                                    <br>
                                </div>
                                </div>
                                <br>   
                                <br>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-fill-out" id="Btn_actualizarinformacionusuario" name="Btn_actualizarinformacionusuario" value="Submit">Reportar pago</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- END SECTION SHOP -->
</div>
<!-- END MAIN CONTENT -->
<!-- START FOOTER -->
<?php 
require_once ("footer.php");
?>
<!-- END FOOTER -->
<a href="#" class="scrollup" style="display: none;"><i class="ion-ios-arrow-up"></i></a> 
<!-- Latest jQuery --> 
<script src="assets/js/jquery-3.6.0.min.js"></script> 
<!-- jquery-ui --> 
<script src="assets/js/jquery-ui.js"></script>
<!-- popper min js -->
<script src="assets/js/popper.min.js"></script>
<!-- Latest compiled and minified Bootstrap --> 
<script src="assets/bootstrap/js/bootstrap.min.js"></script> 
<!-- owl-carousel min js  --> 
<script src="assets/owlcarousel/js/owl.carousel.min.js"></script> 
<!-- magnific-popup min js  --> 
<script src="assets/js/magnific-popup.min.js"></script> 
<!-- waypoints min js  --> 
<script src="assets/js/waypoints.min.js"></script> 
<!-- parallax js  --> 
<script src="assets/js/parallax.js"></script> 
<!-- countdown js  --> 
<script src="assets/js/jquery.countdown.min.js"></script> 
<!-- imagesloaded js --> 
<script src="assets/js/imagesloaded.pkgd.min.js"></script>
<!-- isotope min js --> 
<script src="assets/js/isotope.min.js"></script>
<!-- jquery.dd.min js -->
<script src="assets/js/jquery.dd.min.js"></script>
<!-- slick js -->
<script src="assets/js/slick.min.js"></script>
<!-- elevatezoom js -->
<script src="assets/js/jquery.elevatezoom.js"></script>
<!-- scripts js --> 
<script src="assets/js/scripts.js"></script>
<script src="assets/js/mi-cuenta.js"></script>
<!-- ./sweet -->
<script src="sweetalert2/sweetalert2.all.min.js"></script>    
<script defer src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places&key=AIzaSyCc8JXHTWeK1HLEkH0-ayrxBZTBp90BPB4&callback=iniciarMap" ></script>
<script>
function iniciarMap(){
    var coord = {lat:19.42847 ,lng: -99.12766};
    var map = new google.maps.Map(document.getElementById('mapasucursales'),{
    zoom: 12,
    center: coord
      });
      var marker = new google.maps.Marker({
         position: coord,
         map: map
  });
}
var searchInput = 'direccion';
$(document).ready(function () {
        var autocomplete;
        autocomplete = new google.maps.places.Autocomplete((document.getElementById(searchInput)), {
            types: ['geocode'],
            componentRestrictions: {
            country: "MEX"
            }
        }); 
google.maps.event.addListener(autocomplete, 'place_changed', function () {
var near_place = autocomplete.getPlace();                      
var map2 = new google.maps.Map(document.getElementById('mapasucursales'),{
zoom: 16,
center: near_place.geometry.location
});
var marker2 = new google.maps.Marker({
position: near_place.geometry.location,
map: map2
});
$('#latitud').val(near_place.geometry.location.lat);
('#longitud').val(near_place.geometry.location.lng);
});
});
</script>
</body>
</html>