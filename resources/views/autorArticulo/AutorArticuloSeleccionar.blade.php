<x-layout bodyClass="g-sidenav-show  bg-gray-200">
        <x-navbars.sidebar activePage="tables"></x-navbars.sidebar>
        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
            <!-- Navbar -->
            <x-navbars.navs.auth titlePage="Tables"></x-navbars.navs.auth>
            <!-- End Navbar -->
            <div class="container-fluid py-4">

              <div class="contenedor-01">
                  <div class="contenedor-form">
                      <form action="<?php echo url('/autor/seleccionado/articulo'); ?>" method="POST">
                          <input type="hidden" name="_token" value="<?php echo  csrf_token(); ?>">

                          <div class="form-group">
                              <label for="autor">Articulo</label><br />
                              <select name="autor" id="autor" style="width:100%;">
                                  <?php
                                     $i=0;
                                      foreach ($autores as $opcion) {

                                          echo "<option value='{$opcion->id}'>{$opcion->NOMBRE}</option>";
                                          $i++;
                                      }
                                  ?>
                              </select>
                          </div>
                          <button type="submit" class="btn btn-primary">seleccionar</button>
                      </form>
                  </div>
              </div>
                <x-footers.auth></x-footers.auth>
            </div>
        </main>
        <x-plugins></x-plugins>

</x-layout>
