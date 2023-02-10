<x-layout bodyClass="g-sidenav-show  bg-gray-200">
        <x-navbars.sidebar activePage="tables-autor"></x-navbars.sidebar>
        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
            <!-- Navbar -->
            <x-navbars.navs.auth titlePage="Registrar Autor"></x-navbars.navs.auth>
            <!-- End Navbar -->
            <div class="container-fluid">

              <div class="contenedor-01  py-4">
                  <div class="contenedor-form ">
                      <form action="<?php echo url('/autor/registrar'); ?>" method="POST">
                          <input type="hidden" name="_token" value="<?php echo  csrf_token(); ?>">
                          <div class="form-group my-4">
                              <label for="nombre" class="text-dark font-weight-bold h6">Nombre:</label>
                              <input type="text" class="form-control" name="nombre">
                          </div>
                          <div class="form-group my-4">
                              <label for="apellidos" class="text-dark font-weight-bold h6">Apellidos:</label>
                              <input type="text" class="form-control" name="apellidos">
                          </div>

                          <button type="submit" class="btn btn-primary my-4">Registrar</button>
                      </form>
                  </div>
              </div>
                <x-footers.auth></x-footers.auth>
            </div>
        </main>
        <x-plugins></x-plugins>

</x-layout>
