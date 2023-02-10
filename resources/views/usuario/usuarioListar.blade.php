<x-layout bodyClass="g-sidenav-show  bg-gray-200">
        <x-navbars.sidebar activePage="tables-usuario"></x-navbars.sidebar>
        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
            <!-- Navbar -->
            <x-navbars.navs.auth titlePage="Usuario Tables"></x-navbars.navs.auth>
            <!-- End Navbar -->
            <div class="container-fluid py-4">
                <div class="row">
                    <div class="col-12">
                        <div class="card my-4">
                            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                  <h6 class="w-25 float-left text-white text-capitalize ps-3">Usuario table  <a href="{{ route('usuario.registrarForm') }}" class="text-white bg-dark py-3 px-3 mx-4 "><i class="fa fa-plus fa-2x px-2 align-middle" aria-hidden="true"></i>Registrar</a></h6>
                                </div>
                            </div>
                            <div class="card-body px-0 pb-2">
                                <div class="table-responsive p-0">
                                    <table class="table align-items-center mb-0">
                                        <thead>
                                            <tr>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    ID</th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    DNI</th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Nombre</th>
                                                <th
                                                class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Apellido</th>
                                                ç<th
                                                  class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">

                                                    Telefono</th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Localidad</th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Ver</th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Modificar</th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Eliminar</th>
                                                <th class="text-secondary opacity-7"></th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                          <?php
                                            $i=0;
                                            foreach ($todos as $fila) {  ?>
                                            <tr>

                                                <td class="align-middle">
                                                  <div class="d-flex flex-column justify-content-center">
                                                      <h6 class="mb-0 text-sm"><?php echo $fila['id'] ?></h6>
                                                  </div>

                                                </td>
                                                <td class="align-middle text-center">
                                                  <div class="d-flex flex-column justify-content-center">
                                                      <h6 class="mb-0 text-sm"><?php echo $fila['DNI'] ?></h6>
                                                  </div>
                                                </td>
                                                <td class="align-middle text-center ">
                                                  <div class="d-flex flex-column justify-content-center">
                                                      <h6 class="mb-0 text-sm"><?php echo $fila['NOMBRE'] ?></h6>
                                                  </div>
                                                </td>
                                                <td class="align-middle text-center">
                                                  <div class="d-flex flex-column justify-content-center">
                                                      <h6 class="mb-0 text-sm"><?php echo $fila['APELLIDO'] ?></h6>
                                                  </div>
                                                </td>
                                                <td class="align-middle text-center ">
                                                  <div class="d-flex flex-column justify-content-center">
                                                      <h6 class="mb-0 text-sm"><?php echo $fila['TELEFONO'] ?></h6>
                                                  </div>
                                                </td>
                                                <td class="align-middle text-center ">
                                                  <div class="d-flex flex-column justify-content-center">
                                                      <h6 class="mb-0 text-sm"><?php  echo substr($fila->localidad->NOMBRE."-".$fila->localidad->provincia->NOMBRE."-".$fila->localidad->provincia->pais->NOMBRE,0,40); ?></h6>
                                                  </div>
                                                </td>

                                                <td class="align-middle text-center">
                                                  <?php
                                                    $url=url("/usuario/");
                                                    $id=$fila['id'];
                                                    echo "<a href='{$url}/{$id}' ><i class='fa fa-eye fa-2' aria-hidden='true'></i></i></a>";
                                                   ?>
                                                </td>
                                                <td class="align-middle text-center">
                                                  <?php
                                                    $url=url("/usuario/");
                                                    $id=$fila['id'];
                                                    echo "<a href='{$url}/{$id}/modificar' ><i class='fa fa-pencil-square-o fa-2'  aria-hidden='true'></i></i></a>";
                                                   ?>
                                                </td>

                                                <td class="align-middle text-center">
                                                  <?php
                                                    echo "<a href='#' onclick='eliminar({$fila['id']})' ><i class='fa fa-trash-o' aria-hidden='true'></i></a>";
                                                   ?>
                                                </td>
                                            </tr>
                                          <?php
                                              $i++;
                                            }
                                            ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <script>
                	function eliminar(id){

                    	var msg = confirm("Seguro que desea eliminar el autor");

                		if (msg) {
                			window.location = "<?php echo url('/usuario')?>/"+id+"/borrar";
                		}
                  }
                </script>

                <x-footers.auth></x-footers.auth>
            </div>
        </main>
        <x-plugins></x-plugins>

</x-layout>
