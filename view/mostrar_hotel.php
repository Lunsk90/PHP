<div class="row">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12">
            <h2 class="center grey-text text-darken-4"><i class="medium material-icons">hotel</i> Hoteles Registrados</h2>
        </div>

            <!-- datos -->
            <div class="row">
              <div class="col s12">
                <ul class="tabs">
                  <li class="tab col s6"><a  class="active" href="#activas">Activos</a></li>
                  <li class="tab col s6"><a href="#inactivas">Inactivos</a></li>
                </ul>
              </div>
              <!-- tabla de activos -->
              <div id="activas" class="col s12">
                <table class="striped">
                  <thead>
                      <tr>
                      <th>Nombre</th>
                          <th>Imagen</th>
                          <th>Direccion</th>
                          <th>Estado</th>
                          <th>Facebook</th>
                          <th>Instagram</th>
                          <th>Telefono</th>
                          <th>Descripción</th>
                          <th>E-mail</th>
                          <th class="center">Editar</th>
                          <th class="center">Desactivar</th>
                      </tr>
                  </thead>
                  <tbody>
                  <?php foreach($this->model->ListarHotelActivas() as $r): ?>
                      <tr>
                          <td><?php echo $r->nombre; ?></td>
                          <td class="center"><img class="materialboxed" src="view/include/<?php echo $r->imagen; ?>" alt="Imagen"><a class="grey-text" href="?c=Hotel&a=CambiarImagen&id=<?php echo $r->idhotel; ?>" title="Cambiar imagen de la película">Cambiar imagen</a></td>
                          <td><?php echo $r->direccion; ?></td>
                          <td><?php echo $r->tipo; ?></td>
                          <td><?php echo $r->facebook; ?></td>
                          <td><?php echo $r->instagram; ?></td>
                          <td><?php echo $r->telefono; ?></td>
                          <td><?php echo $r->descripcion; ?></td>
                          <td>$ <?php echo $r->email; ?></td>
                          <td class="center">
                              <!-- en la url pasamos parámetros para el controlador -->
                              <!--    controller, metod,id -->
                              <a href="?c=Hotel&a=Update&id=<?php echo $r->idhotel; ?>" title="Editar Registro" ><i class="small material-icons blue-text">edit</i></a>
                          </td>
                          <td class="center">
                              <a onclick="javascript:return confirm('¿Seguro que desea desactivar este registro?');" href="?c=Hotel&a=CambiarEstado&nuevo_estado=0&id=<?php echo $r->idhotel; ?>" title="Desactivar Registro" ><i class="small material-icons red-text">cancel</i></a>
                          </td>
                      </tr>
                      <!-- encabezados -->
                      <thead>
                          <tr>
                          <th>Nombre</th>
                          <th>Imagen</th>
                          <th>Direccion</th>
                          <th>Estado</th>
                          <th>Facebook</th>
                          <th>Instagram</th>
                          <th>Telefono</th>
                          <th>Descripción</th>
                          <th>E-mail</th>
                              <th class="center">Editar</th>
                              <th class="center">Desactivar</th>
                          </tr>
                      </thead>
                  <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
              
              <!-- tabla de inactivos -->
              <div id="inactivas" class="col s12">
                <table class="striped">
                  <thead>
                      <tr>
                      <th>Nombre</th>
                          <th>Imagen</th>
                          <th>Direccion</th>
                          <th>Estado</th>
                          <th>Facebook</th>
                          <th>Instagram</th>
                          <th>Telefono</th>
                          <th>Descripción</th>
                          <th>E-mail</th>
                          <th class="center">Editar</th>
                          <th class="center">Activar</th>
                      </tr>
                  </thead>
                  <tbody>
                  <?php foreach($this->model->ListarHotelInactivas() as $r): ?>
                      <tr>
                          <td><?php echo $r->nombre; ?></td>
                          <td class="center"><img src="view/include/<?php echo $r->imagen; ?>" alt="Imagen"><a class="grey-text" href="?c=Hotel&a=CambiarImagen" title="Cambiar imagen de la película">Cambiar imagen</a></td>
                          <td><?php echo $r->direccion; ?></td>
                          <td><?php echo $r->tipo; ?></td>
                          <td><?php echo $r->facebook; ?></td>
                          <td><?php echo $r->instagram; ?></td>
                          <td><?php echo $r->telefono; ?></td>
                          <td><?php echo $r->descripcion; ?></td>
                          <td>$ <?php echo $r->email; ?></td>
                          <td class="center">
                              <!-- en la url pasamos parámetros para el controlador -->
                              <!--    controller, metod,id -->
                              <a href="?c=Hotel&a=Update&id=<?php echo $r->idpelicula; ?>" title="Editar Registro" ><i class="small material-icons blue-text">edit</i></a>
                          </td>
                          <td class="center">
                              <a onclick="javascript:return confirm('¿Seguro que desea desactivar este registro?');" href="?c=Hotel&a=CambiarEstado&nuevo_estado=1&id=<?php echo $r->idhotel; ?>" title="Activar Registro" ><i class="small material-icons green-text">check_circle</i></a>
                          </td>
                      </tr>
                  <thead>
                      <tr>
                      <th>Nombre</th>
                          <th>Imagen</th>
                          <th>Direccion</th>
                          <th>Estado</th>
                          <th>Facebook</th>
                          <th>Instagram</th>
                          <th>Telefono</th>
                          <th>Descripción</th>
                          <th>E-mail</th>
                          <th class="center">Editar</th>
                          <th class="center">Activar</th>
                      </tr>
                  </thead>
                  <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>

      </div>

    </div>
    <br><br><br><br>
  </div>