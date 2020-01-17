<!-- cuerpo de registrar_pelicula -->
<div class="container">
    <div class="section">

      <!--   Icon Section   -->
      <div class="row">
        <div class="col s12">
            <h2 class="center gray-text"><i class="medium material-icons">local_hospital</i> 
              Registrar Clinica
            </h2>

            <!-- formulario -->
            <div class="row">
              <form class="col s12" action="?c=Clinica&a=Guardar" method="post" enctype="multipart/form-data">
                <div class="row">

                  <div class="input-field col s6">
                    <input id="txtNombre" type="text" class="validate" name="txtNombre"   required>
                    <label for="txtNombre">Nombre</label>
                  </div>

                  <div class="file-field input-field col s6">
                    <div class="btn grey">
                      <span>Imagen del local</span>
                      <input type="file" name="txtImagen" accept=".jpg">
                    </div>
                    <div class="file-path-wrapper">
                      <input class="file-path validate" type="text" placeholder="Subir imagen" required>
                    </div>
                  </div>

                  <div class="input-field col s6">
                    <input id="txtDireccion" type="text" class="validate" name="txtDireccion"  required>
                    <label for="txtDireccion">Direccion</label>
                  </div>

                  <div class="input-field col s6">
                    <input id="txtTipo" type="text" class="validate" name="txtTipo"   required>
                    <label for="txtTipo">Horario de Atencion</label>
                  </div>

                  <div class="input-field col s6">

                    <input id="txtFacebook" type="text" class="validate" name="txtFacebook"  required>
                    <label for="txtFacebook">Facebook</label>
                  </div>

                  <div class="input-field col s6">

                    <input id="txtInstagram" type="text" class="validate" name="txtInstagram" required >
                    <label for="txtInstagram">Instagram</label>
                  </div>  

                  <div class="input-field col s6">
                    <input id="txtTelefono" type="text" class="validate" name="txtTelefono"  required>
                    <label for="txtTelefono">Telefono</label>
                  </div>  

                  <div class="input-field col s6">
                    <input id="txtDescripcion" type="text" class="validate" name="txtDescripcion"  required>
                    <label for="txtDescripcion">Descripción</label>
                  </div> 

                  <div class="input-field col s6">
                    <input id="txtEmail" type="text" class="validate" name="txtEmail"  required>
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
