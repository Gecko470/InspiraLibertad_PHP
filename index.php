<?php
session_start();
require_once("php/conexion.php");
$contenido = "php/home.php";

if (isset($_GET["op"])) {
   $op = $_GET["op"];

   match ($op) {

      "queEs" => $contenido = "php/queEs.php",
      "depAdic" => $contenido = "php/depAdic.php",
      "cursos" => $contenido = "php/cursos.php",
      "atPers" => $contenido = "php/atPersonalizada.php",
      "retiros" => $contenido = "php/retiros.php",
      "sobreMi" => $contenido = "php/sobreMi.php",
      "contacto" => $contenido = "php/contacto.php",
      "aPersonal" => $contenido = "php/aPersonal.php",
      "login" => $contenido = "php/login.php",
      "registro" => $contenido = "php/registro.php",
      "home" => $contenido = "php/home.php",
      "token" => $contenido = "php/token.php",
      "password" => $contenido = "php/password.php",
      "nuevoPass" => $contenido = "php/nuevoPass.php",
      default => $contenido = "php/home.php"
   };

   if ($op == "home" || $op == "contacto"  || $op == "aPersonal" || $op == "login" || $op == "registro" || $op == "token" || $op == "password" || $op == "nuevoPass") { ?>

      <style>
         #divMain {
            background: url("img/fondo.png") no-repeat;
            background-size: 120vw;
            background-position: bottom right;
            min-height: 96vh;
         }
      </style>

<?php }
}
else if ($contenido == "php/home.php") { ?>
  <style>
     #divMain {
        background: url("img/fondo.png") no-repeat;
        background-size: 120vw;
        background-position: bottom right;
        min-height: 96vh;
     }
  </style>
<?php }
?>

<!DOCTYPE html>
<html lang="es">

<head>
   <meta charset="UTF-8" />
   <meta name="viewport" content="width=device-width, initial-scale=0.5">
   <meta http-equiv="X-UA-Compatible" content="ie=edge" />
   <title>Inspira Libertad</title>
   <meta name="description" content="Aqui encontraras solución a tus problemas..">
   <!-- CSS only -->
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
   <link rel="stylesheet" href="css/estilos.css">
</head>

<body>
   <div id="divMain" class="container-fluid">
      <header>
         <div class="nav justify-content-end align-items-center m-4">
            <?php if (isset($_SESSION["nomUsuario"])) { ?>
               <div class="col-auto"><?php echo "<span class='badge bg-success fs-6'>{$_SESSION['nomUsuario']}</span>"; ?></div>
               <input type="hidden" id="inpInicio" value="1">
            <?php } else { ?>
               <div class="col-auto">
                  <a class="btn text-success" href="?op=login">Iniciar Sesión</a>
                  <input type="hidden" id="inpInicio" value="0">
               </div>
            <?php } ?>

            <div class="col-auto">
               <a class="btn text-success" href="?op=registro">Registro</a>
            </div>

            <div class="col-auto">
               <button type="button" class="btn btn-success position-relative" data-bs-toggle="modal" data-bs-target="#carritoModal">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
                     <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                  </svg>
                  <span id="spanCant" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                     0
                  </span>
               </button>
            </div>
         </div>

         <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
               <a class="navbar-brand text-success" href="index.php?op=home">
                  <h4>Inspira Libertad</h4>
               </a>
               <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse" id="navbar">
                  <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                     <li class="nav-item">
                        <a class="nav-link text-dark" href="index.php?op=queEs">Qué es?</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link text-dark" href="index.php?op=depAdic">Dependencias y Adicciones</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link text-dark" href="index.php?op=cursos">Cursos</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link text-dark" href="index.php?op=atPers">Atención Personalizada</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link text-dark" href="index.php?op=retiros">Retiros</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link text-dark" href="index.php?op=sobreMi">Sobre Mí</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link text-dark" href="index.php?op=contacto">Contacto</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link text-dark" href="index.php?op=aPersonal">Área Personal</a>
                     </li>
                  </ul>
               </div>
            </div>
         </nav>
      </header>

      <?php

      if (isset($_SESSION["idUsuario"])) {
         $idUsuario = $_SESSION["idUsuario"];
      }

      $arrayCursos = [];
      $arrayNoCursos = [];
      $respuesta3;

      function comprobaciones($idCurso)
      {

         global $pdo, $arrayCursos, $arrayNoCursos, $idUsuario, $respuesta, $respuesta2, $nomCurso;
         $pst = $pdo->prepare("SELECT ID FROM compras WHERE USUARIOID = ? AND PRODUCTOID = ?");

         $pst->bindParam(1, $idUsuario, PDO::PARAM_STR);
         $pst->bindParam(2, $idCurso, PDO::PARAM_STR);
         $pst->execute();
         $result = $pst->rowCount();

         if ($result > 0) {

            $pst = $pdo->prepare("SELECT NOMBRE FROM productos WHERE ID = ?");

            $pst->bindParam(1, $idCurso, PDO::PARAM_STR);
            $pst->execute();
            $nombreCurso = $pst->fetch();
            array_push($arrayNoCursos, $nombreCurso["NOMBRE"]);
            $respuesta = "0";
         } else {
            array_push($arrayCursos, $idCurso);
         }
      }

      if (isset($_GET["inpCursos0"]) || isset($_GET["inpCursos1"]) || isset($_GET["inpCursos2"])) {

         $inpCursos0 = $_GET["inpCursos0"];
         comprobaciones($inpCursos0);

         if (isset($_GET["inpCursos1"])) {
            $inpCursos1 = $_GET["inpCursos1"];
            comprobaciones($inpCursos1);
         }

         if (isset($_GET["inpCursos2"])) {
            $inpCursos2 = $_GET["inpCursos2"];
            comprobaciones($inpCursos2);
         }

         if (count($arrayCursos) > 0) {
            foreach ($arrayCursos as $value) {
               $pst = $pdo->prepare("INSERT INTO compras(PRODUCTOID, USUARIOID) VALUES(?, ?)");

               $pst->bindParam(1, $value, PDO::PARAM_STR);
               $pst->bindParam(2, $idUsuario, PDO::PARAM_STR);

               $pst->execute();
               unset($pdo);
            }
            $respuesta2 = "1";
         }
      }
      ?>
      <div class="container">
         <main role="main">
            <?php include($contenido); ?>
         </main>
      </div>


      <form id="frmCompra" action="index.php?op=home" method="get"></form>

      <!-- Modal -->
      <div class="modal fade" id="carritoModal" tabindex="-1" aria-labelledby="carritoModalLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title text-success" id="carritoModalLabel">Carrito Inspira Libertad</h5>
               </div>
               <div class="modal-body">
                  Tu carrito está vacío.
               </div>
               <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                  <button type="button" class="btn btn-success" onclick="comprar()">Comprar</button>
               </div>
            </div>
         </div>
      </div>


      <!-- Button trigger modal -->
      <button type="button" id="btnCompra" class="btn btn-primary d-none" data-bs-toggle="modal" data-bs-target="#compraModal">
         Launch demo modal
      </button>

      <!-- Modal -->
      <div class="modal fade" id="compraModal" tabindex="-1" aria-labelledby="compraModalLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title text-success" id="compraModalLabel">Inspira Libertad</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
               </div>
               <div class="ms-3">
                  <span id="spnCompra"></span>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <!-- JavaScript Bundle with Popper -->
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
      <script async src="js/inspira.js"></script>
   </div>
</body>

</html>
