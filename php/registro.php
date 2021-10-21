<?php
require_once("php/conexion.php");
require_once("php/validaciones.php");
require_once("php/correo.php");

$res = 0;

if (isset($_POST["nombre"]) && isset($_POST["email"]) && isset($_POST["telefono"]) && isset($_POST["usuario"])) {

    $usuario = $_POST["usuario"];
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $telefono = $_POST["telefono"];
    $password = $_POST["password"];
    $token = "";

    $pst = $pdo->prepare("SELECT USUARIO FROM usuarios WHERE USUARIO = ?");
    $pst->bindParam(1, $usuario, PDO::PARAM_STR);
    $pst->execute();
    $resultado = $pst->rowCount();

    if ($resultado > 0) {

        $res = 5;
    } else {

        $pst = $pdo->prepare("SELECT EMAIL FROM usuarios WHERE EMAIL = ?");
        $pst->bindParam(1, $email, PDO::PARAM_STR);
        $pst->execute();
        $resultado = $pst->rowCount();

        if ($resultado > 0) {

            $res = 6;
        } else {

            if (validarE($email)) {

                if (validarT($telefono)) {

                    for ($i = 0; $i < 20; $i++) {
                        $token .= rand(0, 9);
                    }

                    $password = password_hash($password, PASSWORD_DEFAULT);

                    $pst = $pdo->prepare("INSERT INTO usuarios(NOMBRE, EMAIL, TELEFONO, USUARIO, PASS, TOKEN) VALUES(?, ?, ?, ?, ?, ?)");

                    $pst->bindParam(1, $nombre, PDO::PARAM_STR);
                    $pst->bindParam(2, $email, PDO::PARAM_STR);
                    $pst->bindParam(3, $telefono, PDO::PARAM_STR);
                    $pst->bindParam(4, $usuario, PDO::PARAM_STR);
                    $pst->bindParam(5, $password, PDO::PARAM_STR);
                    $pst->bindParam(6, $token, PDO::PARAM_STR);

                    $resultado = $pst->execute();

                    unset($pdo);

                    if ($resultado) {

                        $mensaje = "Activa tu cuenta de Inspira Libertad haciendo click <a href='http://localhost/InspiraLibertad/index.php?op=token&token={$token}&email={$email}'>Aquí</a>";
                        $mail->Subject = 'Activa tu cuenta en Inspira Libertad';
                        $mail->msgHTML($mensaje);
                        $mail->addAddress($email, $nombre);

?>
                        <script>
                            window.location = "index.php?op=home&respuesta3=1";
                        </script>
                    <?php
                        $mail->send();
                    } else {  ?>
                        <script>
                            window.location = "index.php?op=home&respuesta3=2";
                        </script>
<?php }
                } else {

                    $res = 4;
                }
            } else {

                $res = 3;
            }
        }
    }
}
?>


<div class="p-4">
    <h4 class="text-success">Registro</h4>
    <hr>
    <div id="divAlertaR"></div>
    <?php
    global $res;
    if ($res == 3) { ?>

        <div class='alert alert-danger alert-dismissible'>
            <strong>Revisa tu Email, no es válido..</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>

    <?php } elseif ($res == 4) { ?>

        <div class='alert alert-danger alert-dismissible'>
            <strong>Revisa tu Teléfono, no es válido..</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>

    <?php } elseif ($res == 5) { ?>

        <div class='alert alert-danger alert-dismissible'>
            <strong>Ese nombre de Usuario ya existe en nuestra Base de Datos, debes elegir otro..</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>

    <?php } elseif ($res == 6) { ?>

        <div class='alert alert-danger alert-dismissible'>
            <strong>Ese Email ya está registrado en nuestra Base de Datos, inicia sesión..</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>

    <?php } ?>

    <div class="col-10 col-md-5 pt-4">
        <form method="post" id="frmR">

            <div class="mb-3">
                <label for="usuario" class="control-label">Usuario</label>
                <input name="usuario" class="form-control" id="usuario" />

            </div>
            <div class="mb-3">
                <label for="nombre" class="control-label">Nombre</label>
                <input name="nombre" class="form-control" id="nombre" />

            </div>
            <div class="mb-3">
                <label for="email" class="control-label">Email</label>
                <input name="email" class="form-control" id="email" />

            </div>
            <div class="mb-3">
                <label for="telefono" class="control-label">Teléfono</label>
                <input name="telefono" class="form-control" id="telefono" />

            </div>
            <div class="mb-3">
                <label for="password" class="control-label">Password</label>
                <input type="password" name="password" class="form-control" id="password" />

            </div>
        </form>

        <div class="d-flex justify-content-end">
            <input type="button" value="Registrar" onclick="validarR()" class="btn btn-success" />
        </div>

    </div>
</div>