<x-layout bodyClass="g-sidenav-show  bg-gray-200">
        <x-navbars.sidebar activePage="tables-usuario-localidad"></x-navbars.sidebar>
        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
            <!-- Navbar -->
            <x-navbars.navs.auth titlePage="Selecionar Localidad"></x-navbars.navs.auth>
            <!-- End Navbar -->
            <div class="container-fluid py-4">

              <div class="contenedor-01 py-4">
                  <div class="contenedor-form">
                      <form action="<?php echo url('/localidad/seleccionar/usuario'); ?>" method="POST">
                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                          <div class="form-group my-4">
                              <label for="localidad" class="text-dark font-weight-bold h6">Loalidades</label><br />
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
                          </div>
                          <button type="submit" class="btn btn-primary my-4">selecionar</button>
                      </form>
                  </div>
              </div>

                <x-footers.auth></x-footers.auth>
            </div>
        </main>
        <x-plugins></x-plugins>

</x-layout>
