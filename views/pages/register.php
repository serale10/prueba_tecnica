<div class="container col-md-6 text-center">
    <div class="row d-flex justify-content-center">
        <div class="card-register col-12 py-5 px-3 bg-gray-primary">
            <h1>Registro</h1>

            <form class="mx-3" method="post">
                <div class="mb-3">
                    <label for="inputName" class="form-label">Nombre</label>
                    <input type="text" class="form-control mt-2" id="registerInputName" name="registerName">
                </div>

                <div class="mb-3">
                    <label for="inputNumber" class="form-label">Numero Telefonico</label>
                    <input type="text" class="form-control" id="registerInputNumber" name="registerNumber">
                </div>
                <div class="mb-3">
                    <label for="inputEmail1" class="form-label">Correo Electronico</label>
                    <input type="email" class="form-control" id="RegisterInputEmail" name="registerEmail">
                </div>
                <div class="mb-3">
                    <label for="inputPassword1" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" name="registerPassword" id="RegisterInputPassword">
                </div>
                <div class="">

                    <?php
                    
                     $registerUser = ControllerPrincipal::ctrRegisters();

                     if($registerUser == "ok"){

                        echo '<script>
            
                        if ( window.history.replaceState ) {
                            window.history.replaceState( null, null, window.location.href );
                        }
                        
                        </script>';
                        
                        echo '<div class="alert alert-success">Usuario Registrado Correctamente</div>';
                    }
            
                    
                    ?>
                    <button type="submit" class="btn btn-dark mx-3">Registrarse</button>
                    <!-- <a href="register" class="btn btn-dark">Create Account</a> -->
                </div>
            </form>
        </div>
    </div>
</div>
