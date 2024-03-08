<?php
include_once('klant.php');
include_once('../header/header.php');

$Klant = new Klant();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $naam = $_POST["naam"];
        $email = $_POST["email"];
        $telefoon = $_POST["telefoon"];

        $Klant->addKlant($naam, $email, $telefoon);
        echo "<p>Klant toegevoegd!</p>";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

$klanten = $Klant->getAllklanten();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Voeg een nieuwe klant toe</title>
</head>
<body>






    <div class="container">
        <h2>Voeg een nieuwe klant toe</h2>
        <form method="POST"> 
            <div class="mb-3">
                <label class="form-label">Naam:</label>
                <input type="text" class="form-control" name="naam" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Email:</label>
                <input type="text" class="form-control" name="email" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Telefoon:</label>
                <input type="text" class="form-control" name="telefoon" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <h2>Klanten Overzicht</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Klant ID</th>
                    <th scope="col">Naam</th>
                    <th scope="col">Email</th>
                    <th scope="col">Telefoon</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($klanten as $klant): ?>
                <tr>
                    <td><?php echo $klant['klantid']; ?></td>
                    <td><?php echo $klant['naam']; ?></td>
                    <td><?php echo $klant['email']; ?></td>
                    <td><?php echo $klant['telefoon']; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
