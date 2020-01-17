<div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12">
            <h2 class="center grey-text text-darken-4"><i class="medium material-icons">event_note</i> Horario Registrado</h2>
        </div>

            <!-- datos -->
            <div class="row">
              </div>
              <!-- tabla de activos -->
              <div id="activas" class="col s12">
                <table class="striped">
                  <thead>
                      <tr>
                          <th>Fecha Pelicula</th>
                          <th>Hora Pelicula</th>
                          <th>Peliculas disponibles</th>
                          <th>Nombre Pelicula</th>
                          <th>Sala</th>
                      </tr>
                  </thead>
                  <tbody>
                  <?php foreach($this->model->ListarHorarioActivos() as $r): ?>
                      <tr>
                          <td><?php echo $r->fechapelicula; ?></td>
                          <td><?php echo $r->horapelicula; ?></td>
                          <td><img class="materialboxed" width="150px" src="view/include/peliculas/<?php echo $r->imagen; ?>" alt="Imagen"></td>
                          <td><?php echo $r->nombrepelicula; ?></td>
                          <td><?php echo $r->sala; ?></td>
                          
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