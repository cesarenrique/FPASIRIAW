<x-layout bodyClass="g-sidenav-show  bg-gray-200">
        <x-navbars.sidebar activePage="tables"></x-navbars.sidebar>
        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
            <!-- Navbar -->
            <x-navbars.navs.auth titlePage="Tables"></x-navbars.navs.auth>
            <!-- End Navbar -->
            <div class="container-fluid py-4">
                <div class="row">
                    <div class="col-12">
                      <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">Articulos</h6>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-4">
                          <div class="contenedor-01">
                              <div class="contenedor-form">
                                  <form action="<?php echo url('/usuario/seleccionado/ejemplar/agregar'); ?>" method="POST">
                                      <input type="hidden" name="_token" value="<?php echo  csrf_token(); ?>">
                                      <input type="number" name="usuario" value="<?php echo $usuario->id; ?>" hidden>
                                      <div class="form-group">
                                          <label for="prestamo">Fecha Prestamo</label>
                                          <input type="date" class="form-control" name="prestamo">
                                      </div>
                                      <div class="form-group">
                                          <label for="devolucion">Fecha Devolucion</label>
                                          <input type="date" class="form-control" name="devolucion">
                                      </div>
                                      <div class="form-group">
                                          <label for="ejemplar">Ejemplar</label><br />
                                          <select name="ejemplar" id="ejemplar" style="width:100%;">
                                              <?php
                                                 $i=0;
                                                  foreach ($ejemplares2 as $opcion) {

                                                      echo "<option value='{$opcion->id}'>{$opcion->id}-{$opcion->articulo->NOMBRE} </option>";
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
                      </div>
                        <div class="card my-4">
                            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                                    <h6 class="text-white text-capitalize ps-3">Ejemplar table</h6>
                                </div>
                            </div>
                            <div class="card-body px-0 pb-2">
                                <div class="table-responsive p-0">
                                    <table class="table align-items-center mb-0">
                                        <thead>
                                            <tr>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    ID</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                    ESTANTERIA</th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    LOCALIZACION</th>
                                                <th
                                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                        FECHA PRESTAMO</th>
                                                <th
                                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                        FECHA DEVOLUCION</th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    ARTICULO</th>
                                                <th
                                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    TIPO</th>
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
                                            foreach ($ejemplares as $fila) {  ?>
                                            <tr>

                                                <td class="align-middle">
                                                <p class="text-lg font-weight-bold "><?php echo $fila['id'] ?></p>

                                                </td>
                                                <td>
                                                  <p class="text-lg font-weight-bold mb-0"><?php echo substr($fila['ESTANTERIA'],0,20).'...'; ?></p>
                                                </td>
                                                <td class="align-middle text-center ">
                                                  <p class="text-lg font-weight-bold mb-0"><?php echo substr($fila['LOCALIZACION'],0,15).'...' ?></p>
                                                </td>
                                                <td>
                                                  <p class="text-lg font-weight-bold mb-0"><?php echo $fila->pivot->FECHA_PRESTAMO; ?></p>
                                                </td>
                                                <td class="align-middle text-center ">
                                                  <p class="text-lg font-weight-bold mb-0"><?php echo $fila->pivot->FECHA_DEVOLUCION; ?></p>
                                                </td>
                                                <td>
                                                  <p class="text-lg font-weight-bold mb-0"><?php echo substr($articulos[$i],0,20).'...' ?></p>
                                                </td>
                                                <td class="align-middle text-center ">
                                                  <p class="text-lg font-weight-bold mb-0"><?php echo $tipos[$i] ?></p>
                                                </td>


                                                <td class="align-middle text-center">
                                                  <?php
                                                  echo "<form id='formulario{$fila['id']}' action='". url('/ejemplar/modificarForm')."' method='post'>
                                                    <input type='hidden' name='_token' value='". csrf_token()."'>
                                                    <input type='hidden' name='id' value='{$fila['id']}' />
                                                    <button ><i class='fa fa-pencil-square-o' aria-hidden='true'></i></button>
                                                  </form>";
                                                  ?>
                                                </td>
                                                <td class="align-middle text-center">
                                                   <a href="<?php echo url('/usuario/'.$usuario->id.'/ejemplar/'.$fila->id.'/borrar')?>">Eliminar Ejemplar </a>
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

                <x-footers.auth></x-footers.auth>
            </div>
        </main>
        <x-plugins></x-plugins>

</x-layout>
