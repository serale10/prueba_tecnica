<?php

require_once 'controller/template-controller.php';
require_once 'controller/principal-controller.php'; // Aqui mandamos a llamar el controlador para el index
require_once 'model/principal-model.php';

$home = new ControllerTemplate();
$home->ctrGetTemplate();