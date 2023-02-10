<x-layout bodyClass="g-sidenav-show  bg-gray-200">
        <x-navbars.sidebar activePage="tables-autoria"></x-navbars.sidebar>
        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
            <!-- Navbar -->
            <x-navbars.navs.auth titlePage="Selecionar Autor"></x-navbars.navs.auth>
            <!-- End Navbar -->
            <div class="container-fluid ">

              <div class="contenedor-01 py-4">
                  <div class="contenedor-form">
                      <form action="<?php echo url('/autor/seleccionado/articulo'); ?>" method="POST">
                          <input type="hidden" name="_token" value="<?php echo  csrf_token(); ?>">

                          <div class="form-group my-4">
                              <label for="autor" class="text-dark font-weight-bold h6">Autor</label><br />
                              <select name="autor" id="autor" style="width:100%;">
                                  <?php
                                     $i=0;
                                      foreach ($autores as $opcion) {

                                          echo "<option value='{$opcion->id}'>{$opcion->NOMBRE} {$opcion->APELLIDO}</option>";
                                          $i++;
                                      }
                                  ?>
                              </select>
                          </div>
                          <button type="submit" class="btn btn-primary my-4">seleccionar</button>
                      </form>
                  </div>
              </div>
                <x-footers.auth></x-footers.auth>
            </div>
        </main>
        <x-plugins></x-plugins>

</x-layout>
