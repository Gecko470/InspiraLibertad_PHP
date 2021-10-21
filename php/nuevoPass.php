<?php
require_once("php/conexion.php");

$res = 0;

if (isset($_POST["passwordNP"]) && isset($_GET["user"])) {

    $passwordNP = $_POST["passwordNP"];
    $user = $_GET["user"];

    $passwordNP = password_hash($passwordNP, PASSWORD_DEFAULT);

    $pst = $pdo->prepare("UPDATE usuarios SET PASS = ? WHERE USUARIO = ?");
    $pst->bindParam(1, $passwordNP, PDO::PARAM_STR);
    $pst->bindParam(2, $user, PDO::PARAM_STR);

    $pst->execute();
    $res = 1;
}
?>

<div class="p-4">
    <h4 class="text-success">Nuevo Password</h4>
    <hr>
    <div class="row" id="divAlertaNP"></div>
    <?php if ($res == 1) { ?>

        <div class='alert alert-info alert-dismissible'>
            <strong>Ya puedes iniciar sesión con tu nuevo password..</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>

    <?php } ?>
    <div class="col-10 col-md-5 pt-4">
        <form method="post" id="frmNP">
            <div class="mb-3">
                <label for="passwordNP" class="control-label">Password</label>
                <input type="password" name="passwordNP" class="form-control" id="passwordNP" />

            </div>
            <div class="mb-3">
                <label for="repitePasswordNP" class="control-label">Repite Password</label>
                <input type="password" name="repitePasswordNP" class="form-control" id="repitePasswordNP" />

            </div>
        </form>
        <div class="d-flex justify-content-end">
            <input type="button" value="Confirmar" onclick="validarNP()" class="btn btn-success" />
        </div>

    </div>
</div>