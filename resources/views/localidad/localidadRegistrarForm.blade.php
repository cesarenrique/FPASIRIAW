<x-layout bodyClass="g-sidenav-show  bg-gray-200">
        <x-navbars.sidebar activePage="tables"></x-navbars.sidebar>
        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
            <!-- Navbar -->
            <x-navbars.navs.auth titlePage="Tables"></x-navbars.navs.auth>
            <!-- End Navbar -->
            <div class="container-fluid py-4">

              <div class="contenedor-01">
                  <div class="contenedor-form">
                      <form action="<?php echo url('/localidad/registrar'); ?>" method="POST">
                          <input type="hidden" name="_token" value="<?php echo  csrf_token(); ?>">
                          <div class="form-group">
                              <label for="nombre">Nombre</label>
                              <input type="text" class="form-control" name="nombre">
                          </div>
                          <div class="form-group">
                              <label for="cp">Codigo Postal</label>
                              <input type="text" class="form-control" name="cp">
                          </div>
                          <div class="form-group">
                              <label for="habitantes">Habitantes</label>
                              <input type="number" class="form-control" name="habitantes">
                          </div>
                          <div class="form-group">
                              <label for="provincia">Provincia</label><br />
                              <select name="provincia" id="provincia" style="width:100%;">
                                  <?php
                                     $i=0;
                                      foreach ($todas as $opcion) {

                                          echo "<option value='{$opcion->id}'>{$opcion->NOMBRE} - {$paises[$i]}</option>";
                                          $i++;
                                      }
                                  ?>
                              </select>
                          </div>

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
