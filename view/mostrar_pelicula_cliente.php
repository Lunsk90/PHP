  <div class="row">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12">
            <h2 class="center grey-text text-darken-4"><i class="medium material-icons">movie</i> Peliculas Registradas</h2>
        </div>

            <!-- datos -->
            <div class="row">
              
              <!-- tabla de activos -->
              <div id="activas" class="col s12">
                <table class="striped">
                  <thead>
                      <tr>
                        <th>Nombre</th>
                        <th>Imagen</th>
                        <th>Duración</th>
                        <th>Tipo</th>
                        <th>Clasif.</th>
                        <th>Director</th>
                        <th>Reparto</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                      </tr>
                  </thead>
                  <tbody>
                  <?php foreach($this->model->ListarPeliculaActivas() as $r): ?>
                      <tr>
                        <td><?php echo $r->nombre; ?></td>
                        <td><img class="materialboxed" height="225" width="175" src="view/include/peliculas/<?php echo $r->imagen; ?>" alt="Imagen">
                        <td><?php echo $r->duracion; ?></td>
                        <td><?php echo $r->tipo; ?></td>
                        <td><?php echo $r->clasificacion; ?></td>
                        <td><?php echo $r->director; ?></td>
                        <td><?php echo $r->reparto; ?></td>
                        <td><?php echo $r->descripcion; ?></td>
                        <td><?php echo $r->precio; ?></td>
                        
                      
                      </tr>
                  <?php endforeach; ?>
              
                    </tbody>
                  </table>
              </div>
            </div>

      </div>

    </div>
    <br><br><br><br>
  </div>