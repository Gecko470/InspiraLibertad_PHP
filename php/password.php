<?php
require_once("php/conexion.php");
require_once("php/validaciones.php");

$res = 0;

if (isset($_POST["email"]) && isset($_POST["telefono"]) && isset($_POST["usuario"])) {

    $usuario = $_POST["usuario"];
    $email = $_POST["email"];
    $telefono = $_POST["telefono"];

    if (validarE($email)) {

        if (validarT($telefono)) {

            $pst = $pdo->prepare("SELECT USUARIO FROM usuarios WHERE USUARIO = ? AND EMAIL = ? AND TELEFONO = ?");
            $pst->bindParam(1, $usuario, PDO::PARAM_STR);
            $pst->bindParam(2, $email, PDO::PARAM_STR);
            $pst->bindParam(3, $telefono, PDO::PARAM_STR);
            $pst->execute();
            $resultado = $pst->rowCount();

            if ($resultado > 0) { ?>

                <script>
                    window.location = "index.php?op=nuevoPass&user=<?php echo $usuario; ?>";
                </script>


<?php } else {

                $res = 3;
            }
        } else {

            $res = 2;
        }
    } else {

        $res = 1;
    }
}
?>

<div class="p-4">
    <h4 class="text-success">Recupera tu Password</h4>
    <hr>
    <div class="row" id="divAlertaP"></div>
    <?php
    global $res;
    if ($res == 1) { ?>
        <div class="row">
            <div class='alert alert-danger alert-dismissible'>
                <strong>Revisa tu Email, no es válido..</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
        </div>
    <?php } elseif ($res == 2) { ?>
        <div class="row">
            <div class='alert alert-danger alert-dismissible'>
                <strong>Revisa tu Teléfono, no es válido..</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
        </div>
    <?php } elseif ($res == 3) { ?>
        <div class="row">
            <div class='alert alert-danger alert-dismissible'>
                <strong>Revisa tus credenciales. Usuario no encontrado en nuestra base de datos con esos datos de acceso..</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
            </div>
        </div>
    <?php } ?>

    <div class="col-10 col-md-5 pt-4">
        <form method="post" id="frmP">
            <div class="mb-3">
                <label for="usuario" class="control-label">Usuario</label>
                <input name="usuario" class="form-control" id="usuario" />

            </div>

            <div class="mb-3">
                <label for="email" class="control-label">Email</label>
                <input name="email" class="form-control" id="email" />

            </div>
            <div class="mb-3">
                <label for="telefono" class="control-label">Teléfono</label>
                <input name="telefono" class="form-control" id="telefono" />

            </div>
        </form>

        <div class="d-flex justify-content-end">
            <input type="button" value="Enviar" onclick="validarP()" class="btn btn-success" />
        </div>

    </div>
</div>