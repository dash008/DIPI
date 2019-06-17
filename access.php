  <?php
  session_start();
  include('acceso_db.php');


  if(isset($_SESSION['username'])){


?>  
<!doctype html>
  <html lang="en">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <link rel="icon" href="../../../../favicon.ico">

      <script src="bootstrap-4.1.3-dist/js/jquery-3.3.1.js"></script>
      <script>window.jQuery || document.write('<script src="bootstrap-4.1.3-dist/js/jquery-3.3.1.js"><\/script>')</script>
      <script src="bootstrap-4.1.3-dist/js/popper.min.js"></script>
      <script src="bootstrap-4.1.3-dist/js/bootstrap.min.js"></script>
      <script src="bootstrap-4.1.3-dist/js/holder.min.js"></script>
      

      <title>Dipi</title>

      <!-- Bootstrap core CSS -->
      <link href="bootstrap-4.1.3-dist/css/bootstrap.min.css" rel="stylesheet">

      <!-- Custom styles for this template -->
      <link href="bootstrap-4.1.3-dist/css/album.css" rel="stylesheet">
      <link href="bootstrap-4.1.3-dist/css/newstyle.css" rel="stylesheet">
    </head>

    <body>

      <header>
        <div class="collapse bg-dark" id="navbarHeader">
          <div class="container">
            <div class="row">
              <div class="col-sm-8 col-md-7 py-4">
                
                
              </div>
              <div class="col-sm-4 offset-md-1 py-4">
                <h4 class="text-white">Contacto</h4>
                <ul class="list-unstyled">
                  <li><a href="https://twitter.com/dash008" class="text-white">Twitter</a></li>
                  <li><a href="mailto:davidserna08@gmail.com" class="text-white">Email</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="navbar navbar-light" style="background-color: #ead95c;">
          <div class="container d-flex justify-content-between">
            <a href="#" class="navbar-brand d-flex align-items-center">
              <img class=brand_img src="assets/dipi.png" alt="">              
            </a>

            <a href="explore.php">
              <img src="assets/baseline-explore-24px.svg" alt="HTML tutorial" style="width:24px;height:24px;border:0">
              Explorar Creaciones
            </a>
            <a href="logout.php">
              <img src="assets/baseline-power_settings_new-24px.svg" alt="HTML tutorial" style="width:24px;height:24px;border:0">
              Cerrar Sesion
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          </div>
        </div>
      </header>

      <main role="main">


        <section class="jumbotron text-center">

          <div class="container">
            <h1 class="jumbotron-heading"><?=$_SESSION['username']?></h1>
            <div class="game_container" id="game_container">
              <script src="p5/p5.js"></script>
              <script src="p5/sketch.js"></script>
              <script language="javascript" type="text/javascript" src="p5/addons/p5.dom.js"></script>
              <script language="javascript" type="text/javascript" src="p5/addons/p5.sound.js"></script>
          </div>
            <p>
              <button  onclick="loop();"class="btn btn-primary my-2">Jugar Partida</button>
              
            </p>
          </div>
        </section>

        
          <div class="flex-container">
           
                

<?php
                $username =$_SESSION['username'];
                $id = $_SESSION['id'];
                $sql = "SELECT * FROM creations WHERE id_creador_original='".$id."'";
            
                $result = $conn->query($sql);
            
                
                while($row = $result->fetch_assoc())
                {
                  
                  echo '<div class="image_div">';
                  echo '<img src="data:image/png;base64,'.$row['imagen'].'"/>';
                  echo '</div>';
                  
              }
?>
           
          </div>
      </main>

      <footer class="text-muted">
        <div class="container">
          <p class="float-right">
            <a href="#">Ir arriba</a>
          </p>
          Creado por David Serna
        </div>
        
      </footer>

      <!-- Bootstrap core JavaScript
      ================================================== -->
      <!-- Placed at the end of the document so the pages load faster -->
      
      <!-- P5.js core JavaScript
      ================================================== -->
      

    </body>
  </html>

<?php 
  }
  else{
    header("Location:index.php");
  }
?>