<?php

    session_start();

    try {
        require_once('php/connect.php');

        $connect = $conexion->getConn();
        $sql = "SELECT * FROM repuesto";
        $resultado = $connect->query($sql);

    } catch (Exception $e) {
        
        $error = $e->getMessage();
    }

    $dato = array();
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
    <link rel="stylesheet" href="css/index.css">
    <!-- CSS Responsive-->
    <link rel="stylesheet" href="css/responsive.css">
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
                        <a class="nav-link" href="php/login.php">Ingresar a mi cuenta autorizada</a>
                        <?php }else{?>
                        <a class="nav-link" href="php/sign-out.php">Salir de mi cuenta </a>
                        <?php }?>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="php/contact.php">Contactarse con soporte</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="php/historial.php">Historial de Asignaciones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Inicio</a>
                    </li>
                </ul>
                <form class="form-inline mt-3 search-form" style = "margin-left: 60px;" action = "php/search.php" method = "get">
                    <input class="form-control mr-sm-2" type="search" placeholder="Buscar repuestos..." aria-label="Search" name = "search-form">
                    <button class="btn btn-outline-light my-2 my-sm-0 text-center" type="submit"><i class="fas fa-search"></i></button>
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
            <div class = "brand"><h1>BlindingParts SA</h1></div>
            <p>¡Bienvenido<?php if(isset($_SESSION['nombre'])){echo ", ".$_SESSION['nombre']." ".$_SESSION['apellido'];}?>!</p>
            <p class = "font-italic"><?php if(isset($_SESSION['nombre'])){echo $_SESSION['puesto'];}?></p>
            <?php
                if (!isset($_SESSION['email'])){            
            ?>
            <a href="php/login.php" class = "btn btn-outline-light login-button">Ingrese con su e-mail autorizado</a>
            <?php }else{
            ?>
             <a href="php/search.php" class = "btn btn-outline-light login-button">Buscar repuestos o piezas</a>
             <?php }?>
        </div>
    </header>

    

    <div class ="section section-one"><p class = "p-5 font-weight-bold text-center">Bienvenido al portal en español de BlindingParts SA para mecánicos autorizados.</p></div>

    <div class ="section section-two"><p class = "p-5 font-weight-bold text-center">Aqui podrá visualizar las piezas y repuestos disponibles, seleccionar los necesarios y asignarlos a su cuenta.</p></div>

    <div class ="section section-three">
        <p class = "p-5 font-weight-bold text-center">¿Qué necesita en este momento?</p>
        <div>
            <a href="php/search.php" class = "btn btn-outline-light  font-weight-bold">Buscar repuestos y piezas</a>
            <?php if (!isset($_SESSION['email'])){?>
            <a href="php/login.php" class = "btn btn-outline-light font-weight-bold ">Ingresar a mi cuenta autorizada</a>
            <?php }else{?>
            <a href="php/sign-out.php" class = "btn btn-outline-light font-weight-bold ">Salir de esta cuenta</a>
            <?php }?>
        </div>
    </div>
    <!--------------------CAROUSEL------------------->
    <div class = "section section-four p-5">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100 image-one" src="img/sample-1.jpg" alt="First slide" height = "500px">
                    <div class = "carousel-caption d-md-block">
                        <h3 class = "font-weight-bold"><?php echo $dato[0]['nombre'];?></h3>
                        <p><?php echo $dato[0]['descripcion'];?></p>
                        <p>Alto: <?php echo$dato[0]['alto'];?>, Ancho: <?php echo$dato[0]['ancho'];?>, Largo: <?php echo$dato[0]['largo'];?>, Peso: <?php echo$dato[0]['peso'];?></p>
                        <a href="php/repuesto.php?id=<?php echo$dato[0]['id'];?>" class = "btn btn-outline-light font-weight-bold ">Ver más</a>
                    </div>
                </div>
                <?php
                    for ($i=1; $i <3 ; $i++) { 
                ?>
                 <div class="carousel-item">
                    <img class="d-block w-100" src="img/sample-<?php echo ($i+1);?>.jpg" alt="First slide" height = "500px">
                    <div class = "carousel-caption d-md-block">
                        <h3 class = "font-weight-bold"><?php echo $dato[$i]['nombre'];?></h3>
                        <p><?php echo $dato[$i]['descripcion'];?></p>
                        <p>Alto: <?php echo$dato[$i]['alto'];?>, Ancho: <?php echo$dato[$i]['ancho'];?>, Largo: <?php echo$dato[$i]['largo'];?>, Peso: <?php echo$dato[$i]['peso'];?></p>
                        <a href="php/repuesto.php?id=<?php echo$dato[$i]['id'];?>" class = "btn btn-outline-light font-weight-bold ">Ver más</a>
                    </div>
                </div>
                <?php }?>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>










    <footer class = "font-weight-bold">
      <div class ="footer-lists">
        <ul>
          <li class = "list-project"><a href="php/footer.php?sel=about"><i class="fas fa-project-diagram"></i> Acerca de este proyecto</a></li>
          <li class = "list-contact"><a href="php/contact.php"><i class="far fa-paper-plane"></i> Contacto</a></li>
          <li class = "list-legal"><a href="php/footer.php?sel=legal"><i class="fas fa-file-contract"></i> Legal</a></li>
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