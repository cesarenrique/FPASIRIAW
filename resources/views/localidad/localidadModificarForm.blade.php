<x-layout bodyClass="g-sidenav-show  bg-gray-200">
        <x-navbars.sidebar activePage="tables-localidad"></x-navbars.sidebar>
        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
            <!-- Navbar -->
            <x-navbars.navs.auth titlePage="Modificar Localidad"></x-navbars.navs.auth>
            <!-- End Navbar -->
            <div class="container-fluid">

              <div class="contenedor-01 py-4">
                  <div class="contenedor-form">
                      <form action="<?php echo url('/localidad/modificar'); ?>" method="POST">
                          <input type="hidden" name="_token" value="<?php echo  csrf_token(); ?>">
                          <input type="number" name="id" value="<?php echo $localidad->id; ?>" hidden>
                          <div class="form-group my-4">
                              <label for="nombre" class="text-dark font-weight-bold h6">Nombre</label>
                              <input type="text" class="form-control" name="nombre" value="<?php echo $localidad->NOMBRE; ?>">
                          </div>
                          <div class="form-group my-4">
                              <label for="cp" class="text-dark font-weight-bold h6">Codigo Postal</label>
                              <input type="text" class="form-control" name="cp" value="<?php echo $localidad->CP; ?>">
                          </div>
                          <div class="form-group my-4">
                              <label for="habitantes" class="text-dark font-weight-bold h6">Habitantes</label>
                              <input type="number" class="form-control" name="habitantes" value="<?php echo $localidad->N_HABITANTE; ?>">
                          </div>
                          <div class="form-group my-4">
                              <label for="provincia" class="text-dark font-weight-bold h6">Provincia</label><br />
                              <select name="provincia" id="provincia" style="width:100%;" >
                                  <?php
                                     $i=0;
                                      foreach ($provincias as $opcion) {

                                          echo "<option value='{$opcion->id}'";
                                          if($selecionadas[$i]==true){
                                            echo " selected ";
                                          }
                                          echo ">{$opcion->NOMBRE} - {$opcion->pais->NOMBRE}</option>";
                                          $i++;
                                      }
                                  ?>
                              </select>
                          </div>
                          <button type="submit" class="btn btn-primary  my-4">Modificar</button>
                      </form>
                  </div>
              </div>
                </div>
                <x-footers.auth></x-footers.auth>
            </div>
        </main>
        <x-plugins></x-plugins>

</x-layout>
