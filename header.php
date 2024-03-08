<!DOCTYPE html>
<html lang="nl">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Navbar</title>
<style>
body {
  margin: 0;
  font-family: Arial, sans-serif;
}

.navbar {
  background-color: #333;
  overflow: hidden;
}

.navbar a {
  float: left;
  display: block;
  color: white;
  text-align: center;
  padding: 14px 20px;
  text-decoration: none;
}

.navbar a:hover {
  background-color: #ddd;
  color: black;
}

.active {
  background-color: #555;
}
</style>
</head>
<body>

<div class="navbar">
  <a class="active" href="../home/home.php">Home</a>
  <a href="../klant/add-klant.php">Klant</a>
  <a href="../product/add-product.php">Product</a>
  <a href="../tafel/add-tafel.php">Tafel</a>
  <a href="../reservering/add-reservering.php">Reservering</a>
  <a href="../rekening/add-rekening.php">Rekening</a>
</div>


</body>
</html>
