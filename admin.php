<?php
session_start();
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
  header("location: index.html");
  exit;
}
require_once "config.php";
$sql = "SELECT id, bike_name, theft_date, theft_place, details, contact_info FROM bikedata";
$q = $pdo->query($sql);
$q->setFetchMode(PDO::FETCH_ASSOC);

?>
<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Lab1</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/stylesFinal.css">
  <!-- Font Awesome -->
  <script src="https://kit.fontawesome.com/52903cfb09.js" crossorigin="anonymous"></script>
</head>

<body>
<nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">ВелоКрадіжки Львів</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">На початок <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#myTable">Таблиця </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Картинки </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Форма </a>
      </li>
    </ul>
    <ul class="navbar-nav">
      <li class="nav-item">
        <label class="text-light mr-2 mt-2">Темна тема </label>
        <input id="switch" name="dark_theme_switch" type="checkbox" data-toggle="toggle"
               data-onstyle="outline-warning" data-offstyle="outline-info">
      </li>
      <li class="nav-item mx-3 ml-5">
        <a class="nav-link" href="logout.php"><i class="fa fa-sign-out" aria-hidden="true"> Вийти </i></a>
      </li>
    </ul>
  </div>
</nav>

<!-- Table -->
<main>
  <div class="container">
    <section class="text-center my-4">
      <div class="text-black-50">
        <h1 class="display-4">Інформація про викрадені велосипеди</h1>
        <button id="addNew" class="btn btn-lg btn-primary my-3" type="button" data-toggle="modal" data-target="#addNewModal">
          Додати інформацію про нову крадіжку
        </button>
      </div>
      <div class="table-responsive">
        <table class="table table-dark table-striped table-hover" id="myTable">
          <thead>
          <tr>
            <th class="align-middle">№</th>
            <th class="align-middle">Назва велосипеду</th>
            <th class="align-middle">Час викрадення</th>
            <th class="align-middle">Місце викрадення</th>
            <th class="align-middle">Деталі</th>
            <th class="align-middle">Контактна інформація</th>
            <th></th>
          </tr>
          </thead>
          <tbody id="myTableBody">
          <?php while ($row = $q->fetch()): ?>
            <tr>
              <td><?php echo htmlspecialchars($row['id']) ?></td>
              <td><?php echo htmlspecialchars($row['bike_name']) ?></td>
              <td><?php echo htmlspecialchars($row['theft_date']) ?></td>
              <td><?php echo htmlspecialchars($row['theft_place']) ?></td>
              <td><?php echo htmlspecialchars($row['details']) ?></td>
              <td><?php echo htmlspecialchars($row['contact_info']) ?></td>
              <td><a title="Видалити запис" data-toggle="tooltip" class="delete"><i class="fas fa-trash-alt"></i></a></td>
            </tr>
          <?php endwhile; ?>
          </tbody>
        </table>
      </div>
    </section>
  </div>
</main>

<!-- Modal element adding to the table -->
<div class="modal fade" id="addNewModal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Додати новий елемент</h5>
        <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
      </div>
      <div class="modal-body">
        <form action="http://example.com/app.php" method="get" target="_blank">
          <div class="form-group">
            <label for="bikeName">Назва велосипеду</label>
            <input type="text" class="form-control" id="bikeName" name="bikeName">
          </div>
          <div class="form-group">
            <label for="bikeTheftDetails">Дата крадіжки</label>
            <input type="datetime-local" class="form-control" id="bikeTheftDate" name="theftTime">
          </div>
          <div class="form-group">
            <label for="bikeTheftPlace">Місце крадіжки</label>
            <input type="text" class="form-control" id="bikeTheftPlace" name="theftPlace">
          </div>
          <div class="form-group">
            <label for="bikeTheftDetails">Деталі про крадіжку</label>
            <textarea class="form-control" id="bikeTheftDetails" rows="4" name="theftDetails"></textarea>
          </div>
          <div class="form-group">
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inform" id="dontInformRadio" value="0">
              <label class="form-check-label" for="dontInformRadio">Не повідомляти про крадіжку</label>
            </div>
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="radio" name="inform" id="informRadio" value="1">
              <label class="form-check-label" for="informRadio">Повідомити про крадіжку</label>
            </div>
          </div>
          <div class="form-group">
            <label for="contacts">Контактна інформація</label>
            <input type="tel" class="form-control" id="contacts" name="contacts">
          </div>
          <input type="hidden" id="postId" name="postId" value="34657">
          <button id="addRecord" type="submit" class="btn btn-primary btn-block">Додати запис в таблицю</button>
        </form>
      </div>
    </div>
  </div>
</div>

<div id="result"></div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<!-- Custom JS -->
<script src="js/theme.js"></script>
<script src="js/adminUtils.js"></script>
</body>
</html>