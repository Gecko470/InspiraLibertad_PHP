<?php
require_once("conexion.php");

$respToken = "0";
if (isset($_GET["token"]) && isset($_GET["email"])) {

    $email = $_GET["email"];
    $token = $_GET["token"];

    $pst = $pdo->prepare("SELECT USUARIO FROM usuarios WHERE EMAIL = ? AND TOKEN = ?;");
    $pst->bindParam(1, $email, PDO::PARAM_STR);
    $pst->bindParam(2, $token, PDO::PARAM_STR);
    $pst->execute();
    $resultado = $pst->rowCount();

    if ($resultado > 0) {
        $pst = $pdo->prepare("UPDATE usuarios SET TOKEN = NULL WHERE EMAIL = ?;");
        $pst->bindParam(1, $email, PDO::PARAM_STR);
        $resultado = $pst->execute();
        $respToken = "1";
        unset($pdo);
    }
}
?>


    <div class="fondo">
        <div>
            <h4 class="text-success">Activa tu cuenta</h4>
            <hr>
            <?php
            if ($respToken == "0") { ?>
                <div class="spinner-border text-success" role="status"></div>
                <span class="text-success fs-5">Activando tu cuenta...</span>
            <?php } else { ?>
                <div class='alert alert-info alert-dismissible'>
                    <strong>Cuenta activada correctamente, ya puedes iniciar sesión..</strong>
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                </div>
            <?php } ?>
        </div>
    </div>
