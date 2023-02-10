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
                              <label for="estanteria">estanteria</label>
                              <input type="text" class="form-control" name="estanteria" value="<?php echo $localidad->estanteria; ?>">
                          </div>
                          <div class="form-group">
                              <label for="cp">Localizacion</label>
                              <input type="text" class="form-control" name="localizacion" value="<?php echo $localidad->localizacion; ?>">
                          </div>
                          
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
