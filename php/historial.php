<?php

    session_start();

    require_once('connect.php');
    $connect = $conexion->getConn();

    try { // HAGO LA CONSULTA CON INNER JOIN
    
        $sql = "SELECT usuario.email, usuario.puesto, repuesto.nombre, repuesto.descripcion,usuario_repuesto.fecha_asignacion FROM usuario_repuesto INNER JOIN usuario ON usuario.id = usuario_repuesto.id_usuario INNER JOIN repuesto ON repuesto.id = usuario_repuesto.id_repuesto";
        $resultado = $connect->query($sql);

    } catch (Exception $e) {
        $error = $e->getMessage();
    }

    $dato = array(); // GUARDO LOS RESULTADOS EN UN ARRAY BIDIMENSIONAL
    while ($row = mysqli_fetch_array($resultado, MYSQLI_ASSOC)){
      array_push($dato, $row);
    }



    mysqli_close($connect);
?>
<!doctype html>
<html lang="es">
  <head>
    <title>BlindingParts ES</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Custom CSS-->
    <link rel="stylesheet" href="../css/index.css">
    <link rel="stylesheet" href="../css/historial.css">
    <!-- CSS Responsive-->
    <link rel="stylesheet" href="../css/responsive.css">    
    <!-- Custom Font-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@100&display=swap" rel="stylesheet">



  </head>
  <body>

  <div class="pos-f-t fixed-top">
        <div class="collapse" id="navbarToggleExternalContent">
            <div class=" font-weight-bold text-white nav-container">
            <ul class = "nav-list">
                    <li class="nav-item">
                        <?php
                            if (!isset($_SESSION['email'])){
                        ?>
                        <a class="nav-link" href="login.php">Ingresar a mi cuenta autorizada</a>
                        <?php }else{?>
                        <a class="nav-link" href="sign-out.php">Salir de mi cuenta </a>
                        <?php }?>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact.php">Contactarse con soporte</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">Inicio</a>
                    </li>
                </ul>
                <form class="form-inline mt-3 search-form" style = "margin-left: 60px;" action = "search.php" method = "get">
                    <input class="form-control mr-sm-2" type="search" placeholder="Buscar repuestos..." aria-label="Search" name = "search-form">
                    <button class="btn btn-outline-light my-2 my-sm-0" type="submit"><i class="fas fa-search"></i></button>
                </form>
            </div>
        </div>
        <nav class="navbar navbar-dark">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
        </nav>
    </div>

    <?php
        if (isset($_SESSION['email'])){
    ?>
    <div class = "fixed-top user-email text-white d-flex justify-content-end p-3 w-50 ml-auto">
        <h4 class = "text-weight-bold"><?php echo $_SESSION['email'];?></h4>
    </div>
    <?php
        }
    ?>

    <div class = "wrapper">
        <div class = "background">
            <div class = "mt-5 mb-3 tittle">
                <h1 class = "font-weight-bold ">Historial de Asignaciones</h1>
            </div>
            <!----------------------TABLE---------------------->
            <div class = "table-wrapper">
                <table class="table table-bordered h-100 text-white" style = "width: 80%;">
                    <thead>
                        <tr class = "text-center bg-dark">
                        <th scope="col">Fecha de Asignacion</th>
                        <th scope="col">Usuario</th>
                        <th scope="col">Puesto del Usuario</th>
                        <th scope="col">Nombre del repuesto</th>
                        <th scope="col">Descripcion del repuesto</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            for ($i=0; $i < count($dato); $i++) { 
                        ?>
                        <tr class = "font-weight-bold text-center">
                        <th scope="row"><?php echo $dato[$i]['fecha_asignacion']?></th>
                        <td><?php echo $dato[$i]['email']?></td>
                        <td><?php echo $dato[$i]['puesto']?></td>
                        <td><?php echo $dato[$i]['nombre']?></td>
                        <td><?php echo $dato[$i]['descripcion']?></td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
            </div>                  
        </div>
    </div>







    <footer class = "font-weight-bold">
      <div class ="footer-lists">
        <ul>
          <li class = "list-project"><a href="footer.php?sel=about"><i class="fas fa-project-diagram"></i> Acerca de este proyecto</a></li>
          <li class = "list-contact"><a href="contact.php"><i class="far fa-paper-plane"></i> Contacto</a></li>
          <li class = "list-legal"><a href="footer.php?sel=legal"><i class="fas fa-file-contract"></i> Legal</a></li>
        </ul>
        <ul>
          <li class = "list-ig"><a href="https://www.instagram.com/Jayggo"><i class = "fab fa-instagram"></i> Instagram</a></li>
          <li class = "list-fb"><a href="https://www.twitter.com/Jairog14"><i class = "fab fa-facebook"></i> Twitter</a></li>
          <li class = "list-github"><a href="https://www.github.com/Jayggo"><i class = "fab fa-github"></i> GitHub</a></li>
        </ul>
      </div>
      <p class ="text-muted copy">&copy 2021 Jairo Gomez</p>
    </footer>





    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>