<div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12">
        <h2 class="center gray-text"><i class="medium material-icons">local_car_wash</i> 
               Car-Wash Resgistrados
            </h2>        </div>

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
                  <?php foreach($this->model->ListarCarwashActivas() as $r): ?>
                      <tr>
                      <td><?php echo $r->nombre; ?></td>
                          <td class="center"><img class="materialboxed" src="view/include/<?php echo $r->imagen; ?>" alt="Imagen"><a class="grey-text" href="?c=Carwash&a=CambiarImagen&id=<?php echo $r->idcar; ?>" title="Cambiar imagen de la película">Cambiar imagen</a></td>
                          <td><?php echo $r->direccion; ?></td>
                          <td><?php echo $r->facebook; ?></td>
                          <td><?php echo $r->instagram; ?></td>
                          <td><?php echo $r->telefono; ?></td>
                          <td><?php echo $r->descripcion; ?></td>
                          <td>$ <?php echo $r->email; ?></td>
                          <td class="center">
                              <!-- en la url pasamos parámetros para el controlador -->
                              <!--    controller, metod,id -->
                              <a href="?c=Carwash&a=Update&id=<?php echo $r->idcar; ?>" title="Editar Registro" ><i class="small material-icons blue-text">edit</i></a>
                          </td>
                          <td class="center">
                              <a onclick="javascript:return confirm('¿Seguro que desea desactivar este registro?');" href="?c=Carwash&a=CambiarEstado&nuevo_estado=0&id=<?php echo $r->idcar; ?>" title="Desactivar Registro" ><i class="small material-icons red-text">cancel</i></a>
                          </td>
                      </tr>
                  <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
              
              <!-- tabla de inactivos -->
              <div id="inactivas" class="col s12">
                <table class="striped">
                  <thead>
                      <tr>
                          <th class="center">Id</th>
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
                  <?php foreach($this->model->ListarCarwashInactivas() as $r): ?>
                      <tr>
                      <td><?php echo $r->nombre; ?></td>
                      <td class="center"><img class="materialboxed" src="view/include/<?php echo $r->imagen; ?>" alt="Imagen"><a class="grey-text" href="?c=Carwash&a=CambiarImagen&id=<?php echo $r->idcar; ?>" title="Cambiar imagen de la película">Cambiar imagen</a></td>
                          <td><?php echo $r->direccion; ?></td>
                          <td><?php echo $r->facebook; ?></td>
                          <td><?php echo $r->instagram; ?></td>
                          <td><?php echo $r->telefono; ?></td>
                          <td><?php echo $r->descripcion; ?></td>
                          <td>$ <?php echo $r->email; ?></td>
                          <td class="center">
                              <!-- en la url pasamos parámetros para el controlador -->
                              <!--    controller, metod,id -->
                              <a href="?c=Carwash&a=Update&id=<?php echo $r->idcar; ?>" title="Editar Registro" ><i class="small material-icons blue-text">edit</i></a>
                          </td>
                          <td class="center">
                              <a onclick="javascript:return confirm('¿Seguro que desea desactivar este registro?');" href="?c=Carwash&a=CambiarEstado&nuevo_estado=1&id=<?php echo $r->idcar; ?>" title="Desactivar Registro" ><i class="small material-icons green-text">check_circle</i></a>
                          </td>
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