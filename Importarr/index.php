<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link type="text/css" rel="shortcut icon" href="img/icono.png"/>
  <title>Importar Excel</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/cargando.css">
  <link rel="stylesheet" type="text/css" href="css/cssGenerales.css">
</head>
<body>

<div class="cargando">
    <div class="loader-outter"></div>
    <div class="loader-inner"></div>
</div>

<nav class="navbar navbar-expand-lg navbar-light navbar-dark fixed-top" style="background-color: #daf19c !important;">
    <ul class="navbar-nav mr-auto collapse navbar-collapse">
      <li class="nav-item active">
        
      </li>
    </ul>
    <a href = "http://localhost/biblioteca/editorial/">
                    <button class="btn btn-primary mb-2" type="button"  name="Cargar excel"> Volver<i i></button>
                    </a>
</nav>


<div class="container">

<h3 class="text-center">
</h3>
<hr>
<br><br>


 <div class="row">
    <div class="col-md-7">
      <form action="recibe_excel_validando.php" method="POST" enctype="multipart/form-data"/>
        <div class="file-input text-center">
            <input  type="file" name="dataeditorial" id="file-input" class="file-input__input"/>
            <label class="file-input__label" for="file-input">
              <i class="zmdi zmdi-upload zmdi-hc-2x"></i>
              <span>Elegir Archivo</span></label
            >
          </div>
      <div class="text-center mt-5">
          <input type="submit" name="subir" class="btn-enviar" value="Subir Excel"/>
      </div>
      </form>
    </div>

    <div class="col-md-5">
  <?php
  header("Content-Type: text/html;charset=utf-8");
  include('config.php');
  $sqleditorial = ("SELECT * FROM editorial ORDER BY id ASC");
  $queryData   = mysqli_query($con, $sqleditorial);
  $total_client = mysqli_num_rows($queryData);
  ?>

      <h6 class="text-center">
        Editorial
      </h6>

        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>Nombe De Editorial</th>
              <th>Estado</th>
            </tr>
          </thead>
          <tbody>
            <?php 
            $i = 1;
            while ($data = mysqli_fetch_array($queryData)) { ?>
            <tr>
              <td><?php echo $data['editorial']; ?></td>
              <td><?php echo $data['estado']; ?></td>
            </tr>
          <?php } ?>
          </tbody>
        </table>

    </div>
  </div>

</div>


<script src="js/jquery.min.js"></script>
<script src="'js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $(window).load(function() {
            $(".cargando").fadeOut(1000);
        });      
});
</script>

</body>
</html>