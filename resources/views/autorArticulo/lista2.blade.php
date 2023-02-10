<x-layout bodyClass="g-sidenav-show  bg-gray-200">
        <x-navbars.sidebar activePage="tables-autoria"></x-navbars.sidebar>
        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
            <!-- Navbar -->
            <x-navbars.navs.auth titlePage="Articulos por Autor"></x-navbars.navs.auth>
            <!-- End Navbar -->
            <div class="container-fluid py-4">

                <div class="row">

                    <div class="col-12">
                        <div class="card my-4">
                          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                              <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                  <h6 class="text-white text-capitalize ps-3">Articulos por Autor</h6>
                              </div>
                          </div>
                          <div class="card-body px-0 ">
                            <div class="contenedor-01 pb-4">
                                <div class="contenedor-form">
                                    <form action="<?php echo url('/autor/seleccionado/articulo/agregar'); ?>" method="POST">
                                        <input type="hidden" name="_token" value="<?php echo  csrf_token(); ?>">
                                        <input type="number" name="autor" value="<?php echo $autor->id; ?>" hidden>
                                        <div class="form-group my-4">
                                            <label for="articulo" class="text-dark font-weight-bold h6">Autor</label><br />
                                            <select name="articulo" id="articulo" style="width:100%;">
                                                <?php
                                                   $i=0;
                                                    foreach ($articulos2 as $opcion) {

                                                        echo "<option value='{$opcion->id}'>{$opcion->NOMBRE} {$opcion->APELLIDO}</option>";
                                                        $i++;
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary my-4">Vincular</button>
                                    </form>
                                </div>
                            </div>
                          </div>
                        </div>
                        <div class="card my-4">
                            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                    <a href="<?php echo url("/autor")."/".$autor->id;?>"><h6 class="text-white text-capitalize ps-3">Autor: {{$autor->NOMBRE}} {{$autor->APELLIDO}}</h6></a>
                                </div>
                            </div>
                            <div class="card-body px-0 pb-2">
                                <div class="table-responsive p-0">
                                    <table class="table align-items-center mb-0">
                                        <thead>
                                            <tr>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    id</th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Nombre</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                    Descripcion</th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Idioma</th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    ISB</th>

                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Tipo de articulo</th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Nombre de la Editorial</th>
                                                <th
                                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                        Eliminar</th>

                                            </tr>
                                        </thead>
                                        <tbody>


                                            @foreach ($articulos as $tipoarticulo)
                                            <tr>
                                                <td>
                                                    <div class="d-flex px-2 py-1">

                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm"> {{$tipoarticulo->id}}</h6>

                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-2 py-1">

                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm"> <?php echo substr ($tipoarticulo->NOMBRE,0,20).'...'; ?></h6>

                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-2 py-1">

                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm"> <?php echo substr ($tipoarticulo->DESCRIPCION,0,20).'...'; ?></h6>

                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-2 py-1">

                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm"> {{$tipoarticulo->IDIOMA}}}</h6>

                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-2 py-1">

                                                        <div class="d-flex flex-column justify-content-center">

                                                            <h6 class="mb-0 text-sm">{{$tipoarticulo->ISBN}}</h6>

                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-2 py-1">

                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm"> {{$tipoarticulo->tipo!=null ? $tipoarticulo->tipo->TIPO :''}}</h6>

                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex px-2 py-1">

                                                        <div class="d-flex flex-column justify-content-center">
                                                            <h6 class="mb-0 text-sm"> {{$tipoarticulo->editorial!=null ? $tipoarticulo->editorial->NOMBRE: ''}}</h6>

                                                        </div>
                                                    </div>
                                                </td>
                                                    <td class="align-middle">

                                                       <a href="<?php echo url('/autor/'.$autor->id.'/articulo/'.$tipoarticulo->id.'/borrar')?>">Eliminar Articulo </a>
                                                  </td>

                                            </tr>

                                                 @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <x-footers.auth></x-footers.auth>
            </div>
        </main>
        <x-plugins></x-plugins>

</x-layout>
