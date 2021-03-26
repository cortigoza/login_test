<?php
session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Iniciar sesion</title>
  </head>
  <body>
  <div class="container-fluid">
    <div class="row vertical-center">
        <form  id="login" class="border p-3 form" action="" method="post">
        
           <img src="assets/img/uniajc.png" alt="" width="200" height="80" class="rounded mx-auto d-block">
            <h1>Iniciar sesión</h1>
            <div class="mb-3">
                <label for="username">Usuario</label>
                <input type="text" class="form-control" name="username" id="username">
            </div>
            <div class="mb-3">
                <label for="password">Contraseña</label>
                <input type="password" class="form-control" name="password" id="password">
            </div>
            <div >
            <button type="submit" class="btn btn-primary">Ingresar</button>
            </div>
        </form>
    </div>
  </div>
  <?php include("views/partials/footer.php");?>
  <script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
    <script src="assets/js/services.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  </body>
</html>