        <div class="row">
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Monto vencido</span>
                <span class="info-box-number">
                  $10.00
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Monto por vencer</span>
                <span class="info-box-number">$41,410.00</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>

          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><a href="productosListado"><i class="fas fa-shopping-cart"></i></a></span>

              <div class="info-box-content">
                <span class="info-box-text">Productos en catalogo</span>
                <span class="info-box-number">Ir</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><a href="listadoClientes"><i class="fas fa-users"></i></a></span>
                <?php
                $clientes="SELECT count(*) as totalClientes from th_usuarios u 
                          where u.usr_estatus in (1,3,4,5) and u.usr_idRol=1";                  
                $resclientes= mysqli_query($con,$clientes);
                $regclientes = mysqli_fetch_array($resclientes); 
                ?>
              <div class="info-box-content">
                <span class="info-box-text">Clientes registrados</span>
                <span class="info-box-number"><?php echo $regclientes['totalClientes'] ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->
        </div>