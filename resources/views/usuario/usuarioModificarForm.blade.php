<x-layout bodyClass="g-sidenav-show  bg-gray-200">
        <x-navbars.sidebar activePage="tables-usuario"></x-navbars.sidebar>
        <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
            <!-- Navbar -->
            <x-navbars.navs.auth titlePage="Modificar Usuario"></x-navbars.navs.auth>
            <!-- End Navbar -->
            <div class="container-fluid ">

              <div class="contenedor-01 py-4">
                  <div class="contenedor-form">
                      <form action="<?php echo url('/usuario/modificar'); ?>" method="POST">
                          <input type="hidden" name="_token" value="<?php echo  csrf_token(); ?>">
                          <input type="number" name="id" value="<?php echo $usuario->id; ?>" hidden>

                            <div class="form-group my-4">
                                <label for="nombre" class="text-dark font-weight-bold h6">Nombre</label>
                                <input type="text" class="form-control" name="nombre" value="<?php echo $usuario->NOMBRE ?>">
                            </div>
                            <div class="form-group my-4">
                                <label for="apellidos" class="text-dark font-weight-bold h6">Apellido</label>
                                <input type="text" class="form-control" name="apellidos" value="<?php echo $usuario->APELLIDO ?>">
                            </div>
                            <div class="form-group my-4">
                                <label for="DNI" class="text-dark font-weight-bold h6">DNI</label>
                                <input type="text" class="form-control" name="DNI" value="<?php echo $usuario->DNI ?>">
                            </div>
                            <div class="form-group my-4">
                                <label for="telefono" class="text-dark font-weight-bold h6">Telefono</label>
                                <input type="text" class="form-control" name="telefono" value="<?php echo $usuario->TELEFONO ?>">
                            </div>
                            <div class="form-group my-4">
                                <label for="localidad" class="text-dark font-weight-bold h6">Provincia</label><br />
                                <select name="localidad" id="localidad" style="width:100%;">
                                    <?php
                                       $i=0;
                                        foreach ($localidades as $localidad) {
                                            echo "<option value='{$localidad->id}'";
                                            if($selecionadas[$i]==true){
                                                echo " selected ";
                                            }
                                            echo ">{$localidad->NOMBRE}-{$localidad->provincia->NOMBRE}-{$localidad->provincia->pais->NOMBRE}</option>";
                                            $i++;
                                        }
                                    ?>
                                </select>
                            </div>
                          <button type="submit" class="btn btn-primary my-4">Modificar</button>
                      </form>
                  </div>
                </div>
              </div>
                <x-footers.auth></x-footers.auth>
            </div>
        </main>
        <x-plugins></x-plugins>

</x-layout>
