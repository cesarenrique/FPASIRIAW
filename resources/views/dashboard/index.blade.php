<x-layout bodyClass="g-sidenav-show  bg-gray-200">
    <x-navbars.sidebar activePage='inicio'></x-navbars.sidebar>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <x-navbars.navs.auth titlePage="inicio"></x-navbars.navs.auth>
        <!-- End Navbar -->
        <div class="container-fluid py-4">
          <div id="slider-cesar">

               <ul class="slider">
                   <li id="slide1">
                       <h1>Amantes de los libros</h1>
                       <img src="{{ asset('img/libros1.png')}}" />
                   </li>
                   <li id="slide2">
                     <h1>Amantes del trabajo</h1>
                        <img src="{{ asset('img/libros2.png')}}" />
                   </li>
                   <li id="slide3">
                     <h1>Amantes del estudio y el progreso</h1>
                     <img src="{{ asset('img/libros3.png')}}" />
                   </li>
               </ul>

               <ul class="menu">
                   <li>
                       <a href="#slide1">1</a>
                   </li>
                   <li>
                       <a href="#slide2">2</a>
                   </li>
                   <li>
                       <a href="#slide3">3</a>
                   </li>
               </ul>

           </div>

            <x-footers.auth></x-footers.auth>
        </div>
    </main>
    <x-plugins></x-plugins>
    </div>

</x-layout>
