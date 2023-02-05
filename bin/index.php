<?php
$title = "PDO Postgres";
$servername = "db";
$dbuser = "maria";
$dbpass = "pass";
$dsn = "pgsql:host=$servername;dbname=holiday";
$col = array('Id' => 'id'
            ,'Name' => 'name'
            ,'Month' => 'mes'
            ,'Day' => 'dia' );

$dbh = new PDO($dsn, $dbuser, $dbpass);
$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
$fields = implode(', ', array_values($col));
$sth = $dbh->prepare("SELECT $fields FROM public.american");
$sth->execute();
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <meta charset="utf-8" />
  	<title><?= $title ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
  <nav class="navbar navbar-inverse">
      <div class="container">
          <div class="navbar-header">
              <a class="navbar-brand" href="/"><?= $title ?></a>
          </div>
          <div id="navbar" class="collapse navbar-collapse">
              <ul class="nav navbar-nav">
                  <li class="active"><a href="/">Home</a></li>
              </ul>
          </div>
      </div>
  </nav>


<div class="container">
  <table class="table table-striped">
    <thead>
<tr>
<?php foreach(array_keys($col) as $x) : ?>
    <th><?= $x ?></th>
<?php endforeach;?>
</tr>
</thead>
<tbody>
<?php foreach($sth->fetchAll(PDO::FETCH_ASSOC) as $row) : ?>
<tr>
  <?php foreach(array_values($col) as $x) : ?>
      <td><?= $row[$x] ?></td>
  <?php endforeach;?>
</tr>
<?php endforeach;?>
</tbody>
</table>
</body>
</html>
