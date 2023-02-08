<x-layout bodyClass="g-sidenav-show  bg-gray-200">
        <x-navbars.sidebar activePage="tables"></x-navbars.sidebar>
        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
            <!-- Navbar -->
            <x-navbars.navs.auth titlePage="Tables"></x-navbars.navs.auth>
            <!-- End Navbar -->
            <div class="container-fluid py-4">

              <div class="contenedor-01">
                  <div class="contenedor-form">
                      <form action="<?php echo url('/localidad/modificar'); ?>" method="POST">
                          <input type="hidden" name="_token" value="<?php echo  csrf_token(); ?>">
                          <input type="number" name="id" value="<?php echo $localidad->id; ?>" hidden>
                          <div class="form-group">
                              <label for="nombre">Nombre</label>
                              <input type="text" class="form-control" name="nombre" value="<?php echo $localidad->NOMBRE; ?>">
                          </div>
                          <div class="form-group">
                              <label for="cp">Codigo Postal</label>
                              <input type="text" class="form-control" name="cp" value="<?php echo $localidad->CP; ?>">
                          </div>
                          <div class="form-group">
                              <label for="habitantes">Habitantes</label>
                              <input type="number" class="form-control" name="habitantes" value="<?php echo $localidad->N_HABITANTE; ?>">
                          </div>
                          <div class="form-group">
                              <label for="provincia">Provincia</label><br />
                              <select name="provincia" id="provincia" style="width:100%;" >
                                  <?php
                                     $i=0;
                                      foreach ($provincias as $opcion) {

                                          echo "<option value='{$opcion->id}'";
                                          if($selecionadas[$i]==true){
                                            echo " selected ";
                                          }
                                          echo ">{$opcion->NOMBRE} - {$paises[$i]}</option>";
                                          $i++;
                                      }
                                  ?>
                              </select>
                          </div>
                          <button type="submit" class="btn btn-primary">Modificar</button>
                      </form>
                  </div>
              </div>
                </div>
                <x-footers.auth></x-footers.auth>
            </div>
        </main>
        <x-plugins></x-plugins>

</x-layout>
