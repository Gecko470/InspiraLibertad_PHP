<style>
    main {
        background: url("../img/fondo.png") no-repeat;
        background-size: 120vw;
        background-position: bottom right;
    }
</style>

<?php
if (isset($_GET["respuesta3"])) {
    $respuesta3 = $_GET["respuesta3"];
}

if (isset($respuesta) && $respuesta == "0") { ?>

    <?php foreach ($GLOBALS["arrayNoCursos"] as $item) { ?>
        <div class="row">
            <div class='alert alert-warning alert-dismissible col m-3'>
                <strong>El curso <?php echo $item; ?> ya lo habías comprado con anterioridad y no se ha gestionado su compra..</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
        </div>
    <?php } ?>

<?php unset($respuesta);
}
if (isset($respuesta2) && $respuesta2 == "1") { ?>
    <div class="row">
        <div class='alert alert-info alert-dismissible col m-3'>
            <strong>Compra realizada correctamente. Tus cursos están disponibles en tu Área Personal..</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>
    </div>
<?php
    unset($respuesta2);
}
if (isset($respuesta3) && $respuesta3 == 1) { ?>
    <div class="row">
        <div class='alert alert-info alert-dismissible'>
            <strong>El registro se ha realizado correctamente, hemos enviado un email a tu cuenta de correo electrónico con un enlace para que puedas activar tu cuenta en Inspira Libertad..</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>
    </div>
<?php } elseif (isset($respuesta3) && $respuesta3 == 2) { ?>

    <div class="row">
        <div class='alert alert-danger alert-dismissible'>
            <strong>Ha habido algún problema, no se ha podido realizar el registro..</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>
    </div>
<?php } elseif (isset($respuesta3) && $respuesta3 == 3) { ?>

    <div class="row">
        <div class='alert alert-info alert-dismissible'>
            <strong>Sesión iniciada correctamente..</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>
    </div>
<?php } ?>