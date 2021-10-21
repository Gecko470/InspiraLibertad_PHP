<?php
require_once("php/conexion.php");
require_once("php/validaciones.php");
require_once("php/correo.php");

$res = 0;

if (isset($_POST["nombre"]) && isset($_POST["email"]) && isset($_POST["mensaje"])) {

    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $mensaje = $_POST["mensaje"];

    if (validarE($email)) {

        $pst = $pdo->prepare("insert into Mensajes(NOMBRE, EMAIL, MENSAJE) values(?, ?, ?)");

        $pst->bindParam(1, $nombre, PDO::PARAM_STR);
        $pst->bindParam(2, $email, PDO::PARAM_STR);
        $pst->bindParam(3, $mensaje, PDO::PARAM_STR);

        $resultado = $pst->execute();

        unset($pdo);

        if ($resultado) {

            $res = 1;
            $msj = "<p>Nombre cliente: {$nombre}</p><p>Email cliente: {$email}</p><p>Mensaje: {$mensaje}</p>";
            $mail->Subject = 'Mensaje cliente Inspira Libertad';
            $mail->msgHTML($msj);
            $mail->addAddress("codeworks9@gmail.com", "María Gómez");
            header("Location: index.php?op=home");
            $mail->send();
        } else {

            $res = 2;
        }
    } else {

        $res = 3;
    }
}
?>

<div class="p-4">
    <h4 class="text-success">Contacto</h4>
    <hr>
    <div id="divAlertaC"></div>
    <?php
    global $res;
    if ($res == 1) { ?>

        <div class='alert alert-info alert-dismissible'>
            <strong>Mensaje enviado correctamente.</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>

    <?php } elseif ($res == 2) { ?>

        <div class='alert alert-danger alert-dismissible'>
            <strong>Ha habido algún problema, no se ha podido enviar tu mensaje.</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>

    <?php } elseif ($res == 3) { ?>

        <div class='alert alert-danger alert-dismissible'>
            <strong>Revisa tu Email, no es correcto</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>

    <?php }
    ?>
    <div class="col-10 col-md-5 pt-4">
        <form method="post" action="" id="frmC">
            <div class="mb-3">
                <label for="nombre" class="control-label">Nombre</label>
                <input name="nombre" class="form-control" id="txtNombre" />
            </div>
            <div class="mb-3">
                <label for="email" class="control-label">Email</label>
                <input name="email" class="form-control" id="txtEmail" />
            </div>
            <div class="mb-3">
                <label for="mensaje" class="control-label">Mensaje</label>
                <textarea name="mensaje" class="form-control" id="txaMensaje"></textarea>
            </div>
        </form>
        <div class="d-flex justify-content-end">
            <button class="btn btn-success" onclick="validarC()">Enviar</button>
        </div>
    </div>
</div>