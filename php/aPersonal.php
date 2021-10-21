<?php
require_once("php/conexion.php");

if (isset($_SESSION["idUsuario"])) {

  $idUsuario = $_SESSION["idUsuario"];

  $pst = $pdo->query("SELECT NOMBRE, VIDEO FROM productos INNER JOIN compras ON productos.ID = compras.PRODUCTOID WHERE compras.USUARIOID ='{$idUsuario}';");
  $pst->execute();
  $resultados = $pst->fetchAll();

  unset($pdo);
}
?>
<?php
if (isset($_SESSION["idUsuario"])) {
  if (count($resultados) == 0) { ?>
    <div class="p-4">
      <h4 class="text-success">Área Personal</h4>
      <hr>
      <div class="row">
        <div class='alert alert-warning alert-dismissible'>
          <strong>Tus cursos estarán disponibles aquí. No has adquirido ningún curso todavía..</strong>
          <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
        </div>
      </div>
    </div>
  <?php  } else { ?>

    <div class="p-4 mt-2">
      <h4 class="text-success">Área Personal</h4>
      <hr>
      <div class="col-5">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Curso</th>
              <th>Vídeo</th>
            </tr>
          </thead>
          <tbody>
            <?php
            foreach ($resultados as $row) { ?>
              <tr>
                <td><?php echo $row["NOMBRE"]; ?></td>
                <td><video controls="controls" style="width: 150px; height: 100px;">
                    <source src="<?php echo $row['VIDEO']; ?>" type="video/mp4" />
                  </video>
                </td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
    </div>

  <?php }
} else { ?>

  <div class="p-4">
    <h4 class="text-success">Área Personal</h4>
    <hr>
    <div class="row">
      <div class='alert alert-info alert-dismissible'>
        <strong>Debes iniciar sesión para ver aquí tus cursos..</strong>
        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
      </div>
    </div>
  </div>

<?php } ?>