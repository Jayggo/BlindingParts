<?php

    if (!empty($_POST['email'])){

        $message = ' ';
        $email = $_POST['email'];

        try{

                require_once('connect.php');

                $connect = $conexion->getConn();

                $sql = "SELECT * FROM usuario WHERE email = '$email'";

                $resultado = $connect->query($sql);

                $dato = $resultado->fetch_assoc();


                if (isset($dato['email'])){

                    session_start(); // INICIO LA SESION Y GUARDO TODOS LOS DATOS EN GLOBAL PARA USARLOS LUEGO
                    $_SESSION['email'] = $email;
                    $_SESSION['id'] = $dato['id'];
                    $_SESSION['nombre'] = $dato['nombre'];
                    $_SESSION['apellido'] = $dato['apellido'];
                    $_SESSION['puesto'] = $dato['puesto'];
                    header ("location:../index.php");

                }else{

                    $message = 'Usuario no encontrado. Si persiste el problema comuniquese con soporte.';

                }

        }catch(Exception $e){

            $error = $e->getMessage();

        }
        
        mysqli_close($connect);
    }


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
                        <a class="nav-link" href="historial.php">Historial de Asignaciones</a>
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

    <header>
        <div class = "background">
            <form class = "w-50" action = "login.php" method = "post">
                <div class="form-group">
                    <label for="email-form" class = " font-weight-bold">Entrar a tu cuenta</label>
                    <input type="email" class="form-control font-weight-bold" id="email-form" aria-describedby="emailHelp" placeholder="Ingresa el e-mail autorizado" name = "email">
                </div>
                <button type="submit" class="btn btn-outline-light font-weight-bold">Entrar</button>
            </form>
            <small class = "ml-5 font-weight-bold text-danger">
                    <?php 
                        if (!empty($message)){

                            echo $message;

                        }
                    ?>
                </small>
        </div>
    </header>







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