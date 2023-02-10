<x-layout bodyClass="g-sidenav-show  bg-gray-200">
        <x-navbars.sidebar activePage="tables-usuario"></x-navbars.sidebar>
        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
            <!-- Navbar -->
            <x-navbars.navs.auth titlePage="Usuario: <?php echo $single->NOMBRE.$single->APELLIDO; ?>"></x-navbars.navs.auth>
            <!-- End Navbar -->
            <div class="container-fluid">

                <div class="contenedor-02   py-4">
                  <p class="h5"> DNI: <?php echo $single->DNI; ?></p>
                  <p class="h5"> Telefono: <?php echo $single->TELEFONO; ?></p>
                  <p class="h5"> Localidad: <a href="<?php echo url("/localidad")."/".$single->localidad->id; ?>"><?php echo $single->localidad->NOMBRE; ?></a></p>
                  <p class="h5"> Provincia: <a href="<?php echo url("/provincia")."/".$single->localidad->provincia->id; ?>"><?php echo $single->localidad->provincia->NOMBRE; ?></a></p>
                  <p class="h5"> Pais: <a href="<?php echo url("/pais")."/".$single->localidad->provincia->pais->id; ?>"><?php echo $single->localidad->provincia->pais->NOMBRE; ?></a></p>
                  <a href="{{ url('/usuario') }}/{{$single->id}}/modificar" class="text-white py-3 px-3 mx-4 "><h6 class=" bg-dark w-25 text-white text-capitalize ps-3 py-3"><i class="fa fa-pencil-square-o fa-2x px-2 align-middle" aria-hidden="true"></i>Modificar</h6></a>
                  <a href="{{ url('/usuario') }}/{{$single->id}}/borrar" class="text-white py-3 px-3 mx-4 "><h6 class=" bg-dark w-25 text-white text-capitalize ps-3 py-3"><i class="fa fa fa-trash-o fa-2x px-2 align-middle" aria-hidden="true"></i>Borrar</h6></a>
                </div>
                
                <x-footers.auth></x-footers.auth>
            </div>
        </main>
        <x-plugins></x-plugins>

</x-layout>
