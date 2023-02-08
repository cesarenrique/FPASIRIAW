<x-layout bodyClass="g-sidenav-show  bg-gray-200">
        <x-navbars.sidebar activePage="tables"></x-navbars.sidebar>
        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
            <!-- Navbar -->
            <x-navbars.navs.auth titlePage="Tables"></x-navbars.navs.auth>
            <!-- End Navbar -->
            <div class="container-fluid py-4">

              <div class="contenedor-01">
                  <div class="contenedor-form">
                      <form action="<?php echo url('/usuario/registrar'); ?>" method="POST">
                          <input type="hidden" name="_token" value="<?php echo  csrf_token(); ?>">
                          <div class="form-group">
                              <label for="nombre">Nombre</label>
                              <input type="text" class="form-control" name="nombre">
                          </div>
                          <div class="form-group">
                              <label for="apellidos">Apellido</label>
                              <input type="text" class="form-control" name="apellidos">
                          </div>
                          <div class="form-group">
                              <label for="DNI">DNI</label>
                              <input type="text" class="form-control" name="DNI">
                          </div>
                          <div class="form-group">
                              <label for="telefono">Telefono</label>
                              <input type="text" class="form-control" name="telefono">
                          </div>
                          <div class="form-group">
                              <label for="localidad">Provincia</label><br />
                              <select name="localidad" id="localidad" style="width:100%;">
                                  <?php
                                     $i=0;
                                      foreach ($localidades as $opcion) {
                                          echo "<option value='{$opcion->id}'>{$opcion->NOMBRE} - {$provincias[$i]} - {$paises[$i]}</option>";
                                          $i++;
                                      }
                                  ?>
                              </select>
                          </div>s

                          <button type="submit" class="btn btn-primary">Registrar</button>
                      </form>
                  </div>
              </div>
                </div>
                <x-footers.auth></x-footers.auth>
            </div>
        </main>
        <x-plugins></x-plugins>

</x-layout>
