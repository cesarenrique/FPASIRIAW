<x-layout bodyClass="g-sidenav-show  bg-gray-200">
        <x-navbars.sidebar activePage="tables-multa"></x-navbars.sidebar>
        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
            <!-- Navbar -->
            <x-navbars.navs.auth titlePage="Registro Multas"></x-navbars.navs.auth>
            <!-- End Navbar -->
            <div class="container-fluid ">

              <div class="contenedor-01 py-4">
                  <div class="contenedor-form">
                      <form action="<?php echo url('/multa/registrar'); ?>" method="POST">
                          <input type="hidden" name="_token" value="<?php echo  csrf_token(); ?>">
                          <div class="form-group  my-4">
                              <label for="dia" class="text-dark font-weight-bold h6">DIA</label>
                              <input type="date" class="form-control" name="dia">
                          </div>
                          <div class="form-group  my-4">
                              <label for="usuario" class="text-dark font-weight-bold h6">Usuario</label><br />
                              <select name="usuario" id="usuario" style="width:100%;">
                                  <?php
                                     $i=0;
                                      foreach ($todos as $opcion) {

                                          echo "<option value='{$opcion->id}'>{$opcion->NOMBRE} {$opcion->APELLIDO}</option>";
                                          $i++;
                                      }
                                  ?>
                              </select>
                          </div>


                          <button type="submit" class="btn btn-primary  my-4">Registrar</button>
                      </form>
                  </div>
              </div>
                <x-footers.auth></x-footers.auth>
            </div>
        </main>
        <x-plugins></x-plugins>

</x-layout>
