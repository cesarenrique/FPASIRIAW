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
                                    <h6 class="text-white text-capitalize ps-3">Autor table</h6>
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
                                                    Nombre</th>
                                                <th
                                                    class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                                    Pais</th>
                                                <th
                                                    class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Modificar</th>
                                                ç<th
                                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                                    Eliminar</th>
                                                <th class="text-secondary opacity-7"></th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                          <?php foreach ($todos as $fila) {  ?>
                                            <tr>

                                                <td class="align-middle">
                                                <p class="text-lg font-weight-bold "><?php echo $fila['id'] ?></p>

                                                </td>
                                                <td>
                                                  <p class="text-lg font-weight-bold mb-0"><?php echo $fila['NOMBRE'] ?></p>
                                                </td>
                                                <td>
                                                  <p class="text-lg font-weight-bold mb-0"><?php echo $fila->pais->NOMBRE ?></p>
                                                </td>
                                                <td class="align-middle text-center">
                                                  <?php
                                                  echo "<form id='formulario{$fila['id']}' action='". url('/provincia/modificarForm')."' method='post'>
                                                    <input type='hidden' name='_token' value='". csrf_token()."'>
                                                    <input type='hidden' name='id' value='{$fila['id']}' />
                                                    <button ><i class='fa fa-pencil-square-o' aria-hidden='true'></i></button>
                                                  </form>";
                                                  ?>
                                                </td>
                                                <td class="align-middle text-center">
                                                  <?php
                                                    echo "<span onclick='eliminar({$fila['id']})' ><i class='fa fa-trash-o' aria-hidden='true'></i></span>";
                                                   ?>
                                                </td>
                                            </tr>
                                          <?php }?>

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
                			window.location = "<?php echo url('/provincia/borrar')?>/"+id;
                		}
                  }
                </script>

                <x-footers.auth></x-footers.auth>
            </div>
        </main>
        <x-plugins></x-plugins>

</x-layout>
