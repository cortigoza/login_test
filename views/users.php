<?php
session_start();
if (!isset($_SESSION['test_login'])) {
    header('Location: ../index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
<?php include("partials/nav.php");?>
<br>
<br>
<br>
<div class="row justify-content-center">
<form  id="signup" class="border p-3 form" action="" method="post">
            <h1>Ingresar Usuario</h1>
            <div class="mb-3">
                <label for="nameUser">Nombre</label>
                <input type="text" class="form-control" name="nameUser" id="nameUser" required>
            </div>
            <div class="mb-3">
                <label for="username">Usuario</label>
                <input type="text" class="form-control" name="username" id="username" required>
            </div>
            <div class="mb-3">
                <label for="email">Correo</label>
                <input type="email" class="form-control" name="email" id="email" required>
            </div>
            <div class="mb-3">
                <label for="profile">Perfil</label>
                <input type="number" class="form-control" name="profile" id="profile" min="1" max="2" required>
            </div>
            <div class="mb-3">
                <label for="status">Activo</label>
                <input type="number" class="form-control" name="status" id="status" min="0" max="1" required>
            </div>
            <div class="mb-3">
                <label for="password">Contraseña</label>
                <input type="password" class="form-control" name="password" id="password" required>
            </div>
            <div >
            <button type="submit" class="btn btn-primary">Registrar</button>
            </div>
        </form>
  <div class="col-auto">
  <table class="table text-center" id="table_users">
  <thead>
    <tr>
      <th scope="col" class="id_user">id#</th>
      <th scope="col" class="user_name">Usuario</th>
      <th scope="col" class="email">Correo</th>
      <th scope="col" class="name">Nombre</th>
      <th scope="col" class="profile">Perfil</th>
      <th scope="col" class="estatus">Activo</th>
      <th scope="col" class="#" colspan="2">Acciones</th>
    </tr>
  </thead>
  <tbody>
  </tbody>
  </table>
    </div>
  </div>

<div id="miModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Contenido del modal -->
    <div class="modal-content">
      <div class="modal-body">
        <form  id="editUser" class="border p-3 form" action="" method="post">
            <h1>Editar Usuario</h1>
            <input type="hidden" name="idUser" id="idUser">
            <div class="mb-3">
                <label for="nameUser">Nombre</label>
                <input type="text" class="form-control" name="nameUser" id="editName"  required>
            </div>
            <div class="mb-3">
                <label for="username">Usuario</label>
                <input type="text" class="form-control" name="username" id="editUsername" required>
            </div>
            <div class="mb-3">
                <label for="email">Correo</label>
                <input type="email" class="form-control" name="email" id="editEmail" required>
            </div>
            <div class="mb-3">
                <label for="profile">Perfil</label>
                <input type="number" class="form-control" name="profile" id="editProfile" min="1" max="2" required>
            </div>
            <div class="mb-3">
                <label for="status">Activo</label>
                <input type="number" class="form-control" name="status" id="editStatus"  min="0" max="1" required>
            </div>
            <div class="mb-3">
                <label for="password">Contraseña</label>
                <input type="password" class="form-control" name="password" id="editPassword"  required>
            </div>
            <div >
            <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" id="closeModal" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<script
  src="https://code.jquery.com/jquery-3.6.0.min.js"
  integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
  crossorigin="anonymous"></script>
    <script src="../assets/js/services.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<script>
  searchUsers();
</script>
</body>
</html>