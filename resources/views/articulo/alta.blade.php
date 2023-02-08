<x-layout bodyClass="g-sidenav-show  bg-gray-200">
        <x-navbars.sidebar activePage="tables"></x-navbars.sidebar>
        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
            <!-- Navbar -->
            <x-navbars.navs.auth titlePage="Tables"></x-navbars.navs.auth>
            <!-- End Navbar -->
            <div class="container-fluid py-4">

              <div class="contenedor-01">
                  <div class="contenedor-form">
                      <form action="<?php echo url('/articuloalta'); ?>" method="POST">
                          <input type="hidden" name="_token" value="<?php echo  csrf_token(); ?>">
                          <div class="form-group">
                              <label for="isbnarticulo">ISBN</label>
                              <input type="text" class="form-control" name="isbnarticulo">
                          </div>
                          <div class="form-group">
                              <label for="descripcionarticulo">Descripcion</label>
                              <input type="text" class="form-control" name="descripcionarticulo">
                          </div>
                          <div class="form-group">
                              <label for="nombrearticulo">Nombre</label>
                              <input type="text" class="form-control" name="nombrearticulo">
                          </div>
                          <div class="form-group">
                              <label for="idiomaarticulo">Idioma</label>
                              <input type="text" class="form-control" name="idiomaarticulo">
                          </div>
                          <div class="form-group">
                              <label for="editorial">Editorial</label><br />
                              <select name="editorial" id="editorial" style="width:100%;">
                                  <?php
                                     $i=0;
                                      foreach ($editoriales as $opcion) {

                                          echo "<option value='{$opcion->id}'>{$opcion->NOMBRE}</option>";
                                          $i++;
                                      }
                                  ?>
                              </select>
                          </div>
                          <div class="form-group">
                              <label for="tipo">Tipo</label><br />
                              <select name="tipo" id="tipo" style="width:100%;">
                                  <?php
                                     $i=0;
                                      foreach ($tipos as $opcion) {

                                          echo "<option value='{$opcion->id}'>{$opcion->TIPO}</option>";
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
