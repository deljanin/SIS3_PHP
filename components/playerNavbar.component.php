<body>
<nav class="navbar navbar-light bg-light">
  <form class="container-fluid justify-content-start">
    <a class="active" href="../pages/player.php">
    <button class="btn btn-outline-success me-2" type="button"><?php echo $_SESSION[
        'name'
    ]; ?></button>
    </a>
    <a href="../pages/match.php">
    <button class="btn btn-outline-success me-2" type="button">Matches</button>
    </a>
    <a class="active" href="../components/logout.component.php">
    <button class="btn btn-danger me-2" type="button">Logout</button>
    </a>
  </form>
</nav> 