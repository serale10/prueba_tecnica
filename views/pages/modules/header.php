<header>

    <nav class="navbar-light bg-gray-primary">
        <div class="container py-3 d-flex justify-content-between">
            <a class="navbar-brand" href="#">
                <i class="fa-solid fa-user"></i>
                VACACIONES S.A.
            </a>

            <div class="content-buttons-menu col-md-3 justify-content-center alig-items-center d-lg-flex">
                <?php if ($_GET["page"] == "home") : ?>
                    <a class="mx-3 btn btn-dark" href="log-out">Salir</a>
                <?php else : ?>
                    <a class="mx-3 btn btn-dark" href="login">Ingresar</a>
                    <a class="mx-3 btn btn-dark" href="register">Registrarse</a>
                <?php endif ?>
            </div>
            <a class="btn-mobile-menu mx-3 btn btn-dark d-lg-none" href="javascript:void(0);" class="icon" onclick="mobileMenu()">
                <i class="fa fa-bars"></i>
            </a>
        </div>
    </nav>

    <!-- Top Navigation Menu -->
    <div class="topnav">
        <div id="myLinks">
            <?php if ($_GET["page"] == "home") : ?>
                <a class="mx-3 btn btn-dark" href="log-out">Salir</a>
            <?php else : ?>
                <a class="mx-3 btn btn-dark" href="login">Ingresar</a>
                <a class="mx-3 btn btn-dark" href="register">Registrarse</a>
            <?php endif ?>
        </div>

    </div>

</header>