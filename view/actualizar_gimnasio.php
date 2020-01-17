<!-- cuerpo de registrar_pelicula -->
<div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12">
        <h2 class="center gray-text"><i class="medium material-icons">fitness_center</i> 
              Actualizar Gimnasio
            </h2>

            <!-- formulario -->
            <div class="row">
              <form class="col s12" action="?c=Gimnasio&a=Actualizar" method="post" enctype="multipart/form-data">
                <div class="row">

                  <input type="hidden" name="txtIdgim" value="<?php echo $gimnasio->idgim; ?>" />

                  <div class="input-field col s6">
                    <input id="txtNombre" type="text" class="validate" name="txtNombre" value="<?php echo $gimnasio->nombre; ?>"  required>
                    <label for="txtNombre">Nombre</label>
                  </div>
                  <div class="input-field col s6">
</i>
                    <input id="txtDireccion" type="text" class="validate" name="txtDireccion" value="<?php echo $gimnasio->direccion; ?>"  required>
                    <label for="txtDireccion">Direccion</label>
                  </div>

                 >

                  <div class="input-field col s6">

                    <input id="txtFacebook" type="text" class="validate" name="txtFacebook" value="<?php echo $gimnasio->facebook; ?>"  required>
                    <label for="txtFacebook">Facebook</label>
                  </div>

                  <div class="input-field col s6">

                    <input id="txtInstagram" type="text" class="validate" name="txtInstagram" value="<?php echo $gimnasio->instagram; ?>" required >
                    <label for="txtInstagram">Instagram</label>
                  </div>  

                  <div class="input-field col s6">

                    <input id="txtTelefono" type="text" class="validate" name="txtTelefono" value="<?php echo $gimnasio->telefono; ?>" required>
                    <label for="txtTelefono">Telefono</label>
                  </div>  

                  <div class="input-field col s6">

                    <input id="txtDescripcion" type="text" class="validate" name="txtDescripcion" value="<?php echo $gimnasio->descripcion; ?>" required>
                    <label for="txtDescripcion">Descripción</label>
                  </div> 

                  <div class="input-field col s6">

                    <input id="txtEmail" type="text" class="validate" name="txtEmail" value="<?php echo $gimnasio->email; ?>" required>
                    <label for="txtEmail">E-mail</label>
                  </div>                   
                  
                  <div class="input-field col s12 center">
                  <button type="submit" class="waves-effect waves-light btn grey"><i class="material-icons right">send</i>Guardar</button>
                  </div>

                </div>
              </form>
            </div>

        </div>

      </div>

    </div>
    <br><br>
  </div>
