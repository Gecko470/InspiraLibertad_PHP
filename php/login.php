<?php
require_once("php/conexion.php");
$res = 0;

if (isset($_POST["nombreUsuario"]) && isset($_POST["pass"])) {

    $nombreUsuario = $_POST["nombreUsuario"];
    $pass = $_POST["pass"];


    $pst = $pdo->prepare("SELECT ID, USUARIO, PASS, TOKEN FROM usuarios WHERE USUARIO = ?");
    $pst->bindParam(1, $nombreUsuario, PDO::PARAM_STR);
    $pst->execute();
    $resultado = $pst->fetch();

    unset($pdo);

    if ($resultado["TOKEN"] != null) {
        $res = 3;
    } else {
        if ($resultado != null && password_verify($pass, $resultado["PASS"])) {

            $res = 1;

            $_SESSION["idUsuario"] = $resultado["ID"];
            $_SESSION["nomUsuario"] = $resultado["USUARIO"];
?>
            <script>
                window.location = "index.php?op=home&respuesta3=3";
            </script>
<?php

        } else {

            $res = 2;
        }
    }
}
?>

    <div class="p-4">
        <h4 class="text-success">Login</h4>
        <hr>
        <div id="divAlertaL"></div>

        <?php
        global $res;

      if ($res == 2) { ?>

            <div class='alert alert-danger alert-dismissible'>
                <strong>No se ha iniciado sesión, revisa tus credenciales..</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>

        <?php } elseif ($res == 3) { ?>

            <div class='alert alert-danger alert-dismissible'>
                <strong>Para iniciar sesión debes activar tu cuenta..</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>

        <?php } ?>

        <div class="col-10 col-md-5 pt-4">

            <form method="post" id="frmL">

                <div class="mb-3">
                    <label for="nombreUsuario" class="control-label">Nombre Usuario</label>
                    <input name="nombreUsuario" class="form-control" id="nombreUsuario" />

                </div>
                <div class="mb-3">
                    <label for="pass" class="control-label">Password</label>
                    <input name="pass" class="form-control" id="pass" />

                </div>
            </form>

            <div class="d-flex justify-content-end">
                <input type="button" value="Login" class="btn btn-success" onclick="validarL()" />
            </div>

            <div class="d-flex justify-content-center">
                <a href="index.php?op=password" class="link-success text-decoration-none">Has olvidado tu Password?</a>
            </div>

        </div>
    </div>
