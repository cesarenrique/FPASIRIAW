<x-layout bodyClass="g-sidenav-show  bg-gray-200">
        <x-navbars.sidebar activePage="tables-localidad"></x-navbars.sidebar>
        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
            <!-- Navbar -->
            <x-navbars.navs.auth titlePage="Autor: <?php echo $single->NOMBRE; ?>"></x-navbars.navs.auth>
            <!-- End Navbar -->
            <div class="container-fluid">

                <div class="contenedor-02   py-4">
                  <p class="h5"> Codigo Postal: <?php echo $single->CP; ?></p>
                  <p class="h5"> Habitantes: <?php echo $single->N_HABITANTE; ?></p>
                  <p class="h5"> Provincia: <a href="<?php echo url("/provincia")."/".$single->provincia->id; ?>"><?php echo $single->provincia->NOMBRE; ?></a></p>
                  <p class="h5"> Pais: <a href="<?php echo url("/pais")."/".$single->provincia->pais->id; ?>"><?php echo $single->provincia->pais->NOMBRE; ?></a></p>
                  <a href="{{ url('/localidad') }}/{{$single->id}}/modificar" class="text-white py-3 px-3 mx-4 "><h6 class=" bg-dark w-25 text-white text-capitalize ps-3 py-3"><i class="fa fa-pencil-square-o fa-2x px-2 align-middle" aria-hidden="true"></i>Modificar</h6></a>
                  <a href="{{ url('/localidad') }}/{{$single->id}}/borrar" class="text-white py-3 px-3 mx-4 "><h6 class=" bg-dark w-25 text-white text-capitalize ps-3 py-3"><i class="fa fa fa-trash-o fa-2x px-2 align-middle" aria-hidden="true"></i>Borrar</h6></a><
                </div>
                </div>
                <x-footers.auth></x-footers.auth>
            </div>
        </main>
        <x-plugins></x-plugins>

</x-layout>
