<?php

class ControllerPrincipal{

    /*===================================
                Registers
    ===================================*/

    static public function ctrRegisters(){
        if (!empty($_POST["registerName"])) {
            if (
                preg_match('/^[a-zA-ZáéíóúÁÉÍÓÚ]/', $_POST["registerName"]) &&
                preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i', $_POST["registerEmail"]) &&
                preg_match('/^[_a-z0-9-]+$/', $_POST['registerPassword'])
            ) {
                # code...
                $table = "users";

                $encriptPass = crypt($_POST['registerPassword'], '$2a$07$usesomesillystringforsalt$');

                // $token = md5($_POST["registerName"]."+".$_POST["registerEmail"]);
                $token = uniqid();
                echo 
                '<pre>'
                ; print_r($token); echo 
                '</pre>'
                ;

                $dates = array(
                    // "token" => $token,
                    "name" => $_POST["registerName"],
                    "email" => $_POST["registerEmail"],
                    "phone_number" => $_POST["registerNumber"],
                    "password" => $encriptPass
                    
                );

                $response = ModelPrincipal::mdlRegisterUser($table, $dates);

                return $response;
            } else {
                $response = "Error";
                return $response;
            }
        }else{
            $response = "nameEmpty";
           return $response;
        }
    }

    /*===================================
                LISTAR USERS
    ===================================*/

    static public function ctrListUsers(){

        $table = "users";

        $response = ModelPrincipal::mdlListUsers($table, null, null);

        return $response;
    }

    /*===================================
                INGRESAR AL SISTEMA
    ===================================*/

    static public function ctrLoginUser(){

        if (isset($_POST["loginInputEmail"])) {

            $table = "users";
            $item = "email";
            $value = $_POST["loginInputEmail"];
            $id_user = $_POST["loginInputId"];

            $response = ModelPrincipal::mdlListUsers($table, $item, $value);

            $encriptPass = crypt($_POST["loginInputPassword"], '$2a$07$usesomesillystringforsalt$');

            if ($_POST["loginInputEmail"] == null && $_POST["loginInputPassword"] == null) {
                echo '<div class="alert alert-warning"> Write Password and user</div>';
            }else{

            if (is_array($response) && $response["email"] == $_POST["loginInputEmail"]) {

                if ($response["password"] == $encriptPass) {
                    
                    $_SESSION["validateUser"] = "ok";
                    
                    echo '<div class="alert alert-success">Ingreso Existoso</div>';
                    
                    echo '<script>
                    
                    if ( window.history.replaceState ) {
                        window.history.replaceState( null, null, window.location.href );
                    }

                    window.location = "index.php?page=home";
                    
                    </script>';
                    
                    $table1 = "sessions";
                    $logge_session = 1; // Indica sesión iniciada
                    $insertFailedTries = ModelPrincipal::mdlInsertLoggedFalied($table1, 0, $logge_session, $response["id_user"]);

                }else{
                    $table1 = "sessions";
                    $failed_tries = 1; // Incrementar el número de intentos fallidos
                    $updateFailedTries = ModelPrincipal::mdlInsertLoggedFalied($table1, $failed_tries, 0, $response["id_user"]);
                    
                    // echo 
                    // '<pre>'
                    // ; print_r($updateFailedTries); echo 
                    // '</pre>'
                    // ;

                    echo '<script>

                    if ( window.history.replaceState ) {
                        window.history.replaceState( null, null, window.location.href );
                    }
                    
                    </script>';

                    echo '<div class="alert alert-danger">Contraseña Incorrecta</div>';
                }
                 
            }else{
                echo '<script>

                    if ( window.history.replaceState ) {
                        window.history.replaceState( null, null, window.location.href );
                    }
                    
                    </script>';

                    echo '<div class="alert alert-danger">Usuario no Existe</div>';
            }

             }
        }
        
    }

}