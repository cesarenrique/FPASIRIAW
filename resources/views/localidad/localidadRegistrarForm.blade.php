<x-layout bodyClass="g-sidenav-show  bg-gray-200">
        <x-navbars.sidebar activePage="tables-localidad"></x-navbars.sidebar>
        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
            <!-- Navbar -->
            <x-navbars.navs.auth titlePage="Registrar Loclalidad"></x-navbars.navs.auth>
            <!-- End Navbar -->
            <div class="container-fluid ">

              <div class="contenedor-01  py-4">
                  <div class="contenedor-form">
                      <form action="<?php echo url('/localidad/registrar'); ?>" method="POST">
                          <input type="hidden" name="_token" value="<?php echo  csrf_token(); ?>">
                          <div class="form-group my-4">
                              <label for="nombre" class="text-dark font-weight-bold h6">Nombre</label>
                              <input type="text" class="form-control" name="nombre">
                          </div>
                          <div class="form-group my-4">
                              <label for="cp" class="text-dark font-weight-bold h6">Codigo Postal</label>
                              <input type="text" class="form-control" name="cp">
                          </div>
                          <div class="form-group my-4">
                              <label for="habitantes" class="text-dark font-weight-bold h6">Habitantes</label>
                              <input type="number" class="form-control" name="habitantes">
                          </div>
                          <div class="form-group my-4" class="text-dark font-weight-bold h6">
                              <label for="provincia" class="text-dark font-weight-bold h6">Provincia</label><br />
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
