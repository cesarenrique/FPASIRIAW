<x-layout bodyClass="g-sidenav-show  bg-gray-200">
        <x-navbars.sidebar activePage="tables-usuario"></x-navbars.sidebar>
        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
            <!-- Navbar -->
            <x-navbars.navs.auth titlePage="Registrar Usuario"></x-navbars.navs.auth>
            <!-- End Navbar -->
            <div class="container-fluid ">

              <div class="contenedor-01 py-4">
                  <div class="contenedor-form py-4">
                      <form action="<?php echo url('/usuario/registrar'); ?>" method="POST">
                          <input type="hidden" name="_token" value="<?php echo  csrf_token(); ?>">
                          <div class="form-group my-4">
                              <label for="nombre" class="text-dark font-weight-bold h6">Nombre</label>
                              <input type="text" class="form-control" name="nombre">
                          </div>
                          <div class="form-group my-4">
                              <label for="apellidos" class="text-dark font-weight-bold h6">Apellido</label>
                              <input type="text" class="form-control" name="apellidos">
                          </div>
                          <div class="form-group my-4">
                              <label for="DNI" class="text-dark font-weight-bold h6">DNI</label>
                              <input type="text" class="form-control" name="DNI">
                          </div>
                          <div class="form-group my-4">
                              <label for="telefono" class="text-dark font-weight-bold h6">Telefono</label>
                              <input type="text" class="form-control" name="telefono">
                          </div>
                          <div class="form-group my-4">
                              <label for="localidad" class="text-dark font-weight-bold h6">Provincia</label><br />
                              <select name="localidad" id="localidad" style="width:100%;">
                                  <?php
                                     $i=0;
                                      foreach ($localidades as $localidad) {
                                        echo "<option value='{$localidad->id}'";
                                        echo ">{$localidad->NOMBRE}-{$localidad->provincia->NOMBRE}-{$localidad->provincia->pais->NOMBRE}</option>";
                                        $i++;

                                      }
                                  ?>
                              </select>
                          </div>s

                          <button type="submit" class="btn btn-primary my-4">Registrar</button>
                      </form>
                  </div>
              </div>
                </div>
                <x-footers.auth></x-footers.auth>
            </div>
        </main>
        <x-plugins></x-plugins>

</x-layout>
