<?php
include_once('product.php');
include_once('../header/header.php');

$product = new product();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
    $naam = $_POST['naam'];
    $prijs = $_POST['prijs'];
    $beschrijving = $_POST['beschrijving'];

    $product->addproduct($naam, $prijs, $beschrijving);
        echo "<p>product toegevoegd!</p>";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}

$producten = $product->getAllproducten();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Add Product</title>
</head>
<body>
    <h2>Product tovoegen</h2>
    <form method="POST"> 
        <div class="mb-3">
    <label class="form-label">Naam</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="naam" required>
  </div>

        <div class="mb-3">
    <label class="form-label">Prijs</label>
    <input type="number" class="form-control" id="exampleInputPassword1" name="prijs" required>
  </div>
        <div class="mb-3">
    <label class="form-label">beschrijving</label>
    <input type="text" class="form-control" id="exampleInputPassword1" name="beschrijving" required>
  </div>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>



<h2>Producten Overzicht</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Product ID</th>
                    <th scope="col">Naam</th>
                    <th scope="col">Prijs</th>
                    <th scope="col">Beschrijving</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($producten as $product): ?>
                <tr>
                    <td><?php echo $product['productid']; ?></td>
                    <td><?php echo $product['naam']; ?></td>
                    <td><?php echo $product['prijs']; ?></td>
                    <td><?php echo $product['beschrijving']; ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>


</body>
</html>

