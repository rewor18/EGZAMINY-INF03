<!-- AUTOR @rewor18 2025 -->

<?php 
$conn = mysqli_connect('localhost', 'root', '', 'obuwie');
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Obuwie</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
<header class="naglowek">
<h1>Obuwie męskie</h1>
</header>

<main class="glowny">
<form action="zamow.php" method="post">
    <label>Model:</label>
    <select name="model" class="kontrolki">
    <?php
$zapytanie1 = "SELECT model FROM produkt";
$wynik = mysqli_query($conn, $zapytanie1);

if (!$wynik) {
    die("Błąd zapytania 1: " . mysqli_error($conn));
}

while ($wiersz = mysqli_fetch_assoc($wynik)) {
    echo '<option value="' . $wiersz['model'] . '">' . $wiersz['model'] . '</option>';
}
?>

    </select>

    <label>Rozmiar:</label>
    <select name="rozmiar" class="kontrolki">
        <option value="40">40</option>
        <option value="41">41</option>
        <option value="42">42</option>
        <option value="43">43</option>
    </select>

    <label>Liczba par:</label>
    <input type="number" name="liczbaPar" class="kontrolki">

    <button id="wyslij" class="kontrolki">Zamów</button>
</form>


<?php
$zapytanie2 = "SELECT buty.model, buty.nazwa, buty.cena, produkt.nazwa_pliku FROM buty JOIN produkt ON buty.model = produkt.model";
$wynik2 = mysqli_query($conn, $zapytanie2);

if (!$wynik2) {
    die("Błąd zapytania 2: " . mysqli_error($conn));
}

while ($wiersz2 = mysqli_fetch_assoc($wynik2)) {
    echo '<section class="buty">';
    echo '<div class="produkt">';
    echo '<img src="' . $wiersz2['nazwa_pliku'] . '" alt="but męski">';
    echo '<h2>' . $wiersz2['nazwa'] . '</h2>';
    echo '<h5>Model: ' . $wiersz2['model'] . '</h5>';
    echo '<h4>Cena: ' . $wiersz2['cena'] . ' zł</h4>';
    echo '</div>';
    echo '</section>';
}
?>



</main>

<footer class="stopka">
<p>Autor strony: @rewor18</p>
</footer>

</body>
</html>

<!-- AUTOR @rewor18 2025 -->