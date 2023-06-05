<?php 
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login S.A.</title>
        <link rel="stylesheet" href="views/assets/css/fontawesome.css">
        <link rel="stylesheet" href="views/assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="views/assets/css/style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Geologica:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
        
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    </head>
<body>

<div class="wrapper">
    <?php include "views/pages/modules/header.php" ?>
    <main>
        <?php
            if(isset($_GET["page"])){
                if ($_GET["page"] == "register" || 
                    $_GET["page"] == "login" ||
                    $_GET["page"] == "home" ||
                    $_GET["page"] == "log-out" 
                ){
                    include "views/pages/".$_GET["page"].".php";
                }else{
                include "views/pages/page404.php";
                }
            }else{
                include "views/pages/login.php";
            }    
        ?>
    
    </main>
    <?php include "views/pages/modules/footer.php"; ?>
</div>
    <script src="views/assets/js/bootstrap.min.js"></script>
    <script src="views/assets/js/main.js"></script>
</body>
</html>