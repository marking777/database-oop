<?php
include_once('Tafel.php');
include_once('../header/header.php');


$Restaurant = new Tafel();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $tafelnummer = $_POST["tafelnummer"];
        $stoelen = $_POST["stoelen"];
        $grootte = $_POST["grootte"];

        $Restaurant->addTafel($tafelnummer, $stoelen, $grootte);
        echo "<p>Tafel toegevoegd!</p>";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}


$tafels = $Restaurant->getAllTafels();



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Voeg een nieuwe tafel toe</title>
</head>
<body>
    <h2>Voeg een nieuwe tafel toe</h2>
    <form method="POST"> 
        <div class="mb-3">
            <label class="form-label">Tafelnummer:</label>
            <input type="text" class="form-control" name="tafelnummer" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Aantal stoelen:</label>
            <input type="text" class="form-control" name="stoelen" required>
        </div>
        <div class="mb-3">
            <label class="form-label">grootte:</label>
            <input type="text" class="form-control" name="grootte" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>


    <h2>Tafels overzicht</h2>



    <table class="table">
  <thead>
    <tr>
      <th scope="col">Tafel ID</th>
      <th scope="col">Tafelnummer</th>
      <th scope="col">Aantal stoelen</th>
      <th scope="col">Grootte</th>
    </tr>
  </thead>
  <tbody>
    <tr>
    <?php foreach ($tafels as $table): ?>
      
      <td><?php echo $table['tafelid']; ?></td>
      <td><?php echo $table['tafelnummer']; ?></td>
      <td><?php echo $table['stoelen']; ?></td>
      <td><?php echo $table['grootte']; ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
</body>
</html>
