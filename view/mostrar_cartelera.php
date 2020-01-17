  <div class="row">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12">
            <h2 class="center grey-text text-darken-4"><i class="medium material-icons">panorama</i> Películas en Estreno</h2>
            <h2 class="center grey-text text-darken-4">"GALERIAS"</h2>
        </div>

            <!-- datos -->
            <div class="row">              
              <!-- carrusel -->
              <div class="carousel">
                <?php foreach($this->modelHorario->ListarPeliculasHorario() as $r): ?>
                  <a class="carousel-item hoverable" href="?c=Boletousuario&a=VerHorarios&id=<?php echo $r->idpelicula; ?>" ><img src="view/include/peliculas/<?php echo $r->imagen; ?>" alt="<?php echo $r->nombrepelicula; ?>" title="<?php echo $r->nombrepelicula; ?>"></a>                             
                <?php endforeach; ?>
              </div>
            </div>

      </div>

    </div>
    <br><br><br><br>
  </div>