<div class="container container-card">
    <div class="row">
        <div class="column-left col-md-6 text-center">
            <h1>Bienvenidos</h1>
            <p>Porfavor ingresa y obten nuestros beneficios.</p>

            <i class="fa-solid fa-users"></i>

        </div>
        <div class="column-right col-md-6 bg-gray-primary d-flex flex-column justify-content-center">
            <form method="POST">
                <input type="hidden" value="<?php echo $response["id_user"] ?>" name="loginInputId">
                <div class="mb-3">
                    <label for="loginInputEmail" class="form-label">Correo Electronico</label>
                    <input type="email" class="form-control" id="loginInputEmail" name="loginInputEmail">
                </div>
                <div class="mb-3">
                    <label for="loginInputPassword" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" id="loginInputPassword" name="loginInputPassword">
                </div>

                <?php

                $login = new ControllerPrincipal();
                $login->ctrLoginUser();
                ?>
                <div class="content-buttons d-flex justify-content-center">
                    <button type="submit" class="btn btn-dark mx-3">Ingresar</button>
                    <a href="register" class="btn btn-dark">Crear Cuenta</a>
                </div>
            </form>
        </div>
    </div>
</div>