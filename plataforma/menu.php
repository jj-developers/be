<?php
@session_start();
require_once ('class/conexion.php');
$con=conexion();
?>
<!-- Main Sidebar Container -->
  <!--aside class="main-sidebar sidebar-dark-primary elevation-4"-->
    <aside class="main-sidebar sidebar-dark-blue elevation-4">
    <style>
      .sidebar-dark-blue{
        background: #0055A2 !important;
      }
    </style>
    <!-- Brand Logo -->
    <a href="dashboard" class="brand-link">
    <img src="dist/img/Bebify-Logotipo-05.png" alt="Logo" width="100%">
    </a>
    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="dist/img/avatar4.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block"><font color="#FB7F03"><?php echo strtoupper($usr_nombre) ?></font></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="dashboard" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                <b>DASHBOARD</b>
              </p>
            </a>
          </li>

          <?php if ($usr_idRol=='2'||$usr_idRol=='3') { ?>          

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-cart-plus text-warning"></i>
              <p>
                Pedidos
                <i class="fas fa-angle-left right"></i>                
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pedidosListado" class="nav-link">
                  <i class="fa fa-ellipsis-h nav-icon"></i>
                  <p>Pendiente</p>
                  <?php
                // consulto pedidos por surtir
                $pedsurtir="SELECT count(*) as totalPedidos from th_pedidos where ped_estatus=8";
                $ressurtir=mysqli_query($con,$pedsurtir);
                $regsurtir=mysqli_fetch_array($ressurtir);
                $totalpedidos=$regsurtir['totalPedidos'];
                if ($totalpedidos>=1){
                ?>
                <span class="badge badge-info right"><?php echo $totalpedidos ?></span>
              <?php } ?>
                </a>
              </li>
              <li class="nav-item">
                <a href="pedidosListadoEntregar" class="nav-link">
                  <i class="fa fa-ellipsis-h nav-icon"></i>
                  <p>Confirmado</p>
                  <?php
                // consulto pedidos por surtir
                $pedentregar="SELECT count(*) as totalPedidos from th_pedidos where ped_estatus=7";
                $resentregar=mysqli_query($con,$pedentregar);
                $regentregar=mysqli_fetch_array($resentregar);
                $totalpedidose=$regentregar['totalPedidos'];
                if ($totalpedidose>=1){
                ?>
                <span class="badge badge-info right"><?php echo $totalpedidose ?></span>
              <?php } ?>
                </a>
              </li>
                      

              <li class="nav-item">
                <a href="pedidosListadoEntregados" class="nav-link">
                  <i class="fa fa-ellipsis-h nav-icon"></i>
                  <p>Entregado</p>
                  <?php
                // consulto pedidos por surtir
                // $pedentregar="SELECT count(*) as totalPedidos2 from th_pedidos where ped_estatus=4";
                $pedentregar="SELECT count(*) as totalPedidos2 from th_pedidos ped
                  inner join th_tipoestatus te on te.est_idEstatus=ped.ped_estatus
                  inner join th_usuarios u on u.usr_idUsuario=ped.ped_idCliente
                  inner join th_usuariossucursales suc on suc.suc_idSucursal=ped.ped_idSucursal
                  inner join th_pedidosfacturas fac on fac.fac_idPedido=ped.ped_idPedido
                  where ped.ped_estatus=4 and fac_idFactura not in (SELECT pag_idFactura from th_pedidospagos where pag_estatus=7)";
                $resentregar=mysqli_query($con,$pedentregar);
                $regentregar=mysqli_fetch_array($resentregar);
                $totalpedidose2=$regentregar['totalPedidos2'];
                if ($totalpedidose2>=1){
                ?>
                <span class="badge badge-info right"><?php echo $totalpedidose2 ?></span>
              <?php } ?>
                </a>
              </li>
              <?php if ($usr_idRol=='2') { ?>  
              <li class="nav-item">
                <a href="pedidosListadoCancelados" class="nav-link">
                  <i class="fa fa-ellipsis-h nav-icon"></i>
                  <p>Cancelado</p>
                  <?php
                // consulto pedidos por surtir
                $pedentregar="SELECT count(*) as totalPedidos3 from th_pedidos where ped_estatus=5";
                $resentregar=mysqli_query($con,$pedentregar);
                $regentregar=mysqli_fetch_array($resentregar);
                $totalpedidose3=$regentregar['totalPedidos3'];
                if ($totalpedidose3>=1){
                ?>
                <span class="badge badge-info right"><?php echo $totalpedidose3 ?></span>
              <?php } ?>
                </a>
              </li>
              <li class="nav-item">
                <a href="pedidosListadoCompleto" class="nav-link">
                  <i class="fa fa-ellipsis-h nav-icon"></i>
                  <p>Historial</p>
                </a>
              </li>
              <?php } ?>

            </ul>
          </li>
          <?php } ?>

          <?php if ($usr_idRol=='2') { ?>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user text-warning"></i>
              <p>
                Clientes
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="listadoClientes" class="nav-link">
                  <i class="fa fa-ellipsis-h nav-icon"></i>
                  <p>Listado</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="usuariosAlta" class="nav-link">
                  <i class="fa fa-ellipsis-h nav-icon"></i>
                  <p>Alta / Edición</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="usuariosActivar" class="nav-link">
                  <i class="fa fa-ellipsis-h nav-icon"></i>
                  <p>Pendiente</p><?php
                // consulto pedidos por surtir
                $usrpre="SELECT count(*) as totalPedidos2 from th_usuarios where usr_estatus in (1,2)";
                $resusrpre=mysqli_query($con,$usrpre);
                $regusrpre=mysqli_fetch_array($resusrpre);
                $totalregusrpre=$regusrpre['totalPedidos2'];
                if ($totalregusrpre>=1){
                ?>
                <span class="badge badge-info right"><?php echo $totalregusrpre ?></span>
              <?php } ?>
              </a>
              </li>             
            </ul>
          </li>
          <?php } ?>


          <?php if ($usr_idRol=='2'||$usr_idRol=='3') { ?>          

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-bars text-warning"></i>
              <p>
                Productos
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="productosListado" class="nav-link">
                  <i class="fa fa-ellipsis-h nav-icon"></i>
                  <p>Listado</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="productosAlta" class="nav-link">
                  <i class="fa fa-ellipsis-h nav-icon"></i>
                  <p>Alta / Edición</p>
                </a>
              </li>
              
              <li class="nav-item">
                <a href="inventarioListado" class="nav-link">
                  <i class="fa fa-ellipsis-h nav-icon"></i>
                  <p>Inventario</p>
                </a>
              </li>
              <!--li class="nav-item">
                <a href="productosCatalogoDescargar" class="nav-link">
                  <i class="fa fa-ellipsis-h nav-icon"></i>
                  <p>Descargar Catalogo</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="productosCatalogoActualizar" class="nav-link">
                  <i class="fa fa-ellipsis-h nav-icon"></i>
                  <p>Actualizar Catalogo</p>
                </a>
              </li-->              
            </ul>
          </li>
          <?php } ?>
          <?php if ($usr_idRol=='2') { ?>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-users text-warning"></i>
              <p>
                Proveedores
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="proveedorListado" class="nav-link">
                  <i class="fa fa-ellipsis-h nav-icon"></i>
                  <p>Listado</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="proveedorAlta" class="nav-link">
                  <i class="fa fa-ellipsis-h nav-icon"></i>
                  <p>Alta / Edición</p>
                </a>
              </li>
            </ul>
          </li>
          <?php } ?>
          <?php if ($usr_idRol=='2'||$usr_idRol=='3') { ?>          

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-plus-square text-warning"></i>
              <p>
                Compras
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="comprasListadoCompleto" class="nav-link">
                  <i class="fa fa-ellipsis-h nav-icon"></i>
                  <p>Historial</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="comprasAlta" class="nav-link">
                  <i class="fa fa-ellipsis-h nav-icon"></i>
                  <p>Alta</p>
                </a>
              </li>
            </ul>
          </li>
          <?php } ?>
          <?php if ($usr_idRol=='2') { ?>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-search text-warning"></i>
              <p>
                Reportes
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="conciliaciondepagos" class="nav-link">
                  <i class="fa fa-ellipsis-h nav-icon"></i>
                  <p>Conciliación de Pagos</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-cog text-warning"></i>
              <p>
                Configuración
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="usuariosConfiguracion" class="nav-link">
                  <i class="fa fa-ellipsis-h nav-icon"></i>
                  <p>Usuarios</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="clientesConfiguracion" class="nav-link">
                  <i class="fa fa-ellipsis-h nav-icon"></i>
                  <p>Clientes</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pedidosConfiguracion" class="nav-link">
                  <i class="fa fa-ellipsis-h nav-icon"></i>
                  <p>Pedidos</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="productosConfiguracion" class="nav-link">
                  <i class="fa fa-ellipsis-h nav-icon"></i>
                  <p>Productos</p>
                </a>
              </li>
            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="comprasConfiguracion" class="nav-link">
                  <i class="fa fa-ellipsis-h nav-icon"></i>
                  <p>Compras</p>
                </a>
              </li>
            </ul>
          </li>

        <?php } ?>
        
          <li class="nav-header"><b>- UTILIDADES -</b></li>
          <li class="nav-item">
            <a href="salir" class="nav-link">
              <i class="nav-icon far fa-circle text-danger"></i>
              <p class="text">Salir</p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>