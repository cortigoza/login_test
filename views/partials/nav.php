<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
  <a class="navbar-brand" href="dashboard.php">
      <img src="../assets/img/uniajc.png" alt="" width="200" height="80" class="d-inline-block align-text-top">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <?php
        if ($_SESSION['test_login']->nameProfile->name_profile == 'admin') {
            echo '
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="users.php">Usuarios</a>
          </li>

          ';
        }
      ?>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../logout.php">Salir</a>
        </li>
      </ul>
      <span class="navbar-text">
        <?php echo $_SESSION['test_login']->user_name?>
      </span>
    </div>
  </div>
</nav>