<?php

if(isset($_SESSION["validateUser"])){

    if ($_SESSION["validateUser"] != "ok") {
        
        echo '<script>window.location = "login";</script>';

        return;
    }
}else{

    echo '<script>window.location = "login";</script>';

    return;

}

$listUsers = ControllerPrincipal::ctrListUsers();

?>

<div class="container container-table">
    <div class="row">
        <h1 class="mb-3 text-center">Registro de Usuarios</h1>
        <table class="table table-success table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Numero Telefonico</th>
                    <th>Fecha</th>
                    <th>Ingresos</th>
                    <th>Fallidos</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($listUsers as $key => $value) { ?>
                    <tr>
                        <th><?php echo ($key + 1) ?></th>
                        <td><?php echo $value["name"] ?></td>
                        <td><?php echo $value["email"] ?></td>
                        <td><?php echo $value["phone_number"] ?></td>
                        <td><?php echo $value["date_update"] ?></td>
                        <td><?php echo $value["total_logged_sessions"] ?></td>
                        <td><?php echo $value["total_failed_tries"] ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>